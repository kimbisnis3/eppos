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
     get_prov()
      $('#prov').prop('disabled', true);
      $('#city').prop('disabled', true);
      $('#kec').prop('disabled', true);
      $('#kel').prop('disabled', true);
      $("#prov").change(function(){
        $('#city').val('');
        $('#kec').val('');
        $('#kel').val('');
        $('#city').prop('disabled', true);
        $('#kec').prop('disabled', true);
        $('#kel').prop('disabled', true);
        get_city()
      });
      $("#city").change(function(){
        $('#kec').val('');
        $('#kel').val('');
        $('#kec').prop('disabled', true);
        $('#kel').prop('disabled', true);
        get_kec()
      });
      $("#kec").change(function(){
        $('#kel').val('');
        $('#kel').prop('disabled', true);
        get_kel()
      });
   })

   function get_prov()
    {
       $(`.classprov`).remove()
       $(`#prov`).val('');
       $('#prov').prop('disabled', true);
       $.ajax({
           url: `<?php echo base_url(); ?>apilocation/getprov`,
           type: "POST",
           data: {},
           dataType: "JSON",
           success: function(data) {
             $('#prov').prop('disabled', false);
             $(`#prov`).append(`<option class="classprov" value="">-</option>`);
                 $.each(data.data, function(i, v) {
                   $(`#prov`).append(`<option class="classprov" value="${v['id']}">${v['name']}</option>`);
                 })
           },
           error: function(jqXHR, textStatus, errorThrown) {
               $('#prov').prop('disabled', false);
               toastr.error('Internal Error')
           }
       });
    }

    function get_city()
    {
       let kodeprov = $('#prov').val();
       $('#city').prop('disabled', true);
       $(`.classcity`).remove()
       $(`#city`).val('');
       if (kodeprov) {
         $.ajax({
             url: `<?php echo base_url(); ?>apilocation/getcity`,
             type: "POST",
             data: {
               province_id : kodeprov
             },
             dataType: "JSON",
             success: function(data) {
               $('#city').prop('disabled', false);
               $(`#city`).append(`<option class="classcity" value=""></option>`);
                   $.each(data.data, function(i, v) {
                     $(`#city`).append(`<option class="classcity" value="${v['id']}">${v['name']}</option>`);
                   })
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 $('#city').prop('disabled', false);
                 toastr.error('Internal Error')
             }
         });
       }
    }

    function get_kec()
    {
       let kodecity = $('#city').val();
       $('#kec').prop('disabled', true);
       $(`.classkec`).remove()
       $(`#kec`).val('');
       if (kodecity) {
         $.ajax({
             url: `<?php echo base_url(); ?>apilocation/getkec`,
             type: "POST",
             data: {
               regency_id : kodecity
             },
             dataType: "JSON",
             success: function(data) {
               $('#kec').prop('disabled', false);
               $(`#kec`).append(`<option class="classkec" value=""></option>`);
                   $.each(data.data, function(i, v) {
                     $(`#kec`).append(`<option class="classkec" value="${v['id']}">${v['name']}</option>`);
                   })
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 $('#kec').prop('disabled', false);
                 toastr.error('Internal Error')
             }
         });
       }
    }

    function get_kel()
    {
       let kodekec = $('#kec').val();
       $('#kel').prop('disabled', true);
       $(`.classkel`).remove()
       $(`#kel`).val('');
       if (kodekec) {
         $.ajax({
             url: `<?php echo base_url(); ?>apilocation/getkel`,
             type: "POST",
             data : {
               district_id : kodekec
             },
             dataType: "JSON",
             success: function(data) {
               $('#kel').prop('disabled', false);
               $(`#kel`).append(`<option class="classkel" value=""></option>`);
                   $.each(data.data, function(i, v) {
                     $(`#kel`).append(`<option class="classkel" value="${v['id']}">${v['name']}</option>`);
                   })
             },
             error: function(jqXHR, textStatus, errorThrown) {
                 $('#kel').prop('disabled', false);
                 toastr.error('Internal Error')
             }
         });
       }
    }

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
            { "title" : "Kode Sales", "data": "kodesales" },
            { "title" : "Nama", "data": "nama" },
            { "title" : "Foto", "render" : (data,type,row,meta) => { return showimage(row.img_profil) } },
            { "title" : "Email", "data": "email" },
            { "title" : "Username", "data": "username" },
            { "title" : "Status", "render" : (data,type,row,meta) => { return aktifstatus(row.status)} },
          ]
     });
     selected_datatable()
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

  function edit_data() {
      id = table.cell( idx, 1).data()
      if (idx == -1) { return false }
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
              // $('#image-preview').append('<img id="img-preview" onerror="imgError(this)"  src="<?php echo base_url() ?>'+data.image+'"/>');
              $('.select2').trigger('change');
              $('#modal-data').modal('show');
              $('#modal-data .modal-title').text('Edit Data');
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function detail_data() {
      id = table.cell( idx, 1).data()
      if (idx == -1) { return false }
      $('.img-detail').remove()
      $.ajax({
          url: `${apiurl}/edit`,
          type: "POST",
          data: {
              id: id,
          },
          dataType: "JSON",
          success: function(data) {
              $.each(data, function(i,v) {
                $(`#dd-${i}`).not('.span-img-det').html(data[i])
                $(`.span-img #dd-${i}`).append('<img class="img-detail img-fluid" onerror="imgError(this)" src="<?php echo base_url() ?>'+data[i]+'"/>');
              })
              // $('.span-img #dd-img_ktp').append('<img class="img-detail img-fluid" onerror="imgError(this)" src="<?php echo base_url() ?>'+data.img_ktp+'"/>');
              $('#modal-detail').modal('show');
              $('#modal-data .modal-title').text('Detail Data');
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function savedata() {
      if (
        !$('[name="nama"]').val() || !$('[name="nama"]').val() ||
        !$('[name="kodesales"]').val() || !$('[name="kodesales"]').val() ||
        !$('[name="alamat"]').val() || !$('[name="alamat"]').val() ||
        !$('[name="email"]').val() || !$('[name="email"]').val() ||
        !$('[name="username"]').val() || !$('[name="username"]').val() ||
        !$('[name="password"]').val() || !$('[name="password"]').val() ||
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
              if (data.sukses == 'success') {
                  $('#modal-data').modal('hide');
                  refresh();
                  toastr.success('Data Berhasil Disimpan')
              } else if (data.sukses == 'fail') {
                  $('#modal-data').modal('hide');
                  refresh();
                  toastr.success('No Changed')
              } else if (data.sukses == 'dupemail') {
                  refresh();
                  toastr.error('Email Sudah Digunakan')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function hapus_data()
  {
      id = table.cell( idx, 1).data()
      if (idx == -1) { return false }
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
                  toastr.success('Data Berhasil Divoid')
              } else if (data.sukses == 'fail') {
                  $('#modal-data').modal('hide');
                  refresh();
                  toastr.error('Data Gagal Divoid')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function aktif_data()
  {
      id = table.cell( idx, 1).data()
      if (idx == -1) { return false }
      var urlaktif =  `${apiurl}/aktifdata`
      _aktif_data(id, urlaktif)
  }

  function bidang_data()
  {
      id = table.cell( idx, 1).data()
      if (idx == -1) { return false }
      $('#form-bidang [name="id"]').val(id)
      getbidang(id)
      $('#modal-bidang').modal('show');
      $('#modal-bidang .modal-title').text('Bidang');
  }

  function getbidang(id)
  {
      $('.tr-bidang').remove()
      $.ajax({
          url: `${apiurl}/bidang`,
          type: "POST",
          data: {
              id: id,
          },
          dataType: "JSON",
          success: function(data) {
              $.each(data, function( i, v ) {
                  $('#tbody-bidang').append(`
                      <tr class="tr-bidang">
                        <td>${i + 1} .</td>
                        <td>${v.nama}</td>
                        <td><button type="button" class="btn btn-sm btn-danger btn-flat" onclick="delete_bidang('${v.id}','${id}')"><i class="fa fa-trash"></i></button></td>
                      </tr>
                  `)
              });
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function savebidang()
  {
      idcust    = $('#form-bidang [name="id"]').val()
      idbidang  = $('#form-bidang [name="bidang"]').val()
      url     =  `${apiurl}/savebidang`
      $.ajax({
          url: url,
          type: "POST",
          data: {
            ref_cust : idcust,
            ref_bidang : idbidang,
          },
          dataType: "JSON",
          success: function(data) {
              if (data.sukses == 'success') {
                  getbidang(idcust)
                  $('#form-bidang [name="bidang"]').val('')
                  $('.select2').trigger('change');
                  toastr.success('Data Berhasil Disimpan')
              } else if (data.sukses == 'fail') {
                  getbidang(idcust)
                  toastr.success('No Changed')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function delete_bidang(id, idcust)
  {
      $.ajax({
          url: `${apiurl}/deletebidang`,
          type: "POST",
          data: {
              id: id,
          },
          dataType: "JSON",
          success: function(data) {
            if (data.sukses == 'success') {
                getbidang(idcust)
                toastr.success('Bidang Dihapus')
            } else if (data.sukses == 'fail') {
                getbidang(idcust)
                toastr.error('Error')
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

</script>
