<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EcommerceController;
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

Route::get('/', [FrontController::class, 'index']);

//login register
Route::get('login', array('as' => 'login', function () {
    return view('admin/login_page/login');
}));
Route::post('/check_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/registering', [AuthController::class, 'register_process']);


//All Admin Privilege Page and Process
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'home']);
    //Page Load System
    /* Desa */
    Route::get('/berita', [AdminController::class, 'home']);

    /* user admin */
    Route::get('/user', [AdminController::class, 'user']);
    Route::get('/user_destroy/{id}', [AdminController::class, 'user_destroy']);

    /*Ecommerce*/
    Route::get('/ecommerce', [AdminController::class, 'ecommerce']);
    Route::get('/add_ecommerce', [AdminController::class, 'ecommerce_add']);
    Route::get('/delete_ecommerce/{id}', [AdminController::class, 'ecommerce_destroy']);

    //Post Form System
    Route::post('/user', [AdminController::class, 'user_store']);
    Route::post('/user_edit/{id}', [AdminController::class, 'user_edit']);
    Route::post('/store_ecommerce', [AdminController::class, 'ecommerce_store']);
    Route::post('/edit_ecommerce/{id}', [AdminController::class, 'ecommerce_edit']);
});
