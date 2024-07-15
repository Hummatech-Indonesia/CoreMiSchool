<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\RfidInterface;
use App\Enums\RfidStatusEnum;
use App\Models\Rfid;

class RfidRepository extends BaseRepository implements RfidInterface
{
    public function __construct(Rfid $rfid)
    {
        $this->model = $rfid;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function where(mixed $data): bool
    {
        return $this->model->query()->where('rfid', $data)->exists();
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

    public function used(): mixed
    {
        return $this->model->query()->where('status', RfidStatusEnum::USED->value)->get();
    }

    public function notUsed(): mixed
    {
        return $this->model->query()->where('status', RfidStatusEnum::NOTUSED->value)->get();
    }
}
