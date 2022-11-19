<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // dd('a');
        $data_desa  = Desa::all();
        return view('index', ['data' => $data_desa]);
    }
}
