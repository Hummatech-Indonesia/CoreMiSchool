<?php

namespace App\Contracts\Repositories\Teachers;

use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Contracts\Repositories\BaseRepository;
use App\Models\TeacherJournal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TeacherJournalRepository extends BaseRepository implements TeacherJournalInterface
{
    public function __construct(TeacherJournal $city)
    {
        $this->model = $city;
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

    public function updateWithLesson(array $data, mixed $id): mixed
    {
        return $this->model->query()->where('lesson_schedule_id')->update($data);
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()->findOrFail($id)->delete();
    }

    public function paginate(): mixed
    {
        return 0;
    }

    public function getLessonSchedule(mixed $id): mixed
    {
        return $this->model->query()->where('lesson_schedule_id', $id)->first();
    }

    public function histories(Request $request): mixed
    {
        return $this->model->query()
            ->with('attendanceJournals')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            })->when($request->filter === "terbaru", function($query) {
                $query->latest();
            })
            ->when($request->filter === "terlama", function($query) {
                $query->oldest();
            })
            ->get();
    }

    public function whereTeacher(mixed $employee_id, mixed $subject_id): mixed
    {
        return $this->model->query()
            ->whereRelation('lessonSchedule.teacherSubject', 'employee_id', $employee_id)
            ->whereRelation('lessonSchedule.teacherSubject', 'subject_id', $subject_id)
            ->first();
    }
}
