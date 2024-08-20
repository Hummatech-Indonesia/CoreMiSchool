<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentInterface;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentRepository extends BaseRepository implements StudentInterface
{
    public function __construct(Student $student)
    {
        $this->model = $student;
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

    public function count(): mixed
    {
        return $this->model->query()->count();
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->whereHas('user', function($q) use ($request) {
                    $q->where('name', 'LIKE', '%' .  $request->name . '%');
                });
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->where('gender', $request->gender);
            })
            ->whereDoesntHave('classroomStudents.classroom.levelClass', function($query) {
                $query->where('name', 'Alumni');
            })
            ->when($request->class, function ($query) use ($request) {
                $query->whereHas('classroomStudents.classroom', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->class . '%');
                });
            })
            ->latest()
            ->paginate(10);
    }


    public function doesntHaveClassroom(Request $request): mixed
    {
        return $this->model->query()->whereDoesntHave('classroomStudents')
        ->when($request->name, function ($query) use ($request) {
            $query->whereHas('user', function($q) use ($request){
                $q->where('name', 'LIKE', '%' .  $request->name . '%');
            });
        })
        ->paginate(10);
    }

    public function countStudentAlumni(): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudents.classroom.levelClass', 'name', 'Alumni')
            ->count();
    }

    public function getByPoint(): mixed
    {
        return $this->model->query()
            ->where('point' , '>', 0)
            ->orderBy('point', 'desc')
            ->paginate(10);
    }

    public function getByPointAsc(): mixed
    {
        return $this->model->query()
            ->where('point', '>', 0)
            ->orderBy('point', 'asc')
            ->paginate(10);
    }
}
