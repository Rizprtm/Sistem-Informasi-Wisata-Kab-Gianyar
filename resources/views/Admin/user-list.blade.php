@extends('Admin.layout')
@section('content')
<a href="/dashboard/user/input_user"><button type="button" class="btn btn-primary btn-icon-text">
  <i class="ti-file btn-icon-prepend"></i>
  Tambah
</button></a>
<div class="col-md-16 grid-margin stretch-card">
  <div class="card">
    <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Rizky Pratama</td>
          <td>CEO</td>
          <td>123gmail</td>
          <td>rizprtm</td>
          <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
          <td><label class="badge badge-danger">Pending</label></td>
        </tr>
        
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection