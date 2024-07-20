<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RfidResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->model_id,
            'rfid' => $this->rfid,
            'name' => $this->model_type ? $this->model->user->name : null,
            'type' => $this->model_type == 'App\Models\Student' ? 'student' : ($this->model_type == 'App\Models\Employee' ? 'teacher' : 'mastercard')
        ];
    }
}
