<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin/layout/layout');
    }
    public function user()
    {
        $data = User::all();
        return view('admin/master/user', ['data' => $data]);
    }
    public function store(Request $request)
    {
        $id = User::orderByRaw('LENGTH(user_id) DESC')
            ->orderBy('user_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $user_id = 1;
        } else {
            $user_id = $id->user_id + 1;
        }

        $validate = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if (!$validate) {
            return view('admin/master/user');
        }

        $data = $request->all();
        // dd($data);
        User::create([
            'user_id' => $user_id,
            'user_name' => $data['full_name'],
            'email' => $data['email'],
            'desa_id' => 1,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        return $this->user();
    }
    public function edit(Request $request, $id)
    {
        // dd($id);
        $user = User::find($id);
        return view('admin/master/user', ['data_user' => $user]);
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($request->id);
        $user->delete();

        return $this->user();
    }

    public function eco()
    {
        return view('admin/content_market/content_market');
    }
}
