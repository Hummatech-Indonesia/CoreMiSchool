<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LevelClassInterface;
use App\Models\LevelClass;
use App\Http\Requests\StoreLevelClassRequest;
use App\Http\Requests\UpdateLevelClassRequest;
use App\Services\LevelClassService;
use Illuminate\Http\Request;

class LevelClassController extends Controller
{
    private LevelClassInterface $levelClass;
    private LevelClassService $service;

    public function __construct(LevelClassInterface $levelClass, LevelClassService $service)
    {
        $this->levelClass = $levelClass;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $levelClasses = $this->levelClass->whereSchool(auth()->user()->school->id, $request);
        return view('school.pages.class-level.index', compact('levelClasses'));
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
    public function store(StoreLevelClassRequest $request)
    {
        $data = $this->service->store($request);
        $this->levelClass->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan tingkatan kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(LevelClass $levelClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LevelClass $levelClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelClassRequest $request, LevelClass $levelClass)
    {
        $data = $this->service->update($levelClass, $request);
        $this->levelClass->update($levelClass->id, $data);
        return redirect()->back()->with('success', 'Berhasil mengperbarui tingkatan kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LevelClass $levelClass)
    {
        $this->levelClass->delete($levelClass->id);
        return redirect()->back()->with('success', 'Berhasil menghapus tingkatan kelas');
    }
}
