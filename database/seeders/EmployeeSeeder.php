<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'nip' => '123456789101234567',
            'birth_date' => '',
            'birth_place' => '',
            'genre' => '',
            'nik' => '',
            'phone_number' => '',
            'address' => '',
            'status' => '',
            'active' => '',
            'user_id' => '',
            'religion_id' => '',
            'school_id' => '
            '
        ]);
    }
}
