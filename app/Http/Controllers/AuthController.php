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

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')
                ->withSuccess('Signed in');
        }
        return redirect("admin_login")->withSuccess('Login details are not valid');


        // $name = $request->input('name');
        // $password = $request->input('password');

        // $user = DB::table('users')
        //     ->where('name', $name)
        //     ->where('password', $password)
        //     ->first();

        // if($user == NULL){
        //     return redirect()->intended('/admin_login')->with('error', 'Login gagal');
        // }else{
        //     return redirect()->intended('/dashboard')->with('success', 'Login Berhasil');
        // }

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
        if ($id == NULL) {
            $user_id = 1;
        } else {
            $user_id = $id->user_id + 1;
        }
        $request->validate([
            'user_name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'desa_id' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data, $user_id);
        return redirect("/admin_login")->withSuccess('Pendaftaran Berhasil');
    }

    public function create(array $data, int $user_id)
    {
        return User::create([
            'user_id' => $user_id,
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'desa_id' => $data['desa_id'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
