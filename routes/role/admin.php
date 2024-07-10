<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('admin.pages.dashboard');
});

// rfid
Route::get('admin/rfid-registration', function(){
    return view('admin.pages.rfid.registrasi-rfid');
});

//datar sekolah
Route::get('admin/list-school', function(){
    return view('admin.pages.list-school.index');
});
Route::get('admin/add-school', function(){
    return view('admin.pages.list-school.add-school');
});


Route::get('faq', function () {
    return view('admin.pages.faq.faq');
});
