<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Models\TeacherSubject;

class TeacherSubjectRepository extends BaseRepository implements TeacherSubjectInterface
{
    public function __construct(TeacherSubject $teacherSubject)
    {
        $this->model = $teacherSubject;
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

    public function where(mixed $data): mixed
    {
        return $this->model->query()->where('employee_id', $data)->latest()->paginate(10);
    }
}
