<?php

namespace App\Services\Teacher;

use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Http\Requests\StoreTeacherJournalRequest;
use App\Models\LessonSchedule;

class TeacherJournalService
{
    public function store(StoreTeacherJournalRequest $request, LessonSchedule $lessonSchedule): array|bool
    {
        $data = $request->validated();
        return [
            'lesson_schedule_id' => $lessonSchedule->id,
            'description' => $data['description'],
        ];
    }

        /**
     * checkDuplicatedStudent
     *
     * @param  TeacherJournalRequest $request
     * @return array
     */
    public function checkDuplicatedStudent(StoreTeacherJournalRequest $request) : array|bool
    {
        $data = $request->validated();
        $students = [];
        if($request->sick) $students = array_merge($students,$data['sick']);
        if($request->alpha) $students = array_merge($students,$data['alpha']);
        if($request->permission) $students = array_merge($students,$data['permission']);
        $uniqueStudents = array_unique($students);
        $duplicates = array_diff_assoc($students, $uniqueStudents);
        return $duplicates;
    }
}
