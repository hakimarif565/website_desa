<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin/layout/layout');
    }
    public function user()
    {
        return view('admin/master/user');
    }
    public function eco()
    {
        return view('admin/content_market/content_market');
    }
}
