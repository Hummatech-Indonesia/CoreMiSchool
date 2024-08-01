<?php

namespace App\Contracts\Repositories\Teachers;

use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\TeacherJournal;

class TeacherJournalRepository extends BaseRepository implements TeacherJournalInterface
{
    public function __construct(TeacherJournal $city)
    {
        $this->model = $city;
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

    public function paginate(): mixed
    {
        //
    }
}
