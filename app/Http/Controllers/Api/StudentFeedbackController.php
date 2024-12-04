<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\FeedbackInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeedbackRequest;
use App\Models\LessonSchedule;
use App\Services\FeedbackService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentFeedbackController extends Controller
{
    private FeedbackInterface $feedback;
    private FeedbackService $service;

    public function __construct(FeedbackInterface $feedback, FeedbackService $service)
    {
        $this->feedback = $feedback;
        $this->service = $service;
    }

    public function store(StoreFeedbackRequest $request, LessonSchedule $lessonSchedule)
    {
        DB::beginTransaction();
            $id = auth()->user()->student->id;
            $data = $this->service->store($request, $lessonSchedule, $id);
            $this->feedback->store($data);
            DB::commit();
            return response()->json(['status' => 'success', 'message' => "Berhasil mengirim tanggapan", 'code' => 200], 200);
        try {
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => "Gagal mengirim tanggapan ".$th->getMessage(),'code' => 400], 400);
        }
    }
}
