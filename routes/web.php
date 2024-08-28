<?php

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Exports\JadwalPelajaranExport;
use App\Http\Controllers\imports\ImportController;

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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Auth::routes();

require_once __DIR__ . '/role/admin.php';
require_once __DIR__ . '/role/school.php';
require_once __DIR__ . '/role/staff.php';
require_once __DIR__ . '/role/teacher.php';
require_once __DIR__ . '/role/student.php';
require_once __DIR__ . '/role/landing.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('import-jadwal', function() {
    return view('home-import');
});
Route::get('/customizing-column', function () {
    // return (new InvoicesExport)->download('data.xlsx');
    return Excel::download(new JadwalPelajaranExport, 'template_jadwal_pelajaran.xlsx');
})->name('template');

Route::post('import', [ImportController::class, 'import'])->name('import');
Route::post('importSpreadsheet', [ImportController::class, 'importSpreadsheet'])->name('import-spreadsheet');
