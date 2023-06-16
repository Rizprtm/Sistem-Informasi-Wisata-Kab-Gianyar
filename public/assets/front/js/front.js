// ==========================================================================================
// Update Profile
$(function () {
    $('body').on('submit', '#form-updateprofile', function(e) {
        e.preventDefault();
        $('.btn').prop('disabled', true);

        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/profile/update',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('.btn').prop('disabled', false);
                    });
                } else {
                    $('#form-updateprofile').trigger("reset");
                    Swal.fire({
                        title: 'Success',
                        text: "Profile berhasil diubah!",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                    $('.btn').prop('disabled', false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Delete Foto Profil
$('#delete-foto').on('click', function(){
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Foto yang dihapus tidak akan bisa kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '/profile/delete/foto',
                dataType: "json",
                success: function(data) {
                    if (data.code == 1) {
                        Swal.fire(
                            'Deleted!',
                            'Foto berhasil dihapus!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    }
                }
            });
        }
    })
})
// ==========================================================================================

// ==========================================================================================
// Change Password
$(function() {
    $('body').on('submit', '#form-changepass', function(e) {
        e.preventDefault();
        $('.btn').prop('disabled', true);

        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/changepass',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('.btn').prop('disabled', false);
                    });
                } else {
                    if (data.code == 1) {
                        $('#form-changepass').trigger("reset");
                        Swal.fire(
                            'Success!',
                            'Password berhasil diubah!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    } else if (data.code == 2) {
                        $(form).find('span.' + 'password_error').text("Password baru tidak bisa sama dengan password lama!");
                    } else { 
                        $(form).find('span.' + 'old_password_error').text("Password lama tidak sama!");
                    }
                    $('.btn').prop('disabled', false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// DataTable Course
$(function () {
    var table = $('#table-course').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/pengajar/dashboard",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'kategori.nama',
                name: 'kategori.nama'
            },
            {
                data: 'pembeli',
                name: 'pembeli'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
});
// ==========================================================================================

// ==========================================================================================
// Add course
$('body').on('click','#btn_addcourse',function(){
    $('.title').html('Tambah Course');
    $('#form-editcourse').prop('id','form-addcourse');
    $('#form-addcourse').trigger("reset");
    $('#form-addcourse').find('input[name="id"]').remove();
    $('#summernote').summernote('reset');
    $('#preview-foto').attr('src', "");
    $('form').find('span.error-text').text('');
})
// ==========================================================================================

// ==========================================================================================
// Store Course
$(function () {
    $('body').on('submit', '#form-addcourse', function (e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);

        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/store/course',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },

            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    $(form).trigger("reset");
                    Swal.fire(
                        'Success!',
                        'Course berhasil ditambahkan!',
                        'success'
                    )
                    $('#btn_submit').prop('disabled', false);
                    $('#table-course').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
});
// ==========================================================================================

// ==========================================================================================
// Edit Course
$('#table-course').on('click','#btn_edit',function(){
    $('.btn_edit').prop('disabled', true);
    $('#form-addcourse').prop('id', 'form-editcourse');
    $('#form-editcourse').trigger("reset");
    $('#form-editcourse').find('input').prop('disabled',true);
    $('#form-editcourse').find('select').prop('disabled',true);
    $("select option").prop('selected', false);
    $('form').find('span.error-text').text('');
    var url = "/pengajar/detail/course";
    var id = $(this).data('id');
    $.get(url, {id:id},
        function (data) {
            $('.title').html("Edit "+data.result.nama);
            $('#form-editcourse').append('<input name="id" hidden readonly>');
            $('#form-editcourse').find('input[name="id"]').val(id);
            $('#form-editcourse').find('select[name="pengajar"]').find('option[value="'+data.result.id_pengajar+'"]').prop('selected', true);
            $('#form-editcourse').find('input[name="nama"]').val(data.result.nama);
            $('#form-editcourse').find('select[name="kategori"]').find('option[value="'+data.result.kategori.id+'"]').prop('selected', true);
            $("#summernote").summernote("code", data.result.deskripsi);
            $('#form-editcourse').find('input[name="harga"]').val(data.result.harga);
            $('#form-editcourse').find('select[name="status"]').find('option[value="'+data.result.status+'"]').prop('selected', true);
            $('#preview-foto').attr('src', "/assets/images/course/"+data.result.foto); 
        },
        'json'
    ).done(function(){
        $('.btn_edit').prop('disabled', false);
        $('#form-editcourse').find('input').prop('disabled', false);
        $('#form-editcourse').find('select').prop('disabled', false);
    })
})
// ==========================================================================================

// ==========================================================================================
// Update Course
$(function() {
    $('body').on('submit', '#form-editcourse', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);

        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/update/course',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Course berhasil diubah!',
                        'success'
                    )
                    $('#btn_submit').prop('disabled', false);
                    $('#table-course').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Materi Course DataTable
$('#table-course').on('click','#btn_add',function(){
    $('.btn').prop('disabled',true);
    $('#coursemateri').show();
    $('#konten').hide();
    $('#benefit').hide();
    $('#requirements').hide();
    $('#table-benefit').DataTable().destroy();
    $('#table-requirements').DataTable().destroy();
    $('#table-coursemateri').DataTable().destroy();
    $('#table-konten-materi').DataTable().destroy();
    id = $(this).data('id');
    var table = $('#table-coursemateri').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/pengajar/course/materi',
            data: {
                id: id,
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'course.nama',
                name: 'course.nama'
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        "initComplete": function(settings, json) {
            $('.btn').prop('disabled',false);
        }
    })
})
// ==========================================================================================

// ==========================================================================================
// Add Materi
$('#btn_addmateri').on('click',function(){
    $form = $('<form action="" method="POST" enctype="multipart/form-data" id="form-addmateri"></form>');
    $form.append('<div class="form-group"><label>Materi</label><input name="id" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close close_button" data-mdb-dismiss="modal">Kembali</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-title').text('Tambah Materi');
    $('#modal-body').append($form);
    $('#form-addmateri').find('input[name="id"]').val(id);
})
// ==========================================================================================

// ==========================================================================================
// Store Materi
$(function () {
    $('body').on('submit', '#form-addmateri', function (e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);

        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/store/course/materi',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                $(form).find('span.error-text').text('');
            },

            success: function (data) {
                if (data.code == 0) {
                    $.each(data.error, function (prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    $(form).trigger("reset");
                    Swal.fire(
                        'Success!',
                        'Materi berhasil ditambahkan!',
                        'success'
                    )
                    $('#btn_submit').prop('disabled', false);
                    $('#modal').modal('hide');
                    $('#table-coursemateri').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
});
// ==========================================================================================

// ==========================================================================================
// Edit Materi
$('#table-coursemateri').on('click','#btn_edit',function(){
    $form = $('<form action="" method="POST" id="form-updatemateri"></form>');
    $form.append('<div class="form-group"><label>Materi</label><input name="id_course" hidden><input name="id" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close" data-mdb-dismiss="modal">Close</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-body').append('<div class="d-flex justify-content-center" id="loader"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>')
    var id = $(this).data('id');
    var idcourse = $(this).data('idcourse');
    var url = '/pengajar/detail/course/materi';
    $.get(url, {
        id: id,
        idcourse: idcourse
    }, function(data) {
        $('#modal-title').text('Edit Materi');
        $('#modal-body').append($form);
        $('#modal-body').find('form').find('input[name="id"]').val(id);
        $('#modal-body').find('form').find('input[name="id_course"]').val(idcourse);
        $('#modal-body').find('form').find('input[name="nama"]').val(data.result.nama);
    }, 'json').done(function(){
        $('#loader').remove();
    })
})
// ==========================================================================================

// ==========================================================================================
// Update Materi
$(function() {
    $('#modal-body').on('submit', '#form-updatemateri', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/update/course/materi',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,

            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Materi berhasil diubah!',
                        'success'
                    )
                    $('#modal').modal('hide');
                    $('#btn_submit').prop('disabled', false);
                    $('#table-coursemateri').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Delete Materi
$('#table-coursemateri').on('click', '#btn_delete', function() {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Materi yang dihapus tidak akan bisa kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).data('id');
            var idcourse = $(this).data('idcourse');
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '/pengajar/delete/course/materi',
                data: {
                    id: id,
                    id_course: idcourse
                },
                dataType: "json",
                success: function(data) {
                    if (data.code == 1) {
                        Swal.fire(
                            'Deleted!',
                            'Materi berhasil dihapus!',
                            'success'
                        )
                        $('#table-coursemateri').DataTable().ajax.reload(null, false);
                    } else if (data.code == 2) {
                        Swal.fire(
                            'Error!',
                            'Hapus terlebih dahulu semua isi materi yang ada pada materi ini!',
                            'error'
                        )
                    } else {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan!',
                            'error'
                        )
                    }
                }
            });
        }
    })
});
// ==========================================================================================

// ==========================================================================================
// DataTable Konten Materi
$('#table-coursemateri').on('click','#btn_isimateri',function(){
    $('.btn').prop('disabled',true);
    $('#konten').show();
    $('#benefit').hide();
    $('#requirements').hide();
    $('#table-benefit').DataTable().destroy();
    $('#table-requirements').DataTable().destroy();
    $('#table-konten-materi').DataTable().destroy();
    idgroup = $(this).data('idgroup');
    idcourse = $(this).data('idcourse');
    var table = $('#table-konten-materi').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/pengajar/course/konten',
            data: {
                idgroup: idgroup,
                idcourse: idcourse,
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'tipe',
                name: 'tipe',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        "initComplete": function(settings, json) {
            $('.btn').prop('disabled',false);
        }
    })
})
// ==========================================================================================

// ==========================================================================================
// Add Konten Materi
$('body').on('click','#btn_addmaterikonten',function(){
    $form = $('<form action="" method="POST" enctype="multipart/form-data" id="form-addmaterikonten"></form>');
    $form.append('<div class="form-group"><label>Nama konten</label><input name="idgroup" hidden><input name="idcourse" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="form-group"><label>Tipe</label><select name="tipe" class="form-control" id="select-tipe"><option value="Video" selected>Video</option><option value="File">File</option><span class="text-danger error-text tipe_error"></span></select></div>');
    $form.append('<div class="form-group"><label>Konten materi</label><input type="text" name="konten" class="form-control" id="input-konten"><span class="text-danger error-text konten_error"></span><br><small class="text-danger" id="konten-desc">*Sematkan link video youtube</small></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close" data-mdb-dismiss="modal">Kembali</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-title').text('Isi Materi');
    $('#modal-body').append($form);
    $('#form-addmaterikonten').find('input[name="idgroup"]').val(idgroup);
    $('#form-addmaterikonten').find('input[name="idcourse"]').val(idcourse);

    $('#select-tipe').on('change', function() {
        if ($('#select-tipe').find(":selected").val() == "Video") {
            $('#form-addmaterikonten').find('input[name="konten"]').prop('type', 'text');
            $('#konten-desc').html('*Sematkan link video youtube');
        } else {
            $('#form-addmaterikonten').find('input[name="konten"]').prop('type', 'file');
            $('#konten-desc').html('*Ukuran file maksimal adalah 5MB.');
        }
    });
})
// ==========================================================================================

// ==========================================================================================
// Store Materi Konten
$(function() {
    $('#modal-body').on('submit', '#form-addmaterikonten', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/store/konten',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Konten berhasil ditambahkan!',
                        'success'
                    )
                    $('#modal').modal('hide');
                    $('#btn_submit').prop('disabled', false);
                    $('#table-konten-materi').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Edit Konten Materi
$('body').on('click','#btn_editkonten',function(){
    $form = $('<form action="" method="POST" enctype="multipart/form-data" id="form-updatematerikonten" style="display:none"></form>');
    $form.append('<div class="form-group"><label>Nama konten</label><input name="id" hidden readonly><input name="idgroup" hidden><input name="idcourse" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="form-group"><label>Tipe</label><select name="tipe" class="form-control" id="select-tipe"><option value="Video" selected>Video</option><option value="File">File</option><span class="text-danger error-text tipe_error"></span></select></div>');
    $form.append('<div class="form-group"><label>Konten materi</label><input type="text" name="konten" class="form-control" id="input-konten"><span class="text-danger error-text konten_error"></span><br><small class="text-danger" id="konten-desc">*Sematkan link video youtube</small></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close" data-mdb-dismiss="modal">Kembali</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-title').text('Edit Materi');
    $('#modal-body').append('<div class="d-flex justify-content-center" id="loader"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>')
    $('#modal-body').append($form);
    $('#form-updatematerikonten').find('input[name="idgroup"]').val(idgroup);
    $('#form-updatematerikonten').find('input[name="idcourse"]').val(idcourse);
    var id = $(this).data('id');
    $.get('/pengajar/detail/konten', {id:id,idcourse:idcourse},
        function (data) {
            $('#form-updatematerikonten').find('input[name="id"]').val(id);
            $('#form-updatematerikonten').find('input[name="nama"]').val(data.result.nama);
            $('#form-updatematerikonten').find('select[name="tipe"]').val(data.result.tipe);
            if ($('#select-tipe').find(":selected").val() == "Video") {
                $('#form-updatematerikonten').find('input[name="konten"]').prop('type', 'text');
                $('#form-updatematerikonten').find('input[name="konten"]').val(data.result.konten);
                $('#konten-desc').html('*Sematkan link video youtube');
            } else {
                $('#form-updatematerikonten').find('input[name="konten"]').prop('type', 'file');
                $('#konten-desc').html('*Ukuran file maksimal adalah 5MB. Kosongkan jika tidak ingin mengubah file.');
            }
        },
        'json'
    ).done(function(){
        $('#form-updatematerikonten').show();
        $('#loader').remove();
    })
})

$('#modal-body').on('change', '#select-tipe' ,function() {
    if ($('#select-tipe').find(":selected").val() == "Video") {
        $('#form-updatematerikonten').find('input[name="konten"]').prop('type', 'text');
        $('#konten-desc').html('*Sematkan link video youtube');
    } else {
        $('#form-updatematerikonten').find('input[name="konten"]').prop('type', 'file');
        $('#konten-desc').html('*Ukuran file maksimal adalah 5MB.');
    }
});
// ==========================================================================================

// ==========================================================================================
// Update Konten Materi
$(function() {
    $('#modal-body').on('submit', '#form-updatematerikonten', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/update/konten',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,

            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Konten berhasil diubah!',
                        'success'
                    )
                    $('#modal').modal('hide');
                    $('#btn_submit').prop('disabled', false);
                    $('#table-konten-materi').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Delete Konten Materi
$('#table-konten-materi').on('click', '#btn_deletekonten', function() {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Konten yang dihapus tidak akan bisa kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.isConfirmed) {
            var id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '/pengajar/delete/konten',
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    if (data.code == 1) {
                        Swal.fire(
                            'Deleted!',
                            'Konten berhasil dihapus!',
                            'success'
                        )
                        $('#table-konten-materi').DataTable().ajax.reload(null, false);
                    } else {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan!',
                            'error'
                        )
                    }
                }
            });
        }
    })
});
// ==========================================================================================

// ==========================================================================================
// DataTable Requirements & Benefit
$('#table-course').on('click','#btn_benefitreq',function(){
    $('.btn').prop('disabled',true);
    $('#benefit').show();
    $('#requirements').show();
    $('#coursemateri').hide();
    $('#konten').hide();
    $('#table-benefit').DataTable().destroy();
    $('#table-requirements').DataTable().destroy();
    $('#table-coursemateri').DataTable().destroy();
    $('#table-konten-materi').DataTable().destroy();
    id = $(this).data('id');
    var table = $('#table-benefit').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/pengajar/course/benefit',
            data: {
                id: id,
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'course.nama',
                name: 'course.nama'
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    })

    var table2 = $('#table-requirements').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/pengajar/course/requirements',
            data: {
                id: id,
            },
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'course.nama',
                name: 'course.nama'
            },
            {
                data: 'nama',
                name: 'nama',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        "initComplete": function(settings, json) {
            $('.btn').prop('disabled',false);
        }
    })
})
// ==========================================================================================

