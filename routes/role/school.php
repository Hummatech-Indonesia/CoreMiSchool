<?php

use App\Http\Controllers\SchoolYearController;
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
Route::get('school/school-year', [SchoolYearController::class, 'index'])->name('school-year.index');
Route::post('school/add-school-year', [SchoolYearController::class, 'store'])->name('school-year.store');
Route::put('school/update-school-year', [SchoolYearController::class, 'update'])->name('school-year.update');
Route::delete('school/delete-school-year', [SchoolYearController::class, 'destroy'])->name('school-year.delete');

// tingkatan kelas
Route::get('school/class-level', function(){
    return view('school.pages.class-level.index');
})->name('class-level.index');

// rfid
Route::get('school/rfid', function(){
    return view('school.pages.rfid.index');
})->name('rfid.index');
