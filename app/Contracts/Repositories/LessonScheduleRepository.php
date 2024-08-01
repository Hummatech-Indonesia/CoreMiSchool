<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Models\LessonSchedule;

class LessonScheduleRepository extends BaseRepository implements LessonScheduleInterface
{
    public function __construct(LessonSchedule $lessonSchedule)
    {
        $this->model = $lessonSchedule;
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

    public function whereClassroom(mixed $id, string $query): mixed
    {
        return $this->model->query()
            ->whereRelation('classroom', 'id', $id)
            ->get()
            ->groupBy($query);
    }

    public function whereTeacher(mixed $id, string $day): mixed
    {
        return $this->model->query()
            ->whereRelation('teacherSubject', 'employee_id', $id)
            ->where('day', $day)
            ->get();
    }
}
