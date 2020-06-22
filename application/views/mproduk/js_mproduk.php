<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;
  var arr_produk = []

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
              "data": {
                useaktif : function() { return 1 }
              },
          },
          "columns": [
            { "title" : ``, "render" : (data,type,row,meta) => { return renderdt(row.id)}, "orderable": false, "width" : "5%" },
            { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
            { "title" : "ID", "data": "id", "visible" : false },
            { "title" : "Kode", "data": "kode" },
            { "title" : "Nama", "data": "nama" },
            { "title" : "Sub Kategori", "data": "msubktgproduk_nama" },
            { "title" : "Anak Kategori", "data": "manakktgproduk_nama" },
            { "title" : "Harga", "render" : (data,type,row,meta) => {return angka(row.harga)} },
            { "title" : "Diskon %", "render" : (data,type,row,meta) => {return angka(row.diskon)} },
            { "title" : "Gambar Thumbnail", "render" : (data,type,row,meta) => { return showimage(row.image) } },
            { "title" : "Keterangan", "data": "ket" },
            { "title" : "Status", "render" : (data,type,row,meta) => { return setstatus(row.aktif, 'Aktif', 'Tidak Aktif') } },
            { "title" : "Featured", "render" : (data,type,row,meta) => { return setstatus(row.fitur, 'Featured', 'Not Featured') } },
            { "title" : "Opsi", "width" : "15%", "render" : (data,type,row,meta) =>
            {
              return `
               <button type="button" class="btn bg-green btn-flat btn-sm" name="button" onclick="harga_data(${row.id})"><i class="fa fa-money-bill-alt"></i></button>
               <button type="button" class="btn btn-primary btn-flat btn-sm" name="button" onclick="gambar_data(${row.id})"><i class="fa fa-image"></i></button>
               <button type="button" class="btn btn-info btn-flat btn-sm" name="button" onclick="spek_data(${row.id})"><i class="fa fa-cog"></i></button>
               <button type="button" class="btn btn-warning btn-flat btn-sm" name="button" onclick="edit_data(${row.id})"><i class="fas fa-edit"></i></button>
               <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_data(${row.id})"><i class="fa fa-trash"></i></button>
               <button type="button" class="btn btn-success btn-flat btn-sm" name="button" onclick="aktif_data(${row.id})"><i class="fa fa-check"></i></button>
               <button type="button" class="btn bg-olive btn-flat btn-sm" name="button" onclick="fitur_data(${row.id})"><i class="fa fa-box"></i></button>`
            }},
          ]
     });
   }

   function cek_t(id){
     return `<h5 class="text-success pointer" id="_dt-${id}"><span onclick="dt('${id}',0)" class="far fa-check-square check_dt" value="${id}"></span></h5>`
   }

   function cek_f(id){
     return `<h5 class="text-danger pointer" id="_dt-${id}"><span onclick="dt('${id}',1)" class="far fa-square check_dt" value="${id}"></span></h5>`
   }

   function renderdt(id)
   {
     if (arr_produk.includes(id)) {
       return cek_t(id)
     } else {
       return cek_f(id)
     }
   }

   function checkall()
   {
     $(`._uncheckall`).replaceWith(`<h5 class="text-success pointer _checkall"><span onclick="uncheckall()" class="far fa-check-square"></span></h5>`)
     let a = $('.check_dt').map(function() { return $(this).attr('value') }).get();
     arr_produk = a
     $.each(arr_produk, function(i,id) {
       $(`#_dt-${id}`).replaceWith(cek_t(id))
     })
     console.log(arr_produk)
   }

   function uncheckall()
   {
     $(`._checkall`).replaceWith(`<h5 class="text-danger pointer _uncheckall"><span onclick="checkall()" class="far fa-square"></span></h5>`)
     let a = $('.check_dt').map(function() { return $(this).attr('value') }).get();
     $.each(arr_produk, function(i,id) {
       $(`#_dt-${id}`).replaceWith(cek_f(id))
       _.remove(arr_produk, id)
     })
     arr_produk = []
     console.log(arr_produk)
   }

   function dt(id, act)
   {
      if (act == 1) {
        arr_produk.push(id)
        $(`#_dt-${id}`).replaceWith(cek_t(id))
      } else if (act == 0) {
        _.remove(arr_produk, function(n) { return n == id })
        $(`#_dt-${id}`).replaceWith(cek_f(id))
      }
      console.log(arr_produk)
   }

   function refresh() {
      table.ajax.reload(null, false);
      idx = -1;
  }

  function spek_data(id)
  {
      $('#form-spek')[0].reset();
      tablespek = $("#table-spek").DataTable({
        "processing": true,
        "destroy": true,
           "ajax": {
               "url": `${apiurl}/getprodukspekall`,
               "type": "POST",
               "data": {
                 ref_produk  : function() { return id },
               },
           },
           "columns": [
             { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
             { "title" : "ID", "data": "id", "visible" : false },
             { "title" : "Judul", "data": "judul" },
             { "title" : "Deskripsi", "data": "desc" },
             { "title" : "Opsi", "width" : "5%", "render" : (data,type,row,meta) =>
             {
               return `
                <button type="button" class="btn btn-warning btn-flat btn-sm invisible" name="button" onclick="edit_spek(${row.id})"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_spek(${row.id})"><i class="fa fa-trash"></i></button>`
             }},
           ]
      });
      $('#ref_produk_spek').val(id)
      $('#modal-spek').modal('show')
      $('#modal-spek .modal-title').text('Spesifikasi Produk')
  }

  function save_spek()
  {
      if (
        !$('[name="judul"]').val() || $('[name="judul"]').val() == '' ||
        !$('[name="desc"]').val() || $('[name="desc"]').val() == ''
      )
      {
        toastr.error('Lengkapi Data');
        return true
      }
      $.ajax({
          url: `${apiurl}/saveprodukspek`,
          type: "POST",
          data: $('#form-spek').serializeArray(),
          dataType: "JSON",
          success: function(data) {
              if (data.sukses == 'success') {
                  tablespek.ajax.reload(null, false);
                  toastr.success('Data Berhasil Disimpan')
                  $('[name="judul"]').val('')
                  $('[name="desc"]').val('')
              } else if (data.sukses == 'fail') {
                  tablespek.ajax.reload(null, false);
                  toastr.success('No Changed')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function hapus_spek(id) {
      $.ajax({
          url: `${apiurl}/delprodukspek`,
          type: "POST",
          dataType: "JSON",
          data: {
              id: id,
          },
          success: function(data) {
              $('#modal-konfirmasi').modal('hide');
              if (data.sukses == 'success') {
                  tablespek.ajax.reload(null, false);
                  toastr.success('Data Berhasil Dihapus')
              } else if (data.sukses == 'fail') {
                  tablespek.ajax.reload(null, false);
                  toastr.error('Data Gagal Dihapus')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function gambar_data(id)
  {
      $('#form-data')[0].reset();
      tablegambar = $("#table-gambar").DataTable({
        "processing": true,
        "destroy": true,
           "ajax": {
               "url": `${apiurl}/getprodukimage`,
               "type": "POST",
               "data": {
                 ref_produk  : function() { return id },
               },
           },
           "columns": [
             { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
             { "title" : "ID", "data": "id", "visible" : false },
             { "title" : "Gambar", "render" : (data,type,row,meta) => {return showimage(row.image)} },
             { "title" : "Opsi", "width" : "5%", "render" : (data,type,row,meta) =>
             {
               return `
                <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_gambar(${row.id})"><i class="fa fa-trash"></i></button>`
             }},
           ]
      });
      $('#ref_produk').val(id)
      $('#modal-gambar').modal('show')
      $('#modal-gambar .modal-title').text('Gambar Produk')
  }

  function save_gambar()
  {
      // if (
      //   !$('[name="file_image"]').val() || $('[name="file_image"]').val() == ''
      // )
      // {
      //   toastr.error('Gambar Kosong');
      //   return true
      // }
      var imgurl = `${apiurl}/saveprodukimage`;
      var formData = new FormData($('#form-image')[0]);
      $.ajax({
          url: imgurl,
          type: "POST",
          data: formData,
          dataType: "JSON",
          mimeType: "multipart/form-data",
          contentType: false,
          cache: false,
          processData: false,
          success: function(data) {
              if (data.sukses == 'success') {
                  tablegambar.ajax.reload(null, false);
                  $('#file_image').val('');
                  toastr.success('Gambar Berhasil Disimpan')
              } else if (data.sukses == 'fail') {
                  tablegambar.ajax.reload(null, false);
                  toastr.success('No Changed')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function hapus_gambar(id) {
      $.ajax({
          url: `${apiurl}/delprodukimage`,
          type: "POST",
          dataType: "JSON",
          data: {
              id: id,
          },
          success: function(data) {
              $('#modal-konfirmasi').modal('hide');
              if (data.sukses == 'success') {
                  tablegambar.ajax.reload(null, false);
                  toastr.success('Gambar Berhasil Dihapus')
              } else if (data.sukses == 'fail') {
                  tablegambar.ajax.reload(null, false);
                  toastr.error('Gambar Gagal Dihapus')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function harga_data(id)
  {
      $('#form-harga')[0].reset();
      tableharga = $("#table-harga").DataTable({
        "processing": true,
        "destroy": true,
           "ajax": {
               "url": `${apiurl}/getprodukhargaall`,
               "type": "POST",
               "data": {
                 ref_produk  : function() { return id },
               },
           },
           "columns": [
             { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
             { "title" : "ID", "data": "id", "visible" : false },
             { "title" : "Minimum Beli", "data": "minbeli" },
             { "title" : "Harga", "render" : (data,type,row,meta) => {return angka(row.harga)} },
             { "title" : "Opsi", "width" : "5%", "render" : (data,type,row,meta) =>
             {
               return `
                <button type="button" class="btn btn-warning btn-flat btn-sm invisible" name="button" onclick="edit_harga(${row.id})"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_harga(${row.id})"><i class="fa fa-trash"></i></button>`
             }},
           ]
      });
      $('#ref_produk_harga').val(id)
      $('#modal-harga').modal('show')
      $('#modal-harga .modal-title').text('Harga Produk')
  }

  function save_harga()
  {
      if (
        !$('#form-harga [name="minbeli"]').val() || $('#form-harga [name="minbeli"]').val() == '' ||
        !$('#form-harga [name="harga"]').val() || $('#form-harga [name="harga"]').val() == ''
      )
      {
        toastr.error('Lengkapi Data');
        return true
      }
      if ($('#form-harga [name="minbeli"]').val() <= 1) {
        toastr.error('Minimum Beli Harus Lebih Dari 1');
        return true
      }
      $.ajax({
          url: `${apiurl}/saveprodukharga`,
          type: "POST",
          data: $('#form-harga').serializeArray(),
          dataType: "JSON",
          success: function(data) {
              if (data.sukses == 'success') {
                  tableharga.ajax.reload(null, false);
                  toastr.success('Data Berhasil Disimpan')
                  $('[name="minbeli"]').val('')
                  $('[name="harga"]').val('')
              } else if (data.sukses == 'fail') {
                  tableharga.ajax.reload(null, false);
                  toastr.success('No Changed')
              } else if (data.sukses == 'exist') {
                  toastr.warning('Minimum Beli Sudah Ada')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
  }

  function hapus_harga(id) {
      $.ajax({
          url: `${apiurl}/delprodukharga`,
          type: "POST",
          dataType: "JSON",
          data: {
              id: id,
          },
          success: function(data) {
              $('#modal-konfirmasi').modal('hide');
              if (data.sukses == 'success') {
                  tableharga.ajax.reload(null, false);
                  toastr.success('Data Berhasil Dihapus')
              } else if (data.sukses == 'fail') {
                  tableharga.ajax.reload(null, false);
                  toastr.error('Data Gagal Dihapus')
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error('Internal Error')
          }
      });
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
          url: `${apiurl}/getrow`,
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
        !$('[name="nama"]').val() || $('[name="nama"]').val() == '' ||
        !$('[name="ref_subktgproduk"]').val() || $('[name="ref_subktgproduk"]').val() == '' ||
        !$('[name="harga"]').val() || $('[name="harga"]').val() == ''
      )
      {
        toastr.error('Lengkapi Data');
        return true
      }
      if ( $('[name="diskon"]').val() > 100 )
      {
        toastr.error('Presentase Harus Maksimal 100');
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

  function aktif_data(id) {
      url = `${apiurl}/aktifdata`
      _aktif_data(id, url)
  }

  function fitur_data(id) {
    url = `${apiurl}/fiturdata`
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(data) {
                if (data.sukses == 'success') {
                    refresh();
                    toastr.success('Data Featured')
                } else if (data.sukses == 'fail') {
                    refresh();
                    toastr.error('Data Featured')
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Internal Error')
            }
        });
    }

  function exp(urlexp) {
    $.confirm({
      icon: 'fa fa-warning',
      title: 'Import',
      content: 'Apakah Anda Ingin Mengimport File CSV atau Mengexport Template CSV ?',
      buttons: {
        batal: {
          text: 'Batal',
          btnClass: 'btn-default',
          keys: ['enter','shift'],
          action: function(){
            return true;
          }
        },
        exportTemplateCsv: {
          text: 'Template CSV',
          btnClass: 'btn-primary',
          keys: ['enter','shift'],
          action: function(){
            document.location.href = '<?php echo base_url() ?>' + urlexp;
          }
        },
        importCsv: {
          text: 'Import CSV',
          btnClass: 'btn-warning',
          keys: ['enter','shift'],
          action: function(){
            $('#file-csv').trigger('click');
          }
        }
      }
    })
  }

  $("#file-csv").change(function() {
    if (
      !$('[name="file_csv"]').val() || $('[name="file_csv"]').val() == ''
    )
    {
      return true
    }
    else {
      toastr.info('processing');
      setTimeout(function(){
        uploadcsv()
      }, 1500)
    }
  });

  function uploadcsv()
  {
    var formFile = new FormData($('#form-file')[0]);
    $.ajax({
        url: `${apiurl}/importcsv`,
        type: "POST",
        data: formFile,
        dataType: "JSON",
        mimeType: "multipart/form-data",
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
          if (data.status == 'success') {
              refresh();
              toastr.success('Data Berhasil Import')
          } else if (data.status == 'failed') {
              toastr.warning(data.notice)
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            toastr.error('Internal Error')
        }
    });
    $('#form-file')[0].reset()
  }

  function hapus_confirm() {
    $.confirm({
      icon: 'fa fa-trash',
      title: 'Hapus data',
      content: 'Yakin hapus data terpilih ?',
      buttons: {
        batal: {
          text: 'Batal',
          btnClass: 'btn-default',
          keys: ['enter','shift'],
          action: function(){
            return true;
          }
        },
        importCsv: {
          text: 'Ya',
          btnClass: 'btn-danger',
          keys: ['enter','shift'],
          action: function(){
            hapus_all()
          }
        }
      }
    })
  }

  function hapus_all() {
    if (arr_produk == []) {
      toastr.warning('Pilih data terlebih dahulu')
      return true
    }
    $.post(`${apiurl}/deleteall`, {id : JSON.stringify(arr_produk)}, function(data) {
      if (data.status == 'success') {
        arr_produk = []
        $(`._checkall`).replaceWith(`<h5 class="text-danger pointer _uncheckall"><span onclick="checkall()" class="far fa-square"></span></h5>`)
        refresh();
        toastr.success('Data Berhasil Dihapus')
      } else {
        toastr.error('Gagal')
      }
    },'json');
  }

  function aktif_confirm() {
    $.confirm({
      icon: 'fa fa-check',
      title: 'Aktif data',
      content: 'Yakin mengaktifkan data ?',
      buttons: {
        batal: {
          text: 'Batal',
          btnClass: 'btn-default',
          keys: ['enter','shift'],
          action: function(){
            return true;
          }
        },
        importCsv: {
          text: 'Ya',
          btnClass: 'btn-success',
          keys: ['enter','shift'],
          action: function(){
            aktif_all()
          }
        }
      }
    })
  }

  function aktif_all() {
    if (arr_produk == []) {
      toastr.warning('Pilih data terlebih dahulu')
      return true
    }
    $.post(`${apiurl}/aktifall`, {id : JSON.stringify(arr_produk)}, function(data) {
      if (data.status == 'success') {
        arr_produk = []
        $(`._checkall`).replaceWith(`<h5 class="text-danger pointer _uncheckall"><span onclick="checkall()" class="far fa-square"></span></h5>`)
        refresh();
        toastr.success('Data Berhasil Dihapus')
      } else {
        toastr.error('Gagal')
      }
    },'json');
  }

</script>
