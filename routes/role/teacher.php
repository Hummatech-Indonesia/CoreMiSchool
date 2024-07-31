<?php

use Illuminate\Support\Facades\Route;


Route::middleware('auth')->prefix('teacher')->name('teacher.')->group(function(){
    Route::get('', function(){
        return view('teacher.pages.dashboard');
    })->name('dashboard');

    // extracurricular
    Route::get('extracurricular', function(){
        return view('teacher.pages.ekstrakulikuler.index');
    })->name('extracurricular.index');
});
