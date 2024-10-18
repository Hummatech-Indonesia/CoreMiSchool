<?php

use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Controllers\Student\RepairStudentController;
use App\Http\Controllers\Student\ViolationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('student')->name('student.')->group(function () {
    Route::get('', [DashboardStudentController::class, 'index'])->name('dashboard');

    Route::get('violations', [ViolationController::class, 'index'])->name('violations');
    Route::resource('repairs', RepairStudentController::class);
    Route::get('/class', function () {
        return view('student.pages.class.index');
    });
    Route::get('/all-schedule', function () {
        return view('student.pages.class.panes.all-schedule');
    });

});
