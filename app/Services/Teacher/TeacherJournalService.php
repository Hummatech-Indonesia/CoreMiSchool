<?php

namespace App\Services;

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
            'date' => now(),
        ];
    }
}
