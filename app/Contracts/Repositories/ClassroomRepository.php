<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Models\Classroom;

class ClassroomRepository extends BaseRepository implements ClassroomInterface
{
    public function __construct(Classroom $classroom)
    {
        $this->model = $classroom;
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

    public function whereInSchoolYears($schoolYears)
    {
        return $this->model->query()->whereIn('school_year_id', $schoolYears)->get();
    }

    public function countClass(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('schoolYear', 'school_id', $id)->count();
    }
}
