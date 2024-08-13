<?php

namespace App\Services\School;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Enums\AttendanceEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceEmployeeService
{
    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function ChartAttendanceEmployee(AttendanceInterface $attendance, Request $request)
    {
        $Requestday = Carbon::parse($request->date)->day;
        $Requestmonth = Carbon::parse($request->date)->month;
        $Requestyear = Carbon::parse($request->date)->year;
        $Curentday = Carbon::now()->day;
        $Curentmonth = Carbon::now()->month;
        $Curentyear = Carbon::now()->year;

        $grafikDataCollection = [];

        $attendance_present = $this->attendance->AttendanceChartEmployee($Requestday ? $Requestday : $Curentday, $Requestmonth ? $Requestmonth : $Curentmonth, $Requestyear ? $Requestyear : $Curentyear, AttendanceEnum::PRESENT->value);
        $attendance_permit = $this->attendance->AttendanceChartEmployee($Requestday ? $Requestday : $Curentday, $Requestmonth ? $Requestmonth : $Curentmonth, $Requestyear ? $Requestyear : $Curentyear, AttendanceEnum::PERMIT->value);
        $attendance_sick = $this->attendance->AttendanceChartEmployee($Requestday ? $Requestday : $Curentday, $Requestmonth ? $Requestmonth : $Curentmonth, $Requestyear ? $Requestyear : $Curentyear, AttendanceEnum::SICK->value);
        $attendance_alpha = $this->attendance->AttendanceChartEmployee($Requestday ? $Requestday : $Curentday, $Requestmonth ? $Requestmonth : $Curentmonth, $Requestyear ? $Requestyear : $Curentyear, AttendanceEnum::ALPHA->value);

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
