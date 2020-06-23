<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('_partials/head') ?>
<body class="hold-transition sidebar-mini text-sm sidebar-collapse">
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
              <div class="card-header">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kasir</label>
                      <input type="text" class="form-control" name="kasir" value="<?php echo sessdata('nama') ?>" readonly>
                      <input type="hidden" class="form-control" name="ref_user" value="<?php echo sessdata('iduser') ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. Invoice</label>
                      <input type="text" class="form-control" name="kode" readonly>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tanggal Invoice</label>
                      <input type="text" class="form-control datepicker" name="tgl">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pelanggan</label>
                      <select class="form-control select2" name="ref_customer">
                        <option value=""></option>
                        <option value="0">- Umum -</option>
                        <?php foreach ($cust as $i => $v): ?>
                          <option value="<?php echo $v['id'] ?>"><?php echo $v['nama'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="row">
                      <h5>Tambah Pembelian</h5>
                      <div class="col-md-12">
                        <form id="form-order">
                          <div class="form-group">
                            <label>Kode Produk</label>
                            <div class="input-group">
                              <input type="text" class="form-control" name="kodeproduk">
                              <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary" onclick="cari_produk()"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                            <input type="hidden" class="form-control" name="kodeproduk_real" readonly>
                            <input type="hidden" class="form-control" name="ref_produk" readonly>
                          </div>
                          <div class="form-group">
                            <label>Produk</label>
                            <input type="text" class="form-control" name="produk" readonly>
                          </div>
                          <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="harga" readonly>
                          </div>
                          <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="qty">
                          </div>
                          <div class="form-group">
                            <label>Total</label>
                            <input type="text" class="form-control" name="total" readonly>
                          </div>
                          <button type="button" class="btn btn-primary btn-block btn-flat" onclick="save_temp()"><i class="fa fa-plus"></i> Tambahkan</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <h5>Daftar Pembelian</h5>
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped" id="table">
                        <tfoot>
                          <tr>
                            <th colspan="2" class="text-right">Total</th>
                            <th class="text-right"><span id="span-total-harga"></span></th>
                            <th class="text-right"><span id="span-total-qty"></span></th>
                            <th class="text-right"><span id="span-total-all"></span></th>
                            <th class="text-right"></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-6">
                        <table class="table table-bordered table-striped" id="table-total">
                          <tfoot>
                            <tr>
                              <th width="50%">Subtotal</th>
                              <th class="text-right"><span id="span-total-all-2"></span></th>
                            </tr>
                            <tr>
                              <th>Diskon</th>
                              <th class="text-right">
                                <input type="number" class="form-control" name="diskon" max="100">
                              </th>
                            </tr>
                            <tr>
                              <th>Catatan</th>
                              <th class="text-right">
                                <textarea type="text" class="form-control" name="note" rows="2"></textarea>
                              </th>
                            </tr>
                            <tr>
                              <th>Total Pembelian</th>
                              <th class="text-right">Total Pembelian</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <div class="col-md-4">
                        <div class="row mb-4">
                          <button type="button" class="btn btn-lg btn-warning btn-flat"><i class="fa fa-sync"></i> Cancel</button>
                        </div>
                        <div class="row">
                          <button type="button" class="btn btn-lg btn-success btn-flat"><i class="fa fa-paper-plane"></i> Proses</button>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">

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
