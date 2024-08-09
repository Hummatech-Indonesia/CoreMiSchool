<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Services\StudentService;
use App\Http\Requests\StoreStudentRequest;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\UpdateStudentRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Http\Controllers\Controller;
use App\Imports\StudentImport;
use App\Services\ClassroomStudentService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    private UserInterface $user;
    private StudentInterface $student;
    private StudentService $service;
    private ReligionInterface $religion;
    private ClassroomStudentInterface $classroomStudent;
    private ClassroomStudentService $classroomService;
    private ModelHasRfidInterface $modelHasRfid;

    public function __construct(UserInterface $user, StudentInterface $student, StudentService $service, ReligionInterface $religion, ClassroomStudentInterface $classroomStudent, ClassroomStudentService $classroomService, ModelHasRfidInterface $modelHasRfid)
    {
        $this->user = $user;
        $this->student = $student;
        $this->service = $service;
        $this->religion = $religion;
        $this->classroomStudent = $classroomStudent;
        $this->classroomService = $classroomService;
        $this->modelHasRfid = $modelHasRfid;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = $this->student->search($request);
        $alumnus = $this->classroomStudent->getAlumnus($request);
        $religions = $this->religion->get();
        $classrooms = $this->classroomStudent->get();

        return view('school.new.student.index', compact('students', 'religions', 'alumnus', 'classrooms'));
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
    public function store(StoreStudentRequest $request, string $classroom)
    {
        try {
            $data = $this->service->store($request);
            $student_id = $this->student->store($data)->id;
            $this->classroomService->store($classroom, $student_id);
            return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
        } catch (\Throwable $th) {
            $data = $this->user->showEmail($request->email);
            if ($data) {
                return redirect()->back()->with('warning', 'Data siswa sudah tersedia');
            } else {
                return redirect()->back()->with('error', 'Kesalahan menambahkan data siswa');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            $data = $this->service->update($student, $request);
            $this->student->update($student->id, $data);
            return redirect()->back()->with('success', 'Siswa berhasil diperbarui');
        } catch (\Throwable $th) {
            $data = $this->user->showEmail($request->email);
            if ($data) {
                return redirect()->back()->with('warning', 'Data siswa sudah tersedia');
            } else {
                return redirect()->back()->with('error', 'Kesalahan menambahkan data siswa');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            $this->service->delete($student);
            $this->student->delete($student->id);
            $student->user->delete();
            $this->modelHasRfid->delete('App\Models\Student', $student->id);

            return redirect()->back()->with('success', 'Siswa berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function downloadTemplate()
    {
        try {
            $template = public_path('file/format-excel-import-student.xlsx');
            return response()->download($template, 'format-excel-import-student.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function import(Request $request, string $classroom)
    {
        try {
            $file = $request->file('file');
            Excel::import(new StudentImport($classroom), $file);
            return redirect()->back()->with('success', "Berhasil Mengimport Data!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
