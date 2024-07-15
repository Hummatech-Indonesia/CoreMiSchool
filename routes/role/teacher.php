<?php

use Illuminate\Support\Facades\Route;


Route::get('teacher', function(){
    return view('teacher.pages.dashboard');
})->name('teacher.dashboard');

// ekstrakurikuler
Route::get('teacher/ekstrakurikuler', function(){
    return view('teacher.pages.ekstrakulikuler.index');
})->name('teacher.ekstrakurikuler.index');
