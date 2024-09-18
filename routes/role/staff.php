<?php

use App\Http\Controllers\EmployeeJournalController;
use App\Http\Controllers\Staff\StaffViolationController;
use App\Http\Controllers\Staff\StudentRepairController;
use App\Http\Controllers\StudentViolationController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\ModelHasRfidController;
use App\Http\Controllers\Staff\DashboardStaffController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('employee')->name('employee.')->group(function () {
    Route::get('/', [DashboardStaffController::class, 'index'])->name('dashboard');

    // fitur pelanggaran
    Route::prefix('violation')->name('violation.')->group(function () {
        Route::get('overview', [StaffViolationController::class, 'overview'])->name('overview');
        Route::get('student-point', [StaffViolationController::class, 'index'])->name('student-point.index');
        Route::get('student-point/{student}', [StaffViolationController::class, 'show_detail_student'])->name('student-point.detail');
        Route::get('class-point/{classroom}', [StaffViolationController::class, 'show'])->name('class-point.detail');
        Route::get('students', [StaffViolationController::class, 'list_student'])->name('students');
        Route::post('student', [StudentViolationController::class, 'store'])->name('students.store');
        Route::post('student-violation/{student}', [StudentViolationController::class, 'single_store'])->name('single.student-violation');
        Route::post('student-repair/{student}', [StudentRepairController::class, 'single_store'])->name('single.student-repair');
        Route::resource('student-repair', StudentRepairController::class);

        Route::prefix('student-repair')->name('student-repair.')->group(function () {
            Route::put('approve/{studentRepair}', [StudentRepairController::class, 'approved'])->name('approved');
            Route::put('reject/{studentRepair}', [StudentRepairController::class, 'reject'])->name('reject');
            Route::post('import', [StudentRepairController::class, 'import'])->name('import');
        });

        Route::post('student-violation/import', [StaffViolationController::class, 'import'])->name('student-violation.import');
    });

    Route::get('export-student-repair', [StudentRepairController::class, 'download_student'])->name('student-repair.download');
    Route::get('export-student-violation', [StaffViolationController::class, 'download_student'])->name('student-violation.download');
    // fitur buku tamu
    Route::resource('guestbook', GuestBookController::class);

    Route::get('rfid-student-violation', function () {
        return view('staff.pages.single-violation.tab-rfid-violation');
    })->name('rfid-student-violation`');

    Route::post('detail-student-violation', [ModelHasRfidController::class, 'show'])->name('post-rfid.violation');

    // fitur jurnal
    Route::resource('journal', EmployeeJournalController::class)->except('show');
    Route::get('journal/detail/{employeeJournal}', [EmployeeJournalController::class, 'detail'])->name('journal.detail');
});
