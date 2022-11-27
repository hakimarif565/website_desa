<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Pelaku_Usaha;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // dd('a');
        $data_desa  = Desa::first();
        return view('index', ['data' => $data_desa]);
    }
    public function katalog_dinamo()
    {
        // dd('a');
        $dinamos  = Pelaku_Usaha::all();
        return view('katalog_dinamo', ['data' => $dinamos]);
    }
    public function katalog_layanan()
    {
        // dd('a');
        $dinamos  = Pelaku_Usaha::all();
        return view('katalog_layanan', ['data' => $dinamos]);
    }
    public function katalog_umkm()
    {
        // dd('a');
        $dinamos  = Pelaku_Usaha::all();
        return view('katalog_umkm', ['data' => $dinamos]);
    }
    public function katalog_market()
    {
        // dd('a');
        $dinamos  = Pelaku_Usaha::all();
        return view('katalog_bratang_market', ['data' => $dinamos]);
    }
}
