<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentRepairInterface;
use App\Models\StudentRepair;
use Illuminate\Http\Request;

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

    public function whereStudent(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->when($request->search, function ($query) use ($request) {
                $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%');
            })
            ->get();
    }
}
