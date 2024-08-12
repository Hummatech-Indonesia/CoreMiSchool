<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Enums\AttendanceEnum;
use App\Models\Attendance;
use App\Models\Classroom;
use Carbon\Carbon;

class SchoolChartService
{
    private AttendanceInterface $attendance;
    private SchoolYearInterface $schoolYear;
    private ClassroomInterface $classroom;

    public function __construct(AttendanceInterface $attendance, SchoolYearInterface $schoolYear, ClassroomInterface $classroom)
    {
        $this->attendance = $attendance;
        $this->schoolYear = $schoolYear;
        $this->classroom = $classroom;
    }

    public function ChartAttendance(AttendanceInterface $attendance)
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $attendance_present = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::PRESENT->value);
            $attendance_permit = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::PERMIT->value);
            $attendance_sick = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::SICK->value);
            $attendance_alpha = $this->attendance->AttendanceChart($Curentyear, $month, AttendanceEnum::ALPHA->value);

            $grafikDataCollection[] = [
                'year' => $Curentyear,
                'month' => $yearMonth,
                'attendance_present' => $attendance_present,
                'attendance_permit' => $attendance_permit,
                'attendance_sick' => $attendance_sick,
                'attendance_alpha' => $attendance_alpha
            ];
        }
        $data  = array_values($grafikDataCollection);

        return $data;
    }

    public function ChartClassroomAttendance($date)
    {
        $attendances = $this->attendance->classroomAttendanceChart($date);

        // Mengambil nama kelas berdasarkan classroom_id yang ada dalam data kehadiran
        $classroomIds = $attendances->keys();
        $classrooms = $this->classroom->classroomAttendance($classroomIds);

        return [
            'attendances' => $attendances,
            'classrooms' => $classrooms
        ];
    }
}
