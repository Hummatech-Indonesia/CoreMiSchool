<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\RegulationInterface;
use App\Models\Regulation;

class RegulationRepository extends BaseRepository implements RegulationInterface
{
    public function __construct(Regulation $regulation)
    {
        $this->model = $regulation;
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
