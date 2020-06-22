<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mproduk extends CI_Controller {

    public $table       = 'mproduk';
    public $foldername  = 'mproduk';
    public $titlepage   = 'Master Produk';
    public $indexpage   = 'mproduk/v_mproduk';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->libre->session();
        $data['titlepage']  = datamenu($this->uri->segment(1), 'nama');
        $data['iconpage']   = datamenu($this->uri->segment(1), 'icon');
        $data['ktgproduk']  = db_get('mktgproduk')->result_array();
        $data['satuan']     = db_get('msatuan')->result_array();
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $limit        = epost('limit');
        $useaktif     = epost('useaktif');
        $q = "SELECT
                mproduk.*,
                msatuan.nama satuan,
                mktgproduk.nama mktgproduk_nama
              FROM
                mproduk
              LEFT JOIN mktgproduk ON mktgproduk.id = mproduk.ref_ktgproduk
              LEFT JOIN msatuan ON msatuan.id = mproduk.ref_satuan
              WHERE 1=1
              ";
        if ($limit != null || $limit != '') {
          $q .= " LIMIT $limit";
        }
        $q .= " ORDER BY mproduk.nama ASC";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['status']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function savedata()
    {
        if (db_get_where('mproduk', array('kode' => epost('kode')))->num_rows() >= 1) {
          $r['status']      = 'dup';
          $r['msg']         = 'Kode Sudah Ada';
        } else {
          $image                = $this->libre->upload('file_image','img-'.time(),$this->foldername);
          $d['image']           = $image;
          $d['useri']           = sessdata('username');
          $d['datei']           = sekarang();
          $d['kode']            = epost('kode');
          $d['nama']            = epost('nama');
          $d['berat']           = epost('berat');
          $d['brand']           = epost('brand');
          $d['stok']            = epost('stok');
          $d['ref_ktgproduk']   = epost('ref_ktgproduk');
          $d['ref_subktgproduk']= epost('ref_subktgproduk');
          $d['harga']           = epost('harga');
          $d['diskon']          = epost('diskon');
          $d['ref_satuan']      = epost('ref_satuan');
          $d['artikel']         = epost('artikel');
          $d['ket']             = epost('ket');
          $result             = db_insert($this->table,$d);
          $r['status']        = $result ? 'success' : 'fail';
        }
        echo json_encode($r);
    }

    public function getrow()
    {
        $w['id']= epost('id');
        $data   = db_get_where($this->table,$w)->row();
        echo json_encode($data);
    }

    function updatedata()
    {
        if (db_get_where('mproduk', array( 'kode' => epost('kode'), 'id !=' => epost('id')))->num_rows() >= 1) {
          $r['status']      = 'dup';
          $r['msg']         = 'Kode Sudah Ada';
        } else {
          if (!empty($_FILES['file_image']['name'])) {
              $path = $this->libre->upload('file_image','img-'.time(),$this->foldername);
              $d['image'] = $path;
              $oldpath = epost('image');
              @unlink(".".$oldpath);
          } else {
              $d['image'] = epost('image');
          }
          $d['useru']           = sessdata('username');
          $d['dateu']           = sekarang();
          $d['kode']            = epost('kode');
          $d['nama']            = epost('nama');
          $d['berat']           = epost('berat');
          $d['brand']           = epost('brand');
          $d['stok']            = epost('stok');
          $d['ref_ktgproduk']   = epost('ref_ktgproduk');
          $d['ref_subktgproduk']= epost('ref_subktgproduk');
          $d['harga']           = epost('harga');
          $d['diskon']          = epost('diskon');
          $d['ref_satuan']      = epost('ref_satuan');
          $d['artikel']         = epost('artikel');
          $d['ket']             = epost('ket');
          $w['id']              = epost('id');
          $result               = db_update($this->table, $d, $w);
          $r['status']          = $result ? 'success' : 'fail' ;
        }
        echo json_encode($r);
    }

    function aktifdata()
    {
        $s            = db_get_where($this->table, array('id' => epost('id')))->row()->aktif;
        $status       = $s == 't' ? 'f' : 't';
        $d['aktif']   = $status;
        $w['id']      = epost('id');
        $result       = db_update($this->table,$d,$w);
        $r['status']  = $result > 0 ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function deletedata()
    {
        $id         = epost('id');
        $q          = "SELECT * FROM {$this->table} WHERE id = '$id'";
        $image      = db_query($q)->row();
        @unlink('.'.$image->image);
        $result     = db_delete($this->table, array('id' => $id));
        $r['status']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

}
