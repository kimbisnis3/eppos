<div class="modal fade" id="modal-data" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-data">
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" name="id">
              <div class="form-group">
                <label>Tanggal</label>
                <input type="text" class="form-control datepicker" name="tgl" >
              </div>
              <div class="form-group">
                <label>Produk</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="produk" readonly>
                  <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary" onclick="open_produk()"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                <input type="hidden" class="form-control" name="ref_produk" readonly>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" class="form-control" name="satuan" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stok" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" class="form-control" name="ket">
              </div>
              <div class="form-group">
                <label>Supplier</label>
                <select class="form-control select2" name="ref_supplier">
                  <option value=""></option>
                  <?php foreach ($supplier as $i => $v): ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>QTY</label>
                <input type="number" class="form-control" name="qty">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="savedata()">Simpan</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-produk" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="table-produk"></table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('_partials/modal_konfirmasi') ?>
