<?php

use Illuminate\Support\Facades\Route;


Route::get('teacher', function(){
    return view('teacher.pages.dashboard');
})->name('teacher.dashboard');

// extracurricular
Route::get('teacher/extracurricular', function(){
    return view('teacher.pages.ekstrakulikuler.index');
})->name('teacher.extracurricular.index');
