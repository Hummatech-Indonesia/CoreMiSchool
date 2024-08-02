<?php

namespace App\Http\Controllers\Teacher;

use App\Models\LessonSchedule;
use App\Models\TeacherJournal;
use App\Http\Controllers\Controller;
use App\Services\Teacher\TeacherJournalService;
use App\Http\Requests\StoreTeacherJournalRequest;
use App\Http\Requests\UpdateTeacherJournalRequest;
use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Services\AttendanceJournalService;

class TeacherJournalController extends Controller
{
    private AttendanceJournalService $serviceAttendance;
    private TeacherJournalInterface $teacherJournal;
    private LessonScheduleInterface $lessonSchedule;
    private TeacherJournalService $service;

    public function __construct(TeacherJournalInterface $teacherJournal, TeacherJournalService $service, LessonScheduleInterface $lessonSchedule, AttendanceJournalService $serviceAttendance)
    {
        $this->serviceAttendance = $serviceAttendance;
        $this->teacherJournal = $teacherJournal;
        $this->lessonSchedule = $lessonSchedule;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherSchedules = $this->lessonSchedule->whereTeacher(auth()->user()->id, now()->format('l'));
        return view('teacher.pages.journals.index', compact('teacherSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.pages.journals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherJournalRequest $request, LessonSchedule $lessonSchedule)
    {
        if($this->service->checkDuplicatedStudent($request)) return redirect()->back()->with('error', 'Satu Siswa Hanya Dapat Mempunyai 1 Status Izin');
        $data = $this->service->store($request, $lessonSchedule);
        $teacherJournal_id = $this->teacherJournal->store($data)->id;
        $this->serviceAttendance->storeJournal($request, $teacherJournal_id);
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
