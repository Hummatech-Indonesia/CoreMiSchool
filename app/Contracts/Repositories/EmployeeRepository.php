<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Enums\RoleEnum;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeRepository extends BaseRepository implements EmployeeInterface
{
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
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

    public function paginate($query) : mixed
    {
        return $this->model->query()
            ->whereRelation('user.roles', 'name', $query)
            ->latest()
            ->paginate(10);
    }

    public function where(mixed $data): mixed
    {
        return $this->model->query()
            ->whereRelation('user.roles', 'name', $data)
            ->get();
    }

    public function getSchool(mixed $id): mixed
    {
        return $this->model->query()->where('school_id', $id)->get();
    }

    public function getTeacherBySchool(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', RoleEnum::TEACHER->value)->where('school_id', $id)->get();
    }

    public function whereSchool(mixed $id, $query, Request $request): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', $query)
        ->where('school_id', $id)
        ->when($request->search, function ($query) use ($request) {
            $query->whereHas('user', function($q) use ($request){
                $q->where('name', 'LIKE', '%' .  $request->search . '%');
            });
        })->when($request->filter === "terbaru", function($query) {
            $query->latest();
        })
        ->when($request->filter === "terlama", function($query) {
            $query->oldest();
        }) ->when($request->status, function($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->latest()
        ->paginate(2);
    }

    public function showWithSlug(string $slug): mixed
    {
        return $this->model->query()->whereRelation('user', 'slug', $slug)->firstOrFail();
    }

    public function getCountEmployee(mixed $query): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', $query)->count();
    }
}
