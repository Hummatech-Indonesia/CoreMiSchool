<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolFeedbackController extends Controller
{
    private ClassroomInterface $classroom;
    private LessonScheduleInterface $lessonSchedule;

    public function __construct(ClassroomInterface $classroom, LessonScheduleInterface $lessonSchedule)
    {
        $this->classroom = $classroom;
        $this->lessonSchedule = $lessonSchedule;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
