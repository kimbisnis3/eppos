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
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="float-left">
                  <button type="button" class="btn btn-success btn-flat" name="button" onclick="refresh()"><i class="fa fa-sync"></i> Refresh</button>
                  <button type="button" class="btn btn-primary btn-flat elm-add" name="button" onclick="add_data()"><i class="fa fa-plus"></i> Tambah</button>
                  <button type="button" class="btn btn-warning btn-flat" name="button" onclick="exp('uploads/template/template_csv_produk.csv')" id="btn_csv"><i class="fa fa-download"></i> Import</button>
                </div>
                <div class="float-right">
                  <button type="button" class="btn btn-danger btn-flat" name="button" onclick="hapus_confirm()"><i class="fa fa-trash"></i> Hapus</button>
                  <button type="button" class="btn btn-success btn-flat" name="button" onclick="aktif_confirm()"><i class="fa fa-check"></i> Aktif / Non Aktif</button>
                </div>
              </div>
              <div class="invisible">
                  <form id="form-file">
                    <input type="file" name="file_csv" id="file-csv" class="form-control">
                  </form>
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
<?php $this->load->view('mproduk/m_mproduk') ?>
</div>
<?php $this->load->view('_partials/js') ?>
<?php $this->load->view('mproduk/js_mproduk') ?>
</body>
</html>