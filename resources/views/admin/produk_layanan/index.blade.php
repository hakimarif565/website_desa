@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Produk Layanan UMKM</h4>
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
                        <a href="#">Produk</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Produk</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddProduk">
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
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Etc</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($data as $produk)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$produk->item_name}}</td>
                                            <td>{{$produk->item_deskripsi}}</td>
                                            <td>{{$produk->item_harga}}</td>
                                            <td>{{$produk->item_dll}}</td>
                                            <td>
                                                <div>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#modalEditProduk{{$produk->item_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapusProduk{{$produk->item_id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
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

// add data

<div class="modal fade" id="modalAddProduk" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/add_produk" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="item_name" placeholder="Nama Produk ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="item_deskripsi" placeholder="Deskripsi ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="item_harga" placeholder="Harga ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Etc</label>
                        <input type="text" class="form-control" name="item_dll" placeholder="Etc ..." required>
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


@foreach($data as $g)

<div class="modal fade" id="modalEditProduk{{$g->item_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/edit_produk/{{$g->item_id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->item_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="item_name" value="{{$g->item_name}}" placeholder="Nama Produk ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="item_deskripsi" value="{{$g->item_deskripsi}}" placeholder="Deskripsi ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="item_harga" value="{{$g->item_harga}}" placeholder="Harga ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Etc</label>
                        <input type="text" class="form-control" name="item_dll" value="{{$g->item_dll}}" placeholder="Etc ..." required>
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

@foreach($data as $p)
<div class="modal fade" id="modalHapusProduk{{$p->item_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/delete_produk/{id}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{$p->item_id}}" name="id" required>

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