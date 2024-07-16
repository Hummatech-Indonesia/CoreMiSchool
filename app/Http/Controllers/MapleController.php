<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Models\Maple;
use App\Http\Requests\StoreMapleRequest;
use App\Http\Requests\UpdateMapleRequest;
use App\Services\MapleService;

class MapleController extends Controller
{
    private MapleInterface $maple;
    private ReligionInterface $religion;
    private MapleService $service;

    public function __construct(MapleInterface $maple, MapleService $service, ReligionInterface $religion)
    {
        $this->maple = $maple;
        $this->religion = $religion;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maples = $this->maple->whereSchool(auth()->user()->school->id);
        $religions = $this->religion->get();
        return view('school.pages.subjects.create-subjects', compact('maples', 'religions'));
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
    public function store(StoreMapleRequest $request)
    {
        $data = $this->service->store($request);
        $this->maple->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan mata pelajaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maple $maple)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maple $maple)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMapleRequest $request, Maple $maple)
    {
        $data = $this->service->update($maple, $request);
        $this->maple->update($maple->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbarui mata pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maple $maple)
    {
        $this->maple->delete($maple->id);
        return redirect()->back()->with('success', 'Berhasil menghapus mata pelajaran');
    }
}
