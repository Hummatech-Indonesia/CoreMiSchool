<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceTeacherInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Exports\MonthlyStudentRecap;
use App\Exports\StudentAttendanceExport;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\ClassroomStudent;
use App\Services\AttendanceService;
use App\Services\MonthlyRecapService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class AttendanceController extends Controller
{
    private ClassroomInterface $classroom;
    private SchoolYearInterface $schoolYear;
    private AttendanceInterface $attendance;
    private AttendanceTeacherInterface $attendanceTeacher;
    private AttendanceService $attendanceService;
    private MonthlyRecapService $monthlyRecapService;

    public function __construct(classroomInterface $classroom, SchoolYearInterface $schoolYear, AttendanceInterface $attendance, AttendanceTeacherInterface $attendanceTeacher, AttendanceService $attendanceService, MonthlyRecapService $monthlyRecapService)
    {
        $this->classroom = $classroom;
        $this->schoolYear = $schoolYear;
        $this->attendance = $attendance;
        $this->attendanceTeacher = $attendanceTeacher;
        $this->attendanceService = $attendanceService;
        $this->monthlyRecapService = $monthlyRecapService;
    }

    
    /**
     * menampilkan kehadiran kelas di tahun ajaran yang aktif
     * @param Request $request untuk menampilkan data berdasarkan tahun ajaran
     */
    public function class(Request $request)
    {
        $activeYear = $this->schoolYear->active();

        if($request->has('year')){
            $year = $this->schoolYear->whereSchoolYear($request->year);
            $yearId = $year->id;
        }else{
            $yearId = $activeYear->id;
        }
        $classrooms = $this->classroom->where($request, $yearId);
        // dd($classrooms);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.attendance.student.class-attendace', compact('classrooms', 'schoolYears'));
    }


    /**
     * menampilkan kehadiran siswa di classroom yang diberikan
     * @param Classroom $classroom classroom yang diberikan
     * @param Request $request untuk menampilkan data berdasarkan tanggal
     */
    public function student(Classroom $classroom, Request $request)
    {
        $attendances = $this->attendance->classAndDate($classroom->id, $request);
        return view('school.pages.attendance.student.list-attendace-student', compact('attendances', 'classroom'));
    }

    public function expotStudent(Request $request, Classroom $classroom)
    {
        $attendances = $this->attendance->exportClassAndDate($classroom->id, $request);
        return view('school.pages.attendance.student.export', compact('attendances', 'classroom'));
    }
    /**
     * menampilkan kehadiran guru
     * @param Request $request untuk menampilkan data berdasarkan tanggal
     */
    public function teacher(Request $request)
    {
        $attendanceTeachers = $this->attendance->attendanceGetTecaher($request);
        return view('school.pages.attendance.teacher.index', compact('attendanceTeachers'));
    }

    /**
     * export kehadiran siswa
     * @param Classroom $classroom classroom yang diberikan
     * @param Request $request untuk menampilkan data berdasarkan tanggal
     */
    public function export_student(Classroom $classroom, Request $request)
    {
        return Excel::download(new StudentAttendanceExport($classroom->id, $request, $this->attendance), 'Kehadiran-'.$classroom->name.$request->date.'.xlsx');
    }

    public function proof(Attendance $attendance, Request $request)
    {
        $data = $this->attendanceService->upload_proof($attendance, $request);
        $this->attendance->update($attendance->id, $data);

        return redirect()->back()->with('success', 'Berhasil menambahkan bukti');
    }

    public function monthlyRecap(Classroom $classroom, Request $request)
    {
        $months = [
            '1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April',
            '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus',
            '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
        $monthName = $months[$request->month] ?? 'Januari';
        return Excel::download(new MonthlyStudentRecap($classroom, $request, $this->monthlyRecapService, $monthName),"Kehadiran-{$classroom->name}-{$monthName}.xlsx");
    }

}
