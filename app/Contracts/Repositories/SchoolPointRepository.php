<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SchoolPointInterface;
use App\Models\SchoolPoint;

class SchoolPointRepository extends BaseRepository implements SchoolPointInterface
{
    public function __construct(SchoolPoint $SchoolPoint)
    {
        $this->model = $SchoolPoint;
    }

    public function get(): mixed
    {
        return $this->model->query()->first();
    }

    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()->findOrFail($id)->update($data);
    }
}