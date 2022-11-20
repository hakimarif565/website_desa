@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Layanan UMKM</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/home">
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
                        <a href="#"> Layanan UMKM</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Layanan UMKM</h4>
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
                                            <th>Nama Pelaku Usaha</th>
                                            <th>Alamat Pelaku Usaha</th>
                                            <th>Telp Pelaku Usaha</th>
                                            <th>Deskripsi Pelaku Usaha</th>
                                            <th>Sejarah Pelaku Usaha</th>
                                            <th>Keahlian Pelaku Usaha</th>
                                            <th>Image Pelaku Usaha</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $ecommerce)
                                        <tr>
                                            <td>{{$ecommerce->ecommerce_id}}</td>
                                            <td>{{$ecommerce->usaha_nama}}</td>
                                            <td>{{$ecommerce->usaha_alamat}}</td>
                                            <td>{{$ecommerce->usaha_telp}}</td>
                                            <td>{{$ecommerce->usaha_deskripsi}}</td>
                                            <td>{{$ecommerce->usaha_sejarah}}</td>
                                            <td>{{$ecommerce->usaha_keahlian}}</td>
                                            <td>{{$ecommerce->usaha_img}}</td>

                                            <td>
                                                <div>

                                                    @csrf
                                                    @method('DELETE')

                                                    <a href="#modalEditEcommerce{{$ecommerce->ecommerce_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapusEcommerce{{$ecommerce->ecommerce_id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
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
            <form action="/user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_nama" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Alamat Pelaku Usaha</label>
                        <input type="text" class="form-control" name="usaha_alamat" placeholder="Username ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password ..." required>
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
<div class="modal fade" id="modalEditEcommerce{{$g->ecommerce_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/edit_ecommerce/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->ecommerce_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Ecommerce</label>
                        <input type="text" value="{{$g->ecommerce_name}}" class="form-control" name="ecommerce_name" placeholder="Nama Ecommerce ..." required>
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

@foreach($data as $e)
<div class="modal fade" id="modalHapusEcommerce{{$e->ecommerce_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/delete_ecommerce/{id}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{$e->ecommerce_id}}" name="id" required>

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