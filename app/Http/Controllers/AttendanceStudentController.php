<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enums\AttendanceEnum;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Rfid;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceStudentController extends Controller
{
    private AttendanceInterface $attendance;
    private ModelHasRfidInterface $modelHasRfid;
    private RfidInterface $rfid;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomStudentInterface $classroomStudent;
    private StudentInterface $student;
    private AttendanceService $service;

    public function __construct(AttendanceInterface $attendance, StudentInterface $student, AttendanceRuleInterface $attendanceRule, ClassroomStudentInterface $classroomStudent, AttendanceService $service, RfidInterface $rfid)
    {
        $this->attendance = $attendance;
        $this->rfid = $rfid;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->classroomStudent = $classroomStudent;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreAttendanceRequest $request, string $school_id)
    {
        $data = $request->validated();

        $rfid = $this->rfid->where($data['rfid']);
        if (!$rfid) return redirect()->back()->with('error', 'Rfid belum terdaftarkan');

        $user = $this->modelHasRfid->whereRfid($data['rfid']);
        if (!$user) return redirect()->back()->with('error', 'Data tidak tersedia');

        $time = Carbon::parse(now());
        $day = $time->format('l');

        $this->student->show($user->model_id);

        $rule = $this->attendanceRule->showByDay($school_id, $day);
        if ($rule->is_holiday == 1) return redirect()->back()->with('warning', 'Hari ini libur ');
        if ($time > $rule->checkin_start) return redirect()->back()->with('warning', 'Absen sudah melebihi jamnya');

        $classroomStudent = $this->classroomStudent->whereStudent($user->model_id);

        $data = $this->service->storeByStudent($time->format('h:i:s'), $classroomStudent->id, AttendanceEnum::PRESENT->value);
        $this->attendance->store($data);

        return redirect()->back()->with('success', 'Berhasil absen');
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
    public function update(UpdateAttendanceRequest $request, string $id)
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
