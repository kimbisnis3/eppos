<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;

   $(function() {
     getdata()
     select2()
     dpicker()
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
            { "title" : "Opsi", "width" : "10%", "render" : (data,type,row,meta) =>
            {
               return `<button type="button" class="btn btn-success btn-flat btn-sm" name="button" onclick="cetak(${row.id})"><i class="fa fa-print"></i></button>`
            }},
          ]
     });
   }

   function refresh() {
      table.ajax.reload(null, false);
      idx = -1;
  }

  var idcetak
  var speklaporan
  var keylaporan = []
  function cetak(id) {
      $('.filter_range').addClass('invisible')
      $('.filter_order').addClass('invisible')
      idcetak = id
      $.get(`${apiurl}/getlaporan`, { id : id }, function( data ) {
        if (data.res.filter_range) {
          $('.filter_range').removeClass('invisible')
        }
        $.each(data.header, function(i,v) {
          keylaporan.push(i)
        })
        if (data.res.order == 1) {
          $('.filter_order').removeClass('invisible')
          $('.option_order').remove()
          $.each(keylaporan, function (i, v) {
              $(`#filter_order`).append(`
                <option class="option_order" value="${v}">${v.replace(/_/g, ' ')}</option>
                `
              );
          })
        }
        speklaporan = data.res
        console.log(keylaporan)
        $('#modal-cetak').modal('show');
        $('#modal-cetak .modal-title').text('Cetak Laporan');
      },'json');
  }

  function do_cetak(tipe)
  {
      if (
        speklaporan.filter_range &&
        (
          !$('[name="from"]').val() ||
          !$('[name="from"]').val() ||
          !$('[name="to"]').val() ||
          !$('[name="to"]').val()
        )
      )
      {
        toastr.error('Filter Kosong')
        return true
      }
      let tp    = tipe == 1 ? 'print' : 'xls';
      let from  = $('[name="from"]').val() ? $('[name="from"]').val() : null
      let to    = $('[name="to"]').val() ? $('[name="to"]').val() : null
      let order = $('[name="filter_order"]').val() ? $('[name="filter_order"]').val() : null
      window.open(`laporan/cetak?tipe=${tp}&kode=${idcetak}&from=${from}&to=${to}&order=${order}`, '_blank');
  }

</script>
