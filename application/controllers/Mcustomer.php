<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mcustomer extends CI_Controller {

    public $table       = 'mcustomer';
    public $foldername  = 'mcustomer';
    public $titlepage   = 'Master Customer';
    public $indexpage   = 'mcustomer/v_mcustomer';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->libre->session();
        $data['sales']      = db_get('msales')->result_array();
        $data['bidang']     = db_get('mbidang')->result_array();
        $data['titlepage']  = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $q = "SELECT
                mcustomer.*
              FROM
                mcustomer";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function check_kodesales($kodesales)
    {
        $res = db_get_where('msales', array('kode' => $kodesales))->num_rows();
        return $res;
    }

    public function cekemail($email)
    {
      $res = db_get_where('mcustomer', array('email' => $email))->num_rows();
      return $res;
    }

    public function savedata()
    {
        $img_profil       = $this->libre->goUpload('file_img_profil','img-'.time(),$this->foldername);
        $img_ktp          = $this->libre->goUpload('file_img_ktp','img-'.time(),$this->foldername);
        $img_npwp         = $this->libre->goUpload('file_img_npwp','img-'.time(),$this->foldername);
        $img_bgn_1        = $this->libre->goUpload('file_img_bgn_1','img-'.time(),$this->foldername);
        $img_bgn_2        = $this->libre->goUpload('file_img_bgn_2','img-'.time(),$this->foldername);
        $img_bgn_3        = $this->libre->goUpload('file_img_bgn_3','img-'.time(),$this->foldername);
        $d['img_profil']  = $img_profil;
        $d['img_ktp']     = $img_ktp;
        $d['img_npwp']    = $img_npwp;
        $d['img_bgn_1']   = $img_bgn_1;
        $d['img_bgn_2']   = $img_bgn_2;
        $d['img_bgn_3']   = $img_bgn_3;
        $d['desc_img_profil']  = epost('desc_img_profil');
        $d['desc_img_ktp']     = epost('desc_img_ktp');
        $d['desc_img_npwp']    = epost('desc_img_npwp');
        $d['desc_img_bgn_1']   = epost('desc_img_bgn_1');
        $d['desc_img_bgn_2']   = epost('desc_img_bgn_2');
        $d['desc_img_bgn_3']   = epost('desc_img_bgn_3');
        $d['useri']       = sessdata('username');
        $d['datei']       = sekarang();
        $kodesales        = epost('kodesales');
        $email            = epost('email');
        $d['nama']        = epost('nama');
        $d['alamat']      = epost('alamat');
        $d['prov_id']     = epost('prov_id');
        $d['city_id']     = epost('city_id');
        $d['kec_id']      = epost('kec_id');
        $d['kel_id']      = epost('kel_id');
        $d['kodepos']     = epost('kodepos');
        $d['kodesales']   = $kodesales;
        $d['hp']          = epost('hp');
        $d['email']       = $email;
        $d['password']    = epost('password');
        $d['username']    = epost('username');
        if ($this->cekemail($email) >= 1) {
          $r['sukses']      = 'dupemail';
          $r['code']        = '400';
          $r['msg']         = 'Email Sudah Terdaftar';
          echo json_encode($r);
        } else {
          $result           = db_insert($this->table,$d);
          $r['sukses']      = $result ? 'success' : 'fail';
          $r['code']        = $result ? '200' : '400';
          $r['cust_id']     = db_insert_id();
          $r['emails']      = $this->cekemail($email);
          echo json_encode($r);
        }
    }

    public function edit()
    {
        $id= epost('id');
        $data   = db_query("SELECT
                mcustomer.* ,
                provinces.name prov,
                regencies.name city,
                districts.name kec,
                villages.name kel
            FROM
                mcustomer
            LEFT JOIN provinces ON provinces.id = mcustomer.prov_id
            LEFT JOIN regencies ON regencies.id = mcustomer.city_id
            LEFT JOIN districts ON districts.id = mcustomer.kec_id
            LEFT JOIN villages ON villages.id = mcustomer.kel_id
            WHERE 1=1
            AND mcustomer.id = '$id'")->row();
        echo json_encode($data);
    }

    function updatedata()
    {
        if (!empty($_FILES['file_img_profil']['name'])) {
            $path             = $this->libre->goUpload('file_img_profil','img-'.time(),$this->foldername);
            $d['img_profil']  = $path;
            $oldpath          = epost('img_profil');
            @unlink(".".$oldpath);
        } else {
            $d['img_profil']  = epost('img_profil');
        }

        if (!empty($_FILES['file_img_ktp']['name'])) {
            $path         = $this->libre->goUpload('file_img_ktp','img-'.time(),$this->foldername);
            $d['img_ktp'] = $path;
            $oldpath      = epost('img_ktp');
            @unlink(".".$oldpath);
        } else {
            $d['img_ktp'] = epost('img_ktp');
        }

        if (!empty($_FILES['file_img_npwp']['name'])) {
            $path           = $this->libre->goUpload('file_img_npwp','img-'.time(),$this->foldername);
            $d['img_npwp']  = $path;
            $oldpath        = epost('img_npwp');
            @unlink(".".$oldpath);
        } else {
            $d['img_npwp']  = epost('img_npwp');
        }

        if (!empty($_FILES['file_img_bgn_1']['name'])) {
            $path           = $this->libre->goUpload('file_img_bgn_1','img-'.time(),$this->foldername);
            $d['img_bgn_1'] = $path;
            $oldpath        = epost('img_bgn_1');
            @unlink(".".$oldpath);
        } else {
            $d['img_bgn_1'] = epost('img_bgn_1');
        }

        if (!empty($_FILES['file_img_bgn_2']['name'])) {
            $path           = $this->libre->goUpload('file_img_bgn_2','img-'.time(),$this->foldername);
            $d['img_bgn_2'] = $path;
            $oldpath        = epost('img_bgn_2');
            @unlink(".".$oldpath);
        } else {
            $d['img_bgn_2'] = epost('img_bgn_2');
        }

        if (!empty($_FILES['file_img_bgn_3']['name'])) {
            $path           = $this->libre->goUpload('file_img_bgn_3','img-'.time(),$this->foldername);
            $d['img_bgn_3'] = $path;
            $oldpath        = epost('img_bgn_3');
            @unlink(".".$oldpath);
        } else {
            $d['img_bgn_3'] = epost('img_bgn_3');
        }
        $d['desc_img_profil']  = epost('desc_img_profil');
        $d['desc_img_ktp']     = epost('desc_img_ktp');
        $d['desc_img_npwp']    = epost('desc_img_npwp');
        $d['desc_img_bgn_1']   = epost('desc_img_bgn_1');
        $d['desc_img_bgn_2']   = epost('desc_img_bgn_2');
        $d['desc_img_bgn_3']   = epost('desc_img_bgn_3');
        $id               = epost('id');
        $d['useru']       = sessdata('username');
        $d['dateu']       = sekarang();
        $kodesales        = epost('kodesales');
        $email            = epost('email');
        $d['nama']        = epost('nama');
        $d['alamat']      = epost('alamat');
        $d['prov_id']     = epost('prov_id');
        $d['city_id']     = epost('city_id');
        $d['kec_id']      = epost('kec_id');
        $d['kel_id']      = epost('kel_id');
        $d['kodepos']     = epost('kodepos');
        $d['kodesales']   = $kodesales;
        $d['hp']          = epost('hp');
        $d['email']       = $email;
        $d['password']    = epost('password');
        $d['username']    = epost('username');
        $w['id']          = $id;
        $cekuser          = db_query("SELECT * FROM mcustomer WHERE email = '$email' AND id != $id")->num_rows();
        if ($cekuser <= 0) {
          $result           = db_update($this->table, $d, $w);
          $r['sukses']      = $result ? 'success' : 'fail';
          $r['code']        = $result ? '200' : '400';
          echo json_encode($r);
        } else {
          $r['sukses']      = 'dupemail';
          $r['code']        = '400';
          $r['msg']         = 'Email Sudah User Lain';
          echo json_encode($r);
        }
    }

    function aktifdata()
    {
        $id           = epost('id');
        $q            = "SELECT status FROM {$this->table} WHERE id = $id";
        $s            = db_query($q)->row()->status;
        $status       = $s == 1 ? 0 : 1;
        $d['status']  = $status;
        $w['id']      = epost('id');
        $result       = db_update($this->table,$d,$w);
        $r['sukses']  = $result > 0 ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function bidang()
    {
        $id   = epost('id');
        $q    = "SELECT
                mcustomerbidang.id,
              	mbidang.nama
              FROM
              	mcustomerbidang
              LEFT JOIN mcustomer ON mcustomer.id = mcustomerbidang.ref_cust
              LEFT JOIN mbidang ON mbidang.id = mcustomerbidang.ref_bidang
              WHERE
              	ref_cust = '$id'";
        $data = db_query($q)->result();
        echo json_encode($data);
    }

    public function savebidang()
    {
        $d['ref_cust']    = epost('ref_cust');
        $d['ref_bidang']  = epost('ref_bidang');
        $result           = db_insert('mcustomerbidang', $d);
        $r['sukses']      = $result ? 'success' : 'fail';
        echo json_encode($r);
    }

    public function deletebidang()
    {
        $w['id']    = epost('id');
        $result     = db_delete('mcustomerbidang', $w);
        $r['sukses']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function deletedata()
    {
        $id         = epost('id');
        $q          = "SELECT * FROM {$this->table} WHERE id = '$id'";
        $image      = db_query($q)->row();
        @unlink('.'.$image->img_profil);
        @unlink('.'.$image->img_ktp);
        @unlink('.'.$image->img_npwp);
        @unlink('.'.$image->img_bgn_1);
        @unlink('.'.$image->img_bgn_2);
        @unlink('.'.$image->img_bgn_3);
        $w['id']    = epost('id');
        $result     = db_delete($this->table,$w);
        $r['sukses']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

}
