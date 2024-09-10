<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherStudentController extends Controller
{
    private ClassroomStudentInterface $classroomStudent;

    public function __construct(ClassroomStudentInterface $classroomStudent)
    {
        $this->classroomStudent = $classroomStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('teacher.pages.teacher-student.index');
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
