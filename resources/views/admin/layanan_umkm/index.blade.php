@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Sarana dan Pengusaha</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/dashboard">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"> Sarana dan Usaha</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Sarana & Pengusaha</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddPelakuUsaha">
                                    <i class="fa fa-plus"></i>
                                    Create
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sarana / Pengusaha</th>
                                            <th>Alamat</th>
                                            <th>Telp.</th>
                                            <th>Deskripsi</th>
                                            <th>Sejarah</th>
                                            <th>Kode Tipe</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($data as $layanan_umkm)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$layanan_umkm->usaha_nama}}</td>
                                            <td>{{$layanan_umkm->usaha_alamat}}</td>
                                            <td>{{$layanan_umkm->usaha_telp}}</td>
                                            <td>{{$layanan_umkm->usaha_deskripsi}}</td>
                                            <td>{{$layanan_umkm->usaha_sejarah}}</td>
                                            <td>{{$layanan_umkm->usaha_tipe}}</td>
                                            <td><img width="150px" src="{{ url('/data_file/'.$layanan_umkm->usaha_img) }}"></td>

                                            <td>
                                                <div>

                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="#modalEditlayanan_umkm{{$layanan_umkm->usaha_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapuslayanan_umkm{{$layanan_umkm->usaha_id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                                    <!-- </form> -->
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalAddPelakuUsaha" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Pelaku Usaha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/add_pelaku_usaha" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_nama" placeholder="Nama Pelaku Usaha ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Alamat Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_alamat" placeholder="Alamat Pelaku Usaha ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Telp Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_telp" placeholder="Telp Pelaku Usaha ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Desk Pelaku Usaha</label>
                        <textarea class="form-control" name="usaha_deskripsi" placeholder="Desk Pelaku Usaha ..."></textarea>
                    </div>

                    <div class="form-grup">
                        <label>Sejarah Pelaku Usaha</label>
                        <textarea class="form-control" name="usaha_sejarah" placeholder="Sejarah Pelaku Usaha ..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tipe Usahak</label>
                        <select class="form-control" name="usaha_tipe" id="item_id" required>
                            <option hidden="">--Pilih Usaha--</option>
                            <option>Dinamo</option>
                            <option>UMKM</option>
                            <option>Layanan Masyarakat</option>
                            <option>Bratang Market</option>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Foto</label><br>
                        <input type="file" name="usaha_img">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



//edit

@foreach($data as $g)
<div class="modal fade" id="modalEditlayanan_umkm{{$g->usaha_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/edit_pelaku_usaha/{{$g->usaha_id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->usaha_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_nama" value="{{$g->usaha_nama}}" placeholder="Nama Pelaku Usaha ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Alamat Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_alamat" value="{{$g->usaha_alamat}}" placeholder="Alamat Pelaku Usaha ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Telp Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_telp" value="{{$g->usaha_telp}}" placeholder="Telp Pelaku Usaha ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Desk Pelaku Usaha</label>
                        <textarea class="form-control" name="usaha_deskripsi" placeholder="Desk Pelaku Usaha ...">{{$g->usaha_deskripsi}}</textarea>
                    </div>

                    <div class="form-grup">
                        <label>Sejarah Pelaku Usaha</label>
                        <textarea class="form-control" name="usaha_sejarah" placeholder="Sejarah Pelaku Usaha ...">{{$g->usaha_sejarah}}</textarea>
                    </div>

                  
                    <div class="form-group">
                        <label>Tipe Usahak</label>
                        <select class="form-control" name="usaha_tipe" id="item_id" required>
                            <option hidden="">--Pilih Usaha--</option>
                            <option {{ $g->usaha_tipe == 'Dinamo' ? 'selected' : '' }} >Dinamo</option>
                            <option {{  $g->usaha_tipe == 'UMKM' ? 'selected' : '' }}>UMKM</option>
                            <option {{  $g->usaha_tipe == 'Layanan Masyarakat' ? 'selected' : '' }}>Layanan Masyarakat</option>
                            <option {{  $g->usaha_tipe == 'Bratang Market' ? 'selected' : '' }}>Bratang Market</option>
                        </select>
                    </div>
                    <div class="form-grup">
                        <label>Foto</label><br>
                        <img src="{{ url('/data_file/'.$g->usaha_img) }}" width="200px" height="200px" alt="">
                        <input type="file" name="usaha_img" src="{{ url('/data_file/'.$g->usaha_img) }}">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

//hapus data

@foreach($data as $la)
<div class="modal fade" id="modalHapuslayanan_umkm{{$la->usaha_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/delete_pelaku_usaha/{id}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{$la->usaha_id}}" name="id" required>

                    <div class="form-grup">
                        <h4>Apakah anda ingin menghapus data ini?</h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i>Hapus Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

@endsection
