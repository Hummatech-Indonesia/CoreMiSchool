<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ExtracurricularInterface;
use App\Models\Extracurricular;
use App\Http\Requests\StoreExtracurricularRequest;
use App\Http\Requests\UpdateExtracurricularRequest;
use App\Services\ExtracurricularService;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    private ExtracurricularInterface $extracurricular;
    private ExtracurricularService $service;
    private EmployeeInterface $employee;

    public function __construct(ExtracurricularInterface $extracurricular, ExtracurricularService $service, EmployeeInterface $employee)
    {
        $this->extracurricular = $extracurricular;
        $this->service = $service;
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = $this->employee->getSchool(auth()->user()->school->id);
        $extracurriculars = $this->extracurricular->whereSchool(auth()->user()->school->id, $request);
        return view('school.pages.extracurricular.index', compact('extracurriculars', 'employees'));
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
    public function store(StoreExtracurricularRequest $request)
    {
        $this->extracurricular->store($request->validated());
        return redirect()->back()->with('success', 'Berhasil menambahkan ekstrakulikuler');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $extracurricular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExtracurricularRequest $request, Extracurricular $extracurricular)
    {
        $this->extracurricular->update($extracurricular->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil memperbarui ekstrakulikuler');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $extracurricular)
    {
        $this->extracurricular->delete($extracurricular->id);
        return redirect()->back()->with('success', 'Berhasil menghapus ekstrakulikuler');
    }
}
