<?php

use Illuminate\Support\Facades\Route;

Route::get('student', function(){
    return view('student.pages.dashboard');
})->name('student.dashboard');
