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
use App\Http\Controllers\Controller;
use App\Http\Requests\RepairStudentRequest;
use App\Http\Resources\HistoryAttendanceResource;
use App\Http\Resources\LessonScheduleResource;
use App\Http\Resources\SchoolPointResource;
use App\Http\Resources\StudentRepairResource;
use App\Http\Resources\StudentViolationResource;
use App\Services\RepairStudentService;
use App\Models\StudentRepair;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class StudentApiController extends Controller
{
    private ClassroomStudentInterface $classroomStudent;
    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;
    private SchoolPointInterface $schoolPoint;
    private AttendanceInterface $attendance;
    private RepairStudentService $service;
    private StudentInterface $student;
    private LessonScheduleInterface $lessonSchedule;
    private FeedbackInterface $feedback;

    public function __construct(LessonScheduleInterface $lessonSchedule, FeedbackInterface $feedback, RepairStudentService $service, StudentRepairInterface $studentRepair, SchoolPointInterface $schoolPoint, StudentViolationInterface $studentViolation, AttendanceInterface $attendance, StudentInterface $student, ClassroomStudentInterface $classroomStudent)
    {
        $this->classroomStudent = $classroomStudent;
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
        $this->schoolPoint = $schoolPoint;
        $this->attendance = $attendance;
        $this->student = $student;
        $this->service = $service;
        $this->lessonSchedule = $lessonSchedule;
        $this->feedback = $feedback;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $student = $this->student->whereUserId($user->id);
        $studentClasses = $this->classroomStudent->whereStudent($student->id);
        $single_attendance = $this->attendance->userToday('App\Models\ClassroomStudent', $studentClasses->id);
        $history_attendance = $this->attendance->whereUser($studentClasses->id, 'App\Models\ClassroomStudent');

        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'classroom' => $studentClasses->classroom->name,
            'name_teacher' => $studentClasses->classroom->employee->user->name,
            'school_year' => $studentClasses->classroom->schoolYear->school_year,
            'attendance_now' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('d F Y') . ' - ' . Carbon::parse($single_attendance->checkin)->format('H:i') : '' ,
            'status' => $single_attendance ? $single_attendance->status->label() : '',
            'history' => HistoryAttendanceResource::collection($history_attendance),
        ]]);
    }

    public function violation(User $user, Request $request)
    {
        $student = $this->student->whereUserId($user->id);
        $maxPoint = $this->schoolPoint->getMaxPoint();
        $schoolPoints = $this->schoolPoint->get();
        $studentViolations = $this->studentViolation->whereStudent($student->id, $request);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'max_point' => $maxPoint,
            'point' => SchoolPointResource::collection($schoolPoints),
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
        $lessonSchedules = $this->lessonSchedule->whereDay($classroomStudent->classroom->id);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengirim bukti perbaikan",'code' => 200, 'data' => [
            'name_teacher' => $classroomStudent->classroom->employee->user->name,
            'school_year' => $classroomStudent->classroom->schoolYear->school_year,
            'name_class' => $classroomStudent->classroom->name,
            'total_student_class' => $classroomStudent->classroom->classroomStudents->count(),
            'lesson_schedule' => LessonScheduleResource::collection($lessonSchedules),
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
