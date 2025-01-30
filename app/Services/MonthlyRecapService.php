<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Models\Classroom;
use Illuminate\Http\Request;

class MonthlyRecapService
{
    private AttendanceInterface $attendance;
    private ClassroomStudentInterface $classroomStudent;

    public function __construct(AttendanceInterface $attendance, ClassroomStudentInterface $classroomStudent)
    {
        $this->attendance = $attendance;
        $this->classroomStudent = $classroomStudent;
    }

    public function student(Classroom $classroom, Request $request): mixed
    {
        $attendances = $this->attendance->monthlyRecapStudent($classroom, $request);
        
        $attendances->each(function ($item) {
            $item->present = $item->present ?? 0;
            $item->permit = $item->permit ?? 0;
            $item->sick = $item->sick ?? 0;
            $item->alpha = $item->alpha ?? 0;
            $item->classroomStudent = $this->classroomStudent->firstOrFail($item->model_id);
        });

        return $attendances;
    }
}
