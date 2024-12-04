<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'time' => 'Jam ke ' . explode(' - ', $this->start->name)[1] .' - '. explode(' - ', $this->end->name)[1],
            'name' => $this->teacherSubject->subject->name,
            'class' => $this->classroom->name,
            'teacher' => $this->teacherSubject->employee->user->name,
            'end_time' => $this->end->end,
        ];
    }
}
