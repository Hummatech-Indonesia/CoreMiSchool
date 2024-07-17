<?php

namespace App\Exports;

use App\Models\AttendanceTeacher;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TeacherAttendanceExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('school.export.invoices-attendance-teacher', [
            'items' => AttendanceTeacher::all()
        ]);
    }
}
