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
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        // $user = User::all();
        // $user->name       = $request->name;
        // $user->email      = $request->email;
        // $user->password   = Hash::make($request->password);
        // $user->level      = $request->level;
        // $user->created_at = $request->created_at;
        // $user->updated_at = $request->updated_at;

        // $user->save();
        return redirect('/user')->with('success', 'Data Berhasil disimpan');
    }


    public function update(Request $request, $id)
    {
        $user = DB::Userfind($id);

        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->password      = Hash::make($request->password);
        $user->level         = $request->level;
        $user->updated_at    = date('Y-m-d H:i:s');

        $user->save();

        return redirect('/user')->with('success', 'Data Berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('/user')->with('success', 'Data Berhasil diubah');
    }
}
