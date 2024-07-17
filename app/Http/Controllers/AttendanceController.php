<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomStudentInterface $classroomStudent;
    private StudentInterface $student;
    private SchoolYearInterface $schoolYear;

    public function __construct(AttendanceInterface $attendance, StudentInterface $student, AttendanceRuleInterface $attendanceRule, SchoolYearInterface $schoolYear)
    {
        $this->attendance = $attendance;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->schoolYear = $schoolYear;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attendances = $this->attendance->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.presence', compact('attendances', 'schoolYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
