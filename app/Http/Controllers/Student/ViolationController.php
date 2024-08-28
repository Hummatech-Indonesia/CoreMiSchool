<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('student.pages.violations.index');
    }
}
