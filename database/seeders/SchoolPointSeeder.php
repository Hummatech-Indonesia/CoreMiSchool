<?php

namespace Database\Seeders;

use App\Models\SchoolPoint;
use Illuminate\Database\Seeder;

class SchoolPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolPoint::factory()->create([
            'start_point' => 100,
            'end_point' => 150,
            'description' => 'Peringatan pertama'
        ]);
    }
}
