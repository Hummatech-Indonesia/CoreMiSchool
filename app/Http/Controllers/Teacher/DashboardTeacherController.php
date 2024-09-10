<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Enums\AttendanceEnum;
use App\Http\Controllers\Controller;
use App\Services\Teacher\NotificationJournalService;
use App\Services\TeacherService;

class DashboardTeacherController extends Controller
{
    private NotificationJournalService $notification;
    private SchoolYearInterface $schoolYear;
    private TeacherSubjectInterface $teacherSubject;
    private AttendanceInterface $attendance;
    private LessonScheduleInterface $lessonSchedule;
    private TeacherService $service;

    public function __construct(NotificationJournalService $notification, SchoolYearInterface $schoolYear, TeacherSubjectInterface $teacherSubject, AttendanceInterface $attendance, LessonScheduleInterface $lessonSchedule, TeacherService $service)
    {
        $this->notification = $notification;
        $this->schoolYear = $schoolYear;
        $this->teacherSubject = $teacherSubject;
        $this->attendance = $attendance;
        $this->lessonSchedule = $lessonSchedule;
        $this->service = $service;
    }

    public function index()
    {
        $notifications = $this->notification->notification();
        $schoolYear = $this->schoolYear->active();
        $teacherSubjects = $this->teacherSubject->where(auth()->user()->employee->id);
        $todayAttendance = $this->attendance->userToday('App\Models\Employee', auth()->user()->employee->id);
        $lessonSchedules = $this->lessonSchedule->getByTeacher(auth()->user()->id);
        $attendances = $this->attendance->whereUser(auth()->user()->employee->id, 'App\Models\Employee');

        $late = $this->attendance->getByUserAndStatus('App\Models\Employee', auth()->user()->employee->id, AttendanceEnum::LATE->value, 'get');
        $sick = $this->attendance->getByUserAndStatus('App\Models\Employee', auth()->user()->employee->id, AttendanceEnum::SICK->value, 'get');
        $alpha = $this->attendance->getByUserAndStatus('App\Models\Employee', auth()->user()->employee->id, AttendanceEnum::ALPHA->value, 'get');
        $present = $this->attendance->getByUserAndStatus('App\Models\Employee', auth()->user()->employee->id, AttendanceEnum::PRESENT->value, 'get');
        $permit = $this->attendance->getByUserAndStatus('App\Models\Employee', auth()->user()->employee->id, AttendanceEnum::PERMIT->value, 'get');
        $chartTeacherAttendance = $this->service->chartTeacherAttendance($late, $sick, $alpha, $present, $permit);

        // dd($chartTeacherAttendance);

        return view('teacher.pages.dashboard.index', compact(
            'notifications', 'schoolYear', 'teacherSubjects',
            'todayAttendance', 'lessonSchedules', 'attendances',
            'chartTeacherAttendance'));
    }

}
