<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use Illuminate\Http\Request;

class AttendanceMasterController extends Controller
{
    private ModelHasRfidInterface $modelHasRfid;

    public function __construct(ModelHasRfidInterface $modelHasRfid) {
        $this->modelHasRfid = $modelHasRfid;
    }

    public function index() {
        return view('school.pages.test.attendance');
    }

    public function check(Request $request) {
        
    }
}
