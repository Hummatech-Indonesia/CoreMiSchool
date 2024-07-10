<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    private EmployeeInterface $employee;
    private EmployeeService $service;

    public function __construct(EmployeeInterface $employee, EmployeeService $service)
    {
        $this->employee = $employee;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index_staff()
    {
        $data = $this->employee->get();
        return view('', compact('data'));
    }

        /**
     * Display a listing of the resource.
     */
    public function index_tacher()
    {
        $data = $this->employee->get();
        return view('', compact('data'));
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
        return redirect();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
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
        return redirect();
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
