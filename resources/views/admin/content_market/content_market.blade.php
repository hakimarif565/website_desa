@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Ecommerce</h4>
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
                        <a href="#">Ecommerce</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Ecommerce</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="/add_ecommerce">
                                    <i class="fa fa-plus"></i>
                                    Create
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ecommerce Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $ecommerce)
                                        <tr>
                                            <td>{{$ecommerce->ecommerce_id}}</td>
                                            <td>{{$ecommerce->ecommerce_name}}</td>

                                            <td>
                                                <a href="#" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fas fa-eye"></i> View</a>
                                                <a href="#" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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



@endsection