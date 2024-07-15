<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Models\ModelHasRfid;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Http\Requests\UpdateModelHasRfidRequest;
use App\Services\ModelHasRfidService;

class ModelHasRfidController extends Controller
{
    private ModelHasRfidInterface $modelHasRfid;
    private ModelHasRfidService $service;

    public function __construct(ModelHasRfidInterface $modelHasRfid, ModelHasRfidService $service)
    {
        $this->modelHasRfid = $modelHasRfid;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rfids = $this->modelHasRfid->get();
        return view('school.pages.rfid.index', compact('rfids'));
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
    public function store(StoreModelHasRfidRequest $request)
    {
        $exist = $this->service->check($request);

        if ($exist) {
            $this->modelHasRfid->store($request->validated());
            return redirect()->back()->with('success', 'Berhasil menambahkan kartu rfid');
        } else {
            return redirect()->back()->with('error', 'Kartu rfid tidak valid');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelHasRfid $modelHasRfid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelHasRfid $modelHasRfid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModelHasRfidRequest $request, string $role, string $id)
    {
        $data = $this->modelHasRfid->exists($request->rfid);
        if (!$data) {
            return redirect()->back()->with('warning', 'Rfid belum terdaftarkan');
        } else {
            $this->service->update($request, $role, $id);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModelHasRfid $modelHasRfid)
    {
        $this->modelHasRfid->delete($modelHasRfid->id);
        return redirect()->back()->with('success', 'Kartu rfid berhasil dihapus');
    }
}
