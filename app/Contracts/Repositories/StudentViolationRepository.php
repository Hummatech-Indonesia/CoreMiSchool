<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\StudentViolationInterface;
use App\Models\StudentViolation;
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

    public function whereClassroom(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent', 'classroom_id' , $id)
            ->paginate(10);
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
