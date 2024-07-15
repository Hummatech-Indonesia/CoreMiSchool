<?php

use App\Http\Controllers\AttendanceRuleController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LevelClassController;
use App\Http\Controllers\MapleController;
use App\Http\Controllers\ModelHasRfidController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\StaffController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\TeacherMapleController;
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

Route::get('school/detail-teacher/{employee}', [TeacherMapleController::class, 'index'])->name('detail-teacher.index');
Route::post('school/add-maple-teacher/{employee}', [TeacherMapleController::class, 'store'])->name('maple-teacher.store');
Route::put('school/update-maple-teacher/{teacherMaple}', [TeacherMapleController::class, 'update'])->name('maple-teacher.update');
Route::delete('school/delete-maple-teacher/{teacherMaple}', [TeacherMapleController::class, 'destroy'])->name('maple-teacher.delete');


//mata pelajaran
Route::get('school/create-subjects', [MapleController::class, 'index'])->name('create-subjects');
Route::post('school/add-subjects', [MapleController::class, 'store'])->name('subjects.store');
Route::put('school/update-subjects/{maple}', [MapleController::class, 'update'])->name('subjects.update');
Route::delete('school/delete-subjects/{maple}', [MapleController::class, 'destroy'])->name('subjects.delete');


//semeter
Route::get('school/semesters', function(){
    return view('school.pages.semesters.index');
})->name('semesters.index');


//siswa
Route::get('school/student', [StudentController::class, 'index'])->name('school-student.index');
Route::post('school/student', [StudentController::class, 'store'])->name('school-student.store');
Route::put('school/student/{student}', [StudentController::class, 'update'])->name('school-student.update');
Route::delete('school/student/{student}', [StudentController::class, 'destroy'])->name('school-student.destroy');


// absen
// Route::get('school/clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.index');
Route::get('school/clock-settings', function(){
    return view('school.pages.attendace.copy-clock-settings');
})->name('clock-settings.index');
Route::get('school/get-clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.get');
Route::post('school/add-clock-settings', [AttendanceRuleController::class, 'store'])->name('clock-settings.store');

Route::get('school/presence', function(){
    return view('school.pages.attendace.presence');
})->name('presence.index');
Route::get('school/presence-student', function(){
    return view('school.pages.attendace.student');
})->name('presence-student.index');


//alumni
Route::get('school/alumni', function(){
    return view('school.pages.alumni.index');
})->name('alumni.index');

//Extracurricular
Route::get('school/extracurricular', function(){
    return view('school.pages.extracurricular.index');
})->name('extraa.index');


//kelas
Route::get('school/class', [ClassroomController::class, 'index'])->name('class.index');
Route::post('school/add-class', [ClassroomController::class, 'store'])->name('class.store');
Route::put('school/update-class/{classroom}', [ClassroomController::class, 'update'])->name('class.update');
Route::delete('school/delete-class/{classroom}', [ClassroomController::class, 'destroy'])->name('class.delete');

// detail kelas
Route::get('school/detail-class', function(){
    return view('school.pages.class.detail-class');
})->name('detail-class.index');

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

// setting informasi
Route::get('school/information', function(){
    return view('school.pages.settings.information');
})->name('settings-information.index');

// update informasi
Route::get('school/update-information', function(){
    return view('school.pages.settings.update-information');
})->name('update-information.index');

// rfid
Route::get('school/rfid', [ModelHasRfidController::class, 'index'])->name('rfid-school.index');
Route::post('school/rfid', [ModelHasRfidController::class, 'store'])->name('rfid-school.store');
Route::delete('school/rfid/{modelHasRfid}', [ModelHasRfidController::class, 'destroy'])->name('rfid-school.delete');
