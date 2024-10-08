<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name_subject' => $this->teacherSubject->subject->name,
            'classroom' => $this->classroom->name,
            'hour' => Carbon::parse($this->start->start)->format('H:i'). ' - ' .Carbon::parse($this->end->end)->format('H:i'),
            'date' => Carbon::parse($this->created_at)->translatedFormat('d F Y')
        ];
    }
}
