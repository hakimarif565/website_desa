<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_SESSION['is_login'])) {
            return redirect('/dashboard');
        }

        return view('admin/login_page/login');
    }


    public function cek_login(Request $request)
    {

        $name = $request->input('name');
        $password = $request->input('password');
        
        $user = DB::table('admin_users')
            ->where('user_name', $name)
            ->where('user_password', $password)
            ->first();

        if(!$user){
            return redirect()->intended('/admin_login')->with('error', 'Login gagal');
        }else{
            return redirect()->intended('/dashboard')->with('success', 'Login Berhasil');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function register()
    {
        return view('admin/register_page/register');
    }
    public function register_process()
    {
        return view('admin/register_page/register');
    }
}
