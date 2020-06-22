<div class="modal fade" id="modal-data" data-backdrop="static">
  <div class="modal-dialog modal-lg">
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" >
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select2" name="prov_id" id="prov">
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kota / Kabupaten</label>
                    <select class="form-control select2" name="city_id" id="city">
                      <option value="">-</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2" name="kec_id" id="kec">
                      <option value="">-</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kelurahan</label>
                    <select class="form-control select2" name="kel_id" id="kel">
                      <option value="">-</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="text" class="form-control" name="kodepos" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>HP</label>
                    <input type="text" class="form-control" name="hp" onkeypress="return inputangka(event)">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Sales</label>
                    <select class="form-control select2" name="kodesales">
                      <option value=""></option>
                      <?php foreach ($sales as $i => $v): ?>
                        <option value="<?php echo $v['kode'] ?>"><?php echo $v['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Gambar Profil</label>
                    <input type="file" class="form-control" name="file_img_profil">
                    <input type="hidden" class="form-control" name="img_profil">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Gambar KTP</label>
                    <input type="file" class="form-control" name="file_img_ktp">
                    <input type="hidden" class="form-control" name="img_ktp">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Gambar NPWP</label>
                    <input type="file" class="form-control" name="file_img_npwp">
                    <input type="hidden" class="form-control" name="img_npwp">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Gambar Bangunan 1</label>
                    <input type="file" class="form-control" name="file_img_bgn_1">
                    <input type="hidden" class="form-control" name="img_bgn_1">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Deskripsi Bangunan 1</label>
                    <input type="text" class="form-control" name="desc_img_bgn_1">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Gambar Bangunan 2</label>
                    <input type="file" class="form-control" name="file_img_bgn_2">
                    <input type="hidden" class="form-control" name="img_bgn_2">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Deskripsi Bangunan 2</label>
                    <input type="text" class="form-control" name="desc_img_bgn_2">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Gambar Bangunan 3</label>
                    <input type="file" class="form-control" name="file_img_bgn_3">
                    <input type="hidden" class="form-control" name="img_bgn_3">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Deskripsi Bangunan 3</label>
                    <input type="text" class="form-control" name="desc_img_bgn_3">
                  </div>
                </div>
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
<div class="modal fade" id="modal-detail" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <table class="table">
              <tbody>
                <tr>
                  <th>Nama</th>
                  <td><span id="dd-nama"></span></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><span id="dd-alamat"></span></td>
                </tr>
                <tr>
                  <th>Provinsi</th>
                  <td><span id="dd-prov"></span></td>
                </tr>
                <tr>
                  <th>Kota</th>
                  <td><span id="dd-city"></span></td>
                </tr>
                <tr>
                  <th>Kecamatan</th>
                  <td><span id="dd-kec"></span></td>
                </tr>
                <tr>
                  <th>Kelurahan</th>
                  <td><span id="dd-kel"></span></td>
                </tr>
                <tr>
                  <th>Kode Pos</th>
                  <td><span id="dd-kodepos"></span></td>
                </tr>
                <tr>
                  <th>Kode Sales</th>
                  <td><span id="dd-kodesales"></span></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td><span id="dd-email"></span></td>
                </tr>
                <tr>
                  <th>HP</th>
                  <td><span id="dd-hp"></span></td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td><span id="dd-username"></span></td>
                </tr>
                <tr>
                  <th>Desc Bangunan 1</th>
                  <td><span id="dd-desc_img_bgn_1"></span></td>
                </tr>
                <tr>
                  <th>Desc Bangunan 2</th>
                  <td><span id="dd-desc_img_bgn_2"></span></td>
                </tr>
                <tr>
                  <th>Desc Bangunan 3</th>
                  <td><span id="dd-desc_img_bgn_3"></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <div class="row span-img">
              <div class="col-md-4">
                <span>Foto</span>
                <span class="span-img-det" id="dd-img_profil"></span>
              </div>
              <div class="col-md-4">
                <span>KTP</span>
                <span class="span-img-det" id="dd-img_ktp"></span>
              </div>
              <div class="col-md-4">
                <span>NPWP</span>
                <span class="span-img-det" id="dd-img_npwp"></span>
              </div>
              <div class="col-md-4">
                <span>Bangunan 1</span>
                <span class="span-img-det" id="dd-img_bgn_1"></span>
              </div>
              <div class="col-md-4">
                <span>Bangunan 2</span>
                <span class="span-img-det" id="dd-img_bgn_2"></span>
              </div>
              <div class="col-md-4">
                <span>Bangunan 3</span>
                <span class="span-img-det" id="dd-img_bgn_3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-bidang" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Default Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header">
            <form id="form-bidang">
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Bidang</label>
                    <input type="hidden" name="id">
                    <select class="form-control select2" name="bidang">
                      <option value=""></option>
                      <?php foreach ($bidang as $i => $v): ?>
                        <option value="<?php echo $v['id'] ?>"><?php echo $v['nama'] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-success btn-sm mt-4" onclick="savebidang()">Tambah Bidang</button>
                </div>
              </div>
            </form>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="tbody-bidang">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('_partials/modal_konfirmasi') ?>
