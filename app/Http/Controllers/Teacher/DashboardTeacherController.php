<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Services\Teacher\NotificationJournalService;

class DashboardTeacherController extends Controller
{
    private NotificationJournalService $notification;

    public function __construct(NotificationJournalService $notification)
    {
        $this->notification = $notification;
    }

    public function index()
    {
        $notifications = $this->notification->notification();
        return view('teacher.pages.dashboard', compact('notifications'));
    }

}
