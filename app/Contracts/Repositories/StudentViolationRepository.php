<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentViolationInterface;
use App\Models\StudentViolation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentViolationRepository extends BaseRepository implements StudentViolationInterface
{
    public function __construct(StudentViolation $studentViolation)
    {
        $this->model = $studentViolation;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->search, function ($query) use ($request) {
                $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%');
            })
            ->when($request->gender, function ($query) use ($request) {
                $query->whereRelation('classroomStudent.student', 'gender', $request->gender);
            })
            ->paginate(10);
    }


    public function whereClassroom(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'classroom_id', $id)
            ->when(
                $request->search,
                fn($query) =>
                $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%')
            )
            ->when($request->gender, fn($query) => $query->whereRelation('classroomStudent.student', 'gender', $request->gender)
            )
            ->when($request->points, function ($query) use ($request) {
                $order = $request->points == 'highest' ? 'desc' : 'asc';
                $query->whereHas('regulation',function($query) use ($order){
                    $query->orderBy('point', $order);
                });
            })
            ->paginate(10);
    }

    public function whereStudent(mixed $id, Request $request): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'student_id', $id)
            ->when(
                $request->search,
                fn($query) =>
                $query->whereRelation('classroomStudent.student.user', 'name', 'like', '%' . $request->search . '%')
            )
            ->when($request->point_student, function ($query) use ($request) {
                $order = $request->point_student == 'highest' ? 'desc' : 'asc';
                $query->with(['regulation' => fn($q) => $q->orderBy('point', $order)]);
            })
            ->when($request->order, function ($query) use ($request) {
                $request->order == 'latest' ? $query->latest() : $query->oldest();
            })
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
        return $this->model->query()->findOrFail($id)->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function countByClassroomStudent(): mixed
    {
        return $this->model->query()
            ->select('classroom_student_id', DB::raw('COUNT(*) as count'))
            ->groupBy('classroom_student_id')
            ->get();
    }
}
