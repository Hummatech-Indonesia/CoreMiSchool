<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Api\RfidApiController;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\Api\AttendanceRuleApiController;
use App\Http\Controllers\Api\LessonScheduleApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\SchoolDetailController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Schools\PermissionController;
use App\Models\ModelHasRfid;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('attendace/masterkey-check', [AttendanceMasterController::class, 'check'])->name('attendance-test.check');
Route::post('attendance/add', [AttendanceController::class, 'store'])->name('attendance.add');
Route::get('attendance/rfids', [RfidApiController::class, 'index'])->name('rfid.account');
Route::get('attendance/hours', [AttendanceRuleApiController::class, 'index'])->name('attendance.hour');
Route::get('attendance/list', [AttendanceController::class, 'listAttendance']);
Route::get('attendance/reset', [AttendanceController::class, 'reset']);
Route::get('school/detail/{slug}', [SchoolDetailController::class, 'index']);

Route::get('users-all', function () {
    $users = User::all();
    return response()->json($users);
});

Route::get('test-day-attendance', function () {
    $attendances = App\Models\Attendance::whereDay('created_at', now()->day)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();

    $users = ModelHasRfid::all();
    return response()->json([
        'attendance-count' => count($attendances),
        'user-count' => count($users),
        'attendance' => $attendances,
        'users' => $users
    ]);
});



Route::get('/run-command', function () {
    // Menjalankan command
    \Illuminate\Support\Facades\Artisan::call('command:create-attendance');

    // Opsional: Menampilkan output dari command
    $output = \Illuminate\Support\Facades\Artisan::output();

    // Kembalikan response ke pengguna
    return response()->json([
        'status' => 'success',
        'output' => $output,
    ]);
});

Route::post('login', [LoginApiController::class, 'login']);
Route::get('student/dashboard/{user}', [StudentApiController::class, 'index']);
Route::get('student/history-attendance/{user}', [StudentApiController::class, 'history_attendance']);

Route::get('student/violation/{user}', [StudentApiController::class, 'violation']);
Route::get('student/repair/{user}', [StudentApiController::class, 'repair']);
Route::put('student/repair/{studentRepair}', [StudentApiController::class, 'update_repair']);
Route::get('feedback-active', [PermissionController::class, 'is_active']);
Route::get('student/class-feedback/{user}', [StudentApiController::class, 'class_and_feedback']);
Route::post('student/class-feedback/store/{lessonSchedule}/{user}', [StudentApiController::class, 'store_feedback']);
Route::put('student/class-feedback/update/{feedback}', [StudentApiController::class, 'update_feedback']);
Route::delete('student/class-feedback/delete/{feedback}', [StudentApiController::class, 'destroy_feedback']);

Route::get('lesson-schedule/{user}', [LessonScheduleApiController::class, 'index']);
Route::get('teacher-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'create']);
Route::get('history-journal/{user}', [LessonScheduleApiController::class, 'history']);
Route::get('detail-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'show']);
Route::post('store-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'store']);
Route::put('update-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'update']);
