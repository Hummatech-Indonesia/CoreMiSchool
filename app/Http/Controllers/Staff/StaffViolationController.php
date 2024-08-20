<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffViolationController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentInterface $student;

    public function __construct(StudentViolationInterface $studentViolation, StudentInterface $student)
    {
        $this->studentViolation = $studentViolation;
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->getByPoint();
        return view('staff.pages.top-violation.index', compact('students'));
    }


    public function overview(Request $request)
    {
        $students = $this->student->getByPoint();
        if ($request->has('point') == 'lowest') {
            $students = $this->student->getByPointAsc();
        }

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
