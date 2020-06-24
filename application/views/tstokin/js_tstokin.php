<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;

   $(function() {
     getdata()
     active_induk("trans")
     active_anak(path)
     select2()
     dpicker()
     $('[name="tglawal"]').datepicker( "setDate" , (moment().format('DD MMM YYYY')));
     $('[name="tglakhir"]').datepicker( "setDate" , (moment().add(5, 'days').format('DD MMM YYYY')));
   })

   function getdata() {
     table = $("#table").DataTable({
       "processing": true,
          "ajax": {
              "url": `${apiurl}/getall`,
              "type": "POST",
              "data": {
                tglawal  : function() { return $('#tglawal').val() },
                tglakhir : function() { return $('#tglakhir').val() }
              },
          },
          "columns": [
            { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
            { "title" : "ID", "data": "id", "visible" : false },
            { "title" : "Tanggal ", "render" : (data,type,row,meta) => {return tanggal(row.tgl) } },
            { "title" : "Kode", "data": "kodeproduk" },
            { "title" : "Produk", "data": "produk" },
            { "title" : "Qty ", "render" : (data,type,row,meta) => {return `<div class="text-right">${row.qty}</div>` } },
            { "title" : "Supplier", "data": "supplier" },
            { "title" : "Keterangan", "data": "desc" },
            // { "title" : "Opsi", "width" : "8%", "render" : (data,type,row,meta) =>
            // {
            //    return `
            //    <button type="button" class="btn btn-danger btn-flat btn-sm" name="button" onclick="hapus_data(${row.id})"><i class="fa fa-trash"></i></button>
            //    `
            // }},
          ]
     });
   }

  function refresh() {
      table.ajax.reload(null, false);
      idx = -1;
  }

  function open_produk()
  {
      tableproduk = $("#table-produk").DataTable({
        "processing": true,
        "destroy": true,
           "ajax": {
               "url": `<?php echo base_url() ?>/mproduk/getall`,
               "type": "POST",
           },
           "columns": [
             { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
             { "title" : "ID", "data": "id", "visible" : false },
             { "title" : "Kode", "data": "kode" },
             { "title" : "Nama", "data": "nama" },
             { "title" : "Kategori", "data": "mktgproduk_nama" },
             { "title" : "Harga", "render" : (data,type,row,meta) => {return angka(row.harga)} },
             { "title" : "Stok", "data": "stok" },
             { "title" : "Satuan", "data": "satuan" },
             { "title" : "Opsi", "width" : "5%", "render" : (data,type,row,meta) =>
             {
               return `
                <button type="button" class="btn btn-warning btn-flat btn-sm" name="button" onclick="pilih_data('${row.id}', '${row.nama}', '${row.stok}', '${row.satuan}')"><i class="fas fa-check"></i></button>`
             }},
           ]
      });
      $('#modal-produk').modal('show');
      $('#modal-produk .modal-title').text('Daftar Produk');
  }

  function add_data() {
      state = 'add';
      $('#form-data')[0].reset();
      $('#img-preview').remove();
      $('.select2').trigger('change');
      $('[name="tgl"]').datepicker( "setDate" , (moment().format('DD MMM YYYY')));
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
        !$('[name="tgl"]').val() || $('[name="tgl"]').val() == '' ||
        !$('[name="ref_produk"]').val() || $('[name="ref_produk"]').val() == '' ||
        !$('[name="qty"]').val() || $('[name="qty"]').val() == ''
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
      $.post(url, $('#form-data').serializeArray(), function(data) {
        if (data.status == 'success') {
            $('#modal-data').modal('hide');
            refresh();
            toastr.success('Data Berhasil Disimpan')
        } else if (data.status == 'fail') {
            $('#modal-data').modal('hide');
            refresh();
            toastr.success('No Changed')
        }
      },'json');
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

  function pilih_data(id, nama, stok, satuan)
  {
    $('[name="ref_produk"]').val(id)
    $('[name="produk"]').val(nama)
    $('[name="stok"]').val(stok)
    $('[name="satuan"]').val(satuan)
    $('#modal-produk').modal('hide')
  }

</script>
