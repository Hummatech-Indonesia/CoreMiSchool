<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Enums\AttendanceEnum;
use Carbon\Carbon;

class SchoolChartService
{
    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function ChartAttendance(AttendanceInterface $attendance)
    {
        $Curentyear = Carbon::now()->year;
        $Curentmonth = Carbon::now()->month;

        $grafikDataCollection = [];

        for($month = 1; $month <= 12; $month++){
            $date = Carbon::createFromDate($Curentyear, $month, 1);
            $yearMonth = $date->isoFormat('MMMM');
            $attendance_present = $this->attendance->AttendanceChart(auth()->user()->school->id, $Curentyear, $month, AttendanceEnum::PRESENT->value);
            $attendance_permit = $this->attendance->AttendanceChart(auth()->user()->school->id, $Curentyear, $month, AttendanceEnum::PERMIT->value);
            $attendance_sick = $this->attendance->AttendanceChart(auth()->user()->school->id, $Curentyear, $month, AttendanceEnum::SICK->value);
            $attendance_alpha = $this->attendance->AttendanceChart(auth()->user()->school->id, $Curentyear, $month, AttendanceEnum::ALPHA->value);

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
}
