@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Testimoni</h4>
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
                        <a href="#">Rekomendasi / Testimoni</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Rekomendasi / Testimoni</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddRekomendasi">
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
                                            <th>Nama</th>
                                            <th>Subnama</th>
                                            <th>Deskripsi</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($data as $rekomendasi)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$rekomendasi->rekomendasi_name}}</td>
                                            <td>{{$rekomendasi->rekomendasi_subname}}</td>
                                            <td>{{$rekomendasi->rekomendasi_deskripsi}}</td>
                                            <td><img width="150px" src="{{ url('/data_file/'.$rekomendasi->rekomendasi_img) }}"></td>

                                            <td>
                                                <div>

                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="#modalEditRekomendasi{{$rekomendasi->rekomendasi_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapusRekomendasi{{$rekomendasi->rekomendasi_id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
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


<div class="modal fade" id="modalAddRekomendasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Rekomendasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/add_rekomendasi" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="rekomendasi_name" placeholder="Nama ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Subnama</label>
                        <input type="text" class="form-control" name="rekomendasi_subname" placeholder="Subnama..." required>
                    </div>

                    <div class="form-grup">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="rekomendasi_deskripsi" placeholder="Deskripsi ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Foto</label><br>
                        <input type="file" name="rekomendasi_img">
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
<div class="modal fade" id="modalEditRekomendasi{{$g->rekomendasi_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/edit_rekomendasi/{{$g->rekomendasi_id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->rekomendasi_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="rekomendasi_name" value="{{$g->rekomendasi_name}}" placeholder="Nama ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Subnama</label>
                        <input type="text" class="form-control" name="rekomendasi_subname" value="{{$g->rekomendasi_subname}}" placeholder="Subnama ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="rekomendasi_deskripsi" value="{{$g->rekomendasi_deskripsi}}" placeholder="Deskripsi ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Foto</label><br>
                        <img src="{{ url('/data_file/'.$g->rekomendasi_img) }}" width="200px" height="200px" alt="">
                        <input type="file" name="rekomendasi_img" src="{{ url('/data_file/'.$g->rekomendasi_img) }}">
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
<div class="modal fade" id="modalHapusRekomendasi{{$la->rekomendasi_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/delete_rekomendasi/{id}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{$la->rekomendasi_id}}" name="id" required>

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