// ==========================================================================================
// Add Benefit
$('body').on('click','#btn_addbenefit',function(){
    $form = $('<form action="" method="POST" enctype="multipart/form-data" id="form-addbenefit"></form>');
    $form.append('<div class="form-group"><label>Benefit</label><input name="id" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close" data-mdb-dismiss="modal">Kembali</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-title').text('Tambah Benefit');
    $('#modal-body').append($form);
    $('#form-addbenefit').find('input[name="id"]').val(id);
})
// ==========================================================================================
// Store Benefit
$(function() {
    $('#modal-body').on('submit', '#form-addbenefit', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/store/course/benefit',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Benefit berhasil ditambahkan!',
                        'success'
                    )
                    $('#modal').modal('hide');
                    $('#btn_submit').prop('disabled', false);
                    $('#table-benefit').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Edit Benefit
$('#table-benefit').on('click','#btn_edit',function(){
    $form = $('<form action="" method="POST" id="form-updatebenefit"></form>');
    $form.append('<div class="form-group"><label>Benefit</label><input name="id_course" hidden><input name="id" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close" data-mdb-dismiss="modal">Close</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-body').append('<div class="d-flex justify-content-center" id="loader"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>')
    var idbenefit = $(this).data('id');
    var url = '/pengajar/detail/course/benefit';
    $.get(url, {
        id: id,
        idbenefit: idbenefit
    }, function(data) {
        $('#modal-title').text('Edit Benefit');
        $('#modal-body').append($form);
        $('#modal-body').find('form').find('input[name="id"]').val(idbenefit);
        $('#modal-body').find('form').find('input[name="id_course"]').val(id);
        $('#modal-body').find('form').find('input[name="nama"]').val(data.result.nama);
    }, 'json').done(function(){
        $('#loader').remove();
    })
})
// ==========================================================================================

// ==========================================================================================
// Update Benefit
$(function() {
    $('#modal-body').on('submit', '#form-updatebenefit', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/update/course/benefit',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,

            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Benefit berhasil diubah!',
                        'success'
                    )
                    $('#modal').modal('hide');
                    $('#btn_submit').prop('disabled', false);
                    $('#table-benefit').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Delete Benefit
$('#table-benefit').on('click', '#btn_delete', function() {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Benefit yang dihapus tidak akan bisa kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.isConfirmed) {
            var idbenefit = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '/pengajar/delete/course/benefit',
                data: {
                    id: id,
                    idbenefit: idbenefit
                },
                dataType: "json",
                success: function(data) {
                    if (data.code == 1) {
                        Swal.fire(
                            'Deleted!',
                            'Benefit berhasil dihapus!',
                            'success'
                        )
                        $('#table-benefit').DataTable().ajax.reload(null, false);
                    } else {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan!',
                            'error'
                        )
                    }
                }
            });
        }
    })
});
// ==========================================================================================

