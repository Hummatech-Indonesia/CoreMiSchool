<?php

    namespace App\Contracts\Repositories;

    use App\Contracts\Interfaces\{GuestBook}Interface;
    use App\Models\{GuestBook};

    class GuestBookRepository extends BaseRepository implements GuestBookInterface
    {
        public function __construct(GuestBook $GuestBook)
        {
            $this->model = $GuestBook;
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