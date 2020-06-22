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
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control " name="ket" >
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
<div class="modal fade" id="modal-cetak" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-cetak">
          <div class="row filter_range">
            <div class="col-md-6">
              <div class="form-group">
                <label>From</label>
                <input type="text" class="form-control datepicker" name="from">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>To</label>
                <input type="text" class="form-control datepicker" name="to">
              </div>
            </div>
          </div>
          <div class="row filter_order">
            <div class="col-md-6">
              <div class="form-group">
                <label>Urutkan Berdasarkan</label>
                <select class="form-control select2" name="filter_order" id="filter_order">
                  <option value=""></option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="do_cetak(1)"><i class="fa fa-file"></i> Cetak</button>
        <button type="button" class="btn btn-success" onclick="do_cetak(2)"><i class="fa fa-file-excel"></i> Excel</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('_partials/modal_konfirmasi') ?>
