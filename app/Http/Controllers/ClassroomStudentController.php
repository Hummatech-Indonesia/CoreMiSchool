<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Models\ClassroomStudent;
use App\Http\Requests\StoreClassroomStudentRequest;
use App\Http\Requests\UpdateClassroomStudentRequest;
use App\Models\Classroom;

class ClassroomStudentController extends Controller
{
    private ClassroomStudentInterface $classroomStudent;

    public function __construct(ClassroomStudentInterface $classroomStudent)
    {
        $this->classroomStudent = $classroomStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $classroom)
    {
        $classroomStudents = $this->classroomStudent->get();
        return view('school.new.class.detail', compact('classroomStudents', 'classroom'));
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
    public function store(StoreClassroomStudentRequest $request, Classroom $classroom)
    {
        $data = $request->validate();
        foreach ($data['student_id'] as $item => $student) {
            $this->classroomStudent->store([
                'student_id' => $item,
                'classroom_id' => $classroom->id,
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil menambahkan siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassroomStudent $classroomStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassroomStudent $classroomStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomStudentRequest $request, Classroom $classroom)
    {
        // Convert comma-separated IDs to array
        $addStudents = $request->input('add_students') ? explode(',', $request->input('add_students')) : [];
        $removeStudents = $request->input('remove_students') ? explode(',', $request->input('remove_students')) : [];

        // Add students to classroom
        foreach ($addStudents as $studentId) {
            ClassroomStudent::firstOrCreate([
                'classroom_id' => $classroom->id,
                'student_id' => $studentId,
            ]);
        }
        // Remove students from classroom
        foreach ($removeStudents as $studentId) {
            ClassroomStudent::where('classroom_id', $classroom->id)
                ->where('student_id', $studentId)
                ->delete();
        }

        return to_route('class.show', $classroom->id)->with('success', 'Berhasil meyimpan perubahan siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassroomStudent $classroomStudent)
    {
        foreach ($classroomStudent as $item => $classroomStudent) {
            $this->classroomStudent->delete($item->id);
        }

        return redirect()->back()->with('success', 'Berhasil menghapus siswa');
    }
}
