<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentRepairInterface;
use App\Models\StudentRepair;

class StudentRepairRepository extends BaseRepository implements StudentRepairInterface
{
    public function __construct(StudentRepair $studentRepair)
    {
        $this->model = $studentRepair;
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
}