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
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control " name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control " name="username">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control " name="password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Level Akses</label>
                    <select class="form-control select2" name="ref_level">
                      <option value=""></option>
                      <?php foreach ($level as $i => $v): ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Foto (Opsional)</label>
                <div id="image-preview" onerror="imgError(this)"/></div><br>
                <input type="file" class="form-control " name="image" id="image" onchange="filePreview(this);">
                <input type="hidden" name="path" id="path">
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
<?php $this->load->view('_partials/modal_konfirmasi') ?>
