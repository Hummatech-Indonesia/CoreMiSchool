<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Api\RfidApiController;
use App\Http\Controllers\ModelHasRfidController;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\AttendanceTeacherController;
use App\Http\Controllers\Api\AttendanceRuleApiController;

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
    // });
    // Route::get('sync/attendance/teacher', [AttendanceTeacherController::class, 'syncData'])->name('sync.teacher');
