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
        SchoolPoint::factory()->create(['max_points' => 200]);
    }
}
