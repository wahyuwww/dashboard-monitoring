<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/welcome', [AuthController::class, 'login'])->name('login');
// Route::post('/welcome', [AuthController::class, 'show'])->name('show');
Route::get('/employee/chart', [AuthController::class, 'chart']);