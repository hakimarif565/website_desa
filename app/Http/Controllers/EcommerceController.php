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
        $id = Ecommerce::orderByRaw('LENGTH(ecommerce_id) DESC')
            ->orderBy('ecommerce_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->ecommerce_id + 1;
        }
        Ecommerce::create([
            'ecommerce_id'       => $id,
            'ecommerce_name'      => $request->ecommerce_name,
        ]);

        return redirect('/ecommerce')->with('success', 'Data Berhasil disimpan');
    }

    public function add()
    {
        return view('admin/content_market/add_content');
    }

    public function destroy(Request $request, $id)
    {
        $ecommerce = Ecommerce::find($request->id);
        $ecommerce->delete();

        return $this->ecommerce();
    }
}
