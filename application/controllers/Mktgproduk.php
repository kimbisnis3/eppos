<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mktgproduk extends CI_Controller {

    public $table       = 'mktgproduk';
    public $foldername  = 'mktgproduk';
    public $indexpage   = 'mktgproduk/v_mktgproduk';

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
                mktgproduk.*
              FROM
                mktgproduk";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['status']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function getrow()
    {
        $w['id']= epost('id');
        $data   = db_get_where($this->table,$w)->row();
        echo json_encode($data);
    }

    public function savedata()
    {
        $image          = $this->libre->upload('file_image','img-'.time(),$this->foldername);
        $d['image']     = $image;
        $d['useri']     = sessdata('username');
        $d['datei']     = sekarang();
        $d['kode']      = epost('kode');
        $d['nama']      = epost('nama');
        $d['ket']       = epost('ket');
        $result         = db_insert($this->table,$d);
        $r['status']    = $result ? 'success' : 'fail';
        echo json_encode($r);
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
        $d['useru']     = sessdata('username');
        $d['dateu']     = sekarang();
        $d['kode']      = epost('kode');
        $d['nama']      = epost('nama');
        $d['ket']       = epost('ket');
        $w['id']        = epost('id');
        $result         = db_update($this->table, $d, $w);
        $r['status']    = $result ? 'success' : 'fail' ;
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
        $image      = db_get_where($this->table, array('id' => epost('id')))->row()->image;
        @unlink('.'.$image);
        $result     = db_delete($this->table, array('id' => epost('id')));
        $r['status']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

}
