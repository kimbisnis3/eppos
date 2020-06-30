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
                <div class="row">
                  <div class="col-sm-3 col-xs-3 col-md-3">
                    <div class="form-group">
                      <label>Tanggal Awal</label>
                      <input type="text" class="form-control datepicker" name="tglawal" id="tglawal">
                    </div>
                  </div>
                  <div class="col-sm-3 col-xs-3 col-md-3">
                    <div class="form-group">
                      <label>Tanggal Akhir</label>
                      <input type="text" class="form-control datepicker" name="tglakhir" id="tglakhir">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer float-right">
                <button type="button" class="btn btn-primary btn-flat" onclick="cetak_data('1')"><i class="fa fa-print"></i> Cetak</button>
                <button type="button" class="btn btn-success btn-flat" onclick="cetak_data('2')"><i class="far fa-file-excel"></i> Excel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('_partials/foot') ?>
<?php $this->load->view(urisegment(1).'/m_'.urisegment(1)) ?>
</div>
<?php $this->load->view('_partials/js') ?>
<?php $this->load->view(urisegment(1).'/js_'.urisegment(1)) ?>
</body>
</html>