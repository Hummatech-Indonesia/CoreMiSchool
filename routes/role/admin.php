<?php

use App\Http\Controllers\RfidController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('admin.pages.dashboard');
});

Route::get('admin/rfid', [RfidController::class, 'index'])->name('rfid-admin.index');
Route::post('admin/rfid', [RfidController::class, 'store'])->name('rfid-admin.store');
Route::delete('admin/rfid/{rfid}', [RfidController::class, 'destroy'])->name('rfid-admin.delete');

//datar sekolah
Route::get('admin/school', [SchoolController::class, 'index'])->name('school-admin.index');
Route::get('admin/school/create', [SchoolController::class, 'create'])->name('school-admin.create');
Route::post('admin/school/store', [SchoolController::class, 'store'])->name('school-admin.store');
Route::get('admin/school/{slug}', [SchoolController::class, 'show'])->name('school-admin.show');

Route::get('faq', function () {
    return view('admin.pages.faq.faq');
});


//berita
Route::get('admin/news', function(){
    return view('admin.pages.news.index');
});
Route::get('admin/news-detail', function(){
    return view('admin.pages.news.detail-news');
});
