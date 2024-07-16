<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Http\Requests\CheckMasterKeyRequest;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceMasterController extends Controller
{
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceService $service;

    public function __construct(ModelHasRfidInterface $modelHasRfid, AttendanceService $service) {
        $this->modelHasRfid = $modelHasRfid;
        $this->service = $service;
    }

    public function index() {
        return view('school.pages.test.attendance');
    }

    public function check(CheckMasterKeyRequest $request) {
        $data = $request->validated();
        $card = $this->modelHasRfid->where($data['rfid']);
        if ($card->model_type == 'App\Models\School') {
            return to_route('list-attendance.index', ['school_id' => $card->model_id])->with('success', 'Berhasil masuk');
        } else {
            return redirect()->back()->with('error', 'Kartu bukan master key!');
        }
    }
}
