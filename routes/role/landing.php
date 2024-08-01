<?php

use Illuminate\Support\Facades\Route;

Route::get('about-us', function(){
    return view('landing.about-us');
})->name('about-us');

Route::get('news', function(){
    return view('landing.news');
})->name('news');