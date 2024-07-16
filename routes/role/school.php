<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceRuleController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\LessonHourController;
use App\Http\Controllers\LevelClassController;
use App\Http\Controllers\MapleController;
use App\Http\Controllers\ModelHasRfidController;
use App\Http\Controllers\SchoolDashboardController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\StaffController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\TeacherMapleController;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Route;

Route::prefix('school')->group(function() {
    Route::get('', [SchoolDashboardController::class, 'index'])->name('school.index');

    // pegawai
    Route::get('employe', [StaffController::class, 'index'])->name('school.employee.index');
    Route::post('add-employee', [StaffController::class, 'store'])->name('employe.store');
    Route::put('update-employee/{employee}', [StaffController::class, 'update'])->name('employe.update');
    Route::delete('delete-employee/{employee}', [StaffController::class, 'destroy'])->name('employe.delete');

    // guru
    Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::post('add-teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::put('update-teacher/{employee}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('delete-teacher/{employee}', [TeacherController::class, 'destroy'])->name('teacher.delete');

    Route::get('detail-teacher/{employee}', [TeacherMapleController::class, 'index'])->name('detail-teacher.index');
    Route::post('add-maple-teacher/{employee}', [TeacherMapleController::class, 'store'])->name('maple-teacher.store');
    Route::put('update-maple-teacher/{teacherMaple}', [TeacherMapleController::class, 'update'])->name('maple-teacher.update');
    Route::delete('delete-maple-teacher/{teacherMaple}', [TeacherMapleController::class, 'destroy'])->name('maple-teacher.delete');

    //mata pelajaran
    Route::get('create-subjects', [MapleController::class, 'index'])->name('create-subjects');
    Route::post('add-subjects', [MapleController::class, 'store'])->name('subjects.store');
    Route::put('update-subjects/{maple}', [MapleController::class, 'update'])->name('subjects.update');
    Route::delete('delete-subjects/{maple}', [MapleController::class, 'destroy'])->name('subjects.delete');

    // jam mata pelajaran
    // Route::get('lesson-hours', [LessonHourController::class, 'index'])->name('lesson-hours.index');
    Route::resource('lesson-hours', LessonHourController::class);

    //siswa
    Route::get('student', [StudentController::class, 'index'])->name('school-student.index');
    Route::post('student', [StudentController::class, 'store'])->name('school-student.store');
    Route::put('student/{student}', [StudentController::class, 'update'])->name('school-student.update');
    Route::delete('student/{student}', [StudentController::class, 'destroy'])->name('school-student.destroy');

    // absen
    // Route::get('clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.index');
    Route::get('clock-settings', function(){
        return view('school.pages.attendace.copy-clock-settings');
    })->name('clock-settings.index');
    Route::get('get-clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.get');
    Route::post('add-clock-settings/{day}/{role}', [AttendanceRuleController::class, 'store'])->name('clock-settings.store');

    Route::get('presence', [AttendanceController::class, 'index'])->name('presence.index');

    Route::get('presence-student', function(){
        return view('school.pages.attendace.student');
    })->name('presence-student.index');

    //alumni
    Route::get('class-alumni', function(){
        return view('school.pages.alumni.class');
    })->name('class-alumni.index');
    
    Route::get('alumni', function(){
        return view('school.pages.alumni.index');
    })->name('alumni.index');

    //Extracurricular
    Route::get('extracurricular', [ExtracurricularController::class, 'index'])->name('extraa.index');
    Route::post('add-extracurricular', [ExtracurricularController::class, 'store'])->name('extraa.store');
    Route::put('update-extracurricular/{extracurricular}', [ExtracurricularController::class, 'update'])->name('extraa.update');
    Route::delete('delete-extracurricular/{extracurricular}', [ExtracurricularController::class, 'destroy'])->name('extraa.delete');

    //kelas
    Route::get('class', [ClassroomController::class, 'index'])->name('class.index');
    Route::post('add-class', [ClassroomController::class, 'store'])->name('class.store');
    Route::put('update-class/{classroom}', [ClassroomController::class, 'update'])->name('class.update');
    Route::delete('delete-class/{classroom}', [ClassroomController::class, 'destroy'])->name('class.delete');

    // detail kelas
    Route::get('detail-class', function(){
        return view('school.pages.class.detail-class');
    })->name('detail-class.index');

    // tahun ajaran
    Route::get('school-year', [SchoolYearController::class, 'index'])->name('school-year.index');
    Route::post('add-school-year', [SchoolYearController::class, 'store'])->name('school-year.store');
    Route::put('update-school-year/{schoolYear}', [SchoolYearController::class, 'update'])->name('school-year.update');
    Route::delete('delete-school-year/{schoolYear}', [SchoolYearController::class, 'destroy'])->name('school-year.delete');

    // tingkatan kelas
    Route::get('class-level', [LevelClassController::class, 'index'])->name('class-level.index');
    Route::post('add-class-level', [LevelClassController::class, 'store'])->name('class-level.store');
    Route::put('update-class-level/{levelClass}', [LevelClassController::class, 'update'])->name('class-level.update');
    Route::delete('delete-class-level/{levelClass}', [LevelClassController::class, 'destroy'])->name('class-level.delete');

    // setting informasi
    Route::get('information', [SchoolDashboardController::class, 'show'])->name('settings-information.index');
    Route::post('information/add-masterKey', [ModelHasRfidController::class, 'storeMaster'])->name('master-key.store');
    Route::get('information/edit', [SchoolDashboardController::class, 'edit'])->name('settings-information.edit');
    Route::put('information/update', [SchoolDashboardController::class, 'update'])->name('settings-information.update');

    // rfid
    Route::get('rfid', [ModelHasRfidController::class, 'index'])->name('rfid-school.index');
    Route::post('rfid', [ModelHasRfidController::class, 'store'])->name('rfid-school.store');
    Route::delete('rfid/{modelHasRfid}', [ModelHasRfidController::class, 'destroy'])->name('rfid-school.delete');

    //rfid for studen and employee
    Route::put('add-to-rfid/{role}/{id}', [ModelHasRfidController::class, 'update'])->name('add-to-rfid.update');

    // rfid aktif
    Route::get('rfid-active', [ModelHasRfidController::class, 'showActive'])->name('rfid-active.index');

    //mata pelajaran
    Route::get('create-subjects', [MapleController::class, 'index'])->name('create-subjects');
    Route::post('add-subjects', [MapleController::class, 'store'])->name('subjects.store');
    Route::put('update-subjects/{maple}', [MapleController::class, 'update'])->name('subjects.update');
    Route::delete('delete-subjects/{maple}', [MapleController::class, 'destroy'])->name('subjects.delete');

    // jam mata pelajaran
    // Route::get('lesson-hours', [LessonHourController::class, 'index'])->name('lesson-hours.index');
    Route::resource('lesson-hours', LessonHourController::class);
    //semeter
    Route::prefix('semesters')->name('semesters.')->group(function() {
        Route::get('/', [SemesterController::class, 'index'])->name('index');
        Route::post('/', [SemesterController::class, 'store'])->name('store');
    });
});


//kelas
Route::get('school/class', [ClassroomController::class, 'index'])->name('class.index');
Route::post('school/add-class', [ClassroomController::class, 'store'])->name('class.store');
Route::put('school/update-class/{classroom}', [ClassroomController::class, 'update'])->name('class.update');
Route::delete('school/delete-class/{classroom}', [ClassroomController::class, 'destroy'])->name('class.delete');
// detail kelas
Route::get('school/{classroom}', [ClassroomController::class, 'show'])->name('class.show');
