@extends('admin.layout.layout')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Add Booking Container Masuk</h4>
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
                        <a href="">Add</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Content E-Commercek</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add Contentk</div>
                        </div>

                        <form action="/store_ecommerce" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- <div class="form-group">
                                    <label>Nomor</label>
                                    <input type="text" class="form-control" placeholder="Nomor ..." name="ecommerce_id" required maxlength="11">
                                </div> -->
                                <div class="form-group">
                                    <label>Nama Ecommerce</label>
                                    <input type="text" class="form-control" placeholder="Ecommerce ..." name="ecommerce_name" required maxlength="11">
                                </div>

                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Submit</button>
                                <a href="/ecommerce" class="btn btn-danger"><i class="fa fa-undo"></i>Close</a>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>


@endsection