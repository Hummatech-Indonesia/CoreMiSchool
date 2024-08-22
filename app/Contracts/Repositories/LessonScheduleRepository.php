<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Enums\DayEnum;
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
            // ->orderBy('LessonHour')
            ->groupBy($query);
    }

    public function whereClassroomId(mixed $id): mixed
    {
        return $this->model->query()
            ->where('classroom_id', $id)
            ->whereNot('day', DayEnum::SUNDAY->value)
            ->get()
            ->groupBy('day');
    }

    public function whereTeacher(mixed $id, mixed $day): mixed
    {
        return $this->model->query()
            ->whereRelation('teacherSubject.employee.user', 'id', $id)
            ->with('teacherJournals', function($query) use ($day) {
                $query->whereDay('created_at', $day);
            })
            ->where('day', $day->format('l'))
            ->get();
    }

    public function whereTeacherNotif(mixed $id, mixed $day): mixed
    {
        return $this->model->query()
            ->whereDoesntHave('teacherJournals')
            ->whereRelation('teacherSubject.employee.user', 'id', $id)
            ->where('day', $day->format('l'))
            ->get();
    }

    public function groupByLatest($query):mixed
    {
        return $this->model->query()
            ->where('day',$query)
            ->latest()
            ->first();
    }
}
