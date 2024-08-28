<?php

use App\Http\Controllers\Teacher\DashboardTeacherController;
use App\Http\Controllers\Teacher\TeacherJournalController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('', [DashboardTeacherController::class, 'index'])->name('dashboard');

    // extracurricular
    Route::get('extracurricular', function () {
        return view('teacher.pages.ekstrakulikuler.index');
    })->name('extracurricular.index');

    Route::resource('journals', TeacherJournalController::class)->except(['create', 'store', 'update', 'edit']);
    Route::get('journals/update/{teacherJournal}', [TeacherJournalController::class, 'edit'])->name('journals.edit');
    Route::put('journals/update/{teacherJournal}', [TeacherJournalController::class, 'update'])->name('journals.update');

    Route::get('journals/create/{lessonSchedule}', [TeacherJournalController::class, 'create'])->name('journals.create');
    Route::post('journals/create/{lessonSchedule}', [TeacherJournalController::class, 'store'])->name('journals.store');
    // Route::get('journals/detail', function () {
    //     return view('teacher.pages.journals.detail');
    // })->name('journals.detail');

    Route::get('journal-and-attendance', function(){
        return view('teacher.pages.journals-and-attendance.index');
    })->name('journal-and-attendace.index');
});


