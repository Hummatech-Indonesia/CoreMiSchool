<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name_student' => $this->student->user->name,
            'class_student' => $this->student->classroomStudents()->latest()->first()->classroom->name,
            'summary' => $this->summary,
        ];
    }
}