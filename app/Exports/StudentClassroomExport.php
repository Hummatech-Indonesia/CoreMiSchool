<?php

namespace App\Exports;

use App\Models\Employee;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Excel;

class StudentClassroomExport implements WithEvents
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $filePath = public_path('file/new-class-format-import-student.xlsx');

                $teachers = Employee::with('user')->get()->pluck('user.name')->toArray();
                $list = implode(',', $teachers);

                $spreadsheet = IOFactory::load($filePath);
                $sheet = $spreadsheet->getActiveSheet();

                $validation = $sheet->getCell('B2')->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST);
                $validation->setFormula1('"' . $list . '"');
                $validation->setAllowBlank(false);
                $validation->setShowDropDown(true);

                $sheet->getCell('B2')->setDataValidation($validation);
                $writer = new Xlsx($spreadsheet);

                $writer->save($filePath);
            }
        ];
    }
}
