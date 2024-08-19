<?php

use Illuminate\Support\Facades\Route;

Route::get('employee', function(){
    return view('staff.pages.dashboard');
})->name('employee.dashboard');

Route::get('repair', function(){
    return view('staff.pages.repair.index');
})->name('employee.repair');

Route::get('overview', function(){
    return view('staff.pages.overview.index');
})->name('overview.index');

Route::get('top-violation', function(){
    return view('staff.pages.top-violation.index');
})->name('top-violation.index');
