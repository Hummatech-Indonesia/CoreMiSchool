<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Exports\StudentViolationExport;
use App\Http\Controllers\Controller;
use App\Imports\StudentViolationImport;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StaffViolationController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;
    private ClassroomInterface $classroom;
    private StudentInterface $student;
    private SchoolPointInterface $schoolPoint;
    private RegulationInterface $regulation;

    public function __construct(StudentViolationInterface $studentViolation, StudentInterface $student, ClassroomInterface $classroom, SchoolPointInterface $schoolPoint, StudentRepairInterface $studentRepair, RegulationInterface $regulation)
    {
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
        $this->student = $student;
        $this->classroom = $classroom;
        $this->schoolPoint = $schoolPoint;

        $this->regulation = $regulation;
    }

    public function index(Request $request)
    {
        $students = $this->student->getByPoint($request);
        $classrooms = $this->classroom->whereInSchoolYears($request);
        $maxPoint = $this->schoolPoint->getMaxPoint();
        return view('staff.pages.top-violation.index', compact('students', 'classrooms', 'maxPoint'));
    }


    public function overview(Request $request)
    {
        // $students = $this->student->getByPoint($request);
        // $countByClassroomStudent = $this->studentViolation->countByClassroomStudent();
        // $schoolPoint = $this->schoolPoint->get();
        return view('staff.pages.overview.index');
    }

    public function show(Classroom $classroom, Request $request)
    {
        $studentClass = $this->studentViolation->whereClassroom($classroom->id, $request);
        return view('staff.pages.top-violation.detail-class', compact('studentClass'));
    }

    public function show_detail_student(Student $student, Request $request)
    {
        $violations = $this->studentViolation->whereStudent($student->id, $request);
        $repairs = $this->studentRepair->whereStudent($student->id, $request);
        return view('staff.pages.top-violation.detail-student', compact('student', 'violations', 'repairs'));
    }

    public function list_student(Request $request)
    {
        $studentViolations = $this->studentViolation->search($request);
        $students = $this->student->get();
        $violations = $this->regulation->get();
        $maxPoint = $this->schoolPoint->getMaxPoint();
        return view('staff.pages.violation-student-list.index', compact('studentViolations', 'students', 'violations', 'maxPoint'));
    }

    public function download_student()
    {
        $export = new StudentViolationExport();
        $export->collection();
        return response()->download(storage_path('app/public/siswa-pelanggaran.xlsx'))->deleteFileAfterSend(true);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $import = new StudentViolationImport();
        Excel::import($import, $file);
        return redirect()->back()->with('success', "Berhasil Mengimport Data!");
    }
}
