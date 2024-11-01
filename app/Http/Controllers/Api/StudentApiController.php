<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\FeedbackInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Contracts\Repositories\AttendanceRepository;
use App\Enums\AttendanceEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\RepairStudentRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Http\Resources\HistoryAttendanceResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\LessonScheduleResource;
use App\Http\Resources\SchoolPointResource;
use App\Http\Resources\StudentFeedbackResource;
use App\Http\Resources\StudentHistoryResource;
use App\Http\Resources\StudentRepairResource;
use App\Http\Resources\StudentViolationResource;
use App\Http\Resources\SubjectResource;
use App\Models\Feedback;
use App\Models\LessonSchedule;
use App\Services\RepairStudentService;
use App\Models\StudentRepair;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\FeedbackService;
use Carbon\Carbon;

class StudentApiController extends Controller
{
    private ClassroomStudentInterface $classroomStudent;
    private StudentViolationInterface $studentViolation;
    private LessonScheduleInterface $lessonSchedule;
    private StudentRepairInterface $studentRepair;
    private SchoolPointInterface $schoolPoint;
    private FeedbackService $feedbackService;
    private AttendanceInterface $attendance;
    private RepairStudentService $service;
    private FeedbackInterface $feedback;
    private StudentInterface $student;

    public function __construct(FeedbackService $feedbackService, LessonScheduleInterface $lessonSchedule, FeedbackInterface $feedback, RepairStudentService $service, StudentRepairInterface $studentRepair, SchoolPointInterface $schoolPoint, StudentViolationInterface $studentViolation, AttendanceInterface $attendance, StudentInterface $student, ClassroomStudentInterface $classroomStudent)
    {
        $this->classroomStudent = $classroomStudent;
        $this->studentViolation = $studentViolation;
        $this->feedbackService = $feedbackService;
        $this->lessonSchedule = $lessonSchedule;
        $this->studentRepair = $studentRepair;
        $this->schoolPoint = $schoolPoint;
        $this->attendance = $attendance;
        $this->feedback = $feedback;
        $this->student = $student;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);
        $lessonSchedule = $this->lessonSchedule->whereDayApi($studentClasses->classroom->id);
        $single_attendance = $this->attendance->userToday('App\Models\ClassroomStudent', $studentClasses->id);

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'school_year' => $studentClasses->classroom->schoolYear->school_year,
            'classroom' => [
                'name' => $studentClasses->classroom->name,
                'total_student' => $studentClasses->classroom->classroomStudents->count(),
            ],
            'homeroom_teacher' => [
                'name' => $studentClasses->classroom->employee->user->name,
                'email' => $studentClasses->classroom->employee->user->email,
            ],
            'attendance_now' => [
                'day' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('l') : now()->translatedFormat('l'),
                'date' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('d') : now()->translatedFormat('d'),
                'month' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('M') : now()->translatedFormat('M'),
                'check_in' => $single_attendance ? ($single_attendance->checkin == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkin)->format('H:i')) : '-',
                'check_out' => $single_attendance ? ($single_attendance->checkout == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkout)->format('H:i')) : '-',
                'status' => $single_attendance ? $single_attendance->status->label() : 'Libur',
            ],
            'subject'=> SubjectResource::collection($lessonSchedule),
        ]]);
    }

    public function history_attendance(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);
        $history_attendance = $this->attendance->whereUser($studentClasses->id, 'App\Models\ClassroomStudent');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'attendance_history' => HistoryAttendanceResource::collection($history_attendance),
        ]]);
    }

    public function lessonSchedule(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);
        $lessonSchedule = $this->lessonSchedule->whereClassroom($studentClasses->classroom->id, 'day');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'monday' => LessonResource::collection(isset($lessonSchedule['monday']) ? $lessonSchedule['monday'] : []),
            'tuesday' => LessonResource::collection(isset($lessonSchedule['tuesday']) ? $lessonSchedule['tuesday'] : []),
            'wednesday' => LessonResource::collection(isset($lessonSchedule['wednesday']) ? $lessonSchedule['wednesday'] : []),
            'thursday' => LessonResource::collection(isset($lessonSchedule['thursday']) ? $lessonSchedule['thursday'] : []),
            'friday' => LessonResource::collection(isset($lessonSchedule['friday']) ? $lessonSchedule['friday'] : []),
            'saturday' => LessonResource::collection(isset($lessonSchedule['saturday']) ? $lessonSchedule['saturday'] : []),
        ]]);
    }

    public function violation(User $user, Request $request)
    {
        $student = $this->student->whereUserId($user->id);
        $studentViolations = $this->studentViolation->whereStudent($student->id, $request);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'violations' => StudentViolationResource::collection($studentViolations),
        ]]);
    }

    public function repair(User $user, Request $request)
    {
        $student = $this->student->whereUserId($user->id);
        $repairs = $this->studentRepair->whereStudent($student->id, $request);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'repair' => StudentRepairResource::collection($repairs),
        ]]);
    }

    public function update_repair(StudentRepair $studentRepair, RepairStudentRequest $request)
    {
        $data = $this->service->store($request, $studentRepair  );
        $this->studentRepair->update($studentRepair->id, ['proof' => $data['file']]);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim bukti perbaikan",'code' => 200]);
    }

    public function class_and_feedback(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $feedbacks = $this->feedback->where_user_id($student->id);
        $classroomStudent = $this->classroomStudent->whereStudent($student->id);
        $lessonSchedules = $this->lessonSchedule->whereDay($classroomStudent->classroom->id)->map(function($schedule) use ($student) {
            $schedule->student_id = $student->id;
            return $schedule;
        });;

        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim bukti perbaikan",'code' => 200, 'data' => [
            'name_teacher' => $classroomStudent->classroom->employee->user->name,
            'school_year' => $classroomStudent->classroom->schoolYear->school_year,
            'name_class' => $classroomStudent->classroom->name,
            'total_student_class' => $classroomStudent->classroom->classroomStudents->count(),
            'lesson_schedule' => LessonScheduleResource::collection($lessonSchedules),
        ]]);
    }

    public function store_feedback(StoreFeedbackRequest $request, LessonSchedule $lessonSchedule, User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $data = $this->feedbackService->store($request, $lessonSchedule, $student->id);
        $this->feedback->store($data);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim tanggapan",'code' => 200]);
    }

    public function update_feedback(UpdateFeedbackRequest $request, Feedback $feedback)
    {
        $this->feedback->update($feedback->id, $request->validated());
        return response()->json(['status' => 'success', 'message' => "Berhasil memperbaiki tanggapan",'code' => 200]);
    }

    public function destroy_feedback(Feedback $feedback)
    {
        $this->feedback->delete($feedback->id);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim menghapus tanggapan",'code' => 200]);
    }

    public function get_attendance(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $classroomStudent = $this->classroomStudent->whereStudent($student->id);
        $attendances = $this->attendance->getByUserAndStatus('App\Models\ClassroomStudent', $classroomStudent->id, AttendanceEnum::PRESENT->value,'get');
        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim data",'code' => 200, 'data' => [
            'attendance' => StudentHistoryResource::collection($attendances),
        ]]);

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
