<?php

namespace App\Exports;

use App\Enums\DayEnum;
use App\Models\Classroom;
use App\Models\JadwalPelajaran;
use App\Models\LessonHour;
use App\Models\SchoolYear;
use App\Models\TeacherSubject;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

use function PHPSTORM_META\map;

class JadwalPelajaranExport implements WithHeadings, WithEvents
{
    use RegistersEventListeners;

    public function headings(): array
    {
        return [
            'Jam Ke',
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
        ];
    }

    public static function afterSheet(\Maatwebsite\Excel\Events\AfterSheet $event)
    {
        $jam = LessonHour::where('day', DayEnum::MONDAY->value)->get();
        $sheet = $event->sheet->getDelegate();

        // Merge cell
        $sheet->mergeCells('B1:G1');

        // Set cell value
        $class = Classroom::select('name')->get();
        $classrooms = [];
        foreach ($class as $value) {
            $classrooms[] = $value->name;
        }

        $validationD = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
        $validationD->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $validationD->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $validationD->setAllowBlank(false);
        $validationD->setShowInputMessage(true);
        $validationD->setShowErrorMessage(true);
        $validationD->setShowDropDown(true);
        $validationD->setFormula1(sprintf('"%s"', implode(',', $classrooms)));
        $sheet->getCell("B1")->setDataValidation($validationD);

        $schoolYears = SchoolYear::all();
        $years = [];
        foreach ($schoolYears as $value) {
            $years[] = $value->school_year;
        }

        $validationD = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
        $validationD->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $validationD->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $validationD->setAllowBlank(false);
        $validationD->setShowInputMessage(true);
        $validationD->setShowErrorMessage(true);
        $validationD->setShowDropDown(true);
        $validationD->setFormula1(sprintf('"%s"', implode(',', $years)));
        $sheet->getCell("I2")->setDataValidation($validationD);

        $sheet->setCellValue("I2", $years[0]);
        $sheet->getStyle('B1')->getAlignment()->setHorizontal('center')->setVertical('center');

        // Merge cell
        $sheet->mergeCells('A1:A2');

        // Set cell value
        $sheet->setCellValue('A1', 'Jam Ke');
        $sheet->setCellValue('B2', "Senin");
        $sheet->setCellValue('C2', "Selasa");
        $sheet->setCellValue('D2', "Rabu");
        $sheet->setCellValue('E2', "Kamis");
        $sheet->setCellValue('F2', "Jumat");
        $sheet->setCellValue('G2', "Sabtu");
        $sheet->setCellValue('I1', "Tahun Ajaran");

        // Mengatur lebar kolom
        $columns = ['B', 'C', 'D', 'E', 'F', 'G'];
        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setWidth(20);
        }

        // Terapkan pembungkusan teks pada semua kolom (A hingga G)
        $sheet->getStyle('A1:G50')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true, // Mengaktifkan pembungkusan teks
            ],
        ]);

        // Menambahkan data jam ke dalam kolom A
        $row = 3;
        foreach ($jam as $item) {
            $sheet->setCellValue("A$row", $item->name != 'Istirahat' ? explode(' - ', $item->name)[1] : $item->name);
            $row++;
        }

        // Data untuk dropdown Mapel
        $mapelOptions = TeacherSubject::with(['employee.user', 'subject'])->get();
        $mapelOptionsArray = $mapelOptions->map(fn($item) => "{$item->subject->name} - {$item->employee->user->name}")->toArray();
        $mapelDropdown = implode(',', $mapelOptionsArray);

        // Set data validation untuk kolom B sampai G pada rentang baris 3 sampai 100
        for ($row = 3; $row <= $jam->count() + 2; $row++) {
            foreach ($columns as $column) {
                $validation = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
                $validation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                $validation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
                $validation->setAllowBlank(false);
                $validation->setShowInputMessage(true);
                $validation->setShowErrorMessage(true);
                $validation->setShowDropDown(true);
                $validation->setFormula1(sprintf('"%s"', $mapelDropdown));
                $sheet->getCell("$column{$row}")->setDataValidation($validation);
            }
        }
    }
}
