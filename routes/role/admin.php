<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function(){
    Route::get('', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('rfid', [RfidController::class, 'index'])->name('rfid-admin.index');
    Route::post('rfid', [RfidController::class, 'store'])->name('rfid-admin.store');
    Route::delete('rfid/{rfid}', [RfidController::class, 'destroy'])->name('rfid-admin.delete');

    //datar sekolah
    Route::get('school', [SchoolController::class, 'index'])->name('school-admin.index');
    Route::get('school/create', [SchoolController::class, 'create'])->name('school-admin.create');
    Route::post('school/store', [SchoolController::class, 'store'])->name('school-admin.store');
    Route::get('school/{slug}', [SchoolController::class, 'show'])->name('school-admin.show');

    Route::get('faq', function () {
        return view('admin.pages.faq.faq');
    });

    //berita
    Route::get('news', function(){
        return view('admin.pages.news.index');
    });
    Route::get('news-detail', function(){
        return view('admin.pages.news.detail-news');
    });
});
