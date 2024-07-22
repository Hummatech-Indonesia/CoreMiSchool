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
        $days = [
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday',
        ];

        $data = [];
        $startTime = Carbon::parse('07:00');

        foreach ($days as $day) {
            foreach (range(1, 14) as $time) {
                $start = $startTime->copy();
                $end = $start->copy()->addMinutes(45);

                $data[] = [
                    "day" => $day,
                    "name" => $time == 4 || $time == 7 ? 'Istirahat' : 'Jam ke - '. $time,
                    "start" => $start->toDateTimeString(),
                    "end" => $end->toDateTimeString()
                ];

                $startTime = $end;
            }
        }

        LessonHour::insert($data);

    }
}
