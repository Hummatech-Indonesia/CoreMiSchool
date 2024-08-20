<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffViolationController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private ClassroomInterface $classroom;
    private StudentInterface $student;

    public function __construct(StudentViolationInterface $studentViolation, StudentInterface $student, ClassroomInterface $classroom)
    {
        $this->studentViolation = $studentViolation;
        $this->student = $student;
        $this->classroom = $classroom;
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
    public function show(string $id)
    {
        //
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
