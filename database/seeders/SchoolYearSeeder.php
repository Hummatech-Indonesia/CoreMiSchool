<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = [
            [
                'school_year' => '2021/2022',
                'active' => '0',
            ],
            [
                'school_year' => '2022/2023',
                'active' => '0',
            ],
            [
                'school_year' => '2023/2024',
                'active' => '0',
            ],
            [
                'school_year' => '2024/2025',
                'active' => '1',
            ]
        ];

        foreach ($year as $item => $data) {
            SchoolYear::create([
                'school_year' => $data['school_year'],
                'school_id' => '1',
                'active' => $data['active']
            ]);
        };
    }
}
