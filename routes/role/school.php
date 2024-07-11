<?php

use App\Http\Controllers\LevelClassController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\StaffController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;


Route::get('school', function(){
    return view('school.pages.dashboard');
})->name('school.index');

// pegawai
Route::get('school/employe', [StaffController::class, 'index'])->name('employe.index');
Route::post('school/add-employee', [StaffController::class, 'store'])->name('employe.store');
Route::put('school/update-employee/{employee}', [StaffController::class, 'update'])->name('employe.update');
Route::delete('school/delete-employee/{employee}', [StaffController::class, 'destroy'])->name('employe.delete');

// guru
Route::get('school/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::post('school/add-teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::put('school/update-teacher/{employee}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('school/delete-teacher/{employee}', [TeacherController::class, 'destroy'])->name('teacher.delete');

Route::get('school/detail-teacher', function(){
    return view('school.pages.teacher.detail-teacher');
})->name('detail-teacher.index');

Route::get('school/create-subjects', function(){
    return view('school.pages.teacher.create-subjetcs');
})->name('create-subjects');


//siswa
Route::get('school/student', [StudentController::class, 'index'])->name('school-student.index');
Route::post('school/student', [StudentController::class, 'store'])->name('school-student.store');



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
Route::put('school/update-school-year/{schoolYear}', [SchoolYearController::class, 'update'])->name('school-year.update');
Route::delete('school/delete-school-year/{schoolYear}', [SchoolYearController::class, 'destroy'])->name('school-year.delete');

// tingkatan kelas
Route::get('school/class-level', [LevelClassController::class, 'index'])->name('class-level.index');
Route::post('school/add-class-level', [LevelClassController::class, 'store'])->name('class-level.store');
Route::put('school/update-class-level/{levelClass}', [LevelClassController::class, 'update'])->name('class-level.update');
Route::delete('school/delete-class-level/{levelClass}', [LevelClassController::class, 'destroy'])->name('class-level.delete');

// rfid
Route::get('school/rfid', function(){
    return view('school.pages.rfid.index');
})->name('rfid.index');
