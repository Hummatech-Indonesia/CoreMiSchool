<?php
namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\SemesterInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Models\School;
use App\Services\ModelHasRfidService;
use App\Services\SchoolChartService;
use Illuminate\Http\Request;


class SchoolDashboardController extends Controller
{
    private SchoolInterface $school;
    private SchoolYearInterface $schoolYear;
    private RfidInterface $rfid;
    private ClassroomInterface $classroom;
    private SemesterInterface $semester;
    private AttendanceInterface $attendance;
    private StudentInterface $student;
    private EmployeeInterface $employee;
    private SchoolChartService $schoolChart;
    private SubjectInterface $subjects;
    private ModelHasRfidInterface $modelHasRfid;

    public function __construct(SchoolInterface $school, SchoolYearInterface $schoolYear,
    RfidInterface $rfid, ClassroomInterface $classroom, SemesterInterface $semester,
    SchoolChartService $schoolChart, AttendanceInterface $attendance, StudentInterface $student, EmployeeInterface $employee, SubjectInterface $subjects, ModelHasRfidInterface $modelHasRfid)
    {
        $this->employee = $employee;
        $this->school = $school;
        $this->schoolYear = $schoolYear;
        $this->rfid = $rfid;
        $this->classroom = $classroom;
        $this->semester = $semester;
        $this->attendance = $attendance;
        $this->schoolChart = $schoolChart;
        $this->student = $student;
        $this->subjects = $subjects;
        $this->modelHasRfid = $modelHasRfid;
    }

    public function index()
    {
        $classrooms = $this->classroom->countClass();
        $schoolYear = $this->schoolYear->active();
        $semester = $this->semester->whereSchool();
        $attendanceChart = $this->schoolChart->ChartAttendance($this->attendance);
        $alumni = $this->student->countStudentAlumni();
        $teachers = $this->employee->where(RoleEnum::TEACHER->value);
        $employees = $this->employee->where(RoleEnum::STAFF->value);
        $students = $this->student->count();
        $subjects = $this->subjects->count();

        return view('school.pages.dashboard.dashboard', compact('classrooms', 'schoolYear', 'semester', 'attendanceChart', 'alumni', 'teachers', 'employees', 'students', 'subjects'));
    }

    public function show(Request $request)
    {
        $rfids = $this->modelHasRfid->searchMaster($request);
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
