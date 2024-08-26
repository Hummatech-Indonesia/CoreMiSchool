<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Regulation;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation as DataValidationType;

class StudentViolationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $siswaList = Student::with('user')->get()->pluck('user.name')->toArray();
        $pelanggaranList = Regulation::pluck('violation')->toArray();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Nama Siswa');
        $sheet->setCellValue('B1', 'Jenis Pelanggaran');

        // Lebarkan kolom sesuai dengan isinya
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);

        // Style untuk header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => Color::COLOR_DARKBLUE,
                ],
            ],
        ];

        // Terapkan style ke A1 dan B1
        $sheet->getStyle('A1:B1')->applyFromArray($headerStyle);

        // Set tingginya agar lebih jelas
        $sheet->getRowDimension(1)->setRowHeight(20);

        $dropdownCellA = 'A2:A100';
        $validationA = $sheet->getCell('A2')->getDataValidation();
        $validationA->setType(DataValidationType::TYPE_LIST);
        $validationA->setErrorStyle(DataValidationType::STYLE_INFORMATION);
        $validationA->setAllowBlank(false);
        $validationA->setShowInputMessage(true);
        $validationA->setShowErrorMessage(true);
        $validationA->setShowDropDown(true);
        $validationA->setFormula1('"' . implode(',', $siswaList) . '"');

        foreach (range(2, 100) as $row) {
            $sheet->getCell("A$row")->setDataValidation(clone $validationA);
        }

        $dropdownCellB = 'B2:B100';
        $validationB = $sheet->getCell('B2')->getDataValidation();
        $validationB->setType(DataValidationType::TYPE_LIST);
        $validationB->setErrorStyle(DataValidationType::STYLE_INFORMATION);
        $validationB->setAllowBlank(false);
        $validationB->setShowInputMessage(true);
        $validationB->setShowErrorMessage(true);
        $validationB->setShowDropDown(true);
        $validationB->setFormula1('"' . implode(',', $pelanggaranList) . '"');

        foreach (range(2, 100) as $row) {
            $sheet->getCell("B$row")->setDataValidation(clone $validationB);
        }

        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/siswa-pelanggaran.xlsx');
        $writer->save($filePath);
    }
}
