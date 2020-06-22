<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {

    public $table       = 'mcustomer';
    public $foldername  = 'mcustomer';
    public $titlepage   = 'Master Customer';
    public $indexpage   = 'mcustomer/v_mcustomer';

    function __construct() {
        parent::__construct();
    }

    public function getall()
    {
        $result       = db_get($this->table)->result();
        $r['data']    = $result;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function getone()
    {
        $w['id']      = epost('id');
        $result       = db_get_where($this->table,$w)->row();
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

        if ($this->check_kodesales($kodesales) >= 1) {
          if ($this->cekemail($email) >= 1) {
            $r['code']        = '400';
            $r['msg']         = 'Email Sudah Terdaftar';
            echo json_encode($r);
          } else {
            $result           = db_insert($this->table,$d);
            $r['sukses']      = $result ? 'success' : 'fail';
            $r['code']        = $result ? '200' : '400';
            $r['msg']         = $result ? msg_success() : msg_fail();
            $r['cust_id']     = db_insert_id();
            $r['emails']      = $this->cekemail($email);
            echo json_encode($r);
          }
        } else {
          $r['code']        = '400';
          $r['msg']         = 'Kode Sales Tidak Ditemukan';
          echo json_encode($r);
        }
    }

    public function updatedata()
    {
        $id             = epost('id');
        $d['nama']      = epost('nama');
        $d['alamat']    = epost('alamat');
        $d['prov_id']   = epost('prov_id');
        $d['city_id']   = epost('city_id');
        $d['kec_id']    = epost('kec_id');
        $d['kel_id']    = epost('kel_id');
        $d['kodepos']   = epost('kodepos');
        $d['hp']        = epost('hp');
        $w['id']        = $id;
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        $r['code']      = $result ? '200' : '400';
        $r['msg']       = $result ? msg_success() : msg_fail();
        $r['cust_id']   = $id;
        echo json_encode($r);
    }

    public function update_img_profil()
    {
        $img            = epost('img_profil');
        $id             = epost('id');
        $q              = "SELECT * FROM {$this->table} WHERE id = '$id'";
        $image          = db_query($q)->row()->img_profil;
        @unlink('.'.$image);
        $res_img        = $this->libre->uploadbase64($img, 'img'.time(), $this->foldername, FALSE);
        $d['img_profil']= $res_img;
        $w['id']        = $id;
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        $r['code']      = $result ? '200' : '400';
        $r['msg']       = $result ? msg_success() : msg_fail();
        $r['cust_id']   = epost('id');
        echo json_encode($r);
    }

    // --------------- IMAGE ---------------

    public function save_img_ktp()
    {
        $img            = epost('img_ktp');
        $res_img        = $this->libre->uploadbase64($img, 'img'.time(), $this->foldername, FALSE);
        $d['img_ktp']   = $res_img;
        $w['id']        = epost('id');
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        $r['code']      = $result ? '200' : '400';
        $r['msg']       = $result ? msg_success() : msg_fail();
        $r['cust_id']   = epost('id');
        echo json_encode($r);
    }

    public function save_img_npwp()
    {
        $img            = epost('img_npwp');
        $res_img        = $this->libre->uploadbase64($img, 'img'.time(), $this->foldername, FALSE);
        $d['img_npwp']  = $res_img;
        $w['id']        = epost('id');
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        $r['code']      = $result ? '200' : '400';
        $r['msg']       = $result ? msg_success() : msg_fail();
        $r['cust_id']   = epost('id');
        echo json_encode($r);
    }

    public function save_img_bgn_1()
    {
        $img            = epost('img_bgn_1');
        $res_img        = $this->libre->uploadbase64($img, 'img'.time(), $this->foldername, FALSE);
        $d['img_bgn_1'] = $res_img;
        $w['id']        = epost('id');
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        $r['code']      = $result ? '200' : '400';
        $r['msg']       = $result ? msg_success() : msg_fail();
        $r['cust_id']   = epost('id');
        echo json_encode($r);
    }

    public function save_img_bgn_2()
    {
        $img            = epost('img_bgn_2');
        $res_img        = $this->libre->uploadbase64($img, 'img'.time(), $this->foldername, FALSE);
        $d['img_bgn_2'] = $res_img;
        $w['id']        = epost('id');
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        $r['code']      = $result ? '200' : '400';
        $r['msg']       = $result ? msg_success() : msg_fail();
        $r['cust_id']   = epost('id');
        echo json_encode($r);
    }

    public function save_img_bgn_3()
    {
        $img            = epost('img_bgn_3');
        $res_img        = $this->libre->uploadbase64($img, 'img'.time(), $this->foldername, FALSE);
        $d['img_bgn_3'] = $res_img;
        $w['id']        = epost('id');
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        $r['code']      = $result ? '200' : '400';
        $r['msg']       = $result ? msg_success() : msg_fail();
        $r['cust_id']   = epost('id');
        echo json_encode($r);
    }

    public function deletedata()
    {
        $w['id']    = epost('id');
        $result     = db_delete($this->table,$w);
        $r['sukses']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

}
