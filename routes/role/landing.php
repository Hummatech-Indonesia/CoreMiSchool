<?php

use Illuminate\Support\Facades\Route;

Route::get('about-us', function(){
    return view('landing.about-us');
})->name('about-us');
Route::get('news-detail', function(){
    return view('landing.news.detail');
})->name('news-detail');

Route::get('news', function(){
    return view('landing.news.news');
})->name('news');

Route::get('testimoni', function(){
    return view('landing.news.testimoni');
})->name('testimoni');