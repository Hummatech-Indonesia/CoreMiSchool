<?php

use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('admin.pages.dashboard');
});

Route::get('admin/rfid-registration', function(){
    return view('admin.pages.rfid.registrasi-rfid');
});

//datar sekolah
Route::get('admin/list-school', [SchoolController::class, 'index'])->name('school-admin.index');
Route::get('admin/add-school', [SchoolController::class, 'create'])->name('school-admin.create');
Route::post('admin/add-school', [SchoolController::class, 'store'])->name('school-admin.store');


Route::get('faq', function () {
    return view('admin.pages.faq.faq');
});
