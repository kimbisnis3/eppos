<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Msupplier extends CI_Controller {

    public $table       = 'msupplier';
    public $foldername  = 'msupplier';
    public $indexpage   = 'msupplier/v_msupplier';

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
                msupplier.*
              FROM
                msupplier";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['status']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function savedata()
    {
        $image            = $this->libre->upload('file_image','img-'.time(),$this->foldername);
        $d['image']       = $image;
        $d['useri']       = sessdata('username');
        $d['datei']       = sekarang();
        $d['nama']        = epost('nama');
        $d['alamat']      = epost('alamat');
        $d['hp']          = epost('hp');
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
        if (!empty($_FILES['file_image']['name'])) {
            $path = $this->libre->upload('file_image','img-'.time(),$this->foldername);
            $d['image'] = $path;
            $oldpath = epost('image');
            @unlink(".".$oldpath);
        } else {
            $d['image'] = epost('image');
        }
        $w['id']          = epost('id');
        $d['useru']       = sessdata('username');
        $d['dateu']       = sekarang();
        $d['nama']        = epost('nama');
        $d['alamat']      = epost('alamat');
        $d['hp']          = epost('hp');
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
        $id         = epost('id');
        $q          = "SELECT * FROM {$this->table} WHERE id = '$id'";
        $image      = db_query($q)->row();
        @unlink('.'.$image);
        $w['id']    = epost('id');
        $result     = db_delete($this->table,$w);
        $r['status']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

}