// ==========================================================================================
// Add Requirements
$('body').on('click','#btn_addrequirements',function(){
    $form = $('<form action="" method="POST" enctype="multipart/form-data" id="form-addrequirements"></form>');
    $form.append('<div class="form-group"><label>Requirements</label><input name="id" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close" data-mdb-dismiss="modal">Kembali</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-title').text('Tambah Requirements');
    $('#modal-body').append($form);
    $('#form-addrequirements').find('input[name="id"]').val(id);
})
// ==========================================================================================

// ==========================================================================================
// Store Benefit
$(function() {
    $('#modal-body').on('submit', '#form-addrequirements', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/store/course/requirements',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Requirements berhasil ditambahkan!',
                        'success'
                    )
                    $('#modal').modal('hide');
                    $('#btn_submit').prop('disabled', false);
                    $('#table-requirements').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Edit Requirements
$('#table-requirements').on('click','#btn_edit',function(){
    $form = $('<form action="" method="POST" id="form-updaterequirements"></form>');
    $form.append('<div class="form-group"><label>Requirements</label><input name="id_requirements" hidden><input name="id" hidden><input type="text" name="nama" class="form-control"><span class="text-danger error-text nama_error"></span></div>');
    $form.append('<div class="modal-footer"><button type="button" class="btn btn-secondary btn_close" data-mdb-dismiss="modal">Close</button><button type="submit" class="btn btn-primary" id="btn_submit">Simpan</button></div>')
    $('#modal').modal('show');
    $('#modal-body').append('<div class="d-flex justify-content-center" id="loader"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>')
    var idrequirements = $(this).data('id');
    var url = '/pengajar/detail/course/requirements';
    $.get(url, {
        id: id,
        idrequirements: idrequirements
    }, function(data) {
        $('#modal-title').text('Edit Requirements');
        $('#modal-body').append($form);
        $('#modal-body').find('form').find('input[name="id"]').val(id);
        $('#modal-body').find('form').find('input[name="id_requirements"]').val(idrequirements);
        $('#modal-body').find('form').find('input[name="nama"]').val(data.result.nama);
    }, 'json').done(function(){
        $('#loader').remove();
    })
})
// ==========================================================================================

// ==========================================================================================
// Update Requirements
$(function() {
    $('#modal-body').on('submit', '#form-updaterequirements', function(e) {
        e.preventDefault();
        $('#btn_submit').prop('disabled', true);
        var form = this;
        $.ajax({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/pengajar/update/course/requirements',
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,

            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },

            success: function(data) {
                if (data.code == 0) {
                    $.each(data.error, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                        $('#btn_submit').prop('disabled', false);
                    });
                } else {
                    Swal.fire(
                        'Success!',
                        'Requirements berhasil diubah!',
                        'success'
                    )
                    $('#modal').modal('hide');
                    $('#btn_submit').prop('disabled', false);
                    $('#table-requirements').DataTable().ajax.reload(null, false);
                }
            }
        });
    });
})
// ==========================================================================================

