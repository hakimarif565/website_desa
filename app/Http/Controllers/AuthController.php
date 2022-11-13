<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/login_page/index');
    }

    public function cek_login(Request $request)
    {

        $password = $request->input('password');
        $name = $request->input('name');

        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            return redirect()->intended('/dashboard')->with('success', 'Login Berhasil');
        } else {
            return redirect()->intended('/')->with('error', 'Username atau Password salah!');
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
