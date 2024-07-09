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
Route::get('school/attendance', function(){
    return view('school.pages.attendace.index');
})->name('attendance.index');


//alumni
Route::get('school/alumni', function(){
    return view('school.pages.alumni.index');
})->name('alumni.index');
