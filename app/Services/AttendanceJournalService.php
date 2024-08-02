<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Enums\AttendanceEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\StoreAttendanceJournalRequest;
use App\Http\Requests\StoreTeacherJournalRequest;
use App\Http\Requests\UpdateAttendanceJournalRequest;
use App\Models\AttendanceJournal;
use App\Traits\UploadTrait;

class AttendanceJournalService
{
    use UploadTrait;

    private AttendanceInterface $attendance;
    private AttendanceJournalInterface $attendanceJournal;

    public function __construct(AttendanceInterface $attendance, AttendanceJournalInterface $attendanceJournal)
    {
        $this->attendance = $attendance;
        $this->attendanceJournal = $attendanceJournal;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function storeJournal(StoreTeacherJournalRequest $request, string $id) : void
    {
        $data = $request->validated();

        // Terbaru 2
        foreach ($data['student'] as $item) {
            $rule = $this->attendance->getClassroomStudent($item['classroom_student_id']);
            $this->attendance->update($rule->id, ['point' => $rule->point - 1]);
            $this->attendanceJournal->store([
                'teacher_journal_id' => $id,
                'classroom_student_id' => $item['classroom_student_id'],
                'lesson_hour_id' => $item['lesson_hour_id'],
                'status' => $item['status'] == 'present' ? AttendanceEnum::PRESENT->value : ($item['status'] == 'permit' ? AttendanceEnum::PERMIT->value : ($item['status'] == 'sick' ? AttendanceEnum::SICK->value : ($item['status'] == 'alpha' ? AttendanceEnum::ALPHA->value : ''))),
            ]);
        }

        // Terbaru 1
        // $statuses = [
        //     'sick' => AttendanceEnum::SICK->value,
        //     'alpha' => AttendanceEnum::ALPHA->value,
        //     'permission' => AttendanceEnum::PERMIT->value,
        // ];

        // foreach ($statuses as $type => $statusValue) {
        //     foreach ($data[$type] as $item) {
        //         $rule = $this->attendance->getClassroomStudent($item['classroom_student_id']);
        //         $this->attendance->update($rule->id, ['point' => $rule->point - 1]);
        //         $this->attendanceJournal->store([
        //             'teacher_journal_id' => $id,
        //             'classroom_student_id' => $item['classroom_student_id'],
        //             'lesson_hour_id' => $item['lesson_hour_id'],
        //             'status' => $statusValue,
        //         ]);
        //     }
        // }

        // Terlama
        // foreach ($data['sick'] as $key => $sick) {
        //     $rule = $this->attendance->getClassroomStudent($sick['classroom_student_id']);
        //     $this->attendance->update($rule->id, ['point' => $rule->point - 1]);
        //     $this->attendanceJournal->store([
        //         'teacher_journal_id' => $id,
        //         'classroom_student_id' => $sick['classroom_student_id'],
        //         'lesson_hour_id' => $sick['lesson_hour_id'],
        //         'status' => AttendanceEnum::SICK->value,
        //     ]);
        // }

        // foreach ($data['alpha'] as $key => $alpha) {
        //     $rule = $this->attendance->getClassroomStudent($alpha['classroom_student_id']);
        //     $this->attendance->update($rule->id, ['point' => $rule->point - 1]);
        //     $this->attendanceJournal->store([
        //         'teacher_journal_id' => $id,
        //         'classroom_student_id' => $alpha['classroom_student_id'],
        //         'lesson_hour_id' => $alpha['lesson_hour_id'],
        //         'status' => AttendanceEnum::ALPHA->value,
        //     ]);
        // }

        // foreach ($data['permission'] as $key => $permission) {
        //     $rule = $this->attendance->getClassroomStudent($permission['classroom_student_id']);
        //     $this->attendance->update($rule->id, ['point' => $rule->point - 1]);
        //     $this->attendanceJournal->store([
        //         'teacher_journal_id' => $id,
        //         'classroom_student_id' => $permission['classroom_student_id'],
        //         'lesson_hour_id' => $permission['lesson_hour_id'],
        //         'status' => AttendanceEnum::PERMIT->value,
        //     ]);
        // }
    }

    public function store(StoreAttendanceJournalRequest $request)
    {
        $data = $request->validated();
        $attendance = $this->attendance->getStudent($data['student_id']);

        if ($data['status'] != AttendanceEnum::PRESENT->value) {
            $this->attendance->update($attendance->id, ['point' => $attendance->point - 1]);
        }

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            $data['proof'] = $request->file('proof')->store(UploadDiskEnum::ATTENDANCE_JOURNAL->value, 'public');
        }

        return $data;
    }

    public function update(AttendanceJournal $attendanceJournal, UpdateAttendanceJournalRequest $request)
    {
        $data = $request->validated();
        $attendance = $this->attendance->getStudent($data['student_id']);

        if ($data['status'] == AttendanceEnum::PRESENT->value) {
            $this->attendance->update($attendance->id, ['point' => $attendance->point + 1]);
        }

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            if ($attendanceJournal->proof == null) {
                $data['proof'] = $request->file('proof')->store(UploadDiskEnum::ATTENDANCE_JOURNAL->value, 'public');
            } else {
                $this->remove($attendanceJournal->proof);
                $data['proof'] = $request->file('proof')->store(UploadDiskEnum::ATTENDANCE_JOURNAL->value, 'public');
            }
        } else {
            $data['proof'] = $attendanceJournal->proof;
        }

        return $data;
    }

    public function delete(AttendanceJournal $attendanceJournal)
    {
        if ($attendanceJournal->proof != null) {
            $this->remove($attendanceJournal->proof);
        }
    }
}
