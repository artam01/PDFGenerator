<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index']);
Route::post('/import-users', [UserController::class, 'import_users'])->name('import_users');
Route::get('/export-users', [UserController::class, 'export_users'])->name('export-users');

Route::get('/export_users_pdf', [UserController::class, 'exportUsers'])->name('export-users');

/*Route::get('/', function () {
    return view('users');
});
*/
