<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryJournalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'subject' => $this->lessonSchedule->teacherSubject->subject->name,
            'classroom' => $this->lessonSchedule->classroom->name,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
        ];
    }
}
