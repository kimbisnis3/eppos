<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;

   $(function() {
     getdata()
     active_anak("mcustomer")
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
            { "title" : "Alamat", "data": "alamat" },
            { "title" : "HP", "data": "hp" },
            { "title" : "Email", "data": "email" },
            { "title" : "Keterangan", "data": "ket" },
            { "title" : "Opsi", "width" : "8%", "render" : (data,type,row,meta) =>
            {
               return `
               <button type="button" class="btn btn-warning btn-flat btn-sm" name="button" onclick="edit_data(${row.id})"><i class="fa fa-edit"></i></button>
               <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_data(${row.id})"><i class="fa fa-trash"></i></button>
               `
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
      $('#modal-data .modal-title').text('Tambah Data');
  }

  function edit_data(id) {
      state = 'update';
      $('#form-data')[0].reset();
      $('#img-preview').remove();
      $.post(`${apiurl}/getrow`, {id : id}, function(data) {
        $.each(data, function(i,v) {
          $(`#form-data [name="${i}"]`).val(data[i])
        })
        $('.select2').trigger('change');
        $('#modal-data').modal('show');
        $('#modal-data .modal-title').text('Edit Data');
      },'json');
  }

  function savedata() {
      if (
        !$('[name="nama"]').val() || !$('[name="nama"]').val() ||
        !$('[name="alamat"]').val() || !$('[name="alamat"]').val() ||
        !$('[name="hp"]').val() || !$('[name="hp"]').val()
      )
      {
        toastr.error('Lengkapi Data');
        return true
      }
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
              if (data.status == 'success') {
                  $('#modal-data').modal('hide');
                  refresh();
                  toastr.success('Data Berhasil Disimpan')
              } else if (data.status == 'fail') {
                  $('#modal-data').modal('hide');
                  refresh();
                  toastr.success('No Changed')
              } else if (data.status == 'dupemail') {
                  refresh();
                  toastr.error('Email Sudah Digunakan')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function hapus_data(id) {
    $.confirm({
      closeIcon: true,
      icon: 'fa fa-trash',
      title: 'Hapus data ',
      content: 'Yakin Hapus data ?',
      buttons: {
        yes: {
          text: 'Ya',
          btnClass: 'btn-success',
          keys: ['enter'],
          action: function(){
            do_delete_data(id)
          }
        },
        no: {
          text: 'Tidak',
          btnClass: 'btn-warning',
        }
      }
    })
  }

  function do_delete_data(id) {
      $.post(`${apiurl}/deletedata`, {id : id}, function(data) {
        if (data.status == 'success') {
          refresh()
          toastr.success('Data Berhasil Dihapus')
          $('#modal-data').modal('hide');
        } else {
          refresh()
          $('#modal-data').modal('hide');
        }
      },'json');
  }

  function aktif_data(id)
  {
      var urlaktif =  `${apiurl}/aktifdata`
      _aktif_data(id, urlaktif)
  }

</script>
