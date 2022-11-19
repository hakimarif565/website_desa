<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\AuthenticationException;
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
    return view('index');
});
Route::get('/home', function () {
    return view('index');
});

//login register
Route::get('login',array('as'=>'login',function(){
    return view('admin/login_page/login');
}));
Route::post('/check_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/registering', [AuthController::class, 'register_process']);


//All Admin Privilege Page and Process
Route::group(['middleware' => ['auth']], function () {
    //Page Load System
    Route::get('/dashboard', [AdminController::class, 'home']);
    Route::get('/user', [AdminController::class, 'user']);

    //Post Form System
    Route::post('/store_admin', [UserController::class, 'store']);
});
