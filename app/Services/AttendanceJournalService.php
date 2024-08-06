<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Enums\AttendanceEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\StoreAttendanceJournalRequest;
use App\Http\Requests\UpdateAttendanceJournalRequest;
use App\Http\Requests\UpdateTeacherJournalRequest;
use App\Models\AttendanceJournal;
use App\Models\TeacherJournal;
use App\Traits\UploadTrait;

class AttendanceJournalService
{
    use UploadTrait;

    private AttendanceInterface $attendance;
    private AttendanceJournalInterface $attendanceJournal;
    private LessonScheduleInterface $lessonSchedule;
    private LessonHourInterface $lessonHour;

    public function __construct(AttendanceInterface $attendance, AttendanceJournalInterface $attendanceJournal, LessonScheduleInterface $lessonSchedule, LessonHourInterface $lessonHour)
    {
        $this->attendance = $attendance;
        $this->attendanceJournal = $attendanceJournal;
        $this->lessonSchedule = $lessonSchedule;
        $this->lessonHour = $lessonHour;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function storeJournal($attendance, TeacherJournal $teacherJournal): void
    {
        $rules = $this->lessonSchedule->show($teacherJournal->lesson_schedule_id);
        $min = $this->lessonHour->whereBetween($rules->start->start, $rules->end->start, $rules->day);

        foreach ($attendance as $key => $value) {
            $data['teacher_journal_id'] = $teacherJournal->id;
            $data['classroom_student_id'] = $key;
            $data['status'] = $value == 'present' ? AttendanceEnum::PRESENT->value : ($value == 'permit' ? AttendanceEnum::PERMIT->value : ($value == 'sick' ? AttendanceEnum::SICK->value : ($value == 'alpha' ? AttendanceEnum::ALPHA->value : '')));
            $this->attendanceJournal->store($data);

            // dd($key);
            $rule = $this->attendance->getClassroomStudent($key);
            // dd($rule->id);
            $this->attendance->update($rule->id, ['point' => $rule->point - $min]);

        }
    }

    public function updateJournal(UpdateTeacherJournalRequest $request, string $id): void
    {
        $data = $request->validated();

        foreach ($data['students'] as $item) {

            // dd($item);
            if (isset($item['action'])) {
                if ($item["action"] == 'update' && isset($item['classroom_student_id'])) {

                    $this->attendance->updateWithAttribute(
                        [
                            'model_type' => 'App\Models\ClassroomStudent',
                            'model_id' => $item['classroom_student_id'],
                        ],
                        ['point' => 14]
                    );
                    $this->attendanceJournal->update($item['id'], [
                        'classroom_student_id' => $item['classroom_student_id'],
                        'lesson_hour_id' => $item['lesson_hour_id'],
                        'status' => $item['status'] == 'present' ? AttendanceEnum::PRESENT->value : ($item['status'] == 'permit' ? AttendanceEnum::PERMIT->value : ($item['status'] == 'sick' ? AttendanceEnum::SICK->value : ($item['status'] == 'alpha' ? AttendanceEnum::ALPHA->value : ''))),
                    ]);
                } else if ($item["action"] == 'delete' && $item['classroom_student_id'] != 'undefined') {
                    $this->attendance->updateWithAttribute(
                        [
                            'model_type' => 'App\Models\ClassroomStudent',
                            'model_id' => $item['classroom_student_id'],
                        ],
                        ['point' => 14]
                    );

                    $this->attendanceJournal->delete($item['id']);
                }
            } else {
                $attendance = $this->attendance->getClassroomStudent($item['classroom_student_id']);
                $this->attendanceJournal->store([
                    'teacher_journal_id' => $id,
                    'classroom_student_id' => $item['classroom_student_id'],
                    'lesson_hour_id' => $item['lesson_hour_id'],
                    'status' => $item['status'] == 'present' ? AttendanceEnum::PRESENT->value : ($item['status'] == 'permit' ? AttendanceEnum::PERMIT->value : ($item['status'] == 'sick' ? AttendanceEnum::SICK->value : ($item['status'] == 'alpha' ? AttendanceEnum::ALPHA->value : ''))),
                ]);

                $this->attendance->update($attendance->id, ['point' => $attendance->point - 1]);
            }
        }
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
