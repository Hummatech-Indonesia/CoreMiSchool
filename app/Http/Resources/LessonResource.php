<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    protected $user;

    public function __construct($resource, $user = null)
    {
        parent::__construct($resource);
        $this->user = $user;
    }

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
            'status' => $this->feedbacks()->whereRelation('student.user', 'id', $this->user->id)->whereDate('created_at', today())->exists() ? 'Sudah' : 'Belum',
        ];
    }
}
