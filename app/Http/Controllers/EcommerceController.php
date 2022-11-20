<?php

namespace App\Http\Controllers;

use App\Models\Ecommerce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcommerceController extends Controller
{
    public function ecommerce()
    {
        $ecommerce = Ecommerce::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/content_market/content_market', ['data' => $ecommerce]);
    }

    public function ecommerce_store(Request $request)
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

    public function ecommerce_add()
    {
        return view('admin/content_market/add_content');
    }

    public function ecommerce_destroy(Request $request, $id)
    {
        $ecommerce = Ecommerce::find($request->id);
        $ecommerce->delete();

        return redirect('/ecommerce')->with('success', 'Data Berhasil diubah');
    }

    public function ecommerce_edit(Request $request, $id)
    {
        $data = $request->all();
        $ecommerce = Ecommerce::find($data['id']);
        if ($ecommerce) {
            Ecommerce::where('ecommerce_id', $data['id'])
                ->update([
                    "ecommerce_name" => $data['ecommerce_name'],
                ]);
        }
        return $this->index();
    }
}
