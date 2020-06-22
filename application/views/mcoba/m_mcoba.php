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
                <label>Kode</label>
                <input type="text" class="form-control" v-model="input.kode" @change="fun">
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" v-model="input.nama">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" v-model="input.ket">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" @click="savedata()" :disabled="!input.kode || !input.nama || !input.ket">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('_partials/modal_konfirmasi') ?>
