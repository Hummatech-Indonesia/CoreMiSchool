<?php

namespace Database\Seeders;

use App\Models\Maple;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maples = [
            'Matematika',
            'PJOK',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Bahasa Jawa',
            'Pendidikan Agama Islam',
            'Pendidikan Agama Kristen',
            'Pendidikan Agama Katolik',
            'Pendidikan Agama Hindu',
            'Pendidikan Agama Budha',
            'Pendidikan Agama Konghucu',
            'Seni Budaya',
            'Ilmu Pengetahuan Alam',
            'Ilmu Pengetahuan Sosial',
            'Pendidikan Kewarganegaran',
            'Informatika'
        ];

        foreach ($maples as $maple) {
            Maple::create([
                'school_id' => '1',
                'name' => $maple,
                'religion_id' => ($maple == 'Pendidikan Agama Islam' ? '1' : ($maple == 'Pendidikan Agama Kristen' ? '2' : ($maple == 'Pendidikan Agama Katolik' ? '3' : ($maple == 'Pendidikan Agama Hindu' ? '4' : ($maple == 'Pendidikan Agama Budha' ? '5' : ($maple == 'Pendidikan Agama Konghucu' ? '6' : null)))))),
            ]);
        }
    }
}
