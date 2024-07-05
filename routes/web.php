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


require_once __DIR__ . '/role/admin.php';
require_once __DIR__ . '/role/school.php';
require_once __DIR__ . '/role/staff.php';
require_once __DIR__ . '/role/teacher.php';
require_once __DIR__ . '/role/student.php';