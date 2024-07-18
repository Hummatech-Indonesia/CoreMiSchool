<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Models\AttendanceTeacher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;

class TeacherAttendanceExport implements FromView
{
    private Request $request;
    private AttendanceTeacherInterface $attendance;

    public function __construct(Request $request, AttendanceTeacherInterface $attendance)
    {
        $this->request = $request;
        $this->attendance = $attendance;
    }

    public function view() : View
    {
        return view('school.export.invoices-attendance-teacher', [
            'items' => $this->attendance->whereBetween($this->request),
        ]);
    }
}
