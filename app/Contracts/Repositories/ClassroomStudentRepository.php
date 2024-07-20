<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Models\ClassroomStudent;
use Illuminate\Http\Request;

class ClassroomStudentRepository extends BaseRepository implements ClassroomStudentInterface
{
    public function __construct(ClassroomStudent $classroomStudent)
    {
        $this->model = $classroomStudent;
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

    public function where(mixed $data, Request $request): mixed
    {
        return $this->model->query()
        ->where('classroom_id', $data)
        ->when($request->search, function ($query) use ($request) {
            $query->whereHas('student.user', function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            });
        })
        ->paginate(10);
    }

    public function whereStudent(mixed $id): mixed
    {
        return $this->model->query()->where('student_id', $id)->first();
    }

    public function getAlumnus(): mixed
    {
        return $this->model->query()->whereRelation('classroom.schoolYear', 'active', false)->get();
    }
}
