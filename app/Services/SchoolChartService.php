<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
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
            $attendance = $this->attendance->AttendanceChart(auth()->user()->school->id, $Curentyear, $month);

            $grafikDataCollection[] = [
                'year' => $Curentyear,
                'month' => $yearMonth,
                'attendance' => $attendance
            ];
        }
        $data  = array_values($grafikDataCollection);

        return $data;
    }
}
