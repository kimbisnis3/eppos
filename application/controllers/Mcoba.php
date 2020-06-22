<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mcoba extends CI_Controller {

    public $table       = 'mktgproduk';
    public $foldername  = 'mktgproduk';
    public $titlepage   = 'Master Kategori Produk';
    public $indexpage   = 'mcoba/v_mcoba';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $data['titlepage'] = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $orderBy = eget('sort') !== null ? ' ORDER BY ' . eget('order') . ' ' . eget('sort') : (eget('order') !== null ? ' ORDER BY ' . eget('order') : ' ORDER BY id ');
        $limit  = eget('limit') !== null ? ' LIMIT ' . eget('limit') : '';
        $offset = eget('offset') !== null ? ' OFFSET ' . eget('offset') : '';
        // (inpage - 1 * rowcount)
        $q = "SELECT
                mktgproduk.*
              FROM
                mktgproduk
              $orderBy
              $limit
              $offset";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        $r['getparam']= $this->input->get();
        echo json_encode($r);
    }

    public function getrowdetail()
    {
        $id           = epost('id');
        $produk       = db_get_where('mproduk', array('id' => $id))->row();
        $spek         = db_get_where('mprodukspek', array('ref_produk' => $id))->result();
        $img          = db_get_where('mprodukimage', array('ref_produk' => $id))->result();
        $r['produk']  = $produk;
        $r['spek']    = $spek;
        $r['img']     = $img;
        $r['id']      = $id;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    public function savedata()
    {
        $d['useri']     = sessdata('username');
        $d['datei']     = sekarang();
        $d['kode']      = epost('kode');
        $d['nama']      = epost('nama');
        $d['artikel']   = epost('artikel');
        $d['ket']       = epost('ket');
        $result         = db_insert($this->table,$d);
        $r['sukses']    = $result ? 'success' : 'fail';
        echo json_encode($r);
    }

    public function getrow()
    {
        $w['id']= eget('id');
        $data   = db_get_where($this->table,$w)->row();
        echo json_encode($data);
    }

    function updatedata()
    {
        $d['useru']     = sessdata('username');
        $d['dateu']     = sekarang();
        $d['kode']      = epost('kode');
        $d['nama']      = epost('nama');
        $d['artikel']   = epost('artikel');
        $d['ket']       = epost('ket');
        $w['id']        = epost('id');
        $result         = db_update($this->table, $d, $w);
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
