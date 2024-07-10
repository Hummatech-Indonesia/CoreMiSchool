<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Models\LessonSchedule;
use App\Http\Requests\StoreLessonScheduleRequest;
use App\Http\Requests\UpdateLessonScheduleRequest;

class LessonScheduleController extends Controller
{
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(LessonScheduleInterface $lessonSchedule)
    {
        $this->lessonSchedule = $lessonSchedule;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessonSchedules = $this->lessonSchedule->get();
        return view('', compact('lessonSchedules'));
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
    public function store(StoreLessonScheduleRequest $request)
    {
        $data = $request->validated();
        $this->lessonSchedule->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan jadwal pelajaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonSchedule $lessonSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonSchedule $lessonSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonScheduleRequest $request, LessonSchedule $lessonSchedule)
    {
        $data = $request->validated();
        $this->lessonSchedule->update($lessonSchedule->id, $data);
        return redirect()->back()->with('success', 'Berhasil memperbaiki jadwal pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonSchedule $lessonSchedule)
    {
        $this->lessonSchedule->delete($lessonSchedule->id);
        return redirect()->back()->with('success', 'Berhasil menghapus jadwal pelajaran');
    }
}
