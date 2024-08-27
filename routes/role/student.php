<?php

use Illuminate\Support\Facades\Route;

Route::get('student', function () {
    return view('student.pages.dashboard');
})->name('student.dashboard');

Route::get('violations', function () {
    return view('student.pages.violations.index');
})->name('student.violations');
