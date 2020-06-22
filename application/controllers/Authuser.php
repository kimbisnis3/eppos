<?php

class Auth extends CI_Controller{

    public $table       = 'muser';
    public $titlepage   = 'auth';
    public $indexpage   = 'auth/v_authuser';

    function __construct(){
        parent::__construct();
    }

    function index() {
      if (sessdata('akses')) {
        redirect(base_url('landing'));
      } else {
        $this->load->view($this->indexpage);
      }
    }

    function auth_process()
    {
        $username = epost('username');
        $password = epost('password');
        $q= "SELECT
              	{$this->table}.*,
              	mlevel.kode level
              FROM
              	{$this->table}
              INNER JOIN mlevel ON mlevel.id = {$this->table}.ref_level
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
            $d['akses']   = $result->level;;
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
        db_update($this->table, $d, $w);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(linkpusat()));
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
}
