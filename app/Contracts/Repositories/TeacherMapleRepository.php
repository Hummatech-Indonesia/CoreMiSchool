<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\TeacherMapleInterface;
use App\Models\TeacherMaple;

class TeacherMapleRepository extends BaseRepository implements TeacherMapleInterface
{
    public function __construct(TeacherMaple $teacherMaple)
    {
        $this->model = $teacherMaple;
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
}