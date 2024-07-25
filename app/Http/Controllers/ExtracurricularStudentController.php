<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ExtracurricularStudentInterface;
use App\Models\ExtracurricularStudent;
use App\Http\Requests\StoreExtracurricularStudentRequest;
use App\Http\Requests\UpdateExtracurricularStudentRequest;
use App\Models\Extracurricular;

class ExtracurricularStudentController extends Controller
{
    private ExtracurricularStudentInterface $extracurricularStudent;

    public function __construct(ExtracurricularStudentInterface $extracurricularStudent) {
        $this->extracurricularStudent = $extracurricularStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreExtracurricularStudentRequest $request, Extracurricular $extracurricular)
    {
        $this->extracurricularStudent->store([
            'student_id' => $request->student_id,
            'extracurricular_id' => $extracurricular->id,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan siswa ke ekstrakurikuler');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExtracurricularStudent $extracurricularStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtracurricularStudent $extracurricularStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExtracurricularStudentRequest $request, ExtracurricularStudent $extracurricularStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExtracurricularStudent $extracurricularStudent)
    {
        //
    }

    public function downloadTemplate()
    {
        $template = public_path('file/excel-format-import-extracurricular-student.xlsx');
        return response()->download($template, 'excel-format-import-extracurricular-student.xlsx');
    }
}
