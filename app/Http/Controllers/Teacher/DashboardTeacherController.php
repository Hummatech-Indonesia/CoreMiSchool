<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Http\Controllers\Controller;
use App\Services\Teacher\NotificationJournalService;

class DashboardTeacherController extends Controller
{
    private NotificationJournalService $notification;
    private SchoolYearInterface $schoolYear;
    private TeacherSubjectInterface $teacherSubject;
    private AttendanceInterface $attendance;
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(NotificationJournalService $notification, SchoolYearInterface $schoolYear, TeacherSubjectInterface $teacherSubject, AttendanceInterface $attendance, LessonScheduleInterface $lessonSchedule)
    {
        $this->notification = $notification;
        $this->schoolYear = $schoolYear;
        $this->teacherSubject = $teacherSubject;
        $this->attendance = $attendance;
        $this->lessonSchedule = $lessonSchedule;
    }

    public function index()
    {
        $notifications = $this->notification->notification();
        $schoolYear = $this->schoolYear->active();
        $teacherSubjects = $this->teacherSubject->where(auth()->user()->employee->id);
        $todayAttendance = $this->attendance->userToday('App\Models\Employee', auth()->user()->employee->id);
        $lessonSchedules = $this->lessonSchedule->getByTeacher(auth()->user()->id);
        $attendances = $this->attendance->whereUser(auth()->user()->id, 'App\Models\Employee');

        // dd($lessonSchedules);

        return view('teacher.pages.dashboard.index', compact('notifications', 'schoolYear', 'teacherSubjects', 'todayAttendance', 'lessonSchedules', 'attendances'));
    }

}
