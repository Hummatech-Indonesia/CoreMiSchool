<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Services\AttendanceService;
use App\Services\SchoolChartService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceStudentController extends Controller
{
    private AttendanceInterface $attendance;
    private ClassroomInterface $classroom;
    private SchoolYearInterface $schoolyear;
    private SchoolChartService $schoolChartService;

    public function __construct(AttendanceInterface $attendance, ClassroomInterface $classroom, SchoolYearInterface $schoolyear, SchoolChartService $schoolChartService)
    {
        $this->attendance = $attendance;
        $this->classroom = $classroom;
        $this->schoolyear = $schoolyear;
        $this->schoolChartService = $schoolChartService;
    }

    public function index(Request $request)
    {
        $date = $request->input('date', Carbon::today()->format('Y-m-d'));
        $data = $this->schoolChartService->ChartClassroomAttendance($date);
        $categories = $data['classrooms']->toArray(); // Mengambil nama kelas dari data

        $classrooms = $this->classroom->whereInSchoolYears($request);

        $attendanceData = $data['attendances']->map(function ($group) {
            return [
                'present' => $group->where('status', 'present')->count(),
                'permit' => $group->where('status', 'permit')->count(),
                'sick' => $group->where('status', 'sick')->count(),
                'alpha' => $group->where('status', 'alpha')->count(),
            ];
        });

        return view('school.pages.statistic-presence.index', [
            'classrooms' => $classrooms,
            'categories' => $categories,
            'attendanceData' => $attendanceData->reduce(function ($carry, $item) {
                $carry['present'][] = $item['present'];
                $carry['permit'][] = $item['permit'];
                $carry['sick'][] = $item['sick'];
                $carry['alpha'][] = $item['alpha'];
                return $carry;
            }, [
                'present' => [],
                'permit' => [],
                'sick' => [],
                'alpha' => [],
            ]),
            'date' => $date
        ]);
    }

    public function show(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->classAndDate($classroom->id, $request);
        return view('school.pages.statistic-presence.detail-presence', compact('classroom', 'attendances'));
    }

    public function exportPreview(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->classAndDate($classroom->id, $request);
        return view('school.pages.statistic-presence.export.student', compact('classroom', 'attendances'));
    }
}