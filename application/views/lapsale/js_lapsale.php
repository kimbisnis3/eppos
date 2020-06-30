<script type="text/javascript">

  var path      = '<?php echo $this->uri->segment(1) ?>';
  var apiurl    = '<?php echo base_url() ?>' + path;
  var idx       = -1;
  var state;
  var table ;

   $(function() {
     active_induk("trans")
     active_anak(path)
     select2()
     dpicker()
     $('[name="tglawal"]').datepicker( "setDate" , (moment().format('DD MMM YYYY')));
     $('[name="tglakhir"]').datepicker( "setDate" , (moment().add(5, 'days').format('DD MMM YYYY')));
   })

  function cetak_data(tipe)
   {
     let tglawal   = $('[name="tglawal"]').val()
     let tglakhir  = $('[name="tglakhir"]').val()
     if (
       !tglawal || tglawal == ''  ||
       !tglakhir || tglakhir == ''
     )
     {
       toastr.error('Lengkapi Data');
       return true
     }
     window.open(`lapsale/cetak?tglawal=${tglawal}&tglakhir=${tglakhir}&tipecetak=${tipe}`, "_blank");
   }

</script>
