<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\AttendanceStudentController;

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

Route::post('attendance-test', [AttendanceMasterController::class, 'check'])->name('attendance-test.check');
Route::post('add-list-attendance', [AttendanceStudentController::class, 'store'])->name('add-list-attendance.index');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('sync/attendance/student', [AttendanceStudentController::class, 'syncData'])->name('sync.student');
});
