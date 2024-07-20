<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enums\AttendanceEnum;
use App\Http\Requests\StoreAttendanceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class AttendanceService
{
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private StudentInterface $student;
    private AttendanceInterface $attendance;

    public function __construct(ModelHasRfidInterface $modelHasRfid, StudentInterface $student, AttendanceRuleInterface $attendanceRule, AttendanceInterface $attendance)
    {
        $this->modelHasRfid = $modelHasRfid;
        $this->student = $student;
        $this->attendance = $attendance;
        $this->attendanceRule = $attendanceRule;
    }

    public function store(StoreAttendanceRequest $request): array|bool
    {
        $data = $request->validated();
        return $data;
    }
    public function insert(array $attendances, $rule, $day): mixed
    {
        $invalidAttendances = [];
        $currentDayAttendance = $this->attendance->getCurrentDay();
        $data = [];

        foreach ($attendances as $attendance) {
            $time = Carbon::createFromFormat('H.i', $attendance['time']);
            $checkinStart = Carbon::parse($rule->checkin_start);
            $checkinEnd = Carbon::parse($rule->checkin_end);
            $checkoutStart = Carbon::parse($rule->checkout_start);
            $checkoutEnd = Carbon::parse($rule->checkout_end);

            // pulang
            if ($time >= $rule->checkout_start && $time <= $rule->checkout_end) {
                $checkin = $currentDayAttendance->where('classroom_student_id', $attendance['id'])->where('checkin', '<', $checkoutStart);
                $alreadyAbsent = $currentDayAttendance->whereNotNull('checkout');
                if(!$alreadyAbsent->isEmpty()) continue;
                if ($time >= $checkoutStart && !$checkin) {
                    $status = AttendanceEnum::ALPHA;
                }
                array_push($data, [
                    'checkout' => $time,
                    'status' => $status,
                    'classroom_student_id' => $attendance['id'],
                ]);
            }
            // masuk
            else if ($time >= $rule->checkin_start) {
                $alreadyAbsent = $currentDayAttendance->whereNotNull('checkin');
                if(!$alreadyAbsent->isEmpty()) continue;
                $status = $time->greaterThan($checkinEnd) ? AttendanceEnum::LATE : AttendanceEnum::PRESENT;
                array_push($data, [
                    'checkin' => $time,
                    'status' => $status,
                    'classroom_student_id' => $attendance['id'],
                ]);
            }

        }
        return $data;
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
