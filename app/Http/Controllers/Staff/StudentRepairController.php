<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\StudentRepairInterface;
use App\Models\StudentRepair;
use App\Http\Requests\StoreStudentRepairRequest;
use App\Http\Requests\UpdateStudentRepairRequest;
use App\Http\Controllers\Controller;

class StudentRepairController extends Controller
{
    private StudentRepairInterface $studentRepair;

    public function __construct(StudentRepairInterface $studentRepair)
    {
        $this->studentRepair = $studentRepair;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentRepairs = $this->studentRepair->get();
        return view('staff.pages.repair-student-list.index', compact('studentRepairs'));
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
    public function store(StoreStudentRepairRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentRepair $studentRepair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentRepair $studentRepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRepairRequest $request, StudentRepair $studentRepair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentRepair $studentRepair)
    {
        //
    }
}
