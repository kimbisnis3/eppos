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
            { "title" : "Keterangan", "data": "ket" },
            { "title" : "Opsi", "width" : "12%", "render" : (data,type,row,meta) =>
            {
               return `
               <button type="button" class="btn btn-warning btn-flat btn-sm" name="button" onclick="edit_data(${row.id})"><i class="fa fa-edit"></i></button>
               <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_data(${row.id})"><i class="fa fa-trash"></i></button>
               <button type="button" class="btn btn-success btn-flat btn-sm" name="button" onclick="aksesmenu('${row.id}','${row.nama}')"><i class="fa fa-key"></i></button>
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
      $.ajax({
          url: `${apiurl}/edit`,
          type: "POST",
          data: {
              id: id,
          },
          dataType: "JSON",
          success: function(data) {
              $.each(data, function(i,v) {
                $(`#form-data [name="${i}"]`).val(data[i])
              })
              $('.select2').trigger('change');
              $('#modal-data').modal('show');
              $('#modal-data .modal-title').text('Edit Data');
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function savedata() {
      if (
        !$('[name="nama"]').val() || !$('[name="nama"]').val()
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
      _savefile_i('#form-data', url, '#modal-data')
  }

  function hapus_data(id) {
      $('#modal-konfirmasi .modal-title').text('Yakin Hapus Data ?');
      $('#modal-konfirmasi').modal('show');
      $('#btn-yes-confirm').attr('onclick', 'do_delete_data(' + id + ')');
  }

  function do_delete_data(id) {
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

  function aksesmenu(idlevel, nama)
  {
      tableakses = $("#table-akses").DataTable({
        "processing": true,
        "destroy": true,
           "ajax": {
               "url": `${apiurl}/loadakses`,
               "type": "POST",
               "data": {
                 ref_level : idlevel
               },
           },
           "columns": [
             { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
             { "title" : "ID", "data": "id", "visible" : false },
             { "title" : "Nama", "data": "nama" },
             { "title" : "Aktif", "render" : (data,type,row,meta) => {return checkact(row.st, row.id, idlevel)} },
           ]
      });
      $('#modal-akses').modal('show');
      $('#modal-akses .modal-title').text('Akses Level '+nama);
  }

  function checkact(st, id, idlevel)
  {
      if (st == 1) {
        return `<i style="cursor : pointer" class="far fa-check-square text-success" onclick="changeact('${id}', '${idlevel}')"></i>`
      } else {
        return `<i style="cursor : pointer" class="far fa-square text-danger" onclick="changeact('${id}', '${idlevel}')"></i>`
      }
  }

  function changeact(id, idlevel)
  {
    $.post(`${apiurl}/changeakses`, { ref_menu : id, ref_level : idlevel }, function(data) {
      if (data.status == 'success') {
          tableakses.ajax.reload(null, false);
      }
    },'json');
  }

  $('#form-data input').keypress(function(e) {
      var key = e.which;
      if (key == 13)
      {
          savedata();
          return false;
      }
  });

</script>
