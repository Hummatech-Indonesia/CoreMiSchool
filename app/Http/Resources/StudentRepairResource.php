<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentRepairResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_repair' => $this->id,
            'type_repair' => $this->repair,
            'start_date' => Carbon::parse($this->start_date)->translatedFormat('d F Y'),
            'end_date' => Carbon::parse($this->end_date)->translatedFormat('d F Y'),
            'status' => $this->is_approved == false ? 'Belum Dikerjakan' : 'Sudah Dikerjakan',
            'point' => $this->point,
        ];
    }
}
