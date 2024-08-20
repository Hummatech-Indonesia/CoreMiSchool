<?php

use App\Http\Controllers\Staff\StaffViolationController;
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

Route::get('top-violation', [StaffViolationController::class, 'index'])->name('top-violation.index');

Route::get('class-detail-violation', function(){
    return view('staff.pages.top-violation.detail-class');
})->name('class-violation.detail');
