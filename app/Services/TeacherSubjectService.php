<?php

namespace App\Services;

use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Http\Requests\StoreTeacherSubjectRequest;

class TeacherSubjectService
{
    private TeacherSubjectInterface $teacherSubject;

    public function __construct(TeacherSubjectInterface $teacherSubject)
    {
        $this->teacherSubject = $teacherSubject;
    }

    public function store(StoreTeacherSubjectRequest $request, $employee): void
    {
        $rules = $request->validated();

        foreach ($rules['subject'] as $data) {
            $this->teacherSubject->store([
                'employee_id' => $employee,
                'subject_id' => $data,
            ]);
        }
    }
}
