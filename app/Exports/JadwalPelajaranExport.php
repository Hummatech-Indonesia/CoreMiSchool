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

        // Debug: Tampilkan data jam
        // Uncomment untuk melihat hasil debug di log atau output
        // \Log::info($jam);

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

        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);

        $sheet->getStyle('A1:G50')->applyFromArray([
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Menambahkan data jam ke dalam kolom A
        $row = 3; // Baris dimulai dari 3
        foreach ($jam as $item) {
            if ($item->name != 'Istirahat') {
                $numberArray = explode(' - ', $item->name);
                $sheet->setCellValue("A$row", $numberArray[1]);
            } else {
                $sheet->setCellValue("A$row", $item->name);
            }
            $sheet->getStyle('A1')->getAlignment()->setHorizontal('center')->setVertical('center');
            $row++;
        }

        // Data untuk dropdown Mapel
        $mapelOptions = TeacherSubject::with(['employee.user', 'subject'])->get();

        $mapelOptionsArray = $mapelOptions->map(function ($item) {
            // Pastikan untuk mengakses kolom yang benar sesuai dengan relasi yang di-load
            $mapelName = $item->subject->name ?? 'N/A'; // Mengambil nama mapel
            $employeeName = $item->employee->user->name ?? 'N/A'; // Mengambil nama employee

            return "{$mapelName} - {$employeeName}";
        })->toArray();

        // dd($mapelOptionsArray);

        // Mengkonversi data mapel menjadi string yang sesuai untuk Excel dropdown
        $mapelDropdown = implode(',', $mapelOptionsArray);

        // Set data validation untuk kolom D (Mapel) pada rentang baris 3 sampai 100
        for ($row = 3; $row <= $jam->count() + 2; $row++) {

            // Create new validation object for each cell

            // D column
            $validationD = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
            $validationD->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $validationD->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $validationD->setAllowBlank(false);
            $validationD->setShowInputMessage(true);
            $validationD->setShowErrorMessage(true);
            $validationD->setShowDropDown(true);
            $validationD->setFormula1(sprintf('"%s"', $mapelDropdown));
            $sheet->getCell("B{$row}")->setDataValidation($validationD);

            $validationD = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
            $validationD->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $validationD->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $validationD->setAllowBlank(false);
            $validationD->setShowInputMessage(true);
            $validationD->setShowErrorMessage(true);
            $validationD->setShowDropDown(true);
            $validationD->setFormula1(sprintf('"%s"', $mapelDropdown));
            $sheet->getCell("C{$row}")->setDataValidation($validationD);

            $validationD = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
            $validationD->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $validationD->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $validationD->setAllowBlank(false);
            $validationD->setShowInputMessage(true);
            $validationD->setShowErrorMessage(true);
            $validationD->setShowDropDown(true);
            $validationD->setFormula1(sprintf('"%s"', $mapelDropdown));
            $sheet->getCell("D{$row}")->setDataValidation($validationD);

            // E column
            $validationE = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
            $validationE->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $validationE->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $validationE->setAllowBlank(false);
            $validationE->setShowInputMessage(true);
            $validationE->setShowErrorMessage(true);
            $validationE->setShowDropDown(true);
            $validationE->setFormula1(sprintf('"%s"', $mapelDropdown));
            $sheet->getCell("E{$row}")->setDataValidation($validationE);

            // F column
            $validationF = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
            $validationF->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $validationF->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $validationF->setAllowBlank(false);
            $validationF->setShowInputMessage(true);
            $validationF->setShowErrorMessage(true);
            $validationF->setShowDropDown(true);
            $validationF->setFormula1(sprintf('"%s"', $mapelDropdown));
            $sheet->getCell("F{$row}")->setDataValidation($validationF);

            // G column
            $validationG = new \PhpOffice\PhpSpreadsheet\Cell\DataValidation();
            $validationG->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
            $validationG->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
            $validationG->setAllowBlank(false);
            $validationG->setShowInputMessage(true);
            $validationG->setShowErrorMessage(true);
            $validationG->setShowDropDown(true);
            $validationG->setFormula1(sprintf('"%s"', $mapelDropdown));
            $sheet->getCell("G{$row}")->setDataValidation($validationG);
        }
    }
}
