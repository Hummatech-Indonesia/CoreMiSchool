<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Province;
use App\Models\City;
use App\Models\SubDistrict;
use App\Models\Village;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file_prov = public_path('regional-data/provinsi.json');
        $file_kab = public_path('regional-data/kabupaten.json');
        $file_kec = public_path('regional-data/kecamatan.json');
        $file_kel = public_path('regional-data/kelurahan.json');

        $json_prov = file_get_contents($file_prov);
        $json_kab = file_get_contents($file_kab);
        $json_kec = file_get_contents($file_kec);
        $json_kel = file_get_contents($file_kel);

        $data_prov = json_decode($json_prov, true);
        $data_kab = json_decode($json_kab, true);
        $data_kec = json_decode($json_kec, true);
        $data_kel = json_decode($json_kel, true);

        // Menghilangkan kolom 'code' dari semua $data_
        foreach ($data_prov as $key => &$value) {
            unset($value['code']);
        }
        foreach ($data_kab as $key => &$value) {
            unset($value['code']);
            unset($value['full_code']);
        }
        foreach ($data_kec as $key => &$value) {
            unset($value['code']);
            unset($value['full_code']);
        }
        foreach ($data_kel as $key => &$value) {
            unset($value['code']);
            unset($value['full_code']);
        }

        echo "Memulai proses seeder data Provinsi...\n";
        Province::insert($data_prov);
        echo "Done seeder data Provinsi...\n";

        echo "Memulai proses seeder data Kabupaten...\n";
        City::insert($data_kab);
        echo "Done seeder data Kabupaten...\n";

        $chunk_kec = array_chunk($data_kec, 1000);
        foreach ($chunk_kec as $key => $chunk) {
            echo "Memulai proses seeder data Kecamatan... ke " . $key + 1 . "000\n";
            SubDistrict::insert($chunk);
            echo "Done seeder data Kecamatan... ke " . $key + 1 . "000\n";
        }

        $chunk_kel = array_chunk($data_kel, 1000);
        foreach ($chunk_kel as $key => $chunk) {
            echo "Memulai proses seeder data Kelurahan... ke " . $key + 1 . "000\n";
            Village::insert($chunk);
            echo "Done seeder data Kelurahan... ke " . $key + 1 . "000\n";
        }
    }
}