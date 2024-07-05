<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


require_once __DIR__ . '/route/admin.php';
require_once __DIR__ . '/route/school.php';
require_once __DIR__ . '/route/staff.php';
require_once __DIR__ . '/route/teacher.php';
require_once __DIR__ . '/route/student.php';