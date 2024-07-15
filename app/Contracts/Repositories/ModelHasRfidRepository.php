<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Models\ModelHasRfid;

class ModelHasRfidRepository extends BaseRepository implements ModelHasRfidInterface
{
    public function __construct(ModelHasRfid $modelHasRfid)
    {
        $this->model = $modelHasRfid;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }
    public function activeRfid(): mixed
    {
        return $this->model->query()
            ->whereNotNull('model_type')
            ->whereNotNull('model_id')
            ->get();
    }
    public function nonActiveRfid(): mixed
    {
        return $this->model->query()
            ->whereNull('model_type')
            ->whereNull('model_id')
            ->get();
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
        return $this->model->query()->where('rfid', $id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function paginate(): mixed
    {
        return $this->model->query()->latest()->paginate(10);
    }

    public function where(mixed $data): mixed
    {
        return $this->model->query()->where('rfid', $data)->firstOrFail();
    }

    public function exists(mixed $rfid): mixed
    {
        return $this->model->query()->where('rfid', $rfid)->exists();
    }
}
