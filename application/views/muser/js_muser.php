<script type="text/javascript">

  var path    = '<?php echo $this->uri->segment(1) ?>';
  var apiurl  = "<?php echo base_url() ?>" + path;
  var state;
  var idx     = -1;
  var table ;

   $(function() {
     getdata()
     active_induk("master")
     active_anak(path)
     select2()
   })

   function getdata() {
     table = $("#table").DataTable({
       "processing": true,
          "ajax": {
              "url": `${apiurl}/getall`,
              "type": "POST",
              "data": {},
          },
          "columns": [
            { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
            { "title" : "ID", "data": "id", "visible" : false },
            { "title" : "Nama", "data": "nama" },
            { "title" : "Email", "data": "email" },
            { "title" : "Gambar", "render" : (data,type,row,meta) => {return showimage(row.image)} },
            { "title" : "Username", "data": "username" },
            { "title" : "Password", "data": "password" },
            { "title" : "Ket", "data": "ket" },
            { "title" : "Status", "render" : (data,type,row,meta) => { return aktifstatus(row.aktif)} },
            { "title" : "Opsi", "width" : "15%", "render" : (data,type,row,meta) =>
            {
               return btn_aktif(row.id)+' '+btn_edit(row.id)+' '+btn_delete(row.id)
            }},
          ]
     });
   }

   function refresh() {
      table.ajax.reload(null, false);
      idx = -1;
  }

  function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    }
  }

  function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-preview').remove();
            $('#image-preview').append('<img id="img-preview" src="'+e.target.result+'"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  function add_data() {
      state = 'add';
      $('#form-data')[0].reset();
      $('#img-preview').remove();
      $('.select2').trigger('change');
      $('#modal-data').modal('show');
      $('.modal-title').text('Tambah Data');
  }

  function edit_data(id) {
      state = 'update';
      $('#form-data')[0].reset();
      $('#img-preview').remove();
      $.ajax({
          url: `${apiurl}/edit`,
          type: "POST",
          data: {
              id: id,
          },
          dataType: "JSON",
          success: function(data) {
              $('[name="id"]').val(data.id);
              $('[name="nama"]').val(data.nama);
              $('[name="email"]').val(data.email);
              $('[name="path"]').val(data.image);
              $('[name="ket"]').val(data.ket);
              $('[name="username"]').val(data.username);
              $('[name="password"]').val(data.password);
              $('[name="ref_level"]').val(data.ref_level);
              $('#image-preview').append('<img id="img-preview" src="<?php echo base_url() ?>'+data.image+'"/>');
              $('.select2').trigger('change');
              $('#modal-data').modal('show');
              $('.modal-title').text('Edit Data');
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function savedata() {
      var url;
      if (state == 'add') {
          url = `${apiurl}/savedata`;
      } else {
          url = `${apiurl}/updatedata`;
      }
      var formData = new FormData($('#form-data')[0]);
      $.ajax({
          url: url,
          type: "POST",
          data: formData,
          dataType: "JSON",
          mimeType: "multipart/form-data",
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
              if (data.sukses == 'success') {
                  $('#modal-data').modal('hide');
                  refresh();
                  state == 'add' ? toastr.success('Data Berhasil Ditambahkan') : toastr.success('Data Berhasil Diubah')
              } else if (data.sukses == 'fail') {
                  $('#modal-data').modal('hide');
                  refresh();
                  toastr.success('No Changed')
              } else if (data.sukses == 'duplicated') {
                  refresh();
                  toastr.error('Username Sudah Digunakan')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function hapus_data(id) {
      $('.modal-title').text('Yakin Hapus Data ?');
      $('#modal-konfirmasi').modal('show');
      $('#btn-yes-confirm').attr('onclick', 'delete_data(' + id + ')');
  }

  function delete_data(id) {
      $.ajax({
          url: `${apiurl}/deletedata`,
          type: "POST",
          dataType: "JSON",
          data: {
              id: id,
          },
          success: function(data) {
              $('#modal-konfirmasi').modal('hide');
              if (data.sukses == 'success') {
                  refresh();
                  toastr.success('Data Berhasil Dihapus')
              } else if (data.sukses == 'fail') {
                  $('#modal-data').modal('hide');
                  refresh();
                  toastr.error('Data Gagal Dihapus')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function aktif_data(id) {
      $.ajax({
          url: `${apiurl}/aktifdata`,
          type: "POST",
          dataType: "JSON",
          data: {
              id: id,
          },
          success: function(data) {
              if (data.sukses == 'success') {
                  refresh();
                  toastr.success('Data Berhasil Diubah')
              } else if (data.sukses == 'fail') {
                  refresh();
                  toastr.success('Data Gagal Diubah')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.success('Internal Error')
          }
      });
  }
</script>
