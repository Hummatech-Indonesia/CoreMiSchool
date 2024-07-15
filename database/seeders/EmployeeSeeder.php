<?php

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'id' => '1',
            'nip' => '123456789101234567',
            'birth_date' => now(),
            'birth_place' => 'Malang',
            'gender' => GenderEnum::MALE->value,
            'nik' => '12345678910123',
            'phone_number' => '00000000000',
            'address' => 'Permata Regency',
            'status' => 'teacher',
            'active' => '1',
            'user_id' => '3',
            'religion_id' => '1',
            'school_id' => '1'
        ]);

        Employee::create([
            'id' => '2',
            'nip' => '123456789101234567',
            'birth_date' => now(),
            'birth_place' => 'Malang',
            'gender' => GenderEnum::MALE->value,
            'nik' => '12345678910123',
            'phone_number' => '00000000000',
            'address' => 'Permata Regency',
            'status' => 'staff',
            'active' => '1',
            'user_id' => '5',
            'religion_id' => '1',
            'school_id' => '1'
        ]);
    }
}
