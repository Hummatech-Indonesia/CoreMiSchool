<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enums\AttendanceEnum;
use App\Enums\DayEnum;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Rfid;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceStudentController extends Controller
{
    private AttendanceInterface $attendance;
    private ModelHasRfidInterface $modelHasRfid;
    private RfidInterface $rfid;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomStudentInterface $classroomStudent;
    private StudentInterface $student;
    private AttendanceService $service;

    public function __construct(ModelHasRfidInterface $modelHasRfid, AttendanceInterface $attendance, StudentInterface $student, AttendanceRuleInterface $attendanceRule, ClassroomStudentInterface $classroomStudent, AttendanceService $service, RfidInterface $rfid)
    {
        $this->attendance = $attendance;
        $this->rfid = $rfid;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->classroomStudent = $classroomStudent;
        $this->service = $service;
        $this->modelHasRfid = $modelHasRfid;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $school_id)
    {
        return view('school.pages.test.list-attendance', compact('school_id'));
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

        $time = now();
        $day = strtolower($time->format('l'));
        $clock = $time->format('H:i:s');

        $this->student->show($user->model_id);

        $rule = $this->attendanceRule->showByDay($school_id, $day);

        $presence = $this->attendance->checkPresence($user->model_id, AttendanceEnum::PRESENT->value);

        if ($clock >= $rule->checkin_start && $clock <= $rule->checkin_end) {

            if ($rule->is_holiday == true) return redirect()->back()->with('warning', 'Hari ini libur ');
            if ($time->format('H:i:s') > $rule->checkin_end) return redirect()->back()->with('warning', 'Absen sudah melebihi jamnya');

            if ($presence) return redirect()->back()->with('warning', 'Sudah absen');

            $classroomStudent = $this->classroomStudent->whereStudent($user->model_id);

            $data = $this->service->storeByStudent($time->format('H:i:s'), $classroomStudent->id, AttendanceEnum::PRESENT->value);
            $this->attendance->store($data);

            return redirect()->back()->with('success', 'Berhasil absen');
        } else if ($clock >= $rule->checkout_start && $clock <= $rule->checkout_end) {
            if (!$presence) return redirect()->back()->with('warning', 'Anda belum absen pagi');
            if ($presence->checkout != '00:00:00') return redirect()->back()->with('warning', 'Anda sudah absen pulang');

            $this->attendance->updateCheckOut($user->model_id, ['checkout' => $clock]);
            return redirect()->back()->with('success', 'Berhasil absen keluar');
        } else {
            return redirect()->back()->with('warning', 'Waktu absen sudah melebihi batas waktu');
        }
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
