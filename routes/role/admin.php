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
Route::get('admin/add-school', function(){
    return view('admin.pages.list-school.add-school');
});


Route::get('faq', function () {
    return view('admin.pages.faq.faq');
});
