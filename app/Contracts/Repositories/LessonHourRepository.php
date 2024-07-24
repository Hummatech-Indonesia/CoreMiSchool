<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\LessonHourInterface;
use App\Models\LessonHour;
use Illuminate\Http\Request;

class LessonHourRepository extends BaseRepository implements LessonHourInterface
{
    public function __construct(LessonHour $lessonHour)
    {
        $this->model = $lessonHour;
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

    public function groupBy($query):mixed
    {
        return $this->model->query()
            ->get()
            ->groupBy($query);
    }

    public function groupByLatest($query):mixed
    {
        return $this->model->query()
            ->where('day',$query)
            ->latest()
            ->first();
    }

    public function whereDay(mixed $day, mixed $name): mixed
    {
        return $this->model->query()
            ->when($name != 'Istirahat', function($query) use ($name, $day){
                $query->where('day', $day);
                $query->where('name', $name);
            })
            ->when($name == 'Istirahat', function($query){
                $query->where('day', '');
                $query->where('name', '');
            })
            ->first();
    }
}
