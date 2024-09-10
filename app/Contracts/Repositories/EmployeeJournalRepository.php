<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Models\EmployeeJournal;
use Illuminate\Http\Request;

class EmployeeJournalRepository extends BaseRepository implements EmployeeJournalInterface
{
    public function __construct(EmployeeJournal $EmployeeJournal)
    {
        $this->model = $EmployeeJournal;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function getEmployee(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('employee.user', 'id', $id)->get();
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
    public function getByStatus(string $status, Request $request): mixed
    {
        return $this->model->query()
            ->where('status', $status)
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('employee.user', 'name', 'like', '%' . $request->name . '%');
            })
            ->latest()->paginate(10);
    }

    public function search(Request $request): mixed
    {
        return $this->model->query()
            ->when($request->name, function ($query) use ($request) {
                $query->whereRelation('employee.user', 'name', 'like', '%' . $request->name . '%');
            })
            ->latest()->paginate(10);
    }
}
