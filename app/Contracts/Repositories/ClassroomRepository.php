<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomRepository extends BaseRepository implements ClassroomInterface
{
    public function __construct(Classroom $classroom)
    {
        $this->model = $classroom;
    }

    public function get(): mixed
    {
        return $this->model->query()
            ->whereRelation('levelClass', 'name', '!=', 'Alumni')
            ->get();
    }

    public function store(array $data): mixed
    {
        return $this->model->query()->create($data);
    }

    public function insert(array $data): mixed
    {
        return $this->model->query()->insert($data);
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

    public function paginate(): mixed
    {
        return $this->model->query()->latest()
            ->whereRelation('levelClass', 'name', '!=', 'Alumni')
            ->paginate(10);
    }

    public function whereInSchoolYears($schoolYears)
    {
        return $this->model->query()->whereIn('school_year_id', $schoolYears)->get();
    }

    public function where(mixed $data): mixed
    {
        return $this->model->query()->where('school_year_id', $data)->get();
    }

    public function whereSchoolYears($schoolYears, Request $request)
    {
        return $this->model->query()->where('school_year_id', $schoolYears)
            ->whereRelation('levelClass', 'name', '!=', 'Alumni')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' .  $request->name . '%');
            })
            ->paginate(10);
    }

    public function countClass(): mixed
    {
        return $this->model->query()->count();
    }

    public function getAlumni(Request $request): mixed
    {
        $query = $this->model->query()
            ->whereRelation('levelClass', 'name', 'Alumni');

        $query->when($request->class_name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->class_name . '%');
        });

        $query->when($request->filled('school_year_id'), function ($query) use ($request) {
            $query->where('school_year_id', $request->input('school_year_id'));
        });

        return $query
        ->paginate(10);
    }


    public function search(Request $request): mixed
    {
        $query = $this->model->query();

        $query->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        });

        $query->when($request->filter, function ($query) use ($request) {
            if ($request->filter === 'terbaru') {
                $query->latest();
            } elseif ($request->filter === 'terlama') {
                $query->oldest();
            }
        });

        $query->when($request->school_year, function ($query) use ($request) {
            $query->whereRelation('schoolYear', 'school_year', 'LIKE', '%' .  $request->school_year . '%');
        });

        $query->when($request->school_year == null, function($query) {
            $query->whereRelation('schoolYear', 'active', true);
        });

        return $query;
    }
}
