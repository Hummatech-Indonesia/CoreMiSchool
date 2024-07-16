<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\MapleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Models\School;
use App\Services\ModelHasRfidService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class SchoolDashboardController extends Controller
{
    private SchoolInterface $school;
    private SchoolYearInterface $schoolYear;
    private ModelHasRfidInterface $rfid;

    private EmployeeInterface $employee;
    private StudentInterface $student;
    private MapleInterface $maple;
    private ClassroomInterface $classroom;

    public function __construct(SchoolInterface $school,
    SchoolYearInterface $schoolYear, ModelHasRfidInterface $rfid, ClassroomInterface $classroom)
    {
        $this->school = $school;
        $this->schoolYear = $schoolYear;
        $this->rfid = $rfid;
        $this->classroom = $classroom;
    }

    public function index()
    {
        $school = $this->school->whereUserId(auth()->user()->id);
        $classrooms = $this->classroom->countClass(auth()->user()->school->id);
        return view('school.pages.dashboard', compact('school', 'classrooms'));
    }

    public function show()
    {
        $rfids = $this->rfid->masterRfid();
        $school = $this->school->showWithSlug(auth()->user()->slug);
        $schoolYear = $this->schoolYear->active($school->id);
        return view('school.pages.settings.information', compact('school', 'schoolYear', 'rfids'));
    }

    public function edit()
    {
        $school = $this->school->showWithSlug(auth()->user()->slug);
        return view('school.pages.settings.update-information', compact('school'));
    }
}
