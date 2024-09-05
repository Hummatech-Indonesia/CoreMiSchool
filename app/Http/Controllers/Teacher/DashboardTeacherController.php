<?php

namespace App\Http\Controllers\Teacher;

use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Http\Controllers\Controller;
use App\Services\Teacher\NotificationJournalService;

class DashboardTeacherController extends Controller
{
    private NotificationJournalService $notification;
    private SchoolYearInterface $schoolYear;
    private TeacherSubjectInterface $teacherSubject;

    public function __construct(NotificationJournalService $notification, SchoolYearInterface $schoolYear, TeacherSubjectInterface $teacherSubject)
    {
        $this->notification = $notification;
        $this->schoolYear = $schoolYear;
        $this->teacherSubject = $teacherSubject;
    }

    public function index()
    {
        $notifications = $this->notification->notification();
        $schoolYear = $this->schoolYear->active();
        $teacherSubjects = $this->teacherSubject->where(auth()->user()->employee->id);
        return view('teacher.pages.dashboard.index', compact('notifications', 'schoolYear', 'teacherSubjects'));
    }

}
