<?php

namespace App\Imports;

use App\Enums\RoleEnum;
use App\Models\Religion;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] == 'NAMA' || $row[0] == null || $row[0] == 'Contoh Format (Jangan Dihapus)') {
            return null;
        }

        $user = User::create([
            'name' => $row[0] ?? null,
            'email' => $row[1],
            'slug' => Str::slug($row[0]),
            'password' => Hash::make('password')
        ]);

        $user->assignRole(RoleEnum::STAFF->value);

        $birthDate = $row[4] ? Carbon::instance(Date::excelToDateTimeObject($row[4])) : null;

        $data = [
            'nip'        => $row[2],
            'birth_date' => $birthDate,
            'birth_place' => $row[3],
            'gender' => $row[5] == 'Laki-laki' ? 'male' : 'female',
            'nik' => $row[6],
            'phone_number' => $row[8],
            'address' => $row[9],
            'status' => RoleEnum::STAFF->value,
            'school_id' => auth_school()->id,
            'religion_id' => Religion::where('name', $row[7])->first()->id,
            'user_id' => $user->id
        ];

        if (in_array(null, $data)) {
            $user->delete();
            return null;
        }

        Student::create($data);
    }
}
