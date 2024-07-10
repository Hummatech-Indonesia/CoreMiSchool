<?php

namespace App\Services;

use App\Http\Requests\StoreLessonHourRequest;
use App\Http\Requests\UpdateLessonHourRequest;
use App\Models\LessonHour;
use App\Models\Student;

class LessonHourService
{
    public function store(StoreLessonHourRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function update(LessonHour $lessonHour, UpdateLessonHourRequest $request): array|bool
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function delete(Student $student)
    {
        //
    }
}
