<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\SemesterInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Models\School;
use App\Services\ModelHasRfidService;
use App\Services\SchoolChartService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class SchoolDashboardController extends Controller
{
    private SchoolInterface $school;
    private SchoolYearInterface $schoolYear;
    private ModelHasRfidInterface $rfid;
    private ClassroomInterface $classroom;
    private SemesterInterface $semester;
    private AttendanceInterface $attendance;
    private StudentInterface $student;

    private SchoolChartService $schoolChart;

    public function __construct(SchoolInterface $school, SchoolYearInterface $schoolYear,
    ModelHasRfidInterface $rfid, ClassroomInterface $classroom, SemesterInterface $semester,
    SchoolChartService $schoolChart, AttendanceInterface $attendance, StudentInterface $student)
    {
        $this->school = $school;
        $this->schoolYear = $schoolYear;
        $this->rfid = $rfid;
        $this->classroom = $classroom;
        $this->semester = $semester;
        $this->attendance = $attendance;
        $this->schoolChart = $schoolChart;
        $this->student = $student;
    }

    public function index()
    {
        $school = $this->school->whereUserId(auth()->user()->id);
        $classrooms = $this->classroom->countClass(auth()->user()->school->id);
        $schoolYear = $this->schoolYear->active(auth()->user()->school->id);
        $semester = $this->semester->whereSchool(auth()->user()->school->id);
        $attendanceChart = $this->schoolChart->ChartAttendance($this->attendance);
        $alumni = $this->student->countStudentAlumni(auth()->user()->school->id);
        return view('school.pages.dashboard', compact('school', 'classrooms', 'schoolYear', 'semester', 'attendanceChart', 'alumni'));
    }

    public function show(Request $request)
    {
        $rfids = $this->rfid->masterRfid($request);
        $school = $this->school->showWithSlug(auth()->user()->slug);
        $schoolYear = $this->schoolYear->active($school->id);
        return view('school.pages.settings.information', compact('school', 'schoolYear', 'rfids'));
    }

    public function edit()
    {
        $school = $this->school->showWithSlug(auth()->user()->slug);
        return view('school.pages.settings.update-information', compact('school'));
    }
}
