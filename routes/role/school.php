<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\AttendanceRuleController;
use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\AttendanceTeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\LessonHourController;
use App\Http\Controllers\LevelClassController;
use App\Http\Controllers\MapleController;
use App\Http\Controllers\ModelHasRfidController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolDashboardController;
use App\Http\Controllers\Schools\EmployeeController;
use App\Http\Controllers\Schools\StaffController;
use App\Http\Controllers\Schools\StudentController;
use App\Http\Controllers\Schools\TeacherController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherMapleController;
use App\Http\Controllers\TeacherSubjectController;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Route;



Route::prefix('school')->name('school.')->group(function() {
    Route::resource('employees', EmployeeController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('students', StudentController::class);
    Route::resource('subject', SubjectController::class);
    Route::resource('school-years', SchoolYearController::class);
    Route::resource('lesson-hours', LessonHourController::class);
    Route::resource('extracurricular', ExtracurricularController::class);
});

Route::prefix('school')->group(function () {
    Route::get('', [SchoolDashboardController::class, 'index'])->name('school.index');

    // pegawai
    // Route::get('employe', [StaffController::class, 'index'])->name('school.employee.index');
    // Route::post('add-employee', [StaffController::class, 'store'])->name('employe.store');
    // Route::put('update-employee/{employee}', [StaffController::class, 'update'])->name('employe.update');
    // Route::delete('delete-employee/{employee}', [StaffController::class, 'destroy'])->name('employe.delete');
    Route::post('import-employee/', [StaffController::class, 'import'])->name('employe.import');
    Route::get('download-template-employee/', [StaffController::class, 'downloadTemplate'])->name('employe.download-template');

    // guru
    // Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
    // Route::post('add-teacher', [TeacherController::class, 'store'])->name('teacher.store');
    // Route::put('update-teacher/{employee}', [TeacherController::class, 'update'])->name('teacher.update');
    // Route::delete('delete-teacher/{employee}', [TeacherController::class, 'destroy'])->name('teacher.delete');

    Route::get('detail-teacher/{employee}', [TeacherSubjectController::class, 'index'])->name('detail-teacher.index');
    Route::post('add-maple-teacher/{employee}', [TeacherSubjectController::class, 'store'])->name('maple-teacher.store');
    Route::put('update-maple-teacher/{teacherMaple}', [TeacherSubjectController::class, 'update'])->name('maple-teacher.update');
    Route::delete('delete-maple-teacher/{teacherMaple}', [TeacherSubjectController::class, 'destroy'])->name('maple-teacher.delete');


    // student
    Route::get('students', [StudentController::class, 'index'])->name('student.index');

    //siswa
    Route::get('old-student', [StudentController::class, 'index'])->name('school-student.index');
    Route::post('student', [StudentController::class, 'store'])->name('school-student.store');
    Route::put('student/{student}', [StudentController::class, 'update'])->name('school-student.update');
    Route::delete('student/{student}', [StudentController::class, 'destroy'])->name('school-student.destroy');

    // absen
    // Route::get('clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.index');
    Route::get('clock-settings', function () {
        return view('school.pages.attendace.copy-clock-settings');
    })->name('clock-settings.index');
    Route::get('get-clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.get');
    Route::post('add-clock-settings/{day}/{role}', [AttendanceRuleController::class, 'store'])->name('clock-settings.store');

    Route::get('class-presence-student', [AttendanceController::class, 'class'])->name('class-presence-student.index');

    Route::get('presence-student/{classroom}', [AttendanceController::class, 'student'])->name('presence-student.index');
    Route::get('presence-student/{classroom}/export', [AttendanceController::class, 'studentExportPreview'])->name('presence-student.export-preview');
    Route::get('presence-student/{classroom}/export/excel', [AttendanceController::class, 'export_student'])->name('presence-student.export');

    Route::get('presence-teacher', [AttendanceController::class, 'teacher'])->name('presence-teacher.index');
    Route::get('presence-teacher/export', [AttendanceController::class, 'teacherExportPreview'])->name('presence-teacher.export-preview');
    Route::get('presence-teacher/export/excel', [AttendanceController::class, 'export_teacher'])->name('presence-teacher.export');

    //alumni
    Route::get('class-alumni', [ClassroomController::class, 'classroomAlumni'])->name('class-alumni.index');

    Route::get('alumni/{classroom}', [ClassroomController::class, 'studentAlumni'])->name('alumni.index');

    //kelas
    Route::get('class', [ClassroomController::class, 'index'])->name('class.index');
    Route::post('add-class', [ClassroomController::class, 'store'])->name('class.store');
    Route::put('update-class/{classroom}', [ClassroomController::class, 'update'])->name('class.update');
    Route::delete('delete-class/{classroom}', [ClassroomController::class, 'destroy'])->name('class.delete');

    // detail kelas
    Route::get('detail-class', function () {
        return view('school.pages.class.detail-class');
    })->name('detail-class.index');

    // tingkatan kelas
    Route::get('class-level', [LevelClassController::class, 'index'])->name('class-level.index');
    Route::post('add-class-level', [LevelClassController::class, 'store'])->name('class-level.store');
    Route::put('update-class-level/{levelClass}', [LevelClassController::class, 'update'])->name('class-level.update');
    Route::delete('delete-class-level/{levelClass}', [LevelClassController::class, 'destroy'])->name('class-level.delete');

    // setting informasi
    Route::prefix('information')->group(function(){
        Route::get('', [SchoolDashboardController::class, 'show'])->name('settings-information.index');
        Route::resource('rfid', RfidController::class);
    });

    Route::post('information/add-masterKey', [ModelHasRfidController::class, 'storeMaster'])->name('master-key.store');
    Route::get('information/edit', [SchoolDashboardController::class, 'edit'])->name('settings-information.edit');
    Route::put('information/update/{school}', [SchoolController::class, 'update'])->name('settings-information.update');

    // rfid
    Route::get('rfid', [ModelHasRfidController::class, 'index'])->name('rfid-school.index');
    Route::post('rfid', [ModelHasRfidController::class, 'store'])->name('rfid-school.store');
    Route::delete('rfid/{modelHasRfid}', [ModelHasRfidController::class, 'destroy'])->name('rfid-school.delete');

    //rfid for studen and employee
    Route::put('add-to-rfid/{role}/{id}', [ModelHasRfidController::class, 'update'])->name('add-to-rfid.update');

    // rfid aktif
    Route::get('rfid-active', [ModelHasRfidController::class, 'showActive'])->name('rfid-active.index');

    //semeter
    Route::prefix('semesters')->name('semesters.')->group(function () {
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

Route::put('school/{classroom}', [ClassroomStudentController::class, 'update'])->name('classroom.update');

//tes absensi
Route::post('attendance-create/{school_id}', [AttendanceStudentController::class, 'store'])->name('attendance.store');

Route::get('menu-test', function () {
    return view('school.pages.test.menu');
})->name('menu-test.index');

Route::get('user-list', function () {return view('school.pages.test.user-list');})->name('user-list.index');

// list absensi
Route::get('list-attendance', [AttendanceStudentController::class, 'index'])->name('list-attendance.index');
Route::post('add-teacher-list-attendance', [AttendanceTeacherController::class, 'store'])->name('add-teacher-list-attendance.index');

// list absensi guru
Route::get('list-attendance-teacher', [AttendanceTeacherController::class, 'index'])->name('list-attendance-teacher.index');
Route::get('attendance-test', [AttendanceMasterController::class, 'index'])->name('attendance-test.index');
Route::get('attendance-test-teacher', [AttendanceMasterController::class, 'index_teacher'])->name('attendance-test-teacher.index');
Route::post('attendance-test-teacher', [AttendanceMasterController::class, 'check_teacher'])->name('attendance-test-teacher.check');







// route baru
//pegawai
Route::get('school/employee', function(){
    return view('school.new.employee.index');
})->name('new.employee.index');
Route::get('new/school/teacher/detail', function(){
    return view('school.new.employee.teacher-detail');
})->name('new.teacher.detail.index');

//kelas
Route::get('new/school/class', function(){
    return view('school.new.class.index');
})->name('new.class.index');
Route::get('new/school/class/detail', function(){
    return view('school.new.class.detail');
})->name('new.class.detail.index');

// tahun ajaran
Route::get('new/school/school-year', function(){
    return view('school.new.school-year.index');
})->name('new.school-year.index');











// url yang berawalan school/ masukkan pada prefix school
// Route::prefix('school')->group(function () {
//     route.....
// });

//LONTONG YAA 1 BIJI SAJA
//SAMA JANGAN LUPA MINTA LONTONG

