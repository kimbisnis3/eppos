<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Msatuan extends CI_Controller {

    public $table       = 'msatuan';
    public $foldername  = 'msatuan';
    public $indexpage   = 'msatuan/v_msatuan';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->libre->session();
        $data['titlepage']  = datamenu($this->uri->segment(1), 'nama');
        $data['iconpage']   = datamenu($this->uri->segment(1), 'icon');
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $q = "SELECT
                msatuan.*
              FROM
                msatuan";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['status']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function savedata()
    {
        $d['useri']       = sessdata('username');
        $d['datei']       = sekarang();
        $d['nama']        = epost('nama');
        $d['ket']         = epost('ket');
        $result           = db_insert($this->table,$d);
        $r['status']      = $result ? 'success' : 'fail';
        $r['code']        = $result ? '200' : '400';
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
        $w['id']          = epost('id');
        $d['useru']       = sessdata('username');
        $d['dateu']       = sekarang();
        $d['nama']        = epost('nama');
        $d['ket']         = epost('ket');
        $result           = db_update($this->table, $d, $w);
        $r['status']      = $result ? 'success' : 'fail';
        $r['code']        = $result ? '200' : '400';
        echo json_encode($r);
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
        $r['status']  = $result > 0 ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function deletedata()
    {
        $w['id']    = epost('id');
        $result     = db_delete($this->table,$w);
        $r['status']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

}
