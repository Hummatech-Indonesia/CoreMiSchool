<?php

namespace App\Http\Controllers\imports;

use App\Enums\DayEnum;
use App\Models\Classroom;
use App\Models\LessonHour;
use App\Models\SchoolYear;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use App\Models\LessonSchedule;
use App\Models\TeacherSubject;
use App\Models\JadwalPelajaran;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JadwalPelajaranImport;
use PhpOffice\PhpSpreadsheet\IOFactory;
use function PHPUnit\Framework\returnSelf;

class ImportController extends Controller
{
    public function importSpreadsheet(Request $request)
    {
        // Load the spreadsheet
        $spreadsheet = IOFactory::load($request->file('file'));
        $worksheet = $spreadsheet->getActiveSheet();

        // Get merged cells
        $mergedCells = $worksheet->getMergeCells();

        // Prepare an array to hold the formatted results
        $formattedMergedCells = [];

        $highestRow = $worksheet->getHighestRow();

        // get schoolYear
        $schoolYear = $worksheet->getCell('I2')->getValue();
        $schoolYear = SchoolYear::where('school_year', $schoolYear)->first();

        // get classroom
        $classroom = $worksheet->getCell('B1')->getValue();
        $classroom = Classroom::where('name', $classroom)->first();

        // Iterate over each merged cell range and format
        foreach ($mergedCells as $range) {
            list($startCell, $endCell) = explode(':', $range);
            $formattedMergedCells[$startCell] = $endCell;
        }

        // Days and corresponding columns
        $days = [
            'senin' => 'B',
            'selasa' => 'C',
            'rabu' => 'D',
            'kamis' => 'E',
            'jumat' => 'F',
            'sabtu' => 'G'
        ];

        $dataSchedule = [];

        for ($row = 3; $row < $highestRow; $row++) {
            foreach ($days as $day => $column) {
                $cellValue = $worksheet->getCell("$column$row")->getValue();
                if ($cellValue) {
                    // Get the start and end times
                    $startCell = "A$row";
                    $startTime = $worksheet->getCell($startCell)->getValue();

                    // Calculate end row from merged cells, fallback to start if not merged
                    $endRow = preg_replace('/\D/', '', $formattedMergedCells["$column$row"] ?? $row);
                    $endTime = $worksheet->getCell("A$endRow")->getValue();

                    $value = explode(' - ', $cellValue);
                    $mapleName = $value[0];
                    $teacherName = $value[1];

                    // dd(LessonHour::where('name', 'LIKE', "%$endTime%",)->first(), LessonHour::where('name', 'LIKE', "%$startTime%")->first());

                    // Append data to the schedule
                    try {

                        $dataSchedule[] = [
                            'teacher_subject_id' => TeacherSubject::whereHas('employee.user', function ($q) use ($teacherName) {
                                $q->where('name', $teacherName);
                            })->whereHas('subject', function ($q) use ($mapleName) {
                                $q->where('name', $mapleName);
                            })->first()->id,
                            'lesson_hour_start' => LessonHour::where('name', "Jam ke - $startTime")->first()->id,
                            'lesson_hour_end' => LessonHour::where('name', "Jam ke - $endTime")->first()->id,
                            'school_year_id' => $schoolYear->id,
                            'classroom_id' => $classroom->id,
                            'day' => DayEnum::translate($day)                       // 'merge_start' => "$column$row",
                            // 'merge_end' => $formattedMergedCells["$column$row"] ?? $row
                        ];
                    } catch (\Exception $e) {
                        // Log the error or handle it as needed
                        // dd($e->getMessage());
                        // return back()->with('error', $e->getMessage());
                        dd($startTime, $endTime, $day);
                    }
                }
            }
        }

        // You can return or process the $dataSchedule further as needed

        // Print the formatted result
        // dd($dataSchedule);
        // return $dataSchedule;
        if (LessonSchedule::insert($dataSchedule)) {
            return back()->with('success', 'Import data jadwal pelajaran berhasil');
        }
    }
}
