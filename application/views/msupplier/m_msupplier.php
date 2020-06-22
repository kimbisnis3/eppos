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
                <input type="text" class="form-control" name="nama" >
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" >
              </div>
              <!-- <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="file_image">
                <input type="hidden" class="form-control" name="image">
              </div> -->
              <div class="form-group">
                <label>HP</label>
                <input type="text" class="form-control" name="hp" onkeypress="return inputangka(event)">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="ket">
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
<?php $this->load->view('_partials/modal_konfirmasi') ?>
