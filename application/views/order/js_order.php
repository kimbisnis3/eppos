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
            { "title" : "Kode", "data": "kode" },
            { "title" : "Tanggal", "render" : (data,type,row,meta) => {return tanggal(row.tgl) } },
            { "title" : "Member", "render" : (data,type,row,meta) => {return row.ref_cust == 0 ? 'Umum' : row.namacustomer } },
            { "title" : "<div class='text-center'>Total</div>", "render" : (data,type,row,meta) => {return `<div class="text-right">${angka(row.total)}</div>` } },
            { "title" : "Diskon ( % )", "render" : (data,type,row,meta) => {return angka(row.diskon) } },
            { "title" : "Opsi", "visible" : true, "width" : "8%", "render" : (data,type,row,meta) =>
            {
              return `
               <button type="button" class="btn btn-warning btn-flat btn-sm invisible" name="button" onclick="edit_data(${row.id})"><i class="fas fa-edit"></i></button>
               <button type="button" class="btn btn-danger btn-flat btn-sm invisible" name="button" onclick="hapus_data(${row.id})"><i class="fa fa-trash"></i></button>
               <button type="button" class="btn btn-success btn-flat btn-sm" name="button" onclick="detail_data(${row.id})"><i class="fa fa-info-circle"></i></button>
               <button type="button" class="btn btn-primary btn-flat btn-sm" name="button" onclick="cetak_data(${row.kode})"><i class="fa fa-print"></i></button>
               `
            }},
          ]
     });
   }

   function detail_data(idorder)
   {
       tabledetail = $("#table-detail").DataTable({
         "processing": true,
         "destroy": true,
            "ajax": {
                "url": `${apiurl}/getdetail`,
                "type": "POST",
                "data": {
                  idorder : idorder
                },
            },
            "columns": [
              { "title" : "No", "render" : (data,type,row,meta) => {return meta.row + 1}, "width" : "5%" },
              { "title" : "ID", "data": "id", "visible" : false },
              { "title" : "Kode Produk", "data": "kodeproduk" },
              { "title" : "Nama Produk", "data": "namaproduk" },
              { "title" : "<div class='text-center'>Jumlah</div>", "render" : (data,type,row,meta) => {return `<div class="text-right">${angka(row.qty)}</div>` } },
              { "title" : "<div class='text-center'>Harga</div>", "render" : (data,type,row,meta) => {return `<div class="text-right">${angka(row.harga)}</div>` } },
              { "title" : "<div class='text-center'>Total</div>", "render" : (data,type,row,meta) => {return `<div class="text-right">${angka(row.total)}</div>` } },
            ]
       });
       $('#modal-detail').modal('show');
       $('#modal-detail .modal-title').text('Detail');
   }

   function getstatusorder(status) {
     if (status == 1) {
       return `<span class="badge badge-warning">Menunggu Pembayaran</span>`
     } else if (status == 2) {
       return `<span class="badge badge-info">Menunggu Konfirmasi</span>`
     } else if (status == 3) {
       return `<span class="badge badge-primary">Pesanan Dikonfirmasi</span>`
     } else if (status == 4) {
       return `<span class="badge badge-success">Pesanan Dikirim</span>`
     } else {
       return ''
     }
   }

   function refresh() {
      table.ajax.reload(null, false);
      idx = -1;
  }

  function cetak_data(kode)
  {
    setTimeout(function(){
      window.open(`sales/cetak?kode=${kode}`, "_blank");
    })
  }

</script>
