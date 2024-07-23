<?php

namespace App\Http\Controllers;

use App\Models\TeacherSubject;
use App\Http\Requests\StoreTeacherSubjectRequest;
use App\Http\Requests\UpdateTeacherSubjectRequest;
use App\Services\TeacherSubjectService;

class TeacherSubjectController extends Controller
{
    private TeacherSubjectService $service;

    public function __construct(TeacherSubjectService $service)
    {
        $this->service = $service;
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
    public function store(StoreTeacherSubjectRequest $request, string $employee)
    {
        $this->service->store($request, $employee);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherSubjectRequest $request, TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherSubject $teacherSubject)
    {
        //
    }
}
