<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolDashboardController extends Controller
{
    private SchoolInterface $school;
    private SchoolYearInterface $schoolYear;

    public function __construct(SchoolInterface $school, SchoolYearInterface $schoolYear) {
        $this->school = $school;
        $this->schoolYear = $schoolYear;
    }

    public function index() {
        $school = $this->school->showWithSlug(auth()->user()->slug);
        $schoolYear = $this->schoolYear->active($school->id);
        return view('school.pages.settings.information', compact('school', 'schoolYear'));
    }

    public function edit() {
        $school = $this->school->showWithSlug(auth()->user()->slug);
        return view('school.pages.settings.update-information', compact('school'));
    }

    public function update() {
        //
    }
}