<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\RfidResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RfidApiController extends Controller
{
    private ModelHasRfidInterface $rfid;

    public function __construct(ModelHasRfidInterface $rfid)
    {
        $this->rfid = $rfid;
    }

    /** * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $cards = $this->rfid->getRfid();
        return ResponseHelper::jsonResponse(RfidResource::collection($cards), 'Berhasil mengirim data rfid');
    }
}
