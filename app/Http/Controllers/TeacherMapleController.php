<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\TeacherMapleInterface;
use App\Models\TeacherMaple;
use App\Http\Requests\StoreTeacherMapleRequest;
use App\Http\Requests\UpdateTeacherMapleRequest;
use App\Models\Employee;
use App\Services\TeacherMapleService;

class TeacherMapleController extends Controller
{
    private TeacherMapleInterface $teacherMaple;
    private EmployeeInterface $employee;
    private MapleInterface $maple;
    private SchoolYearInterface $schoolYear;

    private TeacherMapleService $service;

    public function __construct(TeacherMapleInterface $teacherMaple, EmployeeInterface $employee, MapleInterface $maple, SchoolYearInterface $schoolYear, TeacherMapleService $service)
    {
        $this->teacherMaple = $teacherMaple;
        $this->employee = $employee;
        $this->maple = $maple;
        $this->schoolYear = $schoolYear;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $employee)
    {
        $employee_id = $this->employee->showWithSlug($employee);
        $teacherMaples = $this->teacherMaple->where($employee_id);
        $maples = $this->maple->whereSchool(auth()->user()->school->id);
        $schoolYears = $this->schoolYear->whereSchool(auth()->user()->school->id);
        return view('school.pages.teacher.detail-teacher', compact('teacherMaples', 'employee_id', 'maples', 'schoolYears'));
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
    public function store(StoreTeacherMapleRequest $request, string $employee)
    {
        $data = $this->service->store($request, $employee);
        $this->teacherMaple->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahahkan guru mapel');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherMaple $teacherMaple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherMaple $teacherMaple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherMapleRequest $request, TeacherMaple $teacherMaple)
    {
        $data = $this->service->update($request);
        $this->teacherMaple->update($teacherMaple->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbaiki guru mapel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherMaple $teacherMaple)
    {
        $this->teacherMaple->delete($teacherMaple->id);
        return redirect()->back()->with('success', 'Berhasil menghapus guru mapel');
    }
}
