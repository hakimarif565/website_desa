<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Foto_Video;
use App\Models\Pelaku_Usaha;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // dd('a');
        $data_desa  = Desa::first();
        $foto_video  = Foto_Video::all();
        return view('index', ['data' => $data_desa, 'foto_video' => $foto_video]);
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
