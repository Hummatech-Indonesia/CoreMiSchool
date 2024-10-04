<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Api\RfidApiController;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\Api\AttendanceRuleApiController;
use App\Http\Controllers\Api\LessonScheduleApiController;
use App\Http\Controllers\Api\SchoolDetailController;
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

// Route::middleware(['auth:sanctum'])->group(function () {
Route::post('attendance/add', [AttendanceController::class, 'store'])->name('attendance.add');
// Route::post('add-list-attendance/', [AttendanceStudentController::class, 'store'])->name('add-list-attendance.index');
Route::get('attendance/rfids', [RfidApiController::class, 'index'])->name('rfid.account');
Route::get('attendance/hours', [AttendanceRuleApiController::class, 'index'])->name('attendance.hour');
Route::get('attendance/list', [AttendanceController::class, 'listAttendance']);
Route::get('attendance/reset', [AttendanceController::class, 'reset']);

Route::get('school/detail/{slug}', [SchoolDetailController::class, 'index']);

// });
// Route::get('sync/attendance/teacher', [AttendanceTeacherController::class, 'syncData'])->name('sync.teacher');


Route::get('users-all', function () {
    $users = User::all();
    return response()->json($users);
});

Route::get('test-day-attendance', function () {
    $attendances = App\Models\Attendance::with('model.studentClassroom')->whereDay('created_at', now()->day)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();

    $users = ModelHasRfid::all();
    return response()->json([
        'attendance-count' => count($attendances),
        'user-count' => count($users),
        'attendance' => $attendances,
        'users' => $users
    ]);
});

Route::get('lesson-schedule/{user}', [LessonScheduleApiController::class, 'index']);
Route::get('teacher-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'create']);
Route::get('history-journal/{user}', [LessonScheduleApiController::class, 'history']);
Route::get('detail-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'show']);
Route::post('store-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'store']);
Route::put('update-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'update']);

