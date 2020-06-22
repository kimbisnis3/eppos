<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mwarna extends CI_Controller {

    public $table       = 'm_warna';
    public $foldername  = 'mwarna';
    public $titlepage   = 'Master Warna';
    public $indexpage   = 'mwarna/v_mwarna';

    function __construct() {
        parent::__construct();
        include(APPPATH.'libraries/sessionakses.php');
    }

    function index()
    {
        $data['titlepage'] = $this->titlepage;
        $this->load->view($this->indexpage);
    }

    function draw()
    {
        $data['titlepage'] = $this->titlepage;
        $this->load->view(api_url().'mwarna/d_mwarna',$data);
    }

    public function getall()
    {
        $result  = db_get($this->table)->result();
        echo json_encode(array('data' => $result));
    }

    public function savedata()
    {
        $d['useri']     = sessdata('username');
        $d['nama']      = epost('nama');
        $d['ket']       = epost('ket');
        $result         = db_insert($this->table,$d);
        $r['sukses']    = $result ? 'success' : 'fail';
        echo json_encode($r);
    }

    public function edit()
    {
        $w['id']= epost('id');
        $data   = db_get_where($this->table,$w)->row();
        echo json_encode($data);
    }

    function updatedata()
    {
        $d['useru']     = sessdata('username');
        $d['dateu']     = sekarang();
        $d['nama']      = epost('nama');
        $d['ket']       = epost('ket');
        $w['id']        = epost('id');
        $result         = db_update($this->table,$d,$w);
        $r['sukses']    = $result ? 'success' : 'fail' ;
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
