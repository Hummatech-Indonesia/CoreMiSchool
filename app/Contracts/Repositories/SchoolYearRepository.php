<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SchoolYearInterface;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearRepository extends BaseRepository implements SchoolYearInterface
{
    public function __construct(SchoolYear $schoolYear)
    {
        $this->model = $schoolYear;
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

    public function where(mixed $data): mixed
    {
        return $this->model->query()->where('school_id', $data)->get();
    }

    public function whereSchoolYear(mixed $data): mixed
    {
        return $this->model->query()->where('school_year', $data)->first();
    }

    public function whereSchool(mixed $id, Request $request): mixed
    {
        return $this->model->query()->where('school_id', $id)
        ->when($request->name, function ($query) use ($request) {
            $query->where('school_year', 'LIKE' , '%' . $request->name . '%');
        })
        ->paginate(10);
    }

    public function active(mixed $id): mixed
    {
        return $this->model->query()->where('school_id', $id)->where('active', true)->first();
    }

    public function whereActive(): mixed
    {
        return $this->model->query()->where('active', true)->get();
    }
}
