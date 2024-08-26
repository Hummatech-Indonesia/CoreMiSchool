<?php

use App\Http\Controllers\Staff\StaffViolationController;
use App\Http\Controllers\StudentViolationController;
use App\Models\StudentViolation;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('employee')->name('employee.')->group(function () {
    Route::get('/', function () {
        return view('staff.pages.dashboard');
    })->name('dashboard');

    Route::get('repair', function(){
        return view('staff.pages.repair.index');
    })->name('repair');

    Route::get('list-violation', [StaffViolationController::class, 'violation_student'])->name('overview.index');

    Route::get('top-violation', [StaffViolationController::class, 'index'])->name('top-violation.index');
    Route::get('class-detail-violation/{classroom}', [StaffViolationController::class, 'show'])->name('class-violation.detail');
    Route::get('student-detail-violation/{student}', [StaffViolationController::class, 'show_detail_student'])->name('student-violation.detail');

    Route::get('violation-student-list', [StaffViolationController::class, 'list_student'])->name('violation-student.index');

    Route::resource('studentViolation', StudentViolationController::class);

    Route::get('remidial-student-list', function(){
        return view('staff.pages.remedial-student-list.index');
    })->name('remidial-student.index');
});
