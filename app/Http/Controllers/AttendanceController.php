<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Exports\TeacherAttendanceExport;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    private AttendanceInterface $attendance;
    private AttendanceTeacherInterface $attendanceTeacher;
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;
    private ClassroomStudentInterface $classroomStudent;
    private StudentInterface $student;
    private SchoolYearInterface $schoolYear;
    private ClassroomInterface $classroom;

    public function __construct(AttendanceInterface $attendance, AttendanceTeacherInterface $attendanceTeacher, StudentInterface $student, AttendanceRuleInterface $attendanceRule, SchoolYearInterface $schoolYear, ClassroomInterface $classroom)
    {
        $this->attendance = $attendance;
        $this->attendanceTeacher = $attendanceTeacher;
        $this->student = $student;
        $this->attendanceRule = $attendanceRule;
        $this->schoolYear = $schoolYear;
        $this->classroom = $classroom;
    }
    /**
     * Display a listing of the resource.
     */
    public function class(Request $request)
    {
        if ($request->year) {
            $year = $request->year;
        } else {
            $activeYear = $this->schoolYear->active(auth()->user()->school->id);
            $year = $activeYear->school_year;
        }
        $schoolYear = $this->schoolYear->whereSchoolYear($year);
        $classrooms = $this->classroom->whereSchoolYears($schoolYear->id);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.student.class', compact('attendances', 'schoolYears', 'classrooms'));
    }

    /**
     * Display a listing of the resource.
     */
    public function student(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->whereClassroom($classroom->id);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.student.index', compact('attendances', 'schoolYears', 'classroom'));
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
    public function export_teacher()
    {
        return Excel::download(new TeacherAttendanceExport, 'attendance-teacher.xlsx');
    }

    /**
     * Display a listing of the resource.
     */
    public function studentExportPreview(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->classAndDate($classroom->id, $request);
        return view('school.pages.attendace.student.export', compact('attendances', 'classroom'));
    }

    /**
     * Display a listing of the resource.
     */
    public function teacherExportPreview(Request $request)
    {
        $attendances = $this->attendanceTeacher->whereSchool(auth()->user()->school->id, $request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendace.teacher.export', compact('attendances', 'schoolYears'));
    }
}
