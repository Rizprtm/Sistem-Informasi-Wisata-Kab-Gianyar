@extends('Admin.layout')
@section('container')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">    
        <div class="card-body">
            <h4 class="card-title">User</h4>
            <p class="card-description">
                Form User
            </p>
            <form class="forms-sample">
                <div class="form-group">
                <label for="exampleInputName1">Nama</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail3">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Penulis">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputName1">Username</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Judul">
                        </div>
                <div class="form-group">
                <label>Foto Profil</label>
                    <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                    <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
                </div>
                
            
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
         