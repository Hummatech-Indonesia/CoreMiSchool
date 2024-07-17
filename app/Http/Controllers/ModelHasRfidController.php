<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Models\ModelHasRfid;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Http\Requests\UpdateModelHasRfidRequest;
use App\Services\ModelHasRfidService;
use Illuminate\Http\Request;

class ModelHasRfidController extends Controller
{
    private ModelHasRfidInterface $modelHasRfid;
    private ModelHasRfidService $service;
    private SchoolInterface $school;

    public function __construct(ModelHasRfidInterface $modelHasRfid, ModelHasRfidService $service, SchoolInterface $school)
    {
        $this->modelHasRfid = $modelHasRfid;
        $this->service = $service;
        $this->school = $school;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rfids = $this->modelHasRfid->nonActiveRfid($request);
        return view('school.pages.rfid.index', compact('rfids'));
    }

    /**
     * Display a listing of the resource.
     */
    public function showActive(Request $request)
    {
        $rfids = $this->modelHasRfid->activeRfid($request);
        return view('school.pages.rfid.rfid-active', compact('rfids'));
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

        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;

        if ($exist) {
            $this->modelHasRfid->store($data);
            return redirect()->back()->with('success', 'Berhasil menambahkan kartu rfid');
        } else {
            return redirect()->back()->with('error', 'Kartu rfid tidak valid');
        }
    }

    public function storeMaster(StoreModelHasRfidRequest $request)
    {
        $exist = $this->service->check($request);
        $school = auth_school();
        if ($exist) {
            $this->modelHasRfid->store(['rfid' => $request->rfid, 'model_type' => 'App\Models\School', 'model_id' => $school->id, 'school_id' => auth_school()->id]);
            return redirect()->back()->with('success', 'Berhasil menambahkan master key');
        } else {
            return redirect()->back()->with('error', 'Kartu tidak valid');
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
