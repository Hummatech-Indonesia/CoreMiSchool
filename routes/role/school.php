<?php

use Illuminate\Support\Facades\Route;


Route::get('school', function(){
    return view('school.pages.dashboard');
})->name('school.index');

Route::get('employe', function(){
    return view('school.pages.employe.index');
})->name('employe.index');