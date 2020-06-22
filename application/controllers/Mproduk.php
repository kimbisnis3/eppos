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
        $data['titlepage'] = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $subktgproduk = epost('subktgproduk');
        $limit        = epost('limit');
        $useaktif     = epost('useaktif');
        $q = "SELECT
                mproduk.*,
                msubktgproduk.nama msubktgproduk_nama,
                mktgproduk.nama mktgproduk_nama
              FROM
                mproduk
              LEFT JOIN msubktgproduk ON msubktgproduk.id = mproduk.ref_subktgproduk
              LEFT JOIN mktgproduk ON mktgproduk.id = msubktgproduk.ref_ktgproduk
              WHERE 1=1
              ";
        if ($limit != null || $limit != '') {
          $q .= " LIMIT $limit";
        }
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function savedata()
    {
        $image              = $this->libre->uploaod('file_image','img-'.time(),$this->foldername);
        $d['image']         = $image;
        $d['useri']         = sessdata('username');
        $d['datei']         = sekarang();
        $d['kode']          = epost('kode');
        $d['ref_ktgproduk'] = epost('ref_subktgproduk');
        $d['nama']          = epost('nama');
        $d['berat']         = epost('berat');
        $d['brand']         = epost('brand');
        $d['ref_ktgproduk'] = epost('ref_ktgproduk');
        $d['ref_subktgproduk'] = epost('ref_subktgproduk');
        $d['harga']         = epost('harga');
        $d['diskon']        = epost('diskon');
        $d['artikel']       = epost('artikel');
        $d['ket']           = epost('ket');
        $result             = db_insert($this->table,$d);
        $r['sukses']        = $result ? 'success' : 'fail';
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
        if (!empty($_FILES['file_image']['name'])) {
            $path = $this->libre->uploaod('file_image','img-'.time(),$this->foldername);
            $d['image'] = $path;
            $oldpath = epost('image');
            @unlink(".".$oldpath);
        } else {
            $d['image'] = epost('image');
        }
        $d['useru']         = sessdata('username');
        $d['dateu']         = sekarang();
        $d['kode']          = epost('kode');
        $d['ref_ktgproduk'] = epost('ref_ktgproduk');
        $d['nama']          = epost('nama');
        $d['berat']         = epost('berat');
        $d['brand']         = epost('brand');
        $d['ref_ktgproduk'] = epost('ref_ktgproduk');
        $d['ref_subktgproduk'] = epost('ref_subktgproduk');
        $d['harga']         = epost('harga');
        $d['diskon']        = epost('diskon');
        $d['artikel']       = epost('artikel');
        $d['ket']           = epost('ket');
        $w['id']            = epost('id');
        $result             = db_update($this->table, $d, $w);
        $r['sukses']        = $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    function aktifdata()
    {
        $id           = epost('id');
        $q            = "SELECT aktif FROM {$this->table} WHERE id = '$id'";
        $s            = db_query($q)->row()->aktif;
        $status       = $s == 1 ? 0 : 1;
        $d['aktif']   = $status;
        $w['id']      = $id;
        $result       = db_update($this->table,$d,$w);
        $r['sukses']  = $result > 0 ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function deletedata()
    {
        $w['id']    = epost('id');
        $imagelist  = db_get_where('mprodukimage', array('ref_produk' => epost('id')))->result_array();
        foreach ($imagelist as $i => $v) {
          $idimage    = $v['id'];
          $q          = "SELECT image FROM mprodukimage WHERE id = '$idimage'";
          $image      = db_query($q)->row()->image;
          db_delete('mprodukimage', array('id' => $idimage));
          @unlink('.'.$image);
        }
        $id         = epost('id');
        $q          = "SELECT * FROM {$this->table} WHERE id = '$id'";
        $image      = db_query($q)->row();
        @unlink('.'.$image->image);
        $result     = db_delete($this->table,$w);
        $r['sukses']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    // --------------------- IMAGE --------------------- //

    public function getprodukimage()
    {
        $w['ref_produk']  = epost('ref_produk');
        $data         = db_get_where('mprodukimage',$w)->result();
        $r['data']    = $data;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function saveprodukimage()
    {
        $image            = $this->libre->goUpload('file_image','img-'.time(),$this->foldername);
        $d['image']       = $image;
        $d['useri']       = sessdata('username');
        $d['datei']       = sekarang();
        $d['ref_produk']  = epost('ref_produk');
        $result           = db_insert('mprodukimage',$d);
        $r['sukses']      = $result ? 'success' : 'fail';
        echo json_encode($r);
    }

    public function delprodukimage()
    {
        $id         = epost('id');
        $q          = "SELECT image FROM mprodukimage WHERE id = '$id'";
        $image      = db_query($q)->row()->image;
        @unlink('.'.$image);
        $w['id']    = epost('id');
        $result     = db_delete('mprodukimage',$w);
        $r['sukses']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    // --------------------- SPEK --------------------- //

    public function getprodukspekall()
    {
        $w['ref_produk']  = epost('ref_produk');
        $data             = db_get_where('mprodukspek',$w)->result();
        $r['data']        = $data;
        $r['sukses']      = 'success';
        $r['code']        = '200';
        echo json_encode($r);
    }

    public function getprodukspekrow()
    {
        $w['id']      = epost('id');
        $data         = db_get_where('mprodukspek',$w)->row();
        $r['data']    = $data;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function saveprodukspek()
    {
        $d['useri']       = sessdata('username');
        $d['datei']       = sekarang();
        $d['ref_produk']  = epost('ref_produk');
        $d['judul']       = epost('judul');
        $d['desc']        = epost('desc');
        $result           = db_insert('mprodukspek',$d);
        $r['sukses']      = $result ? 'success' : 'fail';
        echo json_encode($r);
    }

    public function updateprodukspek()
    {
        $d['useru']   = sessdata('username');
        $d['dateu']   = sekarang();
        $d['judul']   = epost('judul');
        $d['desc']    = epost('desc');
        $result       = db_update('mprodukspek', $d, $w);
        $r['sukses']  = $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function delprodukspek()
    {
        $w['id']    = epost('id');
        $result     = db_delete('mprodukspek',$w);
        $r['sukses']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }
}
