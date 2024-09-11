<?php

use App\Http\Controllers\EmployeeJournalController;
use App\Http\Controllers\Staff\StaffViolationController;
use App\Http\Controllers\Staff\StudentRepairController;
use App\Http\Controllers\StudentViolationController;
use App\Http\Controllers\GuestBookController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('employee')->name('employee.')->group(function () {
    Route::get('/', function () {
        return view('staff.pages.dashboard.dashboard');
    })->name('dashboard');

    // fitur pelanggaran
    Route::prefix('violation')->name('violation.')->group(function () {
        Route::get('overview', [StaffViolationController::class, 'violation_student'])->name('overview');
        Route::get('student-point', [StaffViolationController::class, 'index'])->name('student-point.index');
        Route::get('student-point/{student}', [StaffViolationController::class, 'show_detail_student'])->name('student-point.detail');
        Route::get('class-point/{classroom}', [StaffViolationController::class, 'show'])->name('class-point.detail');
        Route::get('students', [StaffViolationController::class, 'list_student'])->name('students');
        Route::post('student', [StudentViolationController::class, 'store'])->name('students.store');
        Route::post('student-violation/{student}', [StudentViolationController::class, 'single_store'])->name('single.student-violation');
        Route::post('student-repair/{student}', [StudentRepairController::class, 'single_store'])->name('single.student-repair');
        Route::resource('student-repair', StudentRepairController::class);
        Route::put('student-repair/approve/{studentRepair}', [StudentRepairController::class, 'approved'])->name('student-repair.approved');
        Route::post('student-violation/import', [StaffViolationController::class, 'import'])->name('student-violation.import');
        Route::post('student-repair/import', [StudentRepairController::class, 'import'])->name('student-repair.import');
    });
    Route::get('export-student-repair', [StudentRepairController::class, 'download_student'])->name('student-repair.download');
    Route::get('export-student-violation', [StaffViolationController::class, 'download_student'])->name('student-violation.download');
    Route::get('detail-student-violation', function () {
        return view('staff.pages.single-violation.detail-student');
    });

    // fitur buku tamu
    Route::resource('guestbook', GuestBookController::class);

    // fitur jurnal
    Route::resource('journal', EmployeeJournalController::class)->except('show');
    Route::get('journal/detail/{employeeJournal}', [EmployeeJournalController::class, 'detail'])->name('journal.detail');
});
