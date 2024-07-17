<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LevelClassInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enums\RoleEnum;
use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\ClassroomStudent;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    private ClassroomInterface $classroom;
    private LevelClassInterface $levelClass;
    private SchoolYearInterface $schoolYear;
    private EmployeeInterface $employee;
    private SchoolInterface $school;
    private StudentInterface $student;
    private ClassroomStudentInterface $classroomStudent;

    public function __construct(ClassroomInterface $classroom, LevelClassInterface $levelClass, SchoolYearInterface $schoolYear, EmployeeInterface $employee, SchoolInterface $school, StudentInterface $student, ClassroomStudentInterface $classroomStudent)
    {
        $this->classroom = $classroom;
        $this->levelClass = $levelClass;
        $this->schoolYear = $schoolYear;
        $this->employee = $employee;
        $this->school = $school;
        $this->student = $student;
        $this->classroomStudent = $classroomStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $school = $this->school->whereUserId(auth()->user()->id);
        $levelClasses = $this->levelClass->where($school->id);
        $schoolYears = $this->schoolYear->where($school->id);
        $classrooms = $this->classroom->search($request)->get();
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
    public function show(Classroom $classroom, Request $request)
    {
        $schoolYears = $this->schoolYear->whereSchool(auth()->user()->school->id, $request);
        $students = $this->student->doesntHaveClassroom();
        $classroomStudents = $this->classroomStudent->where($classroom->id);
        return view('school.pages.class.detail-class', compact('classroom', 'schoolYears', 'students', 'classroomStudents'));
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

    public function classroomAlumni(Request $request): mixed {
        $classrooms = $this->classroom->getAlumni($request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.alumni.class', compact('classrooms', 'schoolYears'));
    }

    public function studentAlumni(Classroom $classroom, Request $request): mixed {
        $students = $this->classroomStudent->where($classroom->id, $request);
        return view('school.pages.alumni.index', compact('students'));
    }
}
