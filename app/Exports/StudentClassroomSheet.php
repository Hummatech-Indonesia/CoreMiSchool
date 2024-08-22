<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class StudentClassroomSheet implements WithTitle, WithEvents, ShouldAutoSize, WithStyles
{
    protected $classroom;

    public function __construct($classroom)
    {
        $this->classroom = $classroom;
    }

    /**
     * Memberikan nama sheet berdasarkan nama kelas.
     * @return string
     */
    public function title(): string
    {
        return $this->classroom->name; // Nama sheet sesuai nama kelas
    }

    /**
     * Menggunakan AfterSheet untuk menambahkan data ke dalam sheet.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
    
                $teachers = $this->classroom->employee->user->pluck('name')->toArray();
                $list = implode(',', $teachers);
    
                $validation = $sheet->getCell('B2')->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST);
                $validation->setFormula1('"' . $list . '"');
                $validation->setAllowBlank(false);
                $validation->setShowDropDown(true);
                $sheet->getCell('B2')->setDataValidation($validation);
    
                $sheet->setCellValue('A1', 'Nama');
                $sheet->setCellValue('B1', 'Email');
                $sheet->setCellValue('C1', 'NISN');
                $sheet->setCellValue('D1', 'Tanggal Lahir');
                $sheet->setCellValue('E1', 'Tempat Lahir');
                $sheet->setCellValue('F1', 'Jenis Kelamin');
                $sheet->setCellValue('G1', 'NIK');
                $sheet->setCellValue('H1', 'No KK');
                $sheet->setCellValue('I1', 'No Akta');
                $sheet->setCellValue('J1', 'Alamat');
                $sheet->setCellValue('K1', 'Anak-ke');
                $sheet->setCellValue('L1', 'Jumlah Saudara');
                $sheet->setCellValue('M1', 'Agama');
    
                // Tambahkan data contoh
                $sheet->setCellValue('A2', 'Contoh Format(Jangan Dihapus)');
                $sheet->setCellValue('B2', 'contohformat@gmail.com');
                $sheet->setCellValue('C2', '2876376');
                $sheet->setCellValue('D2', '1/3/1900');
                $sheet->setCellValue('E2', 'Malang');
                $sheet->setCellValue('F2', 'Laki-laki');
                $sheet->setCellValue('G2', '0037896');
                $sheet->setCellValue('H2', '003768675');
                $sheet->setCellValue('I2', '0036564256');
                $sheet->setCellValue('J2', 'Jl Krajan Gampingan');
                $sheet->setCellValue('K2', '2');
                $sheet->setCellValue('L2', '2');
                $sheet->setCellValue('M2', 'Kristen');
    
                $genderValidation = $sheet->getCell('F2')->getDataValidation();
                $genderOptions = 'Laki-laki,Perempuan';
                $genderValidation->setType(DataValidation::TYPE_LIST);
                $genderValidation->setFormula1('"' . $genderOptions . '"');
                $genderValidation->setAllowBlank(false);
                $genderValidation->setShowDropDown(true);
                $sheet->getCell('F2')->setDataValidation($genderValidation);
    
                $religionValidation = $sheet->getCell('M2')->getDataValidation();
                $religionOptions = 'Kristen,Islam,Hindu,Budha,Katolik,Konghucu'; 
                $religionValidation->setType(DataValidation::TYPE_LIST);
                $religionValidation->setFormula1('"' . $religionOptions . '"');
                $religionValidation->setAllowBlank(false);
                $religionValidation->setShowDropDown(true);
                $sheet->getCell('M2')->setDataValidation($religionValidation);
            }
        ];
    }    

    public function styles(Worksheet $sheet)
    {
        foreach (range('A', 'M') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
    
        $row4Range = "A1:M1";
        $sheet->getStyle($row4Range)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => '2960FF'], 
            ],
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF'
                ]
            ],
        ]);
    
        $row5Range = "A2:M2";
        $sheet->getStyle($row5Range)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'F73A08'],
            ],
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF'
                ]
            ],
        ]);
    }
}
