<?php

use App\Http\Controllers\Student\RepairStudentController;
use App\Http\Controllers\Student\ViolationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('student')->name('student.')->group(function () {
    Route::get('dashboard', function () {
        return view('student.pages.dashboard');
    })->name('dashboard');

    Route::get('violations', [ViolationController::class, 'index'])->name('violations');
    Route::resource('repair', RepairStudentController::class);
});
