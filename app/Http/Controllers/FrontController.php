<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Desa;
use App\Models\Foto_Video;
use App\Models\Pelaku_Usaha;
use App\Models\Produk_Layanan;
use App\Models\ProdukEcommerce;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // dd('a');
        $data_desa  = Desa::first();
        $beritas = Berita::get();
        $rekomendasis = Rekomendasi::get();
        return view('index', ['data' => $data_desa, 'berita' => $beritas, 'rekomendasi' => $rekomendasis]);
    }
    public function berita($slug)
    {
        // dd('a');
        $data_berita  = Berita::where('berita_id', $slug)
                    ->first();
        return view('detail_berita', ['data' => $data_berita]);
    }
    public function desa($slug)
    {
        // dd('a');
        $data_desa  = Desa::where('desa_nama', $slug)
                    ->first();
        return view('detail_profil', ['data' => $data_desa]);
    }

    public function katalog_dinamo()
    {
        // dd('a');
        $items  = Pelaku_Usaha::where('usaha_tipe', 'Dinamo')
                    ->simplePaginate(9);
        return view('katalog_dinamo', ['datas' => $items]);
    }
    public function katalog_layanan()
    {
        // dd('a');
        $items  = Pelaku_Usaha::where('usaha_tipe', 'Layanan Masyarakat')
                    ->simplePaginate(9);
        return view('katalog_layanan', ['datas' => $items]);
    }
    public function katalog_umkm()
    {
        // dd('a');
        $items  = Pelaku_Usaha::where('usaha_tipe', 'UMKM')
                    ->simplePaginate(9);
        return view('katalog_umkm', ['datas' => $items]);
    }
    public function katalog_market()
    {
        // dd('a');
        $items  = Pelaku_Usaha::where('usaha_tipe', 'Bratang Market')
                    ->simplePaginate(9);
        return view('katalog_bratang_market', ['datas' => $items]);
    }

    public function item_dinamo($slug)
    {
        $item  = Pelaku_Usaha::where('usaha_tipe', "Dinamo")
                    ->where('usaha_id', $slug)
                    ->first();
        $tipe = $item->usaha_tipe;
        $detail = Produk_Layanan::where('usaha_id', $item->usaha_id)
                    ->first();
        return view('item_details', ['data' => $item, 'tipe'=> $tipe, 'detail' =>$detail]);
    }
    public function item_layanan($slug)
    {
        $item  = Pelaku_Usaha::where('usaha_tipe', "Layanan Masyarakat")
                    ->where('usaha_id', $slug)
                    ->first();
        $tipe = $item->usaha_tipe;
        $detail = Produk_Layanan::where('usaha_id', $item->usaha_id)
                    ->first();
        return view('item_details', ['data' => $item, 'tipe'=> $tipe, 'detail' => $detail]);
    }
    public function item_umkm($slug)
    {
        $item  = Pelaku_Usaha::where('usaha_tipe', "Umkm")
                    ->where('usaha_id', $slug)
                    ->first();
        $tipe = $item->usaha_tipe;
        $detail = Produk_Layanan::where('usaha_id', $item->usaha_id)
                    ->first();
        $markets = ProdukEcommerce::where('item_id', $detail->item_id)
                    ->get();
        return view('item_details', ['data' => $item, 'tipe'=>$tipe, 'detail' =>$detail, 'markets' => $markets]);
    }
    public function item_market($slug)
    {
        $item  = Pelaku_Usaha::where('usaha_tipe', "Bratang Market")
                    ->where('usaha_id', $slug)
                    ->first();
        $tipe = $item->usaha_tipe;
        $detail = Produk_Layanan::where('usaha_id', $item->usaha_id)
                    ->first();
        $markets = ProdukEcommerce::where('item_id', $detail->item_id)
                    ->get();
        return view('item_details', ['data' => $item, 'tipe'=>$tipe, 'detail' =>$detail, 'markets' => $markets]);
    }
}
