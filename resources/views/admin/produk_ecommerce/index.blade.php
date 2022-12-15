@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Produk Ecommerce</h4>
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
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddProdukE">
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
                                            <th>Link Produk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($data as $produk_ecommerce)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$produk_ecommerce->item_name}}</td>
                                            <td>{{$produk_ecommerce->produk_ecommerce_link}}</td>
                                            <td>
                                                <div>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#modalEditProduk{{$produk_ecommerce->item_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapusProduk{{$produk_ecommerce->item_id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
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

<div class="modal fade" id="modalAddProdukE" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/add_produk_ecommerce" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <select class="form-control" name="item_id" id="item_id" required>
                            <option value="" hidden="">--Pilih Produk--</option>
                            @foreach($produk_layanan as $d)
                            <option value="{{ $d->item_id }}">{{ $d->item_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Ecommerce</label>
                        <select class="form-control" name="ecommerce_id" id="ecommerce_id" required>
                            <option value="" hidden="">--Pilih Produk--</option>
                            @foreach($ecommerce as $d)
                            <option value="{{ $d->ecommerce_id }}">{{ $d->ecommerce_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-grup">
                        <label>Link 1</label>
                        <input type="text" class="form-control" name="produk_ecommerce_link" placeholder="Link Produk ..." required>
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
            <form action="/edit_produk_ecommerce/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->item_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="item_name" value="{{$g->item_name}}" placeholder="Nama Produk ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Link Produk</label>
                        <input type="text" class="form-control" name="produk_ecommerce_link" value="{{$g->produk_ecommerce_link}}" placeholder="Link Produk ..." required>
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
            <form method="GET" enctype="multipart/form-data" action="/delete_produk_ecommerce/{id}">
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


<script src="/assets/js/core/jquery.3.2.1.min.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').str('content')
        }
    });
</script>

<script type="text/javascript">
    $("#item_id").change(function() {
        var id_book_msk = $("#id_book_msk").val();
        $.ajax({
            type: "GET",
            url: "/produk_ecommerce/ajax",
            data: "item_id=" + item_id,
            cache: false,
            success: function(data) {
                $('#item_id').html(data);
            }
        })
    });
</script>


@endsection