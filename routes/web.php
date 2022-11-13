<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
    return view('welcome');
});
Route::get('/home', function () {
    return view('index');
});
Route::get('/admin_login', function () {
    return view('admin/login_page/login');
});
Route::get('/dashboard', function () {
    return view('admin/dashboard/dashboard');
});
Route::get('/user', function () {
    return view('admin/master/user');
});

//login
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [DashboardController::class, 'index']);
