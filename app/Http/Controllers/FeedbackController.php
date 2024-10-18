<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FeedbackInterface;
use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\LessonSchedule;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    private FeedbackInterface $feedback;
    private FeedbackService $service;

    public function __construct(FeedbackInterface $feedback, FeedbackService $service)
    {
        $this->feedback = $feedback;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreFeedbackRequest $request, LessonSchedule $lessonSchedule)
    {
        $data = $this->service->store($request, $lessonSchedule);
        $this->feedback->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan feedback');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $this->feedback->update($feedback->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil mengedit feedback');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $this->feedback->delete($feedback->id);
        return redirect()->back()->with('success', 'Berhasil menghapus feedback');
    }
}
