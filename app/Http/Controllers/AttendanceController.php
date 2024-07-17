<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;
    private AttendanceTeacherInterface $attendanceTeacher;
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomStudentInterface $classroomStudent;
    private StudentInterface $student;
    private SchoolYearInterface $schoolYear;

    public function __construct(AttendanceInterface $attendance, AttendanceTeacherInterface $attendanceTeacher, StudentInterface $student, AttendanceRuleInterface $attendanceRule, SchoolYearInterface $schoolYear)
    {
        $this->attendance = $attendance;
        $this->attendanceTeacher = $attendanceTeacher;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->schoolYear = $schoolYear;
    }
    /**
     * Display a listing of the resource.
     */
    public function student(Request $request)
    {
        $attendances = $this->attendance->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.student.index', compact('attendances', 'schoolYears'));
    }

    /**
     * Display a listing of the resource.
     */
    public function teacher(Request $request)
    {
        $attendanceTeachers = $this->attendanceTeacher->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.teacher.index', compact('attendanceTeachers', 'schoolYears'));
    }

    /**
     * Display a listing of the resource.
     */
    public function studentExportPreview(Request $request)
    {
        $attendances = $this->attendance->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.student.export', compact('attendances', 'schoolYears'));
    }

    /**
     * Display a listing of the resource.
     */
    public function teacherExportPreview(Request $request)
    {
        $attendances = $this->attendance->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.teacher.export', compact('attendances', 'schoolYears'));
    }
}
