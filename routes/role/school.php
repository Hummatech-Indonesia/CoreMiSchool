<?php

use Illuminate\Support\Facades\Route;


Route::get('school', function(){
    return view('school.pages.dashboard');
})->name('school.index');

Route::get('employe', function(){
    return view('school.pages.employe.index');
})->name('employe.index');

Route::get('teacher', function(){
    return view('school.pages.teacher.index');
})->name('teacher.index');

Route::get('detail-teacher', function(){
    return view('school.pages.teacher.detail-teacher');
})->name('detail-teacher.index');

Route::get('create-subjects', function(){
    return view('school.pages.teacher.create-subjetcs');
})->name('create-subjects');