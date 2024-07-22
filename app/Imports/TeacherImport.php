<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\Religion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TeacherImport implements ToModel
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

        $user->assignRole(RoleEnum::TEACHER->value);

        $birthDate = $row[4] ? Carbon::instance(Date::excelToDateTimeObject($row[4])) : null;

        $data = [
            'nip'        => $row[2],
            'birth_date' => $birthDate,
            'birth_place' => $row[3],
            'gender' => $row[5] == 'Laki-laki' ? 'male' : 'female',
            'nik' => $row[6],
            'phone_number' => $row[8],
            'address' => $row[9],
            'status' => RoleEnum::TEACHER->value,
            'school_id' => auth_school()->id,
            'religion_id' => Religion::where('name', $row[7])->first()->id,
            'user_id' => $user->id
        ];

        if (in_array(null, $data)) {
            $user->delete();
            return null;
        }

        Employee::create($data);
    }
}
