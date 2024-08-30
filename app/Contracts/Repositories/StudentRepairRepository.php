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
            ->when($request->search, fn($query) => $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%'))
            ->when($request->point, function($query) use ($request) {
                $order = $request->point == 'highest' ? 'desc' : 'asc';
                $query->orderBy('point', $order);
            })
            ->when($request->order, function($query) use ($request) {
                $request->order == 'latest' ? $query->latest() : $query->oldest();
            })
            ->get();
    }
}
