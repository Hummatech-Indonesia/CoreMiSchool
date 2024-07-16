<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ExtracurricularInterface;
use App\Models\Extracurricular;
use App\Http\Requests\StoreExtracurricularRequest;
use App\Http\Requests\UpdateExtracurricularRequest;
use App\Services\ExtracurricularService;

class ExtracurricularController extends Controller
{
    private ExtracurricularInterface $extracurricular;
    private ExtracurricularService $service;

    public function __construct(ExtracurricularInterface $extracurricular, ExtracurricularService $service)
    {
        $this->extracurricular = $extracurricular;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = $this->extracurricular->whereSchool(auth()->user()->school->id);
        return view('school.pages.extracurricular.index', compact('extracurriculars'));
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
        $data = $this->service->store($request);
        $this->extracurricular->store($data);
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
        $data = $this->service->update($extracurricular, $request);
        $this->extracurricular->update($extracurricular->id, $data);
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
