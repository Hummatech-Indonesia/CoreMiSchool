<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\HistoryAttendanceResource;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class TeacherApiController extends Controller
{
    private EmployeeInterface $employee;
    private ClassroomInterface $classroom;
    private AttendanceInterface $attendance;

    public function __construct(EmployeeInterface $employee, ClassroomInterface $classroom, AttendanceInterface $attendance)
    {
        $this->employee = $employee;
        $this->classroom = $classroom;
        $this->attendance = $attendance;
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
        $todayAttendance = $this->attendance->userToday('App\Models\Employee', $employee->id);
        $history_attendance = $this->attendance->whereUser($employee->id, 'App\Models\Employee');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
        'attendance_today' =>  HistoryAttendanceResource::collection($todayAttendance ?? null),
        'attendance_history' => HistoryAttendanceResource::collection($history_attendance),
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
