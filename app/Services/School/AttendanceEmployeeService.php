<?php

namespace App\Services\School;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Enums\AttendanceEnum;
use Carbon\Carbon;

class AttendanceEmployeeService
{
    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function ChartAttendanceEmployee(AttendanceInterface $attendance)
    {
        $Curentday = Carbon::now()->day;
        $Curentweek = Carbon::now()->week;
        $Curentmonth = Carbon::now()->month;
        $Curentyear = Carbon::now()->year;

        $grafikDataCollection = [];

        $attendance_present = $this->attendance->AttendanceChartEmployee($Curentday, $Curentweek, $Curentmonth, $Curentyear, AttendanceEnum::PRESENT->value);
        $attendance_permit = $this->attendance->AttendanceChartEmployee($Curentday, $Curentweek, $Curentmonth, $Curentyear, AttendanceEnum::PERMIT->value);
        $attendance_sick = $this->attendance->AttendanceChartEmployee($Curentday, $Curentweek, $Curentmonth, $Curentyear, AttendanceEnum::SICK->value);
        $attendance_alpha = $this->attendance->AttendanceChartEmployee($Curentday, $Curentweek, $Curentmonth, $Curentyear, AttendanceEnum::ALPHA->value);

        $grafikDataCollection[] = [
            'attendance_present' => $attendance_present,
            'attendance_permit' => $attendance_permit,
            'attendance_sick' => $attendance_sick,
            'attendance_alpha' => $attendance_alpha
        ];

        $data  = array_values($grafikDataCollection);

        return $data;
    }
}
