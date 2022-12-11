@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Berita Desa</h4>
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
                        <a href="#">User</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data User</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBerita">
                                    <i class="fa fa-plus"></i>
                                    Tambah
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
                                            <th>Judul Berita</th>
                                            <th>Isi Berita</th>
                                            <th>Lokasi</th>
                                            <th>Jam</th>
                                            <th>Catatan</th>
                                            <th>Foto 1</th>
                                            <th>Foto 2</th>
                                            <th>Foto 3</th>
                                            <th>Video</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($data as $berita)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $berita->berita_name }}</td>
                                            <td>{{ $berita->berita_deskripsi }}</td>
                                            <td>{{ $berita->berita_lokasi }}</td>
                                            <td>{{ $berita->berita_jam }}</td>
                                            <td>{{ $berita->berita_dll }}</td>
                                            <td>@if($berita->berita_foto)<img width="150px" src="{{ url('/data_file/'.$berita->berita_foto) }}">@endif</td>
                                            <td>@if($berita->berita_foto2)<img width="150px" src="{{ url('/data_file/'.$berita->berita_foto2) }}">@endif</td>
                                            <td>@if($berita->berita_foto3)<img width="150px" src="{{ url('/data_file/'.$berita->berita_foto3) }}">@endif</td>
                                            <td>{{ $berita->berita_video }}</td>
                                            <td>
                                                <div>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#modalEdit{{$berita->berita_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapus{{$berita->berita_id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
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


{{-- add data user --}}

<div class="modal fade" id="modalAddBerita" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/berita_add" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Berita</label>
                        <input type="text" class="form-control" name="berita_name" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Berita Deskripsi</label>
                        <textarea type="text" class="form-control" name="berita_deskripsi" placeholder="Deskripsi Berita ..."></textarea>
                    </div>

                    <div class="form-grup">
                        <label>Berita Lokasi</label>
                        <input type="text" class="form-control" name="berita_lokasi" placeholder="Lokasi ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Waktu Berita</label>
                        <input type="datetime-local" class="form-control" name="berita_jam" placeholder="Jam ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Catatan</label>
                        <input type="text" class="form-control" name="berita_dll" placeholder="Catatan ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Foto 1</label><br>
                        <input type="file" name="berita_foto">
                    </div>
                    <div class="form-grup">
                        <label>Foto 2</label><br>
                        <input type="file" name="berita_foto2">
                    </div>
                    <div class="form-grup">
                        <label>Foto 2</label><br>
                        <input type="file" name="berita_foto3">
                    </div>
                    <div class="form-grup">
                        <label>Link Video</label>
                        <input type="text" class="form-control" name="berita_video" placeholder="Link Video ..." required>
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


{{-- //hapus data berita --}}

@foreach($data as $g)
<div class="modal fade" id="modalHapus{{$g->berita_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/delete_berita/{id}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{$g->berita_id}}" name="id" required>

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

// edit data

@foreach($data as $g)
<div class="modal fade" id="modalEdit{{$g->berita_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/berita_edit/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->berita_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Berita</label>
                        <input type="text" class="form-control" name="berita_name" value="{{ $g->berita_name }}" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Berita Deskripsi</label>
                        <textarea type="text" class="form-control" name="berita_deskripsi" placeholder="Deskripsi Berita ...">{{$g->berita_deskripsi}}</textarea>
                    </div>

                    <div class="form-grup">
                        <label>Berita Lokasi</label>
                        <input type="text" class="form-control" name="berita_lokasi" value="{{$g->berita_lokasi}}" placeholder="Lokasi ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Berita Jam</label>
                        <input type="text" class="form-control" name="berita_jam" value="{{$g->berita_jam}}" placeholder="Jam ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Catatan</label>
                        <input type="text" class="form-control" name="berita_dll" value="{{$g->berita_dll}}" placeholder="Catatan ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Foto 1</label><br>
                        <img src="{{ url('/data_file/'.$g->berita_foto) }}" width="200px" height="200px" alt="">
                        <input type="file" name="usaha_img" src="{{ url('/data_file/'.$g->berita_foto) }}">
                    </div>

                    <div class="form-grup">
                        <label>Foto 2</label><br>
                        <img src="{{ url('/data_file/'.$g->berita_foto2) }}" width="200px" height="200px" alt="">
                        <input type="file" name="usaha_img" src="{{ url('/data_file/'.$g->berita_foto2) }}">
                    </div>

                    <div class="form-grup">
                        <label>Foto 3</label><br>
                        <img src="{{ url('/data_file/'.$g->berita_foto) }}" width="200px" height="200px" alt="">
                        <input type="file" name="usaha_img" src="{{ url('/data_file/'.$g->berita_foto3) }}">
                    </div>

                    <div class="form-grup">
                        <label>Link Video</label>
                        <input type="text" class="form-control" name="berita_video" value="{{$g->berita_video}}" placeholder="Link Video ..." required>
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

@endsection