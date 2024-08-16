<?php

use Illuminate\Support\Facades\Route;

Route::get('employee', function(){
    return view('staff.pages.dashboard');
})->name('employee.dashboard');

Route::get('repair', function(){
    return view('staff.pages.repair.index');
})->name('employee.repair');
