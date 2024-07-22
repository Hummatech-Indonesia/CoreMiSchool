<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private ReligionInterface $religion;
    private EmployeeInterface $employee;
    private TeacherService $service;
    private UserInterface $user;

    public function __construct(UserInterface $user, EmployeeInterface $employee, TeacherService $service, ReligionInterface $religion)
    {
        $this->user = $user;
        $this->employee = $employee;
        $this->service = $service;
        $this->religion = $religion;
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
}
