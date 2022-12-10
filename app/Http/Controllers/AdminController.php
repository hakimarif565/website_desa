<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Desa;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ecommerce;
use App\Models\Foto_Video;
use App\Models\Pelaku_Usaha;
use App\Models\Produk_Layanan;
use App\Models\ProdukEcommerce;
use App\Models\Rekomendasi;
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

        $berita_foto = $request->file('berita_foto');
        $berita_foto2 = $request->file('berita_foto2');
        $berita_foto3 = $request->file('berita_foto3');

        if (isset($berita_foto)) {
            /* ganti nama file */
            $nama_file = time() . "_" . $berita_foto->getClientOriginalName();

            /* isi dengan nama folder tempat kemana file diupload */
            $tujuan_upload = 'data_file';

            /* upload file */
            $berita_foto->move($tujuan_upload, $nama_file);
        }
        if (isset($berita_foto2)) {
            /* ganti nama file */
            $nama_file_ = time() . "_" . $berita_foto2->getClientOriginalName();

            /* isi dengan nama folder tempat kemana file diupload */
            $tujuan_upload = 'data_file';

            /* upload file */
            $berita_foto2->move($tujuan_upload, $nama_file_);
        }
        if (isset($berita_foto3)) {
            /* ganti nama file */
            $nama_file_1 = time() . "_" . $berita_foto3->getClientOriginalName();

            /* isi dengan nama folder tempat kemana file diupload */
            $tujuan_upload = 'data_file';

            /* upload file */
            $berita_foto3->move($tujuan_upload, $nama_file_1);
        }


        // dd($data);
        Berita::create([
            'berita_id' => $id,
            'berita_name' => $data['berita_name'],
            'berita_deskripsi' => $data['berita_deskripsi'],
            'user_id' => Auth::id(),
            'berita_lokasi' => $data['berita_lokasi'],
            'berita_jam' => $data['berita_jam'],
            'berita_dll' => $data['berita_dll'],
            'berita_foto' => isset($nama_file) ? $nama_file : '',
            'berita_foto2' => isset($nama_file_) ? $nama_file_ : '',
            'berita_foto3' => isset($nama_file_1) ? $nama_file_1 : '',
            'berita_video' => $data['berita_video'],
        ]);
        return redirect('/berita')->with('success', 'Data Berhasil disimpan');
    }
    public function berita_edit(Request $request)
    {
        $data = $request->all();
        $berita = Berita::find($data['id']);
        // dd($data);
        if ($berita) {
            if (isset($data['rekomendasi_img'])) {
                $file = $request->file('rekomendasi_img');

                /* ganti nama file */
                $nama_file = time() . "_" . $file->getClientOriginalName();

                /* isi dengan nama folder tempat kemana file diupload */
                $tujuan_upload = 'data_file';

                /* upload file */
                $file->move($tujuan_upload, $nama_file);
            }


            Berita::where('berita_id', $berita->berita_id)
                ->update([
                    'berita_name' => $data['berita_name'],
                    'berita_deskripsi' => $data['berita_deskripsi'],
                    'user_id' => Auth::id(),
                    'berita_lokasi' => $data['berita_lokasi'],
                    'berita_jam' => $data['berita_jam'],
                    'berita_dll' => $data['berita_dll'],
                    'berita_foto' => isset($data['berita_foto']) ? $nama_file : $berita->berita_foto,
                    'berita_foto2' => isset($data['berita_foto2']) ? $nama_file : $berita->berita_foto2,
                    'berita_foto3' => isset($data['berita_foto3']) ? $nama_file : $berita->berita_foto3,
                    'berita_video' => $data['berita_video'],
                ]);

            return redirect('/berita')->with('success', 'Data Berhasil diubah');
        }
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
            'usaha_tipe' => 'required',
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
            'usaha_tipe' => $data['usaha_tipe'],
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
                    'usaha_tipe' => $data['usaha_tipe'],
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
        $ecommerce = Ecommerce::all();
        return view('admin/produk_ecommerce/index', ['data' => $produk_ecommerce, 'produk_layanan' => $produk, 'ecommerce' => $ecommerce]);
    }

    public function add_produk_ecommerce(Request $request)
    {
        // dd();
        $data = $request->all();

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
            'item_id' => $data['item_id'],
            'ecommerce_id' =>  $data['ecommerce_id'],
            'produk_ecommerce_link1' => $data['produk_ecommerce_link1'],
            'produk_ecommerce_link2' => $data['produk_ecommerce_link2'],
            'produk_ecommerce_link3' => $data['produk_ecommerce_link3'],
        ]);

        return redirect('/produk_ecommerce')->with('success', 'Data Berhasil disimpan');
    }

    /* Produk Layanan */

    public function foto_video()
    {
        $foto_video = Foto_Video::all();
        $jumlah = count($foto_video);
        return view('admin/foto_video/index', ['data' => $foto_video, 'jumlah' => $jumlah]);
    }

    public function foto_video_add(Request $request)
    {
        // dd();
        $id = Foto_Video::orderByRaw('dokumentasi_id DESC')
            ->orderBy('dokumentasi_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->dokumentasi_id + 1;
        }

        $validate = $request->validate([
            'foto' => 'required',
        ]);


        if (!$validate) {
            return redirect('/foto_video')->with('error', 'Data Gagal disimpan');
        }

        $data = $request->all();
        if (isset($data['foto'])) {
            $file = $request->file('foto');

            /* ganti nama file */
            $nama_file = "event$id.jpg";

            /* isi dengan nama folder tempat kemana file diupload */
            $tujuan_upload = 'img/event';

            /* upload file */
            $file->move($tujuan_upload, $nama_file);
        }
        // dd($data);
        Foto_Video::create([
            'dokumentasi_id' => $id,
            'desa_id' => 1,
            'berita_id' => 1,
            'foto' => $nama_file,
        ]);
        return redirect('/foto_video')->with('success', 'Data Berhasil disimpan');
    }

    public function foto_video_edit(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $foto_video = Foto_Video::find($data['id']);
        // dd($data);
        if ($foto_video) {
            if (isset($data['foto'])) {
                $file = $request->file('foto');
                $nama_ = $foto_video->foto;

                /* cek file jika ada */
                /* ganti nama file */
                $nama_file = $nama_;

                /* isi dengan nama folder tempat kemana file diupload */
                $tujuan_upload = 'img/event/';
                if (!empty($foto_video->foto)) {
                    unlink('img/event/' . $foto_video->foto);
                }
                /* upload file */
                $file->move($tujuan_upload, $nama_file);
                Foto_Video::where('dokumentasi_id', $data['id'])
                    ->update([
                        'foto' => $nama_file,
                    ]);
            }
        }
        return $this->foto_video();
    }

    public function foto_video_destroy(Request $request, $id)
    {
        $produk = Produk_Layanan::find($request->id);
        $produk->delete();

        return redirect('/produk')->with('success', 'Data Berhasil diubah');
    }

    public function rekomen()
    {
        $rekomendasi = Rekomendasi::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/rekomendasi/index', ['data' => $rekomendasi]);
    }

    public function rekomen_add(Request $request)
    {
        // dd();
        $data = $request->all();
        // dd($data);
        $id = Rekomendasi::orderByRaw('rekomendasi_id DESC')
            ->orderBy('rekomendasi_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->rekomendasi_id + 1;
        }

        $validate = $request->validate([
            'rekomendasi_name' => 'required',
            'rekomendasi_subname' => 'required',
            'rekomendasi_deskripsi' => 'required',
            'rekomendasi_img' => 'required',
        ]);


        $file = $request->file('rekomendasi_img');

        /* ganti nama file */
        $nama_file = time() . "_" . $file->getClientOriginalName();

        /* isi dengan nama folder tempat kemana file diupload */
        $tujuan_upload = 'data_file';

        /* upload file */
        $file->move($tujuan_upload, $nama_file);


        if (!$validate) {
            return redirect('/rekomendasi')->with('error', 'Data Gagal disimpan');
        }
        // dd($data);
        Rekomendasi::create([
            'rekomendasi_id' => $id,
            'rekomendasi_name' => $data['rekomendasi_name'],
            'rekomendasi_subname' => $data['rekomendasi_subname'],
            'usaha_id' => Auth::id(),
            'rekomendasi_deskripsi' => $data['rekomendasi_deskripsi'],
            'rekomendasi_img' => $nama_file,
        ]);
        return redirect('/rekomendasi')->with('success', 'Data Berhasil disimpan');
    }

    public function rekomen_edit(Request $request, $id)
    {
        $data = $request->all();
        $rekomendasi = Rekomendasi::find($data['id']);
        // dd($data);
        if ($rekomendasi) {
            if (isset($data['rekomendasi_img'])) {
                $file = $request->file('rekomendasi_img');

                /* ganti nama file */
                $nama_file = time() . "_" . $file->getClientOriginalName();

                /* isi dengan nama folder tempat kemana file diupload */
                $tujuan_upload = 'data_file';

                /* upload file */
                $file->move($tujuan_upload, $nama_file);
            }


            Rekomendasi::where('rekomendasi_id', $data['id'])
                ->update([
                    'rekomendasi_id' => $id,
                    'rekomendasi_name' => $data['rekomendasi_name'],
                    'rekomendasi_subname' => $data['rekomendasi_subname'],
                    'usaha_id' => Auth::id(),
                    'rekomendasi_deskripsi' => $data['rekomendasi_deskripsi'],
                    'rekomendasi_img' => isset($data['rekomendasi_img']) ? $nama_file : $rekomendasi->rekomendasi_img,
                ]);
        }
        return $this->rekomen();
    }

    public function rekomen_destroy(Request $request, $id)
    {
        $rekomendasi = Rekomendasi::find($request->id);
        $rekomendasi->delete();

        return redirect('/rekomendasi')->with('success', 'Data Berhasil diubah');
    }
    /* Produk Layanan */

    public function desa()
    {
        $produk = Desa::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/master/desa', ['data' => $produk]);
    }

    public function desa_edit(Request $request, $id)
    {
        $data = $request->all();
        $desa = Desa::find($data['id']);
        if ($desa) {
            Desa::where('desa_id', $data['id'])
                ->update([
                    'desa_sejarah' => $data['desa_sejarah'],
                    'desa_visi' => $data['desa_visi'],
                    'desa_misi' => $data['desa_misi'],
                    'desa_nama' => $data['desa_nama'],
                    'desa_alamat' => $data['desa_alamat'],
                    'desa_telp' => $data['desa_telp'],
                ]);
        }
        return $this->desa();
    }
}
