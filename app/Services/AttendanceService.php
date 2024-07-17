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
            'checkout' => '00:00:00'
        ]);

        return $data;
    }

    public function storeByTeacher($time, $employee_id, $status): array|bool
    {
        $data = ([
            'employee_id' => $employee_id,
            'status' => $status,
            'checkin' => $time,
            'checkout' => '00:00:00'
        ]);

        return $data;
    }
}
