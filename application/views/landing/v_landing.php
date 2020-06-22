<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partials/head') ?>
<body class="hold-transition sidebar-mini text-sm layout-fixed">
<div class="wrapper">
  <?php $this->load->view('_partials/topbar') ?>
  <?php $this->load->view('_partials/sidebar') ?>
  <div class="content-wrapper">
  <?php $this->load->view('_partials/titlepage',array('title' => $titlepage)) ?>
    <div class="content">

    </div>
  </div>
<?php $this->load->view('_partials/foot') ?>
</div>
<?php $this->load->view('_partials/js') ?>
</body>
</html>
