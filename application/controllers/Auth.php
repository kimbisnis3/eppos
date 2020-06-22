<?php

class Auth extends CI_Controller{

    public $table       = 'mcustomer';
    public $titlepage   = 'auth';
    public $indexpage   = 'auth/v_auth';

    function __construct(){
        parent::__construct();
    }

    function index()
    {
      if (sessdata('in')) {
        redirect(base_url('landing'));
      }
        $this->load->view($this->indexpage);
    }

    function auth_process()
    {
        $username = epost('username');
        $password = epost('password');
        $q= "SELECT
              	muser.*,
              	mlevel.id level
              FROM
              	muser
              INNER JOIN mlevel ON mlevel.id = muser.ref_level
              WHERE
              	aktif = 't'
              AND username = '$username'
              AND password = '$password'";
        $getuser = db_query($q);
        if($getuser->num_rows() > 0){
            $result       = $getuser->row();
            $d['status']  ='online';
            $d['in']      = TRUE;
            $d['id']      = $result->id;
            $d['iduser']  = $result->id;
            $d['kode']    = $result->kode;
            $d['nama']    = $result->nama;
            $d['username']= $result->username;
            $d['image']   = $result->image;
            $d['akses']   = $result->level;
            $this->session->set_userdata($d);
            $this->lastlogin($result->id);
            echo json_encode($this->respon(1));
        } else {
            echo json_encode($this->respon(0));
        }
    }

    public function lastlogin($id)
    {
        $d['lastlogin'] = sekarang();
        $w['id']        = $id;
        db_update('muser', $d, $w);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }

    public function respon($status)
    {
      if ($status == 1) {
        $r['result']    = 'success';
        $r['msg']       = 'Login Sukses';
        return $r;
      } else if ($status == 0) {
        $r['result']    = 'fail';
        $r['msg']       = 'Username dan Password tidak sesuai';
        return $r;
      }
    }

    // ---------------------------------------------------- MOBIILE ----------------------------------------------------

    function proses()
    {
        $email    = epost('email');
        $username = epost('username');
        $password = epost('password');
        $q= "SELECT
              	{$this->table}.*
              FROM
              	{$this->table}
              WHERE
              	status = 1
                AND ((username = '$username' ) OR ( email = '$email'))
              	AND password = '$password'";
        $getuser  = db_query($q);
        $datauser = $getuser->row_array();
        if($getuser->num_rows() > 0){
          $r['sukses']    = 'success';
          $r['code']      = '200';
          $r['msg']       = 'Login Sukses';
          $r['cust_id']   = $datauser['id'];
          echo json_encode($r);
        } else {
          $r['sukses']    = 'fail';
          $r['code']      = '400';
          $r['msg']       = 'Login Gagal';
          echo json_encode($r);
        }
    }

    function forgot()
    {
      $email        = epost('email');
      $new_password = epost('new_password');
      $cek = db_get_where($this->table, array('email' => $email ))->num_rows();
      if ($cek > 0) {
        $d['password']    = $new_password;
        $w['email']       = $email;
        $result = db_update($this->table, $d, $w);
        $r['sukses']      = $result ? 'success' : 'fail';
        $r['code']        = $result ? '200' : '400';
        $r['msg']         = $result ? 'Reset Password Berhasil' : 'Reset Password Gagal';
        echo json_encode($r);
      } else {
        $r['sukses']      = 'fail';
        $r['code']        = '400';
        $r['msg']         = 'Email Tidak Tersedia';
        echo json_encode($r);
      }
    }
}
