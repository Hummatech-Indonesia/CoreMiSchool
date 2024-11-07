<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\StudentRepairInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StafApiController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentRepairInterface $studentRepair;

    public function __construct(StudentViolationInterface $studentViolation, StudentRepairInterface $studentRepair)
    {
        $this->studentViolation = $studentViolation;
        $this->studentRepair = $studentRepair;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $student_violation = $this->studentViolation->countByStudent();
        $student_repair = $this->studentRepair->countByStudent();

        dd($student_violation, $student_repair);
        return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200, 'data' => [
            'student_violation' => $student_violation,
        ]]);
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
