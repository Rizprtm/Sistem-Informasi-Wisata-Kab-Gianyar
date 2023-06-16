
@extends('Admin.layout')
@section('content')
@include('Admin.modal')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">    
        <div class="card-body">
            <h4 class="card-title">Destinasi</h4>
            <p class="card-description">
                Form Destinasi
            </p>
            <form action="" method="POST" enctype="multipart/form-data" id="form-adddestinasi" >
                <div class="form-group">
                    <label for="exampleInputName1">Judul</label>
                    <input type="text" class="form-control" name="judul"  placeholder="Judul">
                    <span class="text-danger error-text judul_error"></span>
                </div>
                <div class="form-group">
                    <label >Kategori</label>
                    <select name="kategori" class="form-control"></select>
                    <span class="text-danger error-text kategori_error"></span>
                </div>
                
            
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" id="foto">
                        <small>*Ekstensi yang diperbolehkan adalah jpg, jpeg.</small>
                        <br>
                        <small>*Ukuran foto maksimal 2048kb.</small>
                        <br>
                        <span class="text-danger error-text foto_error"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail3">Status</label>
                        <select name="status" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            <span class="text-danger error-text status_error"></span>
                        </select>
                    </div>
                <div class="form-group">
                <label for="exampleTextarea1">Deskripsi</label>
                <textarea name="deskripsi" id="summernote" rows="4"></textarea>
                </div>
                <button type="submit" id="btn_submit" class="btn btn-primary mr-2 btn_submit" >Submit</button>
                
            </form>
        </div>
    </div>
    <div class="col-md-3">
        
        <div class="form-group" style="font-size: 0">
                <img id="preview-foto" src="" style="max-height: 500px;">
        </div>
        
    </div>
</div>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
      <div class="card-body">
          <h4 class="card-title">Destinasi</h4>
          {{-- <a href="/form/berita"><button type="button" class="btn btn-primary btn-sm btn-icon-text mr-3" style="margin-bottom:20px" id="btn_addberita">Tambah Berita <i class="typcn typcn-plus btn-icon-append" style="color:white"></i></button></a> --}}
          <div class="table-responsive">
              <table class="table table-hover" id="table-destinasi">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Judul Destinasi</th>
                          <th>Kategori</th>
                          <th>Status</th>
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
    @push('scripts')
    <script>
        $(document).ready(function () {
            $('.btn_submit').prop('disabled', false);
            var url = '/dashboard/get/destinasi/kategoridestinasi';
            $.get(url, function(data) {
                data.result.forEach(element => {
                    $('#form-adddestinasi').find('select[name="kategori"]').append('<option value="'+element.id+'">'+element.nama+'</option>')
                });
            }, 'json')
        });
    </script>

    <script> 
        $(document).ready(function (e) {
            $('body').on('change', '#foto', function(e) {
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview-foto').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            }); 
        });
    </script>
    @endpush
@endsection