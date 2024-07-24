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
use App\Http\Controllers\Schools\AttendanceController as SchoolsAttendanceController;
use App\Http\Controllers\Schools\EmployeeController;
use App\Http\Controllers\Schools\StaffController;
use App\Http\Controllers\Schools\StudentController;
use App\Http\Controllers\Schools\TeacherController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherSubjectController;
use Illuminate\Support\Facades\Route;



Route::prefix('school')->name('school.')->group(function() {
    Route::resource('employees', EmployeeController::class);

    // cud and import teacher
    Route::post('teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('teacher/{slug}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::put('teacher/{employee}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('teacher/{employee}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::post('import-teacher/', [TeacherController::class, 'import'])->name('teacher.import');
    Route::get('download-template-teacher/', [TeacherController::class, 'downloadTemplate'])->name('teacher.download-template');

    //TeacherSubject
    Route::post('teacher-subject/{employee}', [TeacherSubjectController::class, 'store'])->name('teacher-subject.store');
    Route::delete('delete-teacher-subject/{teacherSubject}', [TeacherSubjectController::class, 'destroy'])->name('teacher-subject.destroy');

    // cud and import staff
    Route::post('staff', [StaffController::class, 'store'])->name('staff.store');
    Route::put('staff/{employee}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('staff/{employee}', [StaffController::class, 'destroy'])->name('staff.destroy');
    Route::post('import-staff/', [StaffController::class, 'import'])->name('staff.import');
    Route::get('download-template-staff/', [StaffController::class, 'downloadTemplate'])->name('staff.download-template');

    Route::post('import-student/{classroom}', [StudentController::class, 'import'])->name('student.import');
    Route::get('download-template-student/', [StudentController::class, 'downloadTemplate'])->name('student.download-template');

    Route::resource('students', StudentController::class)->except(['store']);
    Route::post('students/{classroom}', [StudentController::class, 'store'])->name('students.store');

    Route::resource('subject', SubjectController::class);
    Route::resource('school-years', SchoolYearController::class);
    Route::resource('lesson-hours', LessonHourController::class)->except(['store']);
    Route::post('lesson-hours/{day}', [LessonHourController::class, 'store'])->name('lesson-hours.store');
    Route::resource('extracurricular', ExtracurricularController::class);
    Route::resource('classroom', ClassroomController::class);
    Route::resource('level-class', LevelClassController::class);
    Route::get('class-detail/{classroom}', [ClassroomStudentController::class, 'index'])->name('class-student.index');

    Route::put('update-classroom/{classroom}', [ClassroomStudentController::class, 'update'])->name('student-classroom.update');

    Route::patch('school-years/{schoolYear}/active', [SchoolYearController::class, 'setActive'])->name('school-year.setActive');

    Route::prefix('semesters')->name('semesters.')->group(function () {
        Route::get('/', [SemesterController::class, 'index'])->name('index');
        Route::post('/', [SemesterController::class, 'store'])->name('store');
    });

    // kehadiran siswa
    Route::get('student-attendance', [SchoolsAttendanceController::class, 'class'])->name('student-attendance.index');
    Route::get('student-attendance/{classroom}', [SchoolsAttendanceController::class, 'student'])->name('student-attendance.show');
    //export kehadiran siswa
    Route::get('student-attendance/{classroom}/export', [SchoolsAttendanceController::class, 'export_student'])->name('student-attendance.export');
    // kehadiran guru
    Route::get('teacher-attendance', [SchoolsAttendanceController::class, 'teacher'])->name('teacher-attendance.index');
    //export kehadiran guru
    Route::get('teacher-attendance/export', [SchoolsAttendanceController::class, 'export_teacher'])->name('teacher-attendance.export');
});



Route::prefix('school')->group(function () {
    Route::get('', [SchoolDashboardController::class, 'index'])->name('school.index');

    Route::get('detail-teacher/{employee}', [TeacherSubjectController::class, 'index'])->name('detail-teacher.index');
    Route::post('add-maple-teacher/{employee}', [TeacherSubjectController::class, 'store'])->name('maple-teacher.store');
    Route::put('update-maple-teacher/{teacherMaple}', [TeacherSubjectController::class, 'update'])->name('maple-teacher.update');
    Route::delete('delete-maple-teacher/{teacherMaple}', [TeacherSubjectController::class, 'destroy'])->name('maple-teacher.delete');

    // absen
    // Route::get('clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.index');
    Route::get('clock-settings', function () {
        return view('school.pages.attendace.copy-clock-settings');
    })->name('clock-settings.index');
    Route::get('get-clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.get');
    Route::post('add-clock-settings/{day}/{role}', [AttendanceRuleController::class, 'store'])->name('clock-settings.store');

    //alumni
    Route::get('class-alumni', [ClassroomController::class, 'classroomAlumni'])->name('class-alumni.index');

    Route::get('alumni/{classroom}', [ClassroomController::class, 'studentAlumni'])->name('alumni.index');

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

});

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

