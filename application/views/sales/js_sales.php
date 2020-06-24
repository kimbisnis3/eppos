<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;
  var arr_produk = [] ;
  var total_harga = 0
  var total_qty = 0
  var total_all = 0
  var total_final = 0
  var cashback = 0

   $(function() {
     getdata()
     active_induk("trans")
     active_anak(path)
     select2()
     genkodeinvoice()
     dpicker()
     $('[name="tgl"]').datepicker( "setDate" , (moment().format('DD MMM YYYY')));
     $('[name="ref_customer"]').val(0);
     $('[name="ref_customer"]').trigger('change');
   })

   $('[name="tgl"]').on('change', function(){
     if (!$('[name="tgl"]').val() || $('[name="tgl"]').val() != '') {
       setTimeout(function(){
         genkodeinvoice()
       },150)
     }
   })

   function genkodeinvoice()
   {
     $.post(`${apiurl}/genkodeinvoice`, {tgl : $('[name="tgl"]').val()}, function(data) {
       $('[name="kode"]').val(data)
     },'json');
   }

   function getdata() {
     table = $('#table').DataTable({
          "processing": true,
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "destroy" : true,
          "data": arr_produk,
          "createdRow": function( row, data, dataIndex ) { $(row).addClass( 'fadeIn animated' ) },
          "columns": [
          { "title" : "Kode", "data": "kode" },
          { "title" : "Produk", "data": "produk" },
          { "title" : "<div class='text-center'>Harga</div>", "render" : (data,type,row,meta) => {return `<div class="text-right">${angka(row.harga)}</div>` } },
          { "title" : "<div class='text-center'>Jumlah</div>","width" : "4%", "render" : (data,type,row,meta) => {return `<div class="text-right">${row.qty}</div>` } },
          { "title" : "<div class='text-center'>Total</div>", "render" : (data,type,row,meta) => {return `<div class="text-right">${angka(row.total)}</div>` } },
          { "title" : "<div class='text-center'>Opsi</div>","width" : "8%", "render" : (data,type,row,meta) => { return `<button type="button" class="btn btn-sm btn-danger btn-flat" onclick="del_temp(${row.ref_produk},${row.qty})"><i class="fa fa-trash"></i></button>` }},
          ]
      });
   }

  function refresh() {
      table.clear().rows.add(arr_produk).draw();
      total_harga = _.sumBy(arr_produk, function(o) { return parseFloat(parseInt(o.harga)) });
      total_qty   = _.sumBy(arr_produk, function(o) { return parseFloat(parseInt(o.qty)) });
      total_all   = _.sumBy(arr_produk, function(o) { return parseFloat(parseInt(o.harga) * parseInt(o.qty)) });
      total_final = total_all - (total_all * (($('[name="diskon"]').val() == '' ? 0 : $('[name="diskon"]').val()) / 100))
      $('#span-total-harga').html(angka(total_harga))
      $('#span-total-qty').html(angka(total_qty))
      $('#span-total-all').html(angka(total_all))
      $('#span-total-all-2').html(angka(total_all))
      $('#span-total-final').html(angka(total_final))
  }

  function batal()
  {
    arr_produk = []
    refresh()
    $('#form-order')[0].reset()
    $('#form-diskon')[0].reset()
    $('#form-cash')[0].reset()
    toastr.success('Data Dihapus')
  }

  function cari_produk()
  {
      tableproduk = $("#table-produk").DataTable({
        "processing": true,
        "destroy": true,
           "ajax": {
               "url": `<?php echo base_url() ?>/mproduk/getall`,
               "type": "POST",
               "data": {
                 usestok  : 1
               },
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
                <button type="button" class="btn btn-warning btn-flat btn-sm" name="button" onclick="pilih_data('${row.id}', '${row.kode}', '${row.nama}', '${row.harga}')"><i class="fas fa-check"></i></button>`
             }},
           ]
      });
      $('#modal-produk').modal('show');
      $('#modal-produk .modal-title').text('Daftar Produk');
  }

  function save_temp(){
    if (
      !$('[name="ref_produk"]').val() || $('[name="ref_produk"]').val() == '' ||
      !$('[name="kodeproduk_real"]').val() || $('[name="kodeproduk_real"]').val() == '' ||
      !$('[name="produk"]').val() || $('[name="produk"]').val() == '' ||
      !$('[name="harga"]').val() || $('[name="harga"]').val() == '' ||
      !$('[name="qty"]').val() || $('[name="qty"]').val() == '' || $('[name="qty"]').val() == 0 ||
      !$('[name="total"]').val() || $('[name="total"]').val() == '' || $('[name="total"]').val() == 0
    )
    {
      toastr.error('Lengkapi Data');
      return true
    }
    let pr_exs  = arr_produk.filter(function(a){ return a['ref_produk'] == $('#form-order [name="ref_produk"]').val() })
    if (pr_exs.length > 0) {
      arr_produk.push({
        ref_produk: pr_exs[0]['ref_produk'],
        kode      : pr_exs[0]['kode'],
        produk    : pr_exs[0]['produk'],
        harga     : pr_exs[0]['harga'],
        qty       : parseInt(pr_exs[0]['qty']) + parseInt($('#form-order [name="qty"]').val()),
        total     : parseInt(pr_exs[0]['total']) + parseInt($('#form-order [name="total"]').val()),
      })
      let idx = _.findIndex(arr_produk, { 'ref_produk': pr_exs[0]['ref_produk'], 'qty': pr_exs[0]['qty'] });
      arr_produk.splice(idx, 1)
    } else {
      arr_produk.push({
        ref_produk: $('#form-order [name="ref_produk"]').val(),
        kode      : $('#form-order [name="kodeproduk_real"]').val(),
        produk    : $('#form-order [name="produk"]').val(),
        harga     : $('#form-order [name="harga"]').val(),
        qty       : $('#form-order [name="qty"]').val(),
        total     : $('#form-order [name="total"]').val(),
      })
    }
    refresh()
    $('#form-order')[0].reset()
  }

  function del_temp(ref_produk, qty)
  {
    let idx = _.findIndex(arr_produk, { 'ref_produk': ref_produk.toString(), 'qty': qty.toString() });
    arr_produk.splice(idx, 1)
    refresh()
  }

  function ask_save_data() {
    if (
      !$('#form-data [name="tgl"]').val() || $('#form-data [name="tgl"]').val() == "" ||
      !$('#form-data [name="ref_user"]').val() || $('#form-data [name="ref_user"]').val() == "" ||
      !$('#form-data [name="kode"]').val() || $('#form-data [name="kode"]').val() == "" ||
      !$('#form-cash [name="cash"]').val() || $('#form-cash [name="cash"]').val() == "" ||
      arr_produk.length == 0
    )
    {
      toastr.error('Lengkapi Data');
      return true
    }
    if (
      $('#form-cash [name="cash"]').val() < total_final
    )
    {
      toastr.error('Cash Tidak Cukup');
      return true
    }
    $.confirm({
      closeIcon: true,
      icon: 'fa fa-paper-plane',
      title: 'Proses Transaksi',
      content: 'Yakin Proses Transaksi ?',
      buttons: {
        yes: {
          text: 'Ya',
          btnClass: 'btn-success',
          keys: ['enter'],
          action: function(){
            savedata()
          }
        },
        no: {
          text: 'Tidak',
          btnClass: 'btn-warning',
        }
      }
    })
  }

  function savedata() {
      var url = `${apiurl}/savedata`;
      var datainput = $('#form-data').serializeArray()
      datainput.push(
        { "name": "arr_produk", "value": JSON.stringify(arr_produk)},
        { "name": "total_harga", "value": total_harga},
        { "name": "total_qty", "value": total_qty},
        { "name": "total_all", "value": total_all},
        { "name": "diskon", "value": $('[name="diskon"]').val()},
        { "name": "total", "value": total_final},
        { "name": "ket", "value": $('[name="ket"]').val()},
        { "name": "cash", "value": $('#form-cash [name="cash"]').val()},
        { "name": "cashback", "value": $('#form-cash [name="cashback"]').val()},
      );
      $.post(url, datainput, function(data) {
        if (data.status == 'success') {
            arr_produk = []
            refresh();
            toastr.success('Data Berhasil Disimpan')
            $('#form-order')[0].reset()
            $('#form-diskon')[0].reset()
            $('#form-cash')[0].reset()
            genkodeinvoice()
        } else if (data.status == 'fail') {
            arr_produk = []
            refresh();
            toastr.success('No Changed')
        }
      },'json');
  }

  $('#form-order [name="qty"]').on('keyup', function(){
    setTimeout(function(){
      $('#form-order [name="total"]').val($('#form-order [name="qty"]').val() * $('#form-order [name="harga"]').val())
    },150)
  })

  $('#form-order [name="kodeproduk"]').on('keyup', function(e){
    if(e.which == 13) {
      $.get(`${apiurl}/getproduk_bykode`, {kode : $('#form-order [name="kodeproduk"]').val()}, function(data) {
        if (data) {
          $('#form-order [name="ref_produk"]').val(data.id)
          $('#form-order [name="kodeproduk"]').val(data.kode)
          $('#form-order [name="kodeproduk_real"]').val(data.kode)
          $('#form-order [name="produk"]').val(data.nama)
          $('#form-order [name="harga"]').val(data.harga)
          $('#form-order [name="qty"]').val(1)
          $('#form-order [name="total"]').val(1 * data.harga)
        } else {
          $('#form-order [name="ref_produk"]').val('')
          $('#form-order [name="kodeproduk_real"]').val('')
          $('#form-order [name="produk"]').val('')
          $('#form-order [name="harga"]').val('')
          $('#form-order [name="qty"]').val('')
          $('#form-order [name="total"]').val('')
        }
      },'json');
    }
  })

  $('#form-order [name="qty"]').on('keyup', function(e){
    if(e.which == 13) {
      save_temp()
    }
  })

  $('[name="diskon"]').on('keyup', function(e){
    setTimeout(function(){
      total_final = total_all - (total_all * ($('[name="diskon"]').val() / 100))
      $('#span-total-final').html(angka(total_final))
    })
    setTimeout(function(){
      if ($('[name="diskon"]').val() > 100) {
        $('[name="diskon"]').val('100')
      } else if ($('[name="diskon"]').val() < 0) {
        $('[name="diskon"]').val('0')
      }
    })
  })

  $('#form-cash [name="cash"]').on('keyup', function(e){
    setTimeout(function(){
      $('#form-cash [name="cashback"]').val($('#form-cash [name="cash"]').val() - total_final)
    })
  })

  function pilih_data(id, kode, nama, harga)
  {
    $('#form-order [name="ref_produk"]').val(id)
    $('#form-order [name="kodeproduk"]').val(kode)
    $('#form-order [name="kodeproduk_real"]').val(kode)
    $('#form-order [name="produk"]').val(nama)
    $('#form-order [name="harga"]').val(harga)
    $('#form-order [name="qty"]').val(1)
    $('#form-order [name="total"]').val(1 * harga)
    $('#modal-produk').modal('hide')
  }

</script>
