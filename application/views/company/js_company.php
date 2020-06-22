<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;

   $(function() {
     getdata()
     active_induk("master")
     active_anak(path)
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
            { "title" : "No.", "width" : "5%", "render" : (data,type,row,meta) => {return meta.row + 1} },
            { "title" : "ID", "data": "id", "visible" : false },
            { "title" : "Nama", "data": "nama" },
            { "title" : "Gambar", "render" : (data,type,row,meta) => {return showimage(row.image)} },
            { "title" : "Splash", "render" : (data,type,row,meta) => {return showimage(row.splash)} },
            { "title" : "Telp", "data": "telp" },
            { "title" : "Email", "data": "email" },
            { "title" : "Alamat", "data": "alamat" },
            { "title" : "Ket", "data": "ket" },
            { "title" : "Opsi", "width" : "5%", "render" : (data,type,row,meta) =>
            {
               return btn_edit(row.id)
            }},
          ]
     });
   }

   function refresh() {
      table.ajax.reload(null, false);
      idx = -1;
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
              $.each(data, function(i,v) {
                $(`[name="${i}"]`).val(data[i])
              })
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
                  toastr.success('Tidak Ada Perubahan')
              }

          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }
</script>
