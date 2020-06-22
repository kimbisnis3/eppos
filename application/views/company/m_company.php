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
              <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id">
                <input type="text" class="form-control" name="nama">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control " name="file_image" id="file_image">
                    <input type="hidden" name="image" id="image">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Splash Screen</label>
                    <input type="file" class="form-control " name="file_splash" id="file_splash">
                    <input type="hidden" name="splash" id="splash">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control " name="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Telp</label>
                    <input type="text" class="form-control " name="telp">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control " name="alamat" >
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control " name="ket" >
              </div>
              <!-- <div class="form-group">
                <label>Buka Registrasi</label>
                <select class="form-control select2" name="openreg">
                  <option value=""></option>
                  <option value="1">Ya</option>
                  <option value="0">Tidak</option>
                </select>
              </div> -->
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary btn-flat" onclick="savedata()">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('_partials/modal_konfirmasi') ?>
