<?php

use App\Http\Controllers\EmployeeJournalController;
use App\Http\Controllers\Staff\StaffViolationController;
use App\Http\Controllers\Staff\StudentRepairController;
use App\Http\Controllers\StudentViolationController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\Staff\DashboardStaffController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('employee')->name('employee.')->group(function () {
    Route::get('/', [DashboardStaffController::class, 'index'])->name('dashboard');

    Route::get('repair', function () {
        return view('staff.pages.repair.index');
    })->name('repair');

    Route::get('list-violation', [StaffViolationController::class, 'violation_student'])->name('overview.index');

    Route::get('top-violation', [StaffViolationController::class, 'index'])->name('top-violation.index');
    Route::get('class-detail-violation/{classroom}', [StaffViolationController::class, 'show'])->name('class-violation.detail');
    Route::get('student-detail-violation/{student}', [StaffViolationController::class, 'show_detail_student'])->name('student-violation.detail');
    Route::get('export-student-violation', [StaffViolationController::class, 'download_student'])->name('student-violation.download');
    Route::post('import-student-violation', [StaffViolationController::class, 'import'])->name('student-violation.import');

    Route::get('violation-student-list', [StaffViolationController::class, 'list_student'])->name('violation-student.index');

    Route::resource('studentViolation', StudentViolationController::class);
    Route::post('single-student-violation/{student}', [StudentViolationController::class, 'single_store'])->name('single.student.violation');

    Route::put('apprived-repair/{studentRepair}', [StudentRepairController::class, 'approved'])->name('approved.repair');

    Route::get('remidial-student-list', function () {
        return view('staff.pages.remedial-student-list.index');
    })->name('remidial-student.index');

    Route::resource('student-repair', StudentRepairController::class);
    Route::post('single-student-repair', [StudentRepairController::class, 'single_store'])->name('single.student.repair');

    Route::get('export-student-repair', [StudentRepairController::class, 'download_student'])->name('student-repair.download');
    Route::post('import-student-repair', [StudentRepairController::class, 'import'])->name('student-repair.import');

    Route::resource('guestbook', GuestBookController::class);
    Route::resource('journal', EmployeeJournalController::class)->except('show');
    Route::get('journal/detail/{employeeJournal}', [EmployeeJournalController::class, 'detail'])->name('journal.detail');
});

Route::get('detail-student-violation', function () {
    return view('staff.pages.single-violation.detail-student');
});
