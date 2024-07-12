<?php

namespace Database\Seeders;

use App\Models\LessonHour;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        $startTime = Carbon::parse('07:00');

        foreach (range(1, 14) as $time) {
            $start = $startTime->copy();
            $end = $start->copy()->addMinutes(45);

            $data[] = [
                "name" => "Jam ke $time",
                "school_id" => 1,
                "start" => $start->toDateTimeString(),
                "end" => $end->toDateTimeString()
            ];

            $startTime = $end;
        }

        LessonHour::insert($data);

    }
}
