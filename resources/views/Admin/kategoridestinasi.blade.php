@extends('Admin.layout')
@section('content')
@include('Admin.modal')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kategori</h4>
                <button type="button" class="btn btn-primary btn-sm btn-icon-text mr-3" style="margin-bottom:20px" id="btn_addkategoridestinasi">Tambah Kategori <i class="typcn typcn-plus btn-icon-append" style="color:white"></i></button>
                <div class="table-responsive">
                    <table class="table table-hover" id="table-kategoridestinasi">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
