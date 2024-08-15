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

class ClassroomSheets implements WithTitle, WithEvents, ShouldAutoSize, WithStyles
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
    
                $sheet->setCellValue('A1', 'Nama kelas');
                $sheet->setCellValue('B1', $this->classroom->name);
    
                $sheet->setCellValue('A2', 'Wali kelas');
                $sheet->setCellValue('B2', $this->classroom->employee->user->name);
    
                $sheet->setCellValue('A4', 'Nama');
                $sheet->setCellValue('B4', 'Email');
                $sheet->setCellValue('C4', 'NISN');
                $sheet->setCellValue('D4', 'Tanggal Lahir');
                $sheet->setCellValue('E4', 'Tempat Lahir');
                $sheet->setCellValue('F4', 'Jenis Kelamin');
                $sheet->setCellValue('G4', 'NIK');
                $sheet->setCellValue('H4', 'No KK');
                $sheet->setCellValue('I4', 'No Akta');
                $sheet->setCellValue('J4', 'Alamat');
                $sheet->setCellValue('K4', 'Anak-ke');
                $sheet->setCellValue('L4', 'Jumlah Saudara');
                $sheet->setCellValue('M4', 'Agama');
    
                // Tambahkan data contoh
                $sheet->setCellValue('A5', 'Contoh Format(Jangan Dihapus)');
                $sheet->setCellValue('B5', 'contohformat@gmail.com');
                $sheet->setCellValue('C5', '2876376');
                $sheet->setCellValue('D5', '1/3/1900');
                $sheet->setCellValue('E5', 'Malang');
                $sheet->setCellValue('F5', 'Laki-laki');
                $sheet->setCellValue('G5', '0037896');
                $sheet->setCellValue('H5', '003768675');
                $sheet->setCellValue('I5', '0036564256');
                $sheet->setCellValue('J5', 'Jl Krajan Gampingan');
                $sheet->setCellValue('K5', '2');
                $sheet->setCellValue('L5', '2');
                $sheet->setCellValue('M5', 'Kristen');
    
                $genderValidation = $sheet->getCell('F5')->getDataValidation();
                $genderOptions = 'Laki-laki,Perempuan';
                $genderValidation->setType(DataValidation::TYPE_LIST);
                $genderValidation->setFormula1('"' . $genderOptions . '"');
                $genderValidation->setAllowBlank(false);
                $genderValidation->setShowDropDown(true);
                $sheet->getCell('F5')->setDataValidation($genderValidation);
    
                $religionValidation = $sheet->getCell('M5')->getDataValidation();
                $religionOptions = 'Kristen,Islam,Hindu,Budha,Katolik,Konghucu'; 
                $religionValidation->setType(DataValidation::TYPE_LIST);
                $religionValidation->setFormula1('"' . $religionOptions . '"');
                $religionValidation->setAllowBlank(false);
                $religionValidation->setShowDropDown(true);
                $sheet->getCell('M5')->setDataValidation($religionValidation);
            }
        ];
    }    

    public function styles(Worksheet $sheet)
    {
        // Mendeteksi baris dan kolom tertinggi
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        
        // Pastikan kolom M adalah kolom terakhir
        $highestColumn = 'M';
    
        // Mengatur perataan teks di seluruh sheet
        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);
    
        // Mewarnai baris A4 sampai M4 dengan warna biru
        $row4Range = "A4:M4";
        $sheet->getStyle($row4Range)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => '0000FF'], // Warna background biru
            ],
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF'
                ]
            ],
        ]);
    
        // Mewarnai baris A5 sampai M5 dengan warna merah
        $row5Range = "A5:M5";
        $sheet->getStyle($row5Range)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FF0000'], // Warna background merah
            ],
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF'
                ]
            ],
        ]);
    }
      
}
