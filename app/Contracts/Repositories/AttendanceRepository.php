<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Enums\RoleEnum;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceRepository extends BaseRepository implements AttendanceInterface
{
    public function __construct(Attendance $attendance)
    {
        $this->model = $attendance;
    }

    public function get(): mixed
    {
        return $this->model->query()->get();
    }

    public function store(array $data): mixed
    {
        $attendance = $this->model->query()->create($data);
        return $attendance;
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

    public function whereSchool(mixed $id, Request $request): mixed
    {
        return $this->model->query()->whereRelation('classroomStudent.classroom.schoolYear.school', 'id', $id)
        ->when($request->name, function ($query) use ($request) {
            $query->whereRelation('classroomStudent.student.user', 'name', 'LIKE', '%' . $request->name . '%');
        })
        ->when($request->created_at, function ($query) use ($request) {
            $query->whereDate('created_at', $request->created_at);
        })
        ->when($request->year, function ($query) use ($request) {
            $query->whereRelation('classroomStudent.classroom.schoolYear', 'school_year', $request->year);
        })
        ->latest()->paginate(10);
    }

    public function whereClassroom(mixed $id): mixed
    {
        return $this->model->query()->whereRelation('classroomStudent.classroom', 'id', $id)->get();
    }

    public function classAndDate(mixed $classroom_id, Request $request): mixed
    {
        return $this->model->query()
        ->whereRelation('classroomStudent.classroom', 'id', $classroom_id)
        ->when($request->start && $request->end, function ($query) use ($request) {
            $query->whereBetween('created_at', [$request->start, $request->end]);
        })
        ->get();
    }

    public function getSchool(mixed $id, mixed $query): mixed
    {
        return $this->model->query()->with('classroomStudent.student.user')->whereRelation('classroomStudent.classroom.schoolYear.school', 'id', $id)->whereNotNull($query)->latest()->get();
    }

    public function AttendanceChart(mixed $id, mixed $year, mixed $month, mixed $status): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent.classroom.schoolYear', 'school_id', $id)
            ->where('status', $status)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->count();
    }

    public function checkPresence(mixed $id, mixed $status): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent.classroom', 'student_id', $id)
            ->where('status', $status)
            ->first();
    }

    public function getStudent(mixed $id): mixed
    {
        return $this->model->query()
            ->whereRelation('classroomStudent.classroom', 'student_id', $id)
            ->where('status', RoleEnum::STUDENT->value)
            ->with('classroomStudents.student')
            ->first();
    }

    public function updateCheckOut(mixed $id, array $data): mixed
    {
        return $this->model->query()->whereRelation('classroomStudent.classroom', 'student_id', $id)->update($data);
    }
}
