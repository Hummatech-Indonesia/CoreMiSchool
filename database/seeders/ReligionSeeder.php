<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Religion::factory()->create([
            'name' => 'Islam'
        ]);
        Religion::factory()->create([
            'name' => 'Kristen Protestan'
        ]);
        Religion::factory()->create([
            'name' => 'Katolik'
        ]);
        Religion::factory()->create([
            'name' => 'Hindu'
        ]);
        Religion::factory()->create([
            'name' => 'Budha'
        ]);
        Religion::factory()->create([
            'name' => 'Konghucu'
        ]);
    }
}
