<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Http\Controllers\Controller;
use App\Models\TeacherJournal;
use App\Http\Requests\StoreTeacherJournalRequest;
use App\Http\Requests\UpdateTeacherJournalRequest;
use App\Models\LessonSchedule;
use App\Services\TeacherJournalService;

class TeacherJournalController extends Controller
{
    private TeacherJournalInterface $teacherJournal;
    private TeacherJournalService $service;

    public function __construct(TeacherJournalInterface $teacherJournal, TeacherJournalService $service)
    {
        $this->teacherJournal = $teacherJournal;
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
    public function store(StoreTeacherJournalRequest $request, LessonSchedule $lessonSchedule)
    {
        $data = $this->service->store($request, $lessonSchedule);
        $this->teacherJournal->store($data);
        return redirect()->back()->with('success', 'Berhasil mengirim jurnal');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherJournal $teacherJournal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherJournal $teacherJournal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherJournalRequest $request, TeacherJournal $teacherJournal, LessonSchedule $lessonSchedule)
    {
        $this->teacherJournal->updateWithLesson($lessonSchedule->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil mengupdate jurnal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherJournal $teacherJournal)
    {
        $this->teacherJournal->delete($teacherJournal->id);
        return redirect()->back()->with('success', 'Berhasi menghapus jurnal');
    }
}
