<?php

use Illuminate\Support\Facades\Route;


Route::get('school', function(){
    return view('school.pages.dashboard');
})->name('school.index');

// pegawai
Route::get('school/employe', function(){
    return view('school.pages.employe.index');
})->name('employe.index');

// guru
Route::get('school/teacher', function(){
    return view('school.pages.teacher.index');
})->name('teacher.index');

Route::get('school/detail-teacher', function(){
    return view('school.pages.teacher.detail-teacher');
})->name('detail-teacher.index');

Route::get('school/create-subjects', function(){
    return view('school.pages.teacher.create-subjetcs');
})->name('create-subjects');


//siswa
Route::get('school/student', function(){
    return view('school.pages.student.index');
});
Route::get('school/student-class', function(){
    return view('school.pages.student.student-class');
});


// absen
Route::get('school/clock-settings', function(){
    return view('school.pages.attendace.clock-settings');
})->name('clock-settings.index');

Route::get('school/presence', function(){
    return view('school.pages.attendace.presence');
})->name('presence.index');


//alumni
Route::get('school/alumni', function(){
    return view('school.pages.alumni.index');
})->name('alumni.index');

//Extracurricular
Route::get('school/extracurricular', function(){
    return view('school.pages.extracurricular.index');
})->name('extraa.index');


//kelas
Route::get('school/class', function(){
    return view('school.pages.class.index');
})->name('class.index');

// tahun ajaran
Route::get('school/school-year', function(){
    return view('school.pages.school-year.index');
})->name('school-year.index');

// tingkatan kelas
Route::get('school/class-level', function(){
    return view('school.pages.class-level.index');
})->name('class-level.index');