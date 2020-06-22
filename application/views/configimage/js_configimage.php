<script type="text/javascript">

  var path    = 'configimage';
  var title   = 'Config Image';
  var grupmenu= '';
  var apiurl  = "<?php echo base_url().api_url() ?>" + path
  var idx     = -1;
  var state
  var table
  var _th = `
  <th width="5%">No</th>
  <th>ID</th>
  <th>Judul</th>
  <th>Gambar</th>
  <th>Keterangan</th>
  <th width="15%">Opsi</th>`

   $(function() {
     _maintable('table', 'main-table', _th)
     getdata()
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
            { "render" : (data,type,row,meta) => {return meta.row + 1} },
            { "data": "id", "visible" : false },
            { "data": "judul" },
            { "render" : (data,type,row,meta) => {return showimage(row.image) } },
            { "data": "ket" },
            { "render" : (data,type,row,meta) => {return btn_edit(row.id) } },
          ]
     });
  }

  function refresh() {
      table.ajax.reload(null, false);
      idx = -1;
  }

  function add_data() {
      _add_data('#form-data', '#modal-data', 'Tambah Data')
  }

  function savedata() {
      var url;
      if (state == 'add') {
          url = `${apiurl}/savedata`;
      } else {
          url = `${apiurl}/updatedata`;
      }
      _savefile_i('#form-data', url, '#modal-data')
  }

  function hapus_data(id) {
      _hapus_data(id, `${apiurl}/deletedata`)
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
                $(`[name="${i}"]`).not('input[type=file]').val(data[i])
              })
              $('#modal-data').modal('show');
              $('.modal-title').text('Edit Data');
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }
</script>
