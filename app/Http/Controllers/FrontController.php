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
        $items  = Pelaku_Usaha::all();
        return view('katalog_dinamo', ['data' => $items]);
    }
    public function katalog_layanan()
    {
        // dd('a');
        $items  = Pelaku_Usaha::all();
        return view('katalog_layanan', ['data' => $items]);
    }
    public function katalog_umkm()
    {
        // dd('a');
        $items  = Pelaku_Usaha::all();
        return view('katalog_umkm', ['data' => $items]);
    }
    public function katalog_market()
    {
        // dd('a');
        $items  = Pelaku_Usaha::all();
        return view('katalog_bratang_market', ['data' => $items]);
    }

    public function item_dinamo($slug)
    {
        $item  = Pelaku_Usaha::where(['usaha_tipe'=='Dinamo'])
                ->where(['usaha_id'==$slug])
                ->first();
        return view('katalog_dinamo', ['data' => $item]);
    }
    public function item_layanan($slug)
    {
        $item  = Pelaku_Usaha::where(['usaha_tipe'=='Layanan'])
                ->where(['usaha_id'==$slug])
                ->first();
        return view('katalog_layanan', ['data' => $item]);
    }
    public function item_umkm($slug)
    {
        $item  = Pelaku_Usaha::where(['usaha_tipe'=='UMKM'])
                ->where(['usaha_id'==$slug])
                ->first();
        return view('katalog_umkm', ['data' => $item]);
    }
    public function item_market($slug)
    {
        $item  = Pelaku_Usaha::where(['usaha_tipe'=='Bratang Market'])
                ->where(['usaha_id'==$slug])
                ->first();
        return view('katalog_bratang_market', ['data' => $item]);
    }
}
