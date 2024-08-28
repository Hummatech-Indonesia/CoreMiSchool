<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JournalTeacherController extends Controller
{
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(LessonScheduleInterface $lessonSchedule)
    {
        $this->lessonSchedule = $lessonSchedule;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $all_journals = $this->lessonSchedule->whereJournalTeacher('all', $request);
        $fill_journals = $this->lessonSchedule->whereJournalTeacher('fill', $request);
        $notfill_journals = $this->lessonSchedule->whereJournalTeacher('notfill', $request);
        return view('school.pages.journals.index', compact('all_journals', 'fill_journals', 'notfill_journals'));
    }
}
