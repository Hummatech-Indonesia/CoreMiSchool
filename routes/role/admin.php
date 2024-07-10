<?php

use App\Http\Controllers\RfidController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('admin.pages.dashboard');
});

Route::get('admin/rfid', [RfidController::class, 'index'])->name('rfid-admin.index');
Route::post('admin/rfid', [RfidController::class, 'store'])->name('rfid-admin.store');

//datar sekolah
Route::get('admin/list-school', [SchoolController::class, 'index'])->name('school-admin.index');
Route::get('admin/add-school', [SchoolController::class, 'create'])->name('school-admin.create');
Route::post('admin/add-school', [SchoolController::class, 'store'])->name('school-admin.store');
Route::get('admin/detail-school', function () {
    return view('admin.pages.list-school.detail');
});

Route::get('faq', function () {
    return view('admin.pages.faq.faq');
});


//berita
Route::get('admin/news', function(){
    return view('admin.pages.news.index');
});
