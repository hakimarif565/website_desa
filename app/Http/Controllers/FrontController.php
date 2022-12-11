<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Berita;
use App\Models\Desa;
use App\Models\Ecommerce;
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
        $products = DB::table('usaha_layanan')
            ->join('produk_layanan', 'usaha_layanan.usaha_id', '=', 'produk_layanan.usaha_id')// joining the contacts table , where user_id and contact_user_id are same
            ->where('usaha_layanan.usaha_tipe', '=', 'Dinamo')
            ->simplePaginate(9);
        return view('katalog_dinamo', ['datas' => $products]);
    }
    public function katalog_layanan()
    {
        $products = DB::table('usaha_layanan')
            ->join('produk_layanan', 'usaha_layanan.usaha_id', '=', 'produk_layanan.usaha_id')// joining the contacts table , where user_id and contact_user_id are same
            ->where('usaha_layanan.usaha_tipe', '=', 'Layanan Masyarakat')
            ->simplePaginate(9);
        return view('katalog_layanan', ['datas' => $products]);
    }
    public function katalog_umkm()
    {
        $products = DB::table('usaha_layanan')
            ->join('produk_layanan', 'usaha_layanan.usaha_id', '=', 'produk_layanan.usaha_id')// joining the contacts table , where user_id and contact_user_id are same
            ->where('usaha_layanan.usaha_tipe', '=', 'UMKM')
            ->simplePaginate(9);
        return view('katalog_umkm', ['datas' => $products]);
    }
    public function katalog_market()
    {
        $products = DB::table('usaha_layanan')
            ->join('produk_layanan', 'usaha_layanan.usaha_id', '=', 'produk_layanan.usaha_id')// joining the contacts table , where user_id and contact_user_id are same
            ->where('usaha_layanan.usaha_tipe', '=', 'Bratang Market')
            ->simplePaginate(9);
        return view('katalog_bratang_market', ['datas' => $products]);
    }

    public function item_dinamo($slug)
    {
        $detail = DB::table('produk_layanan')
            ->where('produk_layanan.item_id', '=', $slug)
            ->join('usaha_layanan', 'produk_layanan.usaha_id', '=', 'usaha_layanan.usaha_id')// joining the contacts table , where user_id and contact_user_id are same
            ->first();
        $markets = DB::table('produk_ecommerce')
            ->where('produk_ecommerce.item_id', '=', $detail->item_id)
            ->get();
        return view('item_dinamo', ['data' => $detail, 'markets'=>$markets]);
    }
    public function item_layanan($slug)
    {
        $detail  = Produk_Layanan::where('usaha_id', $slug)
            ->first();
        $markets = DB::table('produk_ecommerce')
            ->where('produk_ecommerce.item_id', '=', $detail->item_id)
            ->get();
        return view('item_dinamo', ['data' => $detail, 'markets'=>$markets]);
    }
    public function item_umkm($slug)
    {
        $detail  = Produk_Layanan::where('usaha_id', $slug)
            ->first();
        $markets = DB::table('produk_ecommerce')
            ->where('produk_ecommerce.item_id', '=', $detail->item_id)
            ->get();
        return view('item_dinamo', ['data' => $detail, 'markets'=>$markets]);
    }
    public function item_market($slug)
    {
        $detail  = Produk_Layanan::where('usaha_id', $slug)
            ->first();
        $markets = DB::table('produk_ecommerce')
            ->where('produk_ecommerce.item_id', '=', $detail->item_id)
            ->get();
        return view('item_dinamo', ['data' => $detail, 'markets'=>$markets]);
    }
}
