<!DOCTYPE html>
<html lang="en">
<?php $this->load->view(api_url().'_partials/head') ?>
<body class="hold-transition sidebar-mini text-sm layout-fixed">
<div class="wrapper">
  <?php $this->load->view(api_url().'_partials/topbar') ?>
  <?php $this->load->view(api_url().'_partials/sidebar') ?>
  <div class="content-wrapper">
  <?php $this->load->view(api_url().'_partials/titlepage',array('title' => $titlepage)) ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="float-left">
                  <button type="button" class="btn btn-success btn-flat" name="button" onclick="refresh()"><i class="fa fa-sync"></i> Refresh</button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <main-table></main-table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view(api_url().'_partials/foot') ?>
<?php $this->load->view(api_url().'configimage/m_configimage') ?>
</div>
<?php $this->load->view(api_url().'_partials/js') ?>
<?php $this->load->view(api_url().'configimage/js_configimage') ?>
</body>
</html>
