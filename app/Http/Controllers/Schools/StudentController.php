<?php

namespace App\Http\Controllers\Schools;

use App\Models\Student;
use App\Models\Classroom;
use App\Models\SchoolYear;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Exports\ClassroomExport;
use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentClassroomExport;
use App\Exports\StudentClassroom2Export;
use App\Services\ClassroomStudentService;
use App\Http\Requests\StoreStudentRequest;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\UpdateStudentRequest;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;

class StudentController extends Controller
{
    private UserInterface $user;
    private StudentInterface $student;
    private StudentService $service;
    private ReligionInterface $religion;
    private ClassroomStudentInterface $classroomStudent;
    private ClassroomStudentService $classroomService;
    private ModelHasRfidInterface $modelHasRfid;
    private SchoolYearInterface $schoolYear;

    public function __construct(UserInterface $user, StudentInterface $student, StudentService $service, ReligionInterface $religion, ClassroomStudentInterface $classroomStudent, ClassroomStudentService $classroomService, ModelHasRfidInterface $modelHasRfid, SchoolYearInterface $schoolYear)
    {
        $this->user = $user;
        $this->student = $student;
        $this->service = $service;
        $this->religion = $religion;
        $this->classroomStudent = $classroomStudent;
        $this->classroomService = $classroomService;
        $this->modelHasRfid = $modelHasRfid;
        $this->schoolYear = $schoolYear;
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

        return view('school.pages.student.index', compact('students', 'religions', 'alumnus', 'classrooms'));
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
            return redirect()->back()->with('error', 'Terjadi kesalahan' . $th->getMessage());
        }
    }

    public function downloadTemplate()
    {
        try {
            $template = public_path('file/format-excel-import-student.xlsx');
            return response()->download($template, 'format-excel-import-student.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan' . $th->getMessage());
        }
    }

    public function downloadTemplateClass2()
    {
        try {
            $schoolYear = $this->schoolYear->active();
            return Excel::download(new StudentClassroomExport($schoolYear->id), 'format-import-siswa.xlsx')->deleteFileAfterSend(false);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function downloadTemplateClass()
    {
        // Instantiate the export class
        $export = new ClassroomExport();

        // Trigger the event-driven export logic defined in the export class
        Excel::store($export, 'file/classrooom-format-import-student.xlsx');

        // Define the path to the newly generated file
        $filePath = public_path('file/generated-class-format-import-student.xlsx');

        // Check if the file exists
        if (File::exists($filePath)) {
            // Return the file as a download response
            return response()->download($filePath)->deleteFileAfterSend(true);
        } else {
            // Handle the error case if the file was not created successfully
            return redirect()->back()->with('error', 'Failed to generate the file.');
        }

    }

    public function download()
    {
        return Excel::download(new ClassroomExport, 'classroom-export.xlsx');
    }

    public function import(Request $request, string $classroom)
    {
        try {
            $file = $request->file('file');
            Excel::import(new StudentImport($classroom), $file);
            return redirect()->back()->with('success', "Berhasil Mengimport Data!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan' . $th->getMessage());
        }
    }
}
