<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StaffViolationController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;
    private ClassroomInterface $classroom;
    private StudentInterface $student;
    private SchoolPointInterface $schoolPoint;
    private RegulationInterface $regulation;

    public function __construct(StudentViolationInterface $studentViolation, StudentInterface $student, ClassroomInterface $classroom, SchoolPointInterface $schoolPoint, StudentRepairInterface $studentRepair, RegulationInterface $regulation)
    {
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
        $this->student = $student;
        $this->classroom = $classroom;
        $this->schoolPoint = $schoolPoint;

        $this->regulation = $regulation;
    }

    public function index(Request $request)
    {
        $students = $this->student->getByPoint($request);
        $classrooms = $this->classroom->whereInSchoolYears($request);
        return view('staff.pages.top-violation.index', compact('students', 'classrooms'));
    }


    public function violation_student(Request $request)
    {
        $students = $this->student->getByPoint($request);
        $countByClassroomStudent = $this->studentViolation->countByClassroomStudent();
        $schoolPoint = $this->schoolPoint->get();
        return view('staff.pages.overview.index', compact('countByClassroomStudent', 'students', 'schoolPoint'));
    }

    public function show(Classroom $classroom)
    {
        $studentClass = $this->studentViolation->whereClassroom($classroom->id);
        return view('staff.pages.top-violation.detail-class', compact('studentClass'));
    }

    public function show_detail_student(Student $student)
    {
        $violations = $this->studentViolation->whereStudent($student->id);
        $repairs = $this->studentRepair->whereStudent($student->id);
        return view('staff.pages.top-violation.detail-student', compact('student', 'violations', 'repairs'));
    }

    public function list_student()
    {
        $studentViolations = $this->studentViolation->get();
        return view('staff.pages.violation-student-list.index', compact('studentViolations'));
    }
}
