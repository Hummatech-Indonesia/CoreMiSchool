<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Http\Controllers\Controller;
use App\Services\School\AttendanceEmployeeService;
use Illuminate\Http\Request;

class AttendanceEmployeeController extends Controller
{
    private AttendanceInterface $attendance;
    private AttendanceEmployeeService $service;

    public function __construct(AttendanceInterface $attendance, AttendanceEmployeeService $service)
    {
        $this->attendance = $attendance;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attendanceEmployeeChart = $this->service->ChartAttendanceEmployee($this->attendance, $request);
        $attendances = $this->attendance->whereModel('App\Models\Employee', $request);
        return view('school.pages.statistic-presence.employee', compact('attendances', 'attendanceEmployeeChart'));
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