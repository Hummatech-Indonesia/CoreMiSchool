<?php

namespace App\Services;

use App\Http\Requests\StoreLessonHourRequest;
use App\Http\Requests\StoreTeacherMapleRequest;
use App\Http\Requests\UpdateLessonHourRequest;
use App\Http\Requests\UpdateTeacherMapleRequest;
use App\Models\LessonHour;
use App\Models\Student;

class TeacherMapleService
{
    public function store(StoreTeacherMapleRequest $request, $employee): array|bool
    {
        $data = $request->validated();
        $data['employee_id'] = $employee;
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function update(UpdateTeacherMapleRequest $request): array|bool
    {
        $data = $request->validated();
        return $data;
    }

    public function delete(Student $student)
    {
        //
    }
}
