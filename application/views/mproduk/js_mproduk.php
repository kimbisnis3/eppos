<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;
  var arr_produk = []

   $(function() {
     getdata()
     active_induk("produk")
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
            // { "title" : ``, "render" : (data,type,row,meta) => { return renderdt(row.id)}, "orderable": false, "width" : "5%" },
            { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
            { "title" : "ID", "data": "id", "visible" : false },
            { "title" : "Kode", "data": "kode" },
            { "title" : "Nama", "data": "nama" },
            { "title" : "Kategori", "data": "mktgproduk_nama" },
            { "title" : "Harga", "render" : (data,type,row,meta) => {return angka(row.harga)} },
            { "title" : "Gambar", "render" : (data,type,row,meta) => { return showimage(row.image) } },
            { "title" : "Stok", "data": "stok" },
            { "title" : "Satuan", "data": "satuan" },
            { "title" : "Keterangan", "data": "ket" },
            // { "title" : "Status", "render" : (data,type,row,meta) => { return setstatus(row.aktif, 'Aktif', 'Tidak Aktif') } },
            { "title" : "Opsi", "width" : "8%", "render" : (data,type,row,meta) =>
            {
              return `
               <button type="button" class="btn btn-warning btn-flat btn-sm" name="button" onclick="edit_data(${row.id})"><i class="fas fa-edit"></i></button>
               <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_data(${row.id})"><i class="fa fa-trash"></i></button>`
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
        !$('[name="ref_ktgproduk"]').val() || $('[name="ref_ktgproduk"]').val() == '' ||
        !$('[name="ref_satuan"]').val() || $('[name="ref_satuan"]').val() == '' ||
        !$('[name="stok"]').val() || $('[name="stok"]').val() == '' ||
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
              } else if (data.status == 'dup') {
                  toastr.error('Kode Sudah Digunakan')
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

  function aktif_data(id) {
      url = `${apiurl}/aktifdata`
      _aktif_data(id, url)
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
