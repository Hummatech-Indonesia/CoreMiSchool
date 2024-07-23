<?php

namespace App\Services;

use Carbon\Carbon;
use App\Enums\RoleEnum;
use App\Models\Student;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Enums\AttendanceEnum;
use function PHPSTORM_META\map;
use App\Http\Requests\StoreAttendanceRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;

class AttendanceService
{
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private StudentInterface $student;
    private AttendanceInterface $attendance;
    private AttendanceTeacherInterface $attendanceTeacher;

    public function __construct(ModelHasRfidInterface $modelHasRfid, StudentInterface $student, AttendanceRuleInterface $attendanceRule, AttendanceInterface $attendance, AttendanceTeacherInterface $attendanceTeacher)
    {
        $this->modelHasRfid = $modelHasRfid;
        $this->student = $student;
        $this->attendance = $attendance;
        $this->attendanceRule = $attendanceRule;
        $this->attendanceTeacher = $attendanceTeacher;
    }

    public function store(StoreAttendanceRequest $request): array|bool
    {
        $data = $request->validated();
        return $data;
    }
    public function insert(array $attendances, $rule, $day): mixed
    {
        // Collect attendance IDs
        $attendanceIds = collect($attendances)->pluck('id');
        $invalidAttendances = [];

        // Get current day's attendance
        $currentDayAttendanceStudent = $this->attendance->getCurrentDay();
        $currentDayAttendanceTeacher = $this->attendance->getCurrentDay();

        // Get student attendance based on RFID
        $studentAttendance = Student::with('modelHasRfid')->whereHas('modelHasRfid', function ($q) use ($attendanceIds) {
            $q->whereIn('id', $attendanceIds);
        })->get()->pluck('id', 'modelHasRfid.id');

        // Get teacher attendance based on RFID
        $teacherAttendance = Employee::with('modelHasRfid')->where('status', RoleEnum::TEACHER->value)->whereHas('modelHasRfid', function ($q) use ($attendanceIds) {
            $q->whereIn('id', $attendanceIds);
        })->get()->pluck('id', 'modelHasRfid.id');

        $students = [];
        $teachers = [];

        foreach ($attendances as $attendance) {
            $time = Carbon::createFromFormat('H.i', $attendance['time']);
            $checkinStart = Carbon::parse($rule->checkin_start);
            $checkinEnd = Carbon::parse($rule->checkin_end);
            $checkoutStart = Carbon::parse($rule->checkout_start);
            $checkoutEnd = Carbon::parse($rule->checkout_end);

            // Checkout
            if ($time->between($checkoutStart, $checkoutEnd)) {
                // Check if already checked in
                $checkinStudent = $currentDayAttendanceStudent->where('classroom_student_id', $attendance['id'])->where('checkin', '<', $checkoutStart);
                $checkinTeacher = $currentDayAttendanceTeacher->where('checkin', '<', $checkoutStart);
                $alreadyAbsentStudent = $currentDayAttendanceStudent->whereNotNull('checkout');
                $alreadyAbsentTeacher = $currentDayAttendanceTeacher->whereNotNull('checkout');

                if (!$alreadyAbsentStudent->isEmpty() || !$alreadyAbsentTeacher->isEmpty()) continue;

                $status = $time->greaterThanOrEqualTo($checkoutStart) && $checkinStudent->isEmpty() && $checkinTeacher->isEmpty() ? AttendanceEnum::ALPHA : AttendanceEnum::PRESENT;

                $value = [
                    'checkout' => $time,
                    'status' => $status,
                ];

                if (isset($studentAttendance[$attendance['id']])) {
                    $value['classroom_student_id'] = $studentAttendance[$attendance['id']];
                    array_push($students, $value);
                } else {
                    $value['employee_id'] = $teacherAttendance[$attendance['id']];
                    array_push($teachers, $value);
                }
            }
            // Checkin
            else if ($time->greaterThanOrEqualTo($checkinStart)) {
                $alreadyAbsentStudent = $currentDayAttendanceStudent->whereNull('checkout');
                $alreadyAbsentTeacher = $currentDayAttendanceTeacher->whereNull('checkout');

                if (!$alreadyAbsentStudent->isEmpty() || !$alreadyAbsentTeacher->isEmpty()) continue;

                $status = $time->greaterThan($checkinEnd) ? AttendanceEnum::LATE : AttendanceEnum::PRESENT;

                $value = [
                    'checkin' => $time,
                    'status' => $status,
                ];

                // dd(isset($studentAttendance[$attendance['id']]));
                // dd($attendance['id'], $studentAttendance->toArray(), in_array($attendance['id'], $studentAttendance->toArray()));

                if (isset($studentAttendance[$attendance['id']])) {
                    $value['classroom_student_id'] = $studentAttendance[$attendance['id']];
                    array_push($students, $value);
                } else {
                    $value['employee_id'] = $teacherAttendance[$attendance['id']];
                    array_push($teachers, $value);
                }
            }
        }

        return ['students' => $students, 'teachers' => $teachers];
    }

    public function storeByStudent($time, $classroom_student_id, $status): array|bool
    {
        $data = ([
            'classroom_student_id' => $classroom_student_id,
            'point' => '10',
            'status' => $status,
            'checkin' => $time,
        ]);

        return $data;
    }

    public function storeByTeacher($time, $employee_id, $status): array|bool
    {
        $data = ([
            'employee_id' => $employee_id,
            'status' => $status,
            'checkin' => $time,
        ]);

        return $data;
    }


    public function syncStudentAttendacne($presentCollection, $outCollection)
    {
        $present = $presentCollection->map(function ($item) {
            return [
                'name' => $item->classroomStudent->student->user->name,
                'school' => $item->classroomStudent->classroom->schoolYear->school->user->name,
                'checkin' => $item->checkin,
                'checkout' => $item->checkout,
            ];
        })->toArray();

        $out = $outCollection->map(function ($item) {
            return [
                'name' => $item->classroomStudent->student->user->name,
                'school' => $item->classroomStudent->classroom->schoolYear->school->user->name,
                'checkin' => $item->checkin,
                'checkout' => $item->checkout,
            ];
        })->toArray();

        return $data = compact('present', 'out');
    }
}
