<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function index()
    {
        $attendances = $this->attendance->whereUser(auth()->user()->student->id, 'App\Models\Student');
        return view('student.pages.attendance.index', compact('attendances'));
    }
}
