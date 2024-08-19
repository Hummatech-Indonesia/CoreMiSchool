<?php

    namespace App\Contracts\Repositories;

    use App\Contracts\Interfaces\StudentViolationInterface;
    use App\Models\StudentViolation;

    class StudentViolationRepository extends BaseRepository implements StudentViolationInterface
    {

        public function __construct(StudentViolation $studentViolation)
        {
            $this->model = $studentViolation;
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
    }
