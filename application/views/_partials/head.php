<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->libre->companydata()->nama; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/dist/css/adminlte303.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/animate.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/pace-progress/themes/green/pace-theme-minimal.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/datepicker/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/jquery-confirm/jquery-confirm.css">

  <script src="<?php echo base_url() ?>assets/lte/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- <script src="<?php echo base_url() ?>assets/lte/dist/js/adminlte.js"></script> -->
  <script src="<?php echo base_url() ?>assets/lte/dist/js/adminlte303.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/dist/js/demo.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/toastr/toastr.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/select2/js/select2.full.min.js"></script>
  <script src="<?php echo base_url() ?>assets/numeral.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lodash.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/moment/moment.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/pace-progress/pace.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url() ?>assets/lte/plugins/summernote/summernote-bs4.min.js"></script>
  <script src="<?php echo base_url() ?>assets/jquery-confirm/jquery-confirm.js"></script>
  <!-- <script src="<?php echo base_url() ?>assets/autonumeric.min.js"></script> -->
  <!-- <script src="<?php echo base_url() ?>assets/angular.js"></script> -->

  <style media="screen">
      .selected {
          background-color: #17a2b8 !important;
          color: #ffffff !important;
      }

      .invisible {
        display: none !important;
      }

      #img-preview{
        /*display:none;*/
        width : 60px;
        height : 60px;
      }

      #img-detail{
        width : 200px;
      }

      .form-group {
          margin-bottom: 0.5rem !important;
      }

      label {
          margin-bottom: 0.2rem !important;
      }

      .modal {
              overflow-y:auto !important;
      }

      .table {
        width: 100% !important;
      }

      .table td,
      .table th {
              padding: .4rem !important;
      }

      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }

  </style>
</head>
