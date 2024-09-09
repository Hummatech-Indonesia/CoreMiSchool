<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Http\Controllers\Controller;
use App\Models\ClassroomStudent;
use Illuminate\Http\Request;

class DashboardStudentController extends Controller
{
    private ClassroomStudentInterface $studentClass;

    public function __construct(ClassroomStudentInterface $studentClass)
    {
        $this->studentClass = $studentClass;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentClasses = $this->studentClass->whereStudent(auth()->user()->student->id);
        return view('student.pages.dashboard.dashboard', compact('studentClasses'));
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
