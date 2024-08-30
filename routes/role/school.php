<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\AttendanceRuleController;
use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\AttendanceTeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\ExtracurricularStudentController;
use App\Http\Controllers\LessonHourController;
use App\Http\Controllers\LessonScheduleController;
use App\Http\Controllers\LevelClassController;
use App\Http\Controllers\MapleController;
use App\Http\Controllers\ModelHasRfidController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolDashboardController;
use App\Http\Controllers\SchoolPointController;
use App\Http\Controllers\Schools\AttendanceController as SchoolsAttendanceController;
use App\Http\Controllers\Schools\AttendanceEmployeeController;
use App\Http\Controllers\Schools\AttendanceStudentController as SchoolsAttendanceStudentController;
use App\Http\Controllers\Schools\EmployeeController;
use App\Http\Controllers\Schools\ExtracurricularController as SchoolsExtracurricularController;
use App\Http\Controllers\Schools\JournalTeacherController;
use App\Http\Controllers\Schools\StaffController;
use App\Http\Controllers\Schools\StudentController;
use App\Http\Controllers\Schools\TeacherController;
use App\Http\Controllers\Schools\ViolationAccessController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherSubjectController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->prefix('school')->name('school.')->group(function () {
    Route::post('school-points', [SchoolPointController::class, 'store'])->name('school-points.store');
    Route::get('journals', [JournalTeacherController::class, 'index'])->name('journals.detail');
    Route::patch('max-point/{schoolPoint}', [SchoolPointController::class, 'update'])->name('max-point.update');
    Route::resource('violation', RegulationController::class);
    Route::get('violation-download', [RegulationController::class, 'download'])->name('violation.download');
    Route::post('violation-import', [RegulationController::class, 'import'])->name('violation.import');

    Route::resource('employees', EmployeeController::class);

    // cud and import teacher
    Route::post('teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('teacher/{slug}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::put('teacher/{employee}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('teacher/{employee}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::post('import-teacher/', [TeacherController::class, 'import'])->name('teacher.import');
    Route::get('download-template-teacher/', [TeacherController::class, 'downloadTemplate'])->name('teacher.download-template');

    Route::get('access-violation', [ViolationAccessController::class, 'index'])->name('access-violation.index');
    Route::post('account-acceess', [ViolationAccessController::class, 'store'])->name('account-access-violation');
    Route::delete('delete-account-acceess/{user}', [ViolationAccessController::class, 'destroy'])->name('delete-access.violation');

    //TeacherSubject
    Route::post('teacher-subject/{employee}', [TeacherSubjectController::class, 'store'])->name('teacher-subject.store');
    Route::delete('delete-teacher-subject/{teacherSubject}', [TeacherSubjectController::class, 'destroy'])->name('teacher-subject.destroy');

    // cud and import staff
    Route::post('staff', [StaffController::class, 'store'])->name('staff.store');
    Route::put('staff/{employee}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('staff/{employee}', [StaffController::class, 'destroy'])->name('staff.destroy');
    Route::post('import-staff/', [StaffController::class, 'import'])->name('staff.import');
    Route::get('download-template-staff/', [StaffController::class, 'downloadTemplate'])->name('staff.download-template');

    //import student
    Route::post('import-student/{classroom}', [StudentController::class, 'import'])->name('student.import');
    Route::get('download-template-student/', [StudentController::class, 'downloadTemplate'])->name('student.download-template');

    Route::get('download-template-class-student', [StudentController::class, 'downloadTemplateClass2'])->name('class.download.template');
    // Route::get('doenload-template-class-student', [StudentController::class, 'downloadTemplateClass'])->name('class.download.template');

    Route::resource('students', StudentController::class)->except(['store']);
    Route::post('students/{classroom}', [StudentController::class, 'store'])->name('students.store');

    Route::resource('subject', SubjectController::class);
    Route::resource('school-years', SchoolYearController::class);
    Route::resource('lesson-hours', LessonHourController::class)->except(['store']);
    Route::post('lesson-hours/{day}', [LessonHourController::class, 'store'])->name('lesson-hours.store');
    Route::resource('extracurricular', SchoolsExtracurricularController::class);

    // siswa ekstrakurikuler
    Route::post('extracurricular-students/{extracurricular}', [ExtracurricularStudentController::class, 'store'])->name('extracurricular-students.store');
    Route::delete('extracurricular-students/{extracurricularStudent}', [ExtracurricularStudentController::class, 'destroy'])->name('extracurricular-students.destroy');
    // import siswa ekstrakurikuler
    Route::post('import-extracurricular-student/{extracurricular}', [ExtracurricularStudentController::class, 'import'])->name('extracurricular-students.import');
    Route::get('download-template-extracurricular-student/', [ExtracurricularStudentController::class, 'downloadTemplate'])->name('extracurricular-students.download-template');

    Route::resource('classroom', ClassroomController::class);
    Route::resource('level-class', LevelClassController::class);
    Route::get('class-detail/{classroom}', [ClassroomStudentController::class, 'index'])->name('class-student.index');
    Route::put('update-classroom/{classroom}', [ClassroomStudentController::class, 'update'])->name('student-classroom.update');
    Route::patch('school-years/{schoolYear}/active', [SchoolYearController::class, 'setActive'])->name('school-year.setActive');
    Route::post('import-class-student', [ClassroomStudentController::class, 'import'])->name('class.student.import');

    Route::prefix('semesters')->name('semesters.')->group(function () {
        Route::get('/', [SemesterController::class, 'index'])->name('index');
        Route::post('/', [SemesterController::class, 'store'])->name('store');
    });

    // kehadiran siswa
    Route::get('student-attendance', [SchoolsAttendanceController::class, 'class'])->name('student-attendance.index');
    Route::get('student-attendance/{classroom}', [SchoolsAttendanceController::class, 'student'])->name('student-attendance.show');

    Route::get('export/{classroom}', [SchoolsAttendanceController::class, 'expotStudent'])->name('attendance-student-export.show');
    Route::get('student-attendance/export/{classroom}', [SchoolsAttendanceController::class, 'export_student'])->name('student-attendance.export');

    // kehadiran guru
    Route::get('teacher-attendance', [SchoolsAttendanceController::class, 'teacher'])->name('teacher-attendance.index');
    //export kehadiran guru
    Route::get('teacher-attendance/export', [AttendanceEmployeeController::class, 'export'])->name('teacher-attendance.export');

    // get classroom students by classroom id
    Route::get('classroom-students', [ClassroomStudentController::class, 'show'])->name('classroom-students.show');

    Route::resource('lesson-schedule', LessonScheduleController::class)->except(['show', 'store']);
    Route::post('lesson-schedule/{classroom}/{day}', [LessonScheduleController::class, 'store'])->name('lesson-schedule.store');
    Route::get('lesson-schedule/detail/{classroom}', [LessonScheduleController::class, 'show'])->name('lesson-schedule.detail');
    Route::get('lesson-schedule/export/{classroom}', [LessonScheduleController::class, 'export_pdf'])->name('lesson-schedule.export');

    // Route::get('lesson-schedule', [LessonScheduleController::class, 'index'])->name('lesson-schedule.index');

    // get teacher subject by subject id
    Route::get('teacher-subject/{subject}', [TeacherSubjectController::class, 'show'])->name('teacher-subject.show');

    Route::get('export/attendance-employee', [AttendanceEmployeeController::class, 'export'])->name('export.attendance.employee');
    // return view('school.pages.statistic-presence.export.employee');
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
        return view('school.pages.attendance.clock-settings');
    })->name('clock-settings.index');
    Route::get('get-clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.get');
    Route::post('add-clock-settings/{day}/{role}', [AttendanceRuleController::class, 'store'])->name('clock-settings.store');

    //alumni
    Route::get('class-alumni', [ClassroomController::class, 'classroomAlumni'])->name('class-alumni.index');

    Route::get('alumni/{classroom}', [ClassroomController::class, 'studentAlumni'])->name('alumni.index');

    // setting informasi
    Route::prefix('information')->group(function () {
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

    Route::get('statistic-presence', [SchoolsAttendanceStudentController::class, 'index'])->name('statistic-presence.index');

    Route::get('statistic-presence-employee', [AttendanceEmployeeController::class, 'index'])->name('statistic-presence-employee.index');

    Route::get('detail-presence-class/{classroom}', [SchoolsAttendanceStudentController::class, 'show'])->name('detail-presence-class.index');
    Route::get('detail-presence-class/{classroom}/export', [SchoolsAttendanceStudentController::class, 'exportPreview'])->name('detail-presence-class.export-preview');
});

//tes absensi
Route::post('attendance-create/{school_id}', [AttendanceStudentController::class, 'store'])->name('attendance.store');

Route::get('menu-test', function () {
    return view('school.pages.test.menu');
})->name('menu-test.index');

Route::get('user-list', function () {
    return view('school.pages.test.user-list');
})->name('user-list.index');

Route::get('export-journal', function () {
    return view('school.pages.journals.export');
})->name('export-journal.index');

// list absensi
Route::get('list-attendance', [AttendanceStudentController::class, 'index'])->name('list-attendance.index');
Route::post('add-teacher-list-attendance', [AttendanceTeacherController::class, 'store'])->name('add-teacher-list-attendance.index');

// list absensi guru
Route::get('list-attendance-teacher', [AttendanceTeacherController::class, 'index'])->name('list-attendance-teacher.index');
Route::get('attendance-test', [AttendanceMasterController::class, 'index'])->name('attendance-test.index');
Route::get('attendance-test-teacher', [AttendanceMasterController::class, 'index_teacher'])->name('attendance-test-teacher.index');
Route::post('attendance-test-teacher', [AttendanceMasterController::class, 'check_teacher'])->name('attendance-test-teacher.check');

Route::get('new/school/export/attendance-student', function () {
    return view('school.pages.statistic-presence.export.student');
})->name('new.export.attendance.student');
