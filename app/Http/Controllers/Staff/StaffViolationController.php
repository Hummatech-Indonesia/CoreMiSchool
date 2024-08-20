<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StaffViolationController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private ClassroomInterface $classroom;
    private StudentInterface $student;
    private SchoolPointInterface $schoolPoint;

    public function __construct(StudentViolationInterface $studentViolation, StudentInterface $student, ClassroomInterface $classroom, SchoolPointInterface $schoolPoint)
    {
        $this->studentViolation = $studentViolation;
        $this->student = $student;
        $this->classroom = $classroom;
        $this->schoolPoint = $schoolPoint;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $this->student->getByPoint($request);
        $classrooms = $this->classroom->whereInSchoolYears($request);
        return view('staff.pages.top-violation.index', compact('students', 'classrooms'));
    }


    public function overview(Request $request)
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
