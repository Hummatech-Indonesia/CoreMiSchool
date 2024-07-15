<?php

namespace Database\Seeders;

use App\Models\ClassroomStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassroomStudent::create([
            'id' => '1',
            'student_id' => '1',
            'classroom_id' => '1',
        ]);
    }
}
