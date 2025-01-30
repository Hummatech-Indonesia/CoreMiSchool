<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Services\MonthlyRecapService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Http\Request;

class MonthlyStudentRecap implements FromView, ShouldAutoSize, WithStyles
{
    protected $classroom;
    private MonthlyRecapService $monthlyRecapService;
    private Request $request;
    private $monthName;

    public function __construct($classroom, Request $request, MonthlyRecapService $monthlyRecapService, $monthName)
    {
        $this->classroom = $classroom;
        $this->request = $request;
        $this->monthName = $monthName;
        $this->monthlyRecapService = $monthlyRecapService;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('school.export.monthly-recap-student-attendance', [
            'month' => $this->monthName,
            'items' => $this->monthlyRecapService->student($this->classroom, $this->request),
            'classroom' => $this->classroom
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $fullRange = "A1:{$highestColumn}{$highestRow}";
        $sheet->getStyle($fullRange)->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        $nameColumnRange = "C10:C{$highestRow}";
        $sheet->getStyle($nameColumnRange)->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->getStyle("A4:D6")->getAlignment()
        ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->getStyle("A8:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],  
            ],
        ]);

        $headerRange = "A8:{$highestColumn}9"; 
        $sheet->getStyle($headerRange)->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['argb' => 'FFFF00'],
            ],
        ]);

        $sheet->getStyle("A1:A2")->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
    }   
}
