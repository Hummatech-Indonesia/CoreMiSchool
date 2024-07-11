<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\TeacherService;

class TeacherController extends Controller
{
    private EmployeeInterface $employee;
    private TeacherService $service;

    public function __construct(EmployeeInterface $employee, TeacherService $service)
    {
        $this->employee = $employee;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = $this->employee->paginate(RoleEnum::TEACHER->value);
        return view('school.pages.teacher.index', compact('teachers'));
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
        $data = $this->service->store($request);
        $this->employee->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan data guru');
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
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $this->service->update($employee, $request);
        $this->employee->update($employee->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbaiki guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->employee->delete($employee->id);
        return redirect();
    }
}
