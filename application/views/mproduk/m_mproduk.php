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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Sub Kategori</label>
                    <select class="form-control select2" name="ref_subktgproduk">
                      <option value=""></option>
                      <?php foreach ($subktgproduk as $i => $v): ?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Anak Kategori</label>
                    <select class="form-control select2" name="ref_anakktgproduk">
                      <option value=""></option>
                      <?php foreach ($anakktgproduk as $i => $v): ?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['nama']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" onkeypress="return inputangka(event)">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Diskon %</label>
                    <input type="text" class="form-control" name="diskon" onkeypress="return inputangka(event)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Berat (gram)</label>
                    <input type="text" class="form-control" name="berat" onkeypress="return inputangka(event)">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Brand</label>
                    <input type="text" class="form-control" name="brand">
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
<div class="modal fade" id="modal-gambar" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-image">
          <div class="row">
            <div class="col-md-10">
              <div class="form-group">
                <input type="file" class="form-control" name="file_image" id="file_image">
                <input type="hidden" class="form-control" name="ref_produk" id="ref_produk">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <button type="button" class="btn btn-primary btn-flat elm-add" name="button" onclick="save_gambar()"> Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="table-gambar"></table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-spek" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-spek">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul">
                <input type="hidden" class="form-control" name="ref_produk" id="ref_produk_spek">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="desc" rows="1" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="float-right">
                <button type="button" class="btn btn-primary btn-flat elm-add" name="button" onclick="save_spek()"> Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="table-spek"></table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-harga" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-harga">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Minimum Beli</label>
                <input type="text" class="form-control" name="minbeli">
                <input type="hidden" class="form-control" name="ref_produk" id="ref_produk_harga">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Harga</label>
                <input type="number" class="form-control" name="harga"></input>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="float-right">
                <button type="button" class="btn btn-primary btn-flat elm-add" name="button" onclick="save_harga()"> Simpan</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hover" id="table-harga"></table>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('_partials/modal_konfirmasi') ?>
