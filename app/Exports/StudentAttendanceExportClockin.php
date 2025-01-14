<?php

namespace App\Exports;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Models\Attendance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Http\Request;

class StudentAttendanceExportClockin implements FromView, ShouldAutoSize, WithStyles
{
    protected $classroom_id;
    private AttendanceInterface $attendance;
    private Request $request;

    public function __construct($classroom_id, Request $request, AttendanceInterface $attendance)
    {
        $this->classroom_id = $classroom_id;
        $this->attendance = $attendance;
        $this->request = $request;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('school.export.invoices-attendance-clockin-student', [
            'items' => $this->attendance->exportClassAndDate($this->classroom_id, $this->request)
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        $nameColumnRange = "D7:D{$highestRow}";
        $sheet->getStyle($nameColumnRange)->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->getStyle("A4:D5")->getAlignment()
        ->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->getStyle("A7:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        $headerRange = "A7:{$highestColumn}7";
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
