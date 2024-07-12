<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LevelClassInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Enums\RoleEnum;
use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;

class ClassroomController extends Controller
{
    private ClassroomInterface $classroom;
    private LevelClassInterface $levelClass;
    private SchoolYearInterface $schoolYear;
    private EmployeeInterface $employee;
    private SchoolInterface $school;

    public function __construct(ClassroomInterface $classroom, LevelClassInterface $levelClass, SchoolYearInterface $schoolYear, EmployeeInterface $employee, SchoolInterface $school)
    {
        $this->classroom = $classroom;
        $this->levelClass = $levelClass;
        $this->schoolYear = $schoolYear;
        $this->employee = $employee;
        $this->school = $school;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school = $this->school->whereUserId(auth()->user()->id);
        $levelClasses = $this->levelClass->where($school->id);
        $schoolYears = $this->schoolYear->where($school->id);
        $classrooms = $this->classroom->whereInSchoolYears($schoolYears);
        $teachers = $this->employee->getTeacherBySchool($school->id);
        return view('school.pages.class.index', compact('classrooms', 'levelClasses', 'schoolYears', 'teachers'));
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
    public function store(StoreClassroomRequest $request)
    {
        $data = $request->validated();
        $this->classroom->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $data = $request->validated();
        $this->classroom->update($classroom->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbarui kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $this->classroom->delete($classroom->id);
        return redirect()->back()->with('success', 'Berhasil menghapus kelas');
    }
}
