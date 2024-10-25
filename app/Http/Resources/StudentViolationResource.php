<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentViolationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type_violation' => $this->regulation->violation,
            'date' => Carbon::parse($this->created_at)->format('d M Y'),
            'point' => $this->regulation->point,
        ];
    }
}
