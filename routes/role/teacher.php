<?php

use App\Http\Controllers\Teacher\TeacherJournalController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('', function () {
        return view('teacher.pages.dashboard');
    })->name('dashboard');

    // extracurricular
    Route::get('extracurricular', function () {
        return view('teacher.pages.ekstrakulikuler.index');
    })->name('extracurricular.index');

    Route::resource('journals', TeacherJournalController::class)->except(['create', 'store', 'update']);
    Route::get('journals/create/{lessonSchedule}', [TeacherJournalController::class, 'create'])->name('journals.create');
    Route::post('journals/create/{lessonSchedule}', [TeacherJournalController::class, 'store'])->name('journals.store');
    Route::put('journals/update/{lessonSchedule}', [TeacherJournalController::class, 'update'])->name('journals.update');
    // Route::get('journals/detail', function () {
    //     return view('teacher.pages.journals.detail');
    // })->name('journals.detail');
});


