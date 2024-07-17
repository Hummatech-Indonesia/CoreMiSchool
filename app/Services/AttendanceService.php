<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreAttendanceRequest;
use Carbon\Carbon;

class AttendanceService
{
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private StudentInterface $student;

    public function __construct(ModelHasRfidInterface $modelHasRfid, StudentInterface $student, AttendanceRuleInterface $attendanceRule)
    {
        $this->modelHasRfid = $modelHasRfid;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
    }

    public function store(StoreAttendanceRequest $request): array|bool
    {
        $data = $request->validated();
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
