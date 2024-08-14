<?php

namespace App\Imports;

use App\Models\ClassroomStudent;
use Illuminate\Support\Str;
use App\Models\Classroom;
use App\Models\Religion;
use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\LevelClass;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\BeforeSheet;

class ClassStudentImport implements ToModel, WithHeadingRow, WithEvents
{
    protected $sheetName;

    public function model(array $row)
    {
        if (in_array($row['data_kelas'], ['Data Kelas', 'tingkatan kelas', 'NAMA', 'Contoh Format(Jangan Dihapus)']) || $row['data_kelas'] == null) {
            return null;
        }

        $user = User::where('email', $row[1])->first();

        if ($user) {
            return null;
        } else {
            if ($row['data_kelas'] != 'nama guru') {
                $user = User::create([
                    'name' => $row['data_kelas'] ?? null,
                    'email' => $row[1],
                    'slug' => Str::slug($row['data_kelas']),
                    'password' => $row[2],
                ]);
            }
        }

        $studentId = "";
        if ($row['data_kelas'] != 'nama guru') {
            $user->assignRole(RoleEnum::STUDENT->value);
            $birthDate = $row['jika_ingin_menambahkan_kelas_baru_silahkan_menambahkan_sheet_baru_sesuai_nama_kelasnya'] ? Carbon::instance(Date::excelToDateTimeObject($row['jika_ingin_menambahkan_kelas_baru_silahkan_menambahkan_sheet_baru_sesuai_nama_kelasnya'])) : null;

            $data = [
                'user_id' => $user->id,
                'nisn'        => $row[2],
                'religion_id' => Religion::where('name', $row[12])->first()->id,
                'gender' => $row[5] == 'Laki-laki' ? 'male' : 'female',
                'birth_date' => $birthDate,
                'birth_place' => $row[4],
                'address' => $row[9],
                'nik' => $row[6],
                'number_kk' => $row[7],
                'number_akta' => $row[8],
                'order_child' => $row[10],
                'count_siblings' => $row[11]
            ];

            if (in_array(null, $data)) {
                $user->delete();
                return null;
            }

            $student = Student::create($data);
            $studentId = $student->id;
        }

        $classroom = Classroom::where('name', $this->sheetName)->first();
        $employee = Employee::whereRelation('user', 'name', $row[1])->first();

        $class_id = "";

        if (!$classroom) {
            $school_year = SchoolYear::where('active', true)->first();
            $level_class = LevelClass::where('name', 'Kelas 10')->first();

            $class_id = Classroom::create([
                'name' => $this->sheetName,
                'employee_id' => $employee->id,
                'school_year_id' => $school_year->id,
                'level_class_id' => $level_class->id,
            ])->id;
        } else {
            $class_id = $classroom->id;
        }

        if ($row['data_kelas'] != 'nama guru') {
            ClassroomStudent::create([
                'student_id' => $studentId,
                'classroom_id' => $class_id,
            ]);
        }

    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $this->sheetName = $event->getSheet()->getTitle();
            },
        ];
    }
}
