<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tstokin extends CI_Controller {

    public $table       = 'tstokin';
    public $foldername  = 'tstokin';
    public $indexpage   = 'tstokin/v_tstokin';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->libre->session();
        $data['titlepage']  = datamenu($this->uri->segment(1), 'nama');
        $data['iconpage']   = datamenu($this->uri->segment(1), 'icon');
        $data['ktgproduk']  = db_get('mktgproduk')->result_array();
        $data['supplier']   = db_get('msupplier')->result_array();
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $q = "SELECT
                tstokin.*,
                mproduk.kode kodeproduk,
                mproduk.nama produk,
                msatuan.nama satuan,
                msupplier.nama supplier,
                mktgproduk.nama mktgproduk_nama
              FROM
                tstokin
              LEFT JOIN mproduk ON mproduk.id = tstokin.ref_produk
              LEFT JOIN msupplier ON msupplier.id = tstokin.ref_supplier
              LEFT JOIN mktgproduk ON mktgproduk.id = mproduk.ref_ktgproduk
              LEFT JOIN msatuan ON msatuan.id = mproduk.ref_satuan
              WHERE 1=1
              ";
        $q .= " ORDER BY tstokin.id DESC";
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
        $this->db->trans_start();
        $d['useri']           = sessdata('username');
        $d['datei']           = sekarang();
        $d['tgl']             = todate(epost('tgl'));
        $d['ref_produk']      = epost('ref_produk');
        $d['ref_supplier']    = epost('ref_supplier');
        $d['desc']            = epost('desc');
        $d['qty']             = epost('qty');
        $result               = db_insert($this->table,$d);
        if ($result) {
          $stokada = db_get_where('mproduk', array('id' => epost('ref_produk')))->row_array()['stok'];
          $result  = db_update('mproduk', array('stok' => $stokada + epost('qty')), array('id' => epost('ref_produk')));
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        }
        else {
            $this->db->trans_commit();
            $r['status'] = $result ? 'success' : 'fail';
            print_r(json_encode($r));
        }
    }

    public function deletedata()
    {
        $id         = epost('id');
        $result     = db_delete($this->table, array('id' => $id));
        $r['status']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

}
