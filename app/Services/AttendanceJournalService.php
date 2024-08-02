<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Enums\AttendanceEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\StoreAttendanceJournalRequest;
use App\Http\Requests\UpdateAttendanceJournalRequest;
use App\Models\AttendanceJournal;
use App\Traits\UploadTrait;

class AttendanceJournalService
{
    use UploadTrait;

    private AttendanceInterface $attendance;

    public function __construct(AttendanceInterface $attendance)
    {
        $this->attendance = $attendance;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
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