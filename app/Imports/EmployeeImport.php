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

class EmployeeImport implements ToModel
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

        $data = [
            'nip'        => $row[2],
            'birth_date' => Carbon::parse($row[4])->format('Y-m-d'),
            'birth_place' => $row[3],
            'gender' => $row[5] == 'Laki-laki' ? 'male' : 'female',
            'nik' => $row[6],
            'phone_number' => $row[7],
            'address' => $row[8],
            'status' => RoleEnum::STAFF->value,
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
