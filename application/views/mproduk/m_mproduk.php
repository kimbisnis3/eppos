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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kode</label>
                    <input type="text" class="form-control" name="kode" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
              </div>
              <div class="form-group">
                <label>Kategori</label>
                <select class="form-control select2" name="ref_ktgproduk">
                  <option value=""></option>
                  <?php foreach ($ktgproduk as $i => $v): ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" name="stok" onkeypress="return inputangka(event)">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Satuan</label>
                    <select class="form-control select2" name="ref_satuan">
                      <option value=""></option>
                      <?php foreach ($satuan as $i => $v): ?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" onkeypress="return inputangka(event)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="file_image">
                    <input type="hidden" class="form-control" name="image">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="artikel" rows="5" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="ket" >
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
