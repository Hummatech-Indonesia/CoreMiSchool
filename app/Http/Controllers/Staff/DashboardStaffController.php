<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\EmployeeJournalInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardStaffController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private EmployeeJournalInterface $employeeJournal;
    private StudentRepairInterface $studentRepair;
    private SchoolPointInterface $schoolPoint;
    private StudentInterface $student;

    public function __construct(StudentViolationInterface $studentViolation, StudentRepairInterface $studentRepair, SchoolPointInterface $schoolPoint, StudentInterface $student, EmployeeJournalInterface $employeeJournal)
    {
        $this->studentViolation = $studentViolation;
        $this->employeeJournal = $employeeJournal;
        $this->studentRepair = $studentRepair;
        $this->schoolPoint = $schoolPoint;
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countViolation = $this->studentViolation->count('week');
        $studentViolation = $this->studentViolation->count('student');
        $countRepair = $this->studentRepair->count();
        $maxPoint = $this->schoolPoint->getMaxPoint();
        $studentHighPoint = $this->student->highestPoint($maxPoint);
        $employeeJournals = $this->employeeJournal->getEmployee(auth()->user()->id, 'take');

        return view('staff.pages.dashboard.dashboard', compact('countViolation', 'countRepair', 'studentViolation', 'studentHighPoint', 'employeeJournals'));
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
