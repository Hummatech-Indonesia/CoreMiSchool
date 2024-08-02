<?php

namespace App\Services;

use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Http\Requests\StoreLessonScheduleRequest;
use App\Models\Classroom;

class LessonScheduleService
{
    private LessonScheduleInterface $lessonSchedule;
    private LessonHourInterface $lessonHour;
    private TeacherSubjectInterface $teacherSuject;
    private SchoolYearInterface $schoolYear;

    public function __construct(LessonHourInterface $lessonHour, TeacherSubjectInterface $teacherSuject, SchoolYearInterface $schoolYear, LessonScheduleInterface $lessonSchedule)
    {
        $this->lessonHour = $lessonHour;
        $this->teacherSuject = $teacherSuject;
        $this->schoolYear = $schoolYear;
        $this->lessonSchedule = $lessonSchedule;
    }

    public function store(StoreLessonScheduleRequest $request, Classroom $classroom, string $day): void
    {
        $rules = $request->validated();

        $subject = $this->teacherSuject->whereTeacher($rules['subject_id'], $rules['employee_id']);
        $year = $this->schoolYear->active();

        $this->lessonSchedule->store([
            'classroom_id' => $classroom->id,
            'lesson_hour_start' => $rules['lesson_hour_start'],
            'lesson_hour_end' => $rules['lesson_hour_end'],
            'teacher_subject_id' => $subject->id,
            'school_year_id' => $year->id,
            'day' => $day
        ]);
    }
}
