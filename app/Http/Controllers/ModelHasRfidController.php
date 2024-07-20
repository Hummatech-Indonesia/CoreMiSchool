<?php

namespace App\Http\Controllers;

use App\Models\ModelHasRfid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\ModelHasRfidService;
use App\Contracts\Interfaces\SchoolInterface;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Http\Requests\UpdateModelHasRfidRequest;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use F9Web\ApiResponseHelpers;

class ModelHasRfidController extends Controller
{
    use ApiResponseHelpers;
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
        if ($exist) {
            $this->modelHasRfid->store(['rfid' => $request->rfid, 'model_type' => null, 'model_id' => null]);
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
        try {
            $response = Http::get('http://127.0.0.1:8001/api/rfid-check', [
                'rfid' => $request->rfid
            ]);

            $data = $response->json();
            $statusCode = $response->status();

            if ($statusCode >= 400) return redirect()->back()->with('error', $data['error']);
            $this->service->update($request, $role, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada server');
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


    public function getStudents(Request $request)
    {
        $students = $this->modelHasRfid->getByActiveStudent();
        return ;
    }
}
