<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Models\LessonSchedule;
use App\Models\TeacherJournal;
use App\Http\Controllers\Controller;
use App\Services\Teacher\TeacherJournalService;
use App\Http\Requests\StoreTeacherJournalRequest;
use App\Http\Requests\UpdateTeacherJournalRequest;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Services\AttendanceJournalService;
use App\Contracts\Interfaces\LessonHourInterface; // Added LessonHourInterface

class TeacherJournalController extends Controller
{
    private AttendanceJournalService $serviceAttendance;
    private AttendanceJournalInterface $attendanceJournal;
    private TeacherJournalInterface $teacherJournal;
    private LessonScheduleInterface $lessonSchedule;
    private TeacherJournalService $service;
    private ClassroomStudentInterface $classroomStudent;
    private LessonHourInterface $lessonHour; // Added property for LessonHourInterface

    public function __construct(TeacherJournalInterface $teacherJournal, AttendanceJournalInterface $attendanceJournal, TeacherJournalService $service, LessonScheduleInterface $lessonSchedule, ClassroomStudentInterface $classroomStudent, AttendanceJournalService $serviceAttendance, LessonHourInterface $lessonHour)
    {
        $this->serviceAttendance = $serviceAttendance;
        $this->attendanceJournal = $attendanceJournal;
        $this->teacherJournal = $teacherJournal;
        $this->lessonSchedule = $lessonSchedule;
        $this->service = $service;
        $this->classroomStudent = $classroomStudent;
        $this->lessonHour = $lessonHour; // Initialize the LessonHourInterface property
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
    public function create(LessonSchedule $lessonSchedule)
    {
        // dd($lessonSchedule->query()->with('journals')->first());

        $attendanceJournals = $this->attendanceJournal->whereLessonSchedule($lessonSchedule->id);
        $students = $this->classroomStudent->getByClassId($lessonSchedule->classroom->id);
        $teacherJournal = $this->teacherJournal->getLessonSchedule($lessonSchedule->id);
        $lessonHours = $this->lessonHour->whereTeacherSchedule($lessonSchedule, now());
        return view('teacher.pages.journals.create', compact('students', 'lessonHours', 'lessonSchedule', 'attendanceJournals', 'teacherJournal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherJournalRequest $request, LessonSchedule $lessonSchedule)
    {
        if ($this->service->checkDuplicatedStudent($request)) return response()->json('error', 'Satu Siswa Hanya Dapat Mempunyai 1 Status Izin');
        $data = $this->service->store($request, $lessonSchedule);
        $teacherJournal_id = $this->teacherJournal->store($data)->id;
        if ($request['students'] != null) $this->serviceAttendance->storeJournal($request, $teacherJournal_id);
        return response()->json(['success' => 'Berhasil mengirim jurnal']);
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
    public function update(UpdateTeacherJournalRequest $request, LessonSchedule $lessonSchedule)
    {
        $teacherJournal = $this->teacherJournal->getLessonSchedule($lessonSchedule->id);
        if ($this->service->checkDuplicatedStudentUpdate($request)) return response()->json('error', 'Satu Siswa Hanya Dapat Mempunyai 1 Status Izin');
        $data = $this->service->update($request, $lessonSchedule);
        $this->teacherJournal->update($teacherJournal->id, $data);
        if ($request['students'] != null) $this->serviceAttendance->updateJournal($request, $teacherJournal->id);
        return response()->json(['success' => 'Berhasil mengupdate jurnal']);
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
