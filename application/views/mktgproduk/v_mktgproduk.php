<!DOCTYPE html>
<html lang="en" ng-app="sandbox">
<?php $this->load->view('_partials/head') ?>
<style media="screen">
  #prov_name, #city_name, #kec_name, #kel_name {
    background-color : #fff !important;
  }
</style>
<body class="hold-transition sidebar-mini text-sm layout-fixed">
<div class="wrapper">
  <?php $this->load->view('_partials/topbar') ?>
  <?php $this->load->view('_partials/sidebar') ?>
  <div class="content-wrapper">
  <?php $this->load->view('_partials/titlepage') ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="float-left">
                  <button type="button" class="btn btn-success btn-flat" name="button" onclick="refresh()"><i class="fa fa-sync"></i> Refresh</button>
                  <button type="button" class="btn btn-primary btn-flat elm-add" name="button" onclick="add_data()"><i class="fa fa-plus"></i> Tambah</button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="table"></table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('_partials/foot') ?>
<?php $this->load->view('mktgproduk/m_mktgproduk') ?>
</div>
<?php $this->load->view('_partials/js') ?>
<?php $this->load->view('mktgproduk/js_mktgproduk') ?>
</body>
</html>
