<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Models\Attendance;

class AttendanceRepository extends BaseRepository implements AttendanceInterface
{
    public function __construct(Attendance $attendance)
    {
        $this->model = $attendance;
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

    public function whereSchool(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('classroomStudent.classroom.schoolYear.school', 'id', $id)->latest()->paginate(10);
    }

    public function AttendanceChart(mixed $id, mixed $year, mixed $month): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent.classroom.schoolYear', 'school_id', $id)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();
    }
}
