<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partials/head') ?>
<body class="hold-transition sidebar-mini text-sm layout-fixed">
<div class="wrapper" id="app">
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
                  <button type="button" class="btn btn-success " name="button"  @click="getall"><i class="fa fa-sync"></i> Refresh</button>
                  <button type="button" class="btn btn-primary  elm-add" name="button" @click="add_data"><i class="fa fa-plus"></i> Tambah</button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Limit</label>
                  <select class="form-control select2" v-model="filter.limit" @change="fun">
                    <option value=""></option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                  </select>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="table">
                    <thead>
                      <tr>
                        <td v-for="td in fields" @click=ordertb(td.column)>{{td.label}}</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="data in datatable">
                        <td v-for="td in fields">{{data[td.column]}}</td>
                        <td>
                          <button type="button" class="btn btn-sm btn-warning" @click="edit_data(data.id)"><i class="fa fa-edit"></i></button>
                          <button type="button" class="btn btn-sm btn-danger" @click="hapus_data(data.id)"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('_partials/foot') ?>
<?php $this->load->view('mcoba/m_mcoba') ?>
</div>
<?php $this->load->view('_partials/js') ?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js" integrity="sha256-bd8XIKzrtyJ1O5Sh3Xp3GiuMIzWC42ZekvrMMD4GxRg=" crossorigin="anonymous"></script>
<?php $this->load->view('mcoba/js_mcoba') ?>
</body>
</html>
