<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryAttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hari' => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l'),
            'tanggal' => \Carbon\Carbon::parse($this->created_at)->translatedFormat('d F Y'),
            'masuk' => $this->checkin == null ? '-' : \Carbon\Carbon::parse($this->checkin)->format('H:i'),
            'pulang' => $this->checkout == null ? '-' : \Carbon\Carbon::parse($this->checkout)->format('H:i'),
            'status' => $this->status->label(),
        ];
    }
}
