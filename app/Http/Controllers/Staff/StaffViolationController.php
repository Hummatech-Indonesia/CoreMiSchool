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

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $violations = $this->regulation->getAll($request);
        $classrooms = $this->classroom->whereInSchoolYears($request);
        return view('staff.pages.top-violation.index', compact('violations', 'classrooms'));
    }


    public function violation_student(Request $request)
    {
        $students = $this->student->getByPoint($request);
        $countByClassroomStudent = $this->studentViolation->countByClassroomStudent();
        return view('staff.pages.overview.index', compact('countByClassroomStudent', 'students'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
