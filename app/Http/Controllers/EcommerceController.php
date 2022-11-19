<?php

namespace App\Http\Controllers;

use App\Models\Ecommerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcommerceController extends Controller
{
    public function index()
    {
        $ecommerce = Ecommerce::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/content_market/content_market', ['data' => $ecommerce]);
    }

    public function store(Request $request)
    {
        Ecommerce::create([
            'ecommerce_name'      => $request->ecommerce_name,
        ]);

        return redirect('/ecommerce')->with('success', 'Data Berhasil disimpan');
    }

    public function add()
    {
        return view('admin/content_market/add_content');
    }
}
