<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Interfaces\SchoolPointInterface;
use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Controllers\Controller;

class ViolationController extends Controller
{
    private SchoolPointInterface $schoolPoint;
    private StudentViolationInterface $studentViolation;

    public function __construct(SchoolPointInterface $schoolPoint, StudentViolationInterface $studentViolation)
    {
        $this->schoolPoint = $schoolPoint;
        $this->studentViolation = $studentViolation;
    }

    public function index()
    {
        $maxPoint = $this->schoolPoint->getMaxPoint();
        $schoolPoints = $this->schoolPoint->get();
        $studentViolations = $this->studentViolation->whereStudent(auth()->user()->student->id);
        return view('student.pages.violations.index', compact('maxPoint', 'schoolPoints', 'studentViolations'));
    }
}