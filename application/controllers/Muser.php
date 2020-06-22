<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Muser extends CI_Controller {

    public $table       = 'muser';
    public $foldername  = 'muser';
    public $titlepage   = 'Master User';
    public $indexpage   = 'muser/v_muser';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->libre->session();
        $data['level']      = db_query('SELECT
                mlevel.*
            FROM
                mlevel
            WHERE mlevel.super IS NOT TRUE')->result_array();
        $data['titlepage']  = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $q = "SELECT
                muser.*
            FROM
                muser
            WHERE super IS NOT TRUE";
        $result     = $this->db->query($q)->result();
        echo json_encode(array('data' => $result));
    }

    public function savedata()
    {
        $d['useri']     = sessdata('username');
        $d['kode']      = $this->genkode();
        $d['nama']      = epost('nama');
        $d['email']     = epost('email');
        $d['username']  = epost('username');
        $d['password']  = epost('password');
        $d['ket']       = epost('ket');
        $d['ref_level'] = epost('ref_level');

        $count_user = db_get_where($this->table, array('username' => epost('username')))->num_rows();
        if ($count_user > 0) {
          $r['sukses'] = 'duplicated' ;
          echo json_encode($r);
        } else {
          $image = $this->libre->goUpload('image','img-'.time(),$this->foldername);
          $d['image']     = $image;
          $result = db_insert($this->table,$d);
          $r['sukses'] = $result ? 'success' : 'fail' ;
          echo json_encode($r);
        }
    }

    public function edit()
    {
        $w['id']= $this->input->post('id');
        $data   = db_get_where($this->table,$w)->row();
        echo json_encode($data);
    }

    function updatedata()
    {
        if (!empty($_FILES['image']['name'])) {
            $path = $this->libre->goUpload('image','img-'.time(),$this->foldername);
            $d['image'] = $path;
            $oldpath = epost('path');
            @unlink(".".$oldpath);
        } else {
            $d['image'] = epost('path');
        }

        $d['useru']     = sessdata('username');
        $d['dateu']     = sekarang();
        $d['nama']      = epost('nama');
        $d['email']     = epost('email');
        $d['username']  = epost('username');
        $d['password']  = epost('password');
        $d['ket']       = epost('ket');
        $d['ref_level'] = epost('ref_level');
        $w['id']        = epost('id');
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    function aktifdata()
    {
        $sql = "SELECT aktif FROM {$this->table} WHERE id = {$this->input->post('id')}";
        $s = $this->db->query($sql)->row()->aktif;
        $s == 't' ? $status = 'f' : $status = 't';
        $d['aktif'] = $status;
        $w['id'] = $this->input->post('id');
        $result = $this->db->update($this->table,$d,$w);
        $r['sukses'] = $result > 0 ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function deletedata()
    {
        $sql = "SELECT image FROM {$this->table} WHERE id = {$this->input->post('id')}";
        $image = $this->db->query($sql)->row()->image;
        @unlink('.'.$image);
        $w['id'] = $this->input->post('id');
        $result = $this->db->delete($this->table,$w);
        $r['sukses'] = $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function genkode()
    {
      $this->db->select_max('kode','maxKode');
      $data = $this->db->get($this->table)->row_array();
      $kode = $data['maxKode'];
      $noUrut = (int) substr($kode, -3);
      $noUrut++;
      $char = "USR";
      $kode = $char.sprintf("%03s", $noUrut);
      return $kode;
    }

}
