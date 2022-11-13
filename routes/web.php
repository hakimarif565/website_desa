<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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
<<<<<<< HEAD

Route::get('/admin_login', function () {
    return view('admin/login_page/login');
});

//login register
// Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [ 'as' => 'login', 'uses' => 'AuthController@index']);
=======
//login register
Route::get('/admin_login', [AuthController::class, 'index'])->name('admin_login');
Route::post('/admin_login/post', [AuthController::class, 'cek_login'])->name('post_login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_process']);
>>>>>>> 12c191d9d4a15f68ce8f304b4788d63b1fab9a93
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['IsLogin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/layout/layout');
    });
    
});


Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', function () {
        return view('admin/layout/layout');
    });

});



