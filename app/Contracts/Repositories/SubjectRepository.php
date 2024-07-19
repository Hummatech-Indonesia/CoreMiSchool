<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SubjectInterface;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectRepository extends BaseRepository implements SubjectInterface
{
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
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

    public function count(): mixed
    {
        return $this->model->query()->count();
    }

    public function whereSchool(Request $request): mixed
    {
        return $this->model->query()
        ->when($request->name, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' .  $request->name . '%');
        })
        ->latest()->paginate(10);
    }
}
