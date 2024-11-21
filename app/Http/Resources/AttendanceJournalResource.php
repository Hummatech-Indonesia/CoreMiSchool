<?php

namespace App\Http\Resources;

use App\Enums\AttendanceEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceJournalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->classroomStudent->id,
            'student' => $this->classroomStudent->student->user->name,
            'nik' => $this->classroomStudent->student->nik,
            'nisn' => $this->classroomStudent->student->nisn,
            'gender' => $this->classroomStudent->student->gender->label(),
            'classroom' => $this->classroomStudent->classroom->name,
            'attendance_status' => $this->status == AttendanceEnum::SICK->value ? AttendanceEnum::SICK->value : ($this->status == AttendanceEnum::PRESENT->value ? AttendanceEnum::PRESENT->value : ($this->status == AttendanceEnum::LATE->value ? AttendanceEnum::LATE->value : ($this->status == AttendanceEnum::ALPHA->value ? AttendanceEnum::ALPHA->value : ($this->status == AttendanceEnum::PERMIT->value ? AttendanceEnum::PERMIT->value : '-')))),
        ];
    }
}
