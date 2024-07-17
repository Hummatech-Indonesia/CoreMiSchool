<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;

class StudentRepository extends BaseRepository implements StudentInterface
{
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function show(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id);
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function paginate() : mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function whereSchool(mixed $id): mixed
    {
        return $this->model->query()->where('school_id', $id)->latest()->paginate(10);
    }

    public function doesntHaveClassroom(): mixed
    {
        return $this->model->query()->whereDoesntHave('classroomStudents')->get();
    }

    public function countStudentAlumni(mixed $id): mixed
    {
        return $this->model->query()
            ->where('school_id', $id)
            ->whereRelation('classroomStudents.classroom.levelClass', 'name', 'Alumni')
            ->count();
    }
}
