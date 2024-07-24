<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Imports\TeacherImport;
use App\Models\Employee;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    private ReligionInterface $religion;
    private EmployeeInterface $employee;
    private TeacherService $service;
    private UserInterface $user;
    private TeacherSubjectInterface $teacherSubject;
    private SubjectInterface $subjects;

    public function __construct(UserInterface $user, EmployeeInterface $employee, TeacherService $service, ReligionInterface $religion, TeacherSubjectInterface $teacherSubject, SubjectInterface $subjects)
    {
        $this->user = $user;
        $this->employee = $employee;
        $this->service = $service;
        $this->religion = $religion;
        $this->teacherSubject = $teacherSubject;
        $this->subjects = $subjects;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teachers = $this->employee->whereSchool(RoleEnum::TEACHER->value, $request);
        $religions = $this->religion->get();
        return view('school.pages.teacher.index', compact('teachers', 'religions'));
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
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $data = $this->service->store($request);
            $this->employee->store($data);
            return redirect()->back()->with('success', 'Berhasil menambahkan data guru');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Kesalahan menambahkan data guru '.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $teacher = $this->employee->showWithSlug($slug);
        $teacher_subjects = $this->teacherSubject->where($teacher->id);
        $subjects = $this->subjects->whereTeacher($teacher->id);
        return view('school.new.employee.teacher-detail', compact('teacher', 'teacher_subjects', 'subjects'));
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
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $this->service->update($employee, $request);
        $this->employee->update($employee->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbaiki data guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->service->delete($employee);
        $this->employee->delete($employee->id);
        $employee->user->delete();
        return redirect()->back()->with('success', 'Data guru berhasil dihapus');
    }

    public function downloadTemplate()
    {
        $template = public_path('file/excel-format-import-teacher.xlsx');
        // dd($template);
        return response()->download($template, 'excel-format-import-teacher.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new TeacherImport, $file);
        return to_route('school.employees.index')->with('success', "Berhasil Mengimport Data!");
    }
}
