<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{

    public function index()
    {
        $user = DB::table('admin_users')->all();
        return view('admin.master.user', compact('user'));
    }

    public function create()
    {
        // $user = new User();
        // return view('master.user', compact('user'));
    }

    public function store(Request $request)
    {
        DB::table('admin_users')->create([
            'user_name'       => $request->user_name,
            'user_email'      => $request->user_email,
            'user_password'   => Hash::make($request->user_password),
        ]);

        return redirect('/user')->with('success', 'Data Berhasil disimpan');
    }
}
