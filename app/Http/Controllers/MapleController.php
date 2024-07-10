<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\MapleInterface;
use App\Models\Maple;
use App\Http\Requests\StoreMapleRequest;
use App\Http\Requests\UpdateMapleRequest;
use App\Services\MapleService;

class MapleController extends Controller
{
    private MapleInterface $maple;
    private MapleService $service;

    public function __construct(MapleInterface $maple, MapleService $service)
    {
        $this->maple = $maple;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maples = $this->maple->get();
        return view('', compact('maples'));
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
        return redirect()->back()->with('success', 'Berhasil menambahkan mapel pelajaram');
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
        return redirect()->back()->with('success', 'Berhasil memperbarui mapel pelajaram');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maple $maple)
    {
        $this->maple->delete($maple->id);
        return redirect()->back()->with('success', 'Berhasil menghapus mapel pelajaran');
    }
}