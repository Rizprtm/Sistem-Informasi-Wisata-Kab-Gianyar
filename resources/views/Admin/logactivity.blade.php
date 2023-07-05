@extends('Admin.layout')
@section('content')
@include('Admin.modal')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Log Activity</h4>
            {{-- <a href="/form/berita"><button type="button" class="btn btn-primary btn-sm btn-icon-text mr-3" style="margin-bottom:20px" id="btn_addberita">Tambah Berita <i class="typcn typcn-plus btn-icon-append" style="color:white"></i></button></a> --}}
            <div class="table-responsive">
                <table class="table table-hover" id="table-logactivity">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>deskripsi</th>
                            <th>subject type</th>
                            <th>event</th>
                            <th>subject id</th>
                            <th>causer type</th>
                            <th>causer id</th>
                            <th>created at</th>
                            <th></th>
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