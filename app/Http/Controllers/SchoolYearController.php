<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SchoolYearInterface;
use App\Models\SchoolYear;
use App\Http\Requests\StoreSchoolYearRequest;
use App\Http\Requests\UpdateSchoolYearRequest;
use App\Services\SchoolYearService;

class SchoolYearController extends Controller
{
    private SchoolYearInterface $schoolYear;
    private SchoolYearService $service;

    public function __construct(SchoolYearInterface $schoolYear, SchoolYearService $service)
    {
        $this->schoolYear = $schoolYear;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.school-year.index', compact('schoolYears'));
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
    public function store(StoreSchoolYearRequest $request)
    {
        $data = $this->service->store($request);
        $this->schoolYear->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan tahun ajaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolYearRequest $request, SchoolYear $schoolYear)
    {
        $data = $this->service->update($schoolYear ,$request);
        $this->schoolYear->update($schoolYear->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbaiki tahun ajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolYear $schoolYear)
    {
        $this->schoolYear->delete($schoolYear->id);
        return redirect()->back()->with('success', 'Berhasil menghapus tahun ajaran');
    }
}
