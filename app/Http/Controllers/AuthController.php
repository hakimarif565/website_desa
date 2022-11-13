<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Hash;



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
    public function register_process(Request $request, User $post)
    {
        $id = User::orderByRaw('LENGTH(user_id) DESC')
            ->orderBy('user_id', 'DESC')
            ->first();
        if ($id == NULL){
            $user_id = 1;
        }
        else{
            $user_id = $id->user_id + 1;
        }

        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users',
            'user_password' => 'required',
            'desa_id' => 'required',
        ]);
        $data = $request->all();
        $check = $this->create($data, $user_id);

        return redirect("/login")->withSuccess('Pendaftaran Berhasil');

    }

    public function create(array $data, int $user_id)
    {
      return User::create([
        'user_id' => $user_id,
        'user_name' => $data['user_name'],
        'user_email' => $data['user_email'],
        'desa_id' => $data['desa_id'],
        'user_password' => Hash::make($data['user_password']),
      ]);
    }

}
