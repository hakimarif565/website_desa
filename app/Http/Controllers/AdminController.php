<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ecommerce;
use App\Models\Pelaku_Usaha;
use App\Models\Produk_Layanan;
use App\Models\ProdukEcommerce;
use Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function home(User $user)
    {
        return view('admin/dashboard/dashboard');
    }
    public function user()
    {
        $data = User::all();
        return view('admin/master/user', ['data' => $data]);
    }
    public function user_store(Request $request)
    {
        $id = User::orderByRaw('LENGTH(user_id) DESC')
            ->orderBy('user_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $user_id = 1;
        } else {
            $user_id = $id->user_id + 1;
        }

        $validate = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if (!$validate) {
            return view('admin/master/user');
        }

        $data = $request->all();
        // dd($data);
        User::create([
            'user_id' => $user_id,
            'user_name' => $data['full_name'],
            'email' => $data['email'],
            'desa_id' => 1,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        return $this->user();
    }
    public function user_edit(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $user_update = User::find($data['id']);

        if ($user_update) {
            User::where('user_id', $data['id'])
                ->update([
                    'user_name' => $data['full_name'],
                    'email' => $data['email'],
                    'desa_id' => 1,
                    'username' => $data['username'],
                    'password' => isset($data['password']) ? Hash::make($data['password']) : $user_update->password,
                ]);
        }
        return $this->user();
        // return view('admin/master/user', ['data_user' => $user]);
    }

    public function user_destroy(Request $request, $id)
    {
        $user = User::find($request->id);
        $user->delete();

        return $this->user();
    }

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
        return $this->ecommerce();
    }

    public function berita()
    {
        $beritas = Berita::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/master/desa_berita', ['data' => $beritas]);
    }
    public function berita_add(Request $request)
    {
        $beritas = Berita::all();
        $data = $request->all();
        $id = Berita::orderByRaw('berita_id DESC')
            ->orderBy('berita_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->berita_id + 1;
        }

        $data = $request->all();
        // dd($data);
        Berita::create([
            'berita_id' => $id,
            'berita_name' => $data['berita_name'],
            'berita_deskripsi' => $data['berita_deskripsi'],
            'user_id' => Auth::id(),
            'berita_lokasi' => $data['berita_lokasi'],
            'berita_jam' => $data['berita_jam'],
            'berita_dll' => $data['berita_dll'],
        ]);
        return redirect('/berita')->with('success', 'Data Berhasil disimpan');
    }
    public function berita_edit(Request $request)
    {
        $data = $request->all();
        $berita = Berita::find($data['id']);
        // dd($data);
        if ($berita) {
            Berita::where('berita_id', $berita->berita_id)
                ->update([
                    'berita_name' => $data['berita_name'],
                    'berita_deskripsi' => $data['berita_deskripsi'],
                    'user_id' => Auth::id(),
                    'berita_lokasi' => $data['berita_lokasi'],
                    'berita_jam' => $data['berita_jam'],
                    'berita_dll' => $data['berita_dll'],
                ]);
        }
        return redirect('/berita')->with('success', 'Data Berhasil diubah');
    }

    public function berita_destroy(Request $request)
    {
        $berita = Berita::find($request->id);
        $berita->delete();

        return redirect('/berita')->with('success', 'Data Berhasil dihapus');
    }

    public function pelaku_usaha()
    {
        $pelaku_usaha = Pelaku_Usaha::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/layanan_umkm/index', ['data' => $pelaku_usaha]);
    }

    public function pelaku_usaha_add(Request $request)
    {
        // dd();
        $id = Pelaku_Usaha::orderByRaw('usaha_id DESC')
            ->orderBy('usaha_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->usaha_id + 1;
        }

        $validate = $request->validate([
            'usaha_nama' => 'required',
            'usaha_alamat' => 'required',
            'usaha_telp' => 'required',
            'usaha_deskripsi' => 'required',
            'usaha_sejarah' => 'required',
            'usaha_keahlian' => 'required',
            'usaha_img' => 'required',
        ]);


        $file = $request->file('usaha_img');

        /* ganti nama file */
        $nama_file = time() . "_" . $file->getClientOriginalName();

        /* isi dengan nama folder tempat kemana file diupload */
        $tujuan_upload = 'data_file';

        /* upload file */
        $file->move($tujuan_upload, $nama_file);


        if (!$validate) {
            return redirect('/pelaku_usaha')->with('error', 'Data Gagal disimpan');
        }

        $data = $request->all();
        // dd($data);
        Pelaku_Usaha::create([
            'usaha_id' => $id,
            'usaha_nama' => $data['usaha_nama'],
            'usaha_alamat' => $data['usaha_alamat'],
            'user_id' => Auth::id(),
            'usaha_telp' => $data['usaha_telp'],
            'usaha_deskripsi' => $data['usaha_deskripsi'],
            'usaha_sejarah' => $data['usaha_sejarah'],
            'usaha_keahlian' => $data['usaha_keahlian'],
            'usaha_img' => $nama_file,
        ]);
        return redirect('/pelaku_usaha')->with('success', 'Data Berhasil disimpan');
    }

    public function pelaku_usaha_destroy(Request $request, $id)
    {
        $ecommerce = Pelaku_Usaha::find($request->id);
        $ecommerce->delete();

        return redirect('/pelaku_usaha')->with('success', 'Data Berhasil diubah');
    }

    public function pelaku_usaha_edit(Request $request, $id)
    {
        $data = $request->all();
        $pelaku_usaha = Pelaku_Usaha::find($data['id']);
        // dd($data);
        if ($pelaku_usaha) {
            if (isset($data['usaha_img'])) {
                $file = $request->file('usaha_img');

                /* ganti nama file */
                $nama_file = time() . "_" . $file->getClientOriginalName();

                /* isi dengan nama folder tempat kemana file diupload */
                $tujuan_upload = 'data_file';

                /* upload file */
                $file->move($tujuan_upload, $nama_file);
            }


            Pelaku_Usaha::where('usaha_id', $data['id'])
                ->update([
                    'usaha_nama' => $data['usaha_nama'],
                    'usaha_alamat' => $data['usaha_alamat'],
                    'user_id' => Auth::id(),
                    'usaha_telp' => $data['usaha_telp'],
                    'usaha_deskripsi' => $data['usaha_deskripsi'],
                    'usaha_sejarah' => $data['usaha_sejarah'],
                    'usaha_keahlian' => $data['usaha_keahlian'],
                    'usaha_img' => isset($data['usaha_img']) ? $nama_file : $pelaku_usaha->usaha_img,
                ]);
        }
        return $this->pelaku_usaha();
    }

    /* Produk Layanan */

    public function produk()
    {
        $produk = Produk_Layanan::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/produk_layanan/index', ['data' => $produk]);
    }

    public function produk_add(Request $request)
    {
        // dd();
        $id = Produk_Layanan::orderByRaw('item_id DESC')
            ->orderBy('item_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->item_id + 1;
        }

        $validate = $request->validate([
            'item_name' => 'required',
            'item_deskripsi' => 'required',
            'item_harga' => 'required',
            'item_dll' => 'required',
        ]);


        if (!$validate) {
            return redirect('/produk')->with('error', 'Data Gagal disimpan');
        }

        $data = $request->all();
        // dd($data);
        Produk_Layanan::create([
            'item_id' => $id,
            'item_name' => $data['item_name'],
            'item_deskripsi' => $data['item_deskripsi'],
            'item_harga' => $data['item_harga'],
            'item_dll' => $data['item_dll'],
            'usaha_id' => 1,
        ]);
        return redirect('/produk')->with('success', 'Data Berhasil disimpan');
    }

    public function produk_edit(Request $request, $id)
    {
        $data = $request->all();
        $produk = Produk_Layanan::find($data['id']);

        Produk_Layanan::where('item_id', $data['id'])
            ->update([
                'item_id' => $id,
                'item_name' => $data['item_name'],
                'item_deskripsi' => $data['item_deskripsi'],
                'item_harga' => $data['item_harga'],
                'item_dll' => $data['item_dll'],
                'usaha_id' => 1,
            ]);

        return $this->produk();
    }

    public function produk_destroy(Request $request, $id)
    {
        $produk = Produk_Layanan::find($request->id);
        $produk->delete();

        return redirect('/produk')->with('success', 'Data Berhasil diubah');
    }

    /* Produk Ecommerce */

    public function produk_ecommerce()
    {
        $produk_ecommerce = ProdukEcommerce::join('produk_layanan', 'produk_layanan.item_id', '=', 'produk_ecommerce.item_id')
            ->join('ecommerce', 'ecommerce.ecommerce_id', '=', 'produk_ecommerce.ecommerce_id')
            ->get();
        // dd($produk_ecommerce);

        $produk = Produk_Layanan::all();
        return view('admin/produk_ecommerce/index', ['data' => $produk_ecommerce, 'produk_layanan' => $produk]);
    }

    public function add_produk_ecommerce(Request $request)
    {
        // dd();
        $data = $request->all();
        $data_ = ProdukEcommerce::orderBy('ecommerce_id', 'DESC')
            ->first();

        $id = isset($data_) ?  $data_->ecommerce_id + 1 : 1;
        // dd($id);
        $validate = $request->validate([
            'produk_ecommerce_link1' => 'required',
            'produk_ecommerce_link2' => 'required',
            'produk_ecommerce_link3' => 'required',
        ]);


        if (!$validate) {
            return redirect('/produk_ecommerce')->with('error', 'Data Gagal disimpan');
        }


        ProdukEcommerce::create([
            'item_id' => $id,
            'ecommerce_id' =>  $data['item_id'],
            'produk_ecommerce_link1' => $data['produk_ecommerce_link1'],
            'produk_ecommerce_link2' => $data['produk_ecommerce_link2'],
            'produk_ecommerce_link3' => $data['produk_ecommerce_link3'],
        ]);

        return redirect('/produk_ecommerce')->with('success', 'Data Berhasil disimpan');
    }
}
