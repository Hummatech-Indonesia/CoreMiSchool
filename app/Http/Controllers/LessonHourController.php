<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LessonHourInterface;
use App\Models\LessonHour;
use App\Http\Requests\StoreLessonHourRequest;
use App\Http\Requests\UpdateLessonHourRequest;
use App\Services\LessonHourService;
use Illuminate\Http\Request;

class LessonHourController extends Controller
{
    private LessonHourInterface $lessonHour;
    private LessonHourService $service;

    public function __construct(LessonHourInterface $lessonHour, LessonHourService $service)
    {
        $this->lessonHour = $lessonHour;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lessonHours = $this->lessonHour->search($request)->paginate(10);
        return view('school.pages.subjects.lesson-hours', compact('lessonHours'));
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
    public function store(StoreLessonHourRequest $request)
    {
        $data = $this->service->store($request);
        $this->lessonHour->store($data);
        return redirect()->back()->with('success', 'Berhasil menambahkan jam pelajaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonHour $lessonHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LessonHour $lessonHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonHourRequest $request, LessonHour $lessonHour)
    {
        $data = $this->service->update($lessonHour, $request);
        $this->lessonHour->update($lessonHour->id ,$data);
        return redirect()->back()->with('success', 'Berhasil memperbarui jam pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LessonHour $lessonHour)
    {
        $this->lessonHour->delete($lessonHour->id);
        return redirect()->back()->with('success', 'Berhasil menghapus jam pelajaran');
    }
}
