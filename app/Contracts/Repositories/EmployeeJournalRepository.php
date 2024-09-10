<?php

    namespace App\Contracts\Repositories;

    use App\Contracts\Interfaces\EmployeeJournalInterface;
    use App\Models\EmployeeJournal;

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
        public function getByStatus(string $status): mixed
        {
            return $this->model->query()->where('status', $status)->get();
        }

    }
