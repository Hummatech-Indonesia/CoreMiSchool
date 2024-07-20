<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\RfidResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceResponse;

class RfidApiController extends Controller
{
    private ModelHasRfidInterface $rfid;

    public function __construct(ModelHasRfidInterface $rfid)
    {
        $this->rfid = $rfid;
    }

    /** * Display a listing of the resource.
     */
    public function index() : mixed
    {
        $cards = $this->rfid->getByActiveStudent();
        return RfidResource::collection($cards);
    }
}
