<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'day' => Carbon::parse($this->created_at)->translatedFormat('l'),
            'date' => Carbon::parse($this->created_at)->translatedFormat('d'),
            'month' => Carbon::parse($this->created_at)->translatedFormat('M'),
            'date_complate' => Carbon::parse($this->created_at)->translatedFormat('l, j F Y'),
            'check_in' => $this->checkin == null ? '-' : \Carbon\Carbon::parse($this->checkin)->format('H:i'),
            'check_out' => $this->checkout == null ? '-' : \Carbon\Carbon::parse($this->checkout)->format('H:i'),
            'status' => $this->status->label(),
        ];
    }
}
