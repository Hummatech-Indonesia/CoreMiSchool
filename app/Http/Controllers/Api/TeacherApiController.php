<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\HistoryAttendanceResource;
use App\Http\Resources\LessonScheduleResource;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class TeacherApiController extends Controller
{
    private EmployeeInterface $employee;
    private ClassroomInterface $classroom;
    private AttendanceInterface $attendance;
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(EmployeeInterface $employee, ClassroomInterface $classroom, AttendanceInterface $attendance, LessonScheduleInterface $lessonSchedule)
    {
        $this->employee = $employee;
        $this->classroom = $classroom;
        $this->attendance = $attendance;
        $this->lessonSchedule = $lessonSchedule;
    }

    public function class(User $user)
    {
        $employee = $this->employee->getByUser($user->id);
        $classroom = $this->classroom->whereEmployeeId($employee->id);
        return response()->json(['status' => 'success', 'message' => "Data Berhasil di Tambahkan", 'code' => 200, 'data' => [
            'class' => $classroom->name,
            'count_student' => $classroom->classroomStudents()->latest()->count(),
        ]]);
    }

    public function teacher_attendance(User $user)
    {
        $employee = $this->employee->getByUser($user->id);
        $history_attendance = $this->attendance->whereUser($employee->id, 'App\Models\Employee');
        $single_attendance = $this->attendance->userToday('App\Models\Employee', $employee->id);

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
            'attendance_now' => [
                'day' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('l') : now()->translatedFormat('l'),
                'date' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('d') : now()->translatedFormat('d'),
                'month' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('M') : now()->translatedFormat('M'),
                'date_complate' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('l, j F Y') : now()->translatedFormat('l, j F Y'),
                'check_in' => $single_attendance ? ($single_attendance->checkin == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkin)->format('H:i')) : '-',
                'check_out' => $single_attendance ? ($single_attendance->checkout == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkout)->format('H:i')) : '-',
                'status' => $single_attendance ? $single_attendance->status->label() : 'Libur',
            ],
            'attendance_history' => HistoryAttendanceResource::collection($history_attendance),
        ]);
    }

    public function today_lesson_schedule(User $user)
    {
        $teacherSchedules = $this->lessonSchedule->whereTeacher($user->id, today());
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
        // 'lesson_schedule_dashboard' => LessonScheduleResource::collection($teacherSchedules->take(5)),
        'lesson_schedule_all' => LessonScheduleResource::collection($teacherSchedules),
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
