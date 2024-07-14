<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{
    private StudentInterface $student;
    private StudentService $service;
    private ReligionInterface $religion;

    public function __construct(StudentInterface $student, StudentService $service, ReligionInterface $religion) {
        $this->student = $student;
        $this->service = $service;
        $this->religion = $religion;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->whereSchool(auth()->user()->school->id);
        $religions = $this->religion->get();

        return view('school.pages.student.index', compact('students', 'religions'));
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
    public function store(StoreStudentRequest $request)
    {
        $data = $this->service->store($request);
        $this->student->store($data);

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $this->service->update($student, $request);
        $this->student->update($student->id, $data);

        return redirect()->back()->with('success', 'Siswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->service->delete($student);
        $this->student->delete($student->id);
        return redirect()->back()->with('success', 'Siswa berhasil dihapus');
    }
}
