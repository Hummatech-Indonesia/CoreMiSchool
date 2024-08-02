<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Models\LessonSchedule;
use App\Http\Requests\StoreLessonScheduleRequest;
use App\Http\Requests\UpdateLessonScheduleRequest;
use App\Models\Classroom;
use App\Services\LessonScheduleService;

class LessonScheduleController extends Controller
{
    private LessonScheduleInterface $lessonSchedule;
    private ClassroomInterface $classroom;
    private EmployeeInterface $employee;
    private SubjectInterface $subjects;
    private LessonHourInterface $lessonHour;
    private LessonScheduleService $service;

    public function __construct(LessonScheduleInterface $lessonSchedule, ClassroomInterface $classroom, EmployeeInterface $employee, SubjectInterface $subjects, LessonHourInterface $lessonHour, LessonScheduleService $service)
    {
        $this->lessonSchedule = $lessonSchedule;
        $this->classroom = $classroom;
        $this->employee = $employee;
        $this->subjects = $subjects;
        $this->lessonHour = $lessonHour;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessonSchedules = $this->lessonSchedule->get();
        $classrooms = $this->classroom->get();
        return view('school.new.lesson-schedule.index', compact('lessonSchedules', 'classrooms'));
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
    public function store(StoreLessonScheduleRequest $request, Classroom $classroom, string $day)
    {
        $this->service->store($request, $classroom, $day);
        return redirect()->back()->with('success', 'Berhasil menambahkan jadwal pelajaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(LessonSchedule $lessonSchedule, Classroom $classroom)
    {
        $teachers = $this->employee->getTeacher();
        $subjects = $this->subjects->get();
        $lessonHours = $this->lessonHour->groupByNot('day');
        $lessonHourUpdates = $this->lessonHour->groupByNotUpdate('day');
        $lessonSchedules = $this->lessonSchedule->whereClassroom($classroom->id, 'day');
        $latestSchedule = $this->service->get();
        return view('school.new.lesson-schedule.detail', compact('lessonSchedules', 'classroom', 'teachers', 'subjects', 'lessonHours', 'lessonHourUpdates', 'latestSchedule'));
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
        $this->service->update($request,$lessonSchedule);
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
