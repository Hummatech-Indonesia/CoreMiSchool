<?php

use Illuminate\Support\Facades\Route;

Route::get('employee', function(){
    return view('staff.pages.dashboard');
})->name('employee.dashboard');

Route::get('overview', function(){
    return view('staff.pages.overview.index');
})->name('overview.index');
