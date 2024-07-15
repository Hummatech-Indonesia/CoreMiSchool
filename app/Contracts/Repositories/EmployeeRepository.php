<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Enums\RoleEnum;
use App\Models\Employee;

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

    public function getTeacherBySchool(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', RoleEnum::TEACHER->value)->where('school_id', $id)->get();
    }

    public function whereSchool(mixed $id, $query): mixed
    {
        return $this->model->query()->whereRelation('user.roles', 'name', $query)->where('school_id', $id)->latest()->paginate(10);
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
