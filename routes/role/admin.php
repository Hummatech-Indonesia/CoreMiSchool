<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return view('admin.pages.dashboard');
});

Route::get('rfid-registration', function(){
    return view('admin.pages.absensi.registrasi-rfid');
});

Route::get('list-school', function(){
    return view('admin.pages.list-school.index');
});

Route::get('faq', function () {
    return view('admin.pages.faq.faq');
});
