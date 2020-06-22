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
                <label>Judul</label>
                <input type="hidden" name="id">
                <input type="text" class="form-control" name="judul" readonly>
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" class="form-control " name="file_image" >
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control " name="ket" >
              </div>
              <div class="form-group invisible">
                <label>Image</label>
                <input type="text" class="form-control " name="image" >
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
<?php $this->load->view(api_url().'_partials/modal_konfirmasi') ?>
