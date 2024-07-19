<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceRuleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AttendanceRuleApiController extends Controller
{
    private AttendanceRuleInterface $attendanceRule;

    public function __construct(AttendanceRuleInterface $attendanceRule)
    {
        $this->attendanceRule = $attendanceRule;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $attendanceRules = $this->attendanceRule->get();
        return ResponseHelper::success(AttendanceRuleResource::collection($attendanceRules), 'Berhasil mengirim jadwal waktu');
    }
}