// ==========================================================================================
// Delete Requirements
$('#table-requirements').on('click', '#btn_delete', function() {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Requirements yang dihapus tidak akan bisa kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya'
    }).then((result) => {
        if (result.isConfirmed) {
            var id_requirements = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: '/pengajar/delete/course/requirements',
                data: {
                    id: id,
                    id_requirements: id_requirements
                },
                dataType: "json",
                success: function(data) {
                    if (data.code == 1) {
                        Swal.fire(
                            'Deleted!',
                            'Requirements berhasil dihapus!',
                            'success'
                        )
                        $('#table-requirements').DataTable().ajax.reload(null, false);
                    } else {
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan!',
                            'error'
                        )
                    }
                }
            });
        }
    })
});
// ==========================================================================================

// ==========================================================================================
// Video Frame
$('a[id="video-frame"]').on('click', function () {
    $('#modal').modal('show');
    $('#modal-body').append('<div class="d-flex justify-content-center" id="loader"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div>')
    var id = $(this).data('id');
    $.get("/video", {id:id},
        function (data) {
            $('#modal-title').html(data.result.nama);
            $('#modal-body').append('<div class="plyr__video-embed" id="player"><iframe src="'+data.result.konten+'?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe></div>')
            const player = new Plyr('#player', {
                title: "Video",
                settings: ['captions', 'quality', 'loop'],
                quality: { default: 720, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] }
            });
        },
        'json'
    ).done(function(){
        $('#loader').remove();
    })
});
// ==========================================================================================

// Jquery Currency
// ==========================================================================================
$("input[data-type='currency']").on({
    keyup: function() {
        formatCurrency($(this));
    },
    blur: function() { 
        formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.
    
    // get input value
    var input_val = input.val();
    
    // don't validate empty input
    if (input_val === "") { return; }
    
    // original length
    var original_len = input_val.length;

    // initial caret position 
    var caret_pos = input.prop("selectionStart");
        
    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);
        
        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
        right_side += "00";
        }
        
        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "Rp" + left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "Rp" + input_val;
    }
    
    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}
// ==========================================================================================
// Jquery Currency
