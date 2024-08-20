<?php

use App\Http\Controllers\Staff\StaffViolationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('employee')->name('employee.')->group(function () {
    Route::get('/', function () {
        return view('staff.pages.dashboard');
    })->name('dashboard');

    Route::get('repair', function(){
        return view('staff.pages.repair.index');
    })->name('repair');

    Route::get('overview', [StaffViolationController::class, 'overview'])->name('overview.index');

    Route::get('top-violation', [StaffViolationController::class, 'index'])->name('top-violation.index');

    Route::get('student-detail-violation', function () {
        return view('staff.pages.top-violation.detail-student');
    })->name('student-violation.detail');

    Route::get('top-violation', [StaffViolationController::class, 'index'])->name('top-violation.index');
    Route::get('class-detail-violation/{classroom}', [StaffViolationController::class, 'show'])->name('class-violation.detail');
});
