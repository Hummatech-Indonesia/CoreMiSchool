<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use App\Enums\AttendanceEnum;
use App\Helpers\ResponseHelper;
use App\Services\AttendanceService;
use App\Contracts\Interfaces\RfidInterface;
use App\Http\Requests\StoreAttendanceRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\AttendanceInterface;
use App\Http\Resources\StudentAttendacreResource;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Http\Resources\SingleAttendaceStudentResource;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Http\Resources\StudentPresentAttendacreResource;
// use F9Web\ApiResponseHelpers;

class AttendanceStudentController extends Controller
{
    // use ApiResponseHelpers;
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
    public function index(Request $request)
    {
        // $present = $this->attendance->getSchool($school_id, 'checkin');
        // $out = $this->attendance->getSchool($school_id, 'checkout');
        return view('school.pages.test.list-attendance');
    }

    public function getStudents(Request $request)
    {
        $students = $this->classroomStudent->activeStudents();
        return $this->respondWithSuccess($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->attendances);


        $time = now();
        $day = strtolower($time->format('l'));
        $rule = $this->attendanceRule->showByDay($day, RoleEnum::STUDENT->value);

        if (!$rule) return ResponseHelper::jsonResponse('warning', 'Tidak ada jadwal absensi', null, 404);

        $data = $this->service->insert($request->attendances, $rule, $day);
        $this->attendance->insert($data);

        // $data = $request->validated();

        // $rfid = $this->modelHasRfid->where($data['rfid']);
        // if (!$rfid) return ResponseHelper::jsonResponse('error', 'Rfid belum terdaftarkan', null, 400);

        // $user = $this->modelHasRfid->whereRfid($data['rfid']);
        // if (!$user) return ResponseHelper::jsonResponse('warning', 'Rfid belum terdaftar di sekolah', null, 404);
        // if ($user->model_type === null) return ResponseHelper::jsonResponse('error', 'Data tidak tersedia', null, 400);
        // if ($user->model_type != 'App\Models\Student') return ResponseHelper::jsonResponse('error', 'Rfid bukan siswa/i', null, 400);

        // $time = now();
        // $day = strtolower($time->format('l'));
        // $clock = $time->format('H:i:s');

        // $this->student->show($user->model_id);

        // $rule = $this->attendanceRule->showByDay($day, RoleEnum::STUDENT->value);
        // if (!$rule) return ResponseHelper::jsonResponse('warning', 'Tidak ada jadwal absensi', null, 404);

        // $presence = $this->attendance->checkPresence($user->model_id, AttendanceEnum::PRESENT->value);

        // if ($clock >= $rule->checkin_start && $clock <= $rule->checkin_end) {
        //     if ($rule->is_holiday == true) return ResponseHelper::jsonResponse('warning', 'Hari ini libur ', null, 404);
        //     if ($presence) return ResponseHelper::jsonResponse('warning', 'Sudah absen', null, 404);

        //     $classroomStudent = $this->classroomStudent->whereStudent($user->model_id);
        //     if (!$classroomStudent) return ResponseHelper::jsonResponse('warning', 'Siswa belum memiliki kelas');


        //     if ($clock > $rule->checkin_end) {
        //         $data = $this->service->storeByStudent($clock, $classroomStudent->id, AttendanceEnum::PRESENT->value);
        //         $attendace = $this->attendance->store($data);
        //         return ResponseHelper::jsonResponse('warning', 'Absen sudah melebihi jamnya', null, 200);
        //     }
        //     $data = $this->service->storeByStudent($clock, $classroomStudent->id, AttendanceEnum::PRESENT->value);
        //     $attendace = $this->attendance->store($data);

        //     return ResponseHelper::jsonResponse('success', 'Berhasil Absen');
        // } else if ($clock >= $rule->checkout_start && $clock <= $rule->checkout_end) {
        //     if (!$presence) return ResponseHelper::jsonResponse('warning', 'Anda belum absen pagi', null, 404);
        //     if ($presence->checkout != null) return ResponseHelper::jsonResponse('warning', 'Anda sudah absen pulang', null, 404);

        //     $this->attendance->updateCheckOut($user->model_id, ['checkout' => $clock]);
        //     $attendace = $this->attendance->getStudent($user->model_id);
        //     return ResponseHelper::jsonResponse('success', 'Berhasil absen keluar', [$attendace], 200);
        // } else {
        //     $classroomStudent = $this->classroomStudent->whereStudent($user->model_id);
        //     if (!$classroomStudent) return ResponseHelper::jsonResponse('warning', 'Siswa belum memiliki kelas');

        //     $data = $this->service->storeByStudent($clock, $classroomStudent->id, AttendanceEnum::PRESENT->value);
        //     $attendace = $this->attendance->store($data);

        //     return ResponseHelper::jsonResponse('error', 'Waktu absen sudah melebihi batas waktu', null, 400);
        // }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
