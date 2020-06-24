<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sales extends CI_Controller {

    public $table       = 'torder';
    public $foldername  = 'torder';
    public $indexpage   = 'sales/v_sales';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->libre->session();
        $data['titlepage']  = datamenu($this->uri->segment(1), 'nama');
        $data['iconpage']   = datamenu($this->uri->segment(1), 'icon');
        $data['ktgproduk']  = db_get('mktgproduk')->result_array();
        $data['cust']       = db_get('mcustomer')->result_array();
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $idcust = epost('idcust');
        $q = "SELECT
                torder.*,
                mcustomer.nama namacustomer
              FROM
                torder
              LEFT JOIN mcustomer ON mcustomer.id = torder.ref_cust
              WHERE 1 = 1";
        $q .= " AND torder.void IS NOT TRUE";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['sukses']  = $result ? 'success' : 'fail';
        $r['code']    = $result ? '200' : '400';
        echo json_encode($r);
    }

    public function getrow()
    {
        $w['id']= epost('id');
        $data   = db_get_where($this->table,$w)->row();
        echo json_encode($data);
    }

    public function getproduk_bykode()
    {
        $data   = db_get_where('mproduk', array(
          'kode' => eget('kode'),
          'stok >' => 0
        ))->row();
        echo json_encode($data);
    }

    public function genkodeinvoice()
    {
      $order      = db_get_where('torder', array('tgl' => todate(epost('tgl'))))->num_rows();
      $kode_order = sprintf("%04s", $order + 1);
      $kode       = date("Ymd", strtotime(epost('tgl'))).$kode_order;
      echo json_encode($kode);
    }

    public function savedata()
    {
        $this->db->trans_start();
        $d['useri']     = sessdata('username');
        $d['datei']     = sekarang();
        $d['ref_cust']  = epost('ref_customer');
        $d['ref_user']  = epost('ref_user');
        $d['kode']      = epost('kode');
        $d['tgl']       = todate(epost('tgl'));
        $d['total']     = epost('total');
        $d['diskon']    = epost('diskon');
        $d['ket']       = epost('ket');
        $d['cash']      = epost('cash');
        $d['cashback']  = epost('cashback');
        $arr_produk     = epost('arr_produk');
        $result         = db_insert($this->table,$d);
        $order_id       = $this->db->insert_id();
        if ($arr_produk && $order_id) {
          db_delete('torderdet',array('ref_order' => $order_id));
          foreach (json_decode($arr_produk) as $r) {
              $row['ref_order']   = $order_id;
              $row['ref_produk']  = $r->ref_produk;
              $row['qty']         = $r->qty;
              $row['harga']       = $r->harga;
              $row['total']       = $r->harga * $r->qty;
              db_insert('torderdet',$row);
              $this->cutstok($r->ref_produk, $r->qty);
          }
        }
        if ($this->db->trans_status() === FALSE) {
          $this->db->trans_rollback();
          $res['status']    = 'fail';
        }
        else {
          $this->db->trans_commit();
          $res['status']    = 'success';
          $res['order_id']  = $order_id;
        }
        echo json_encode($res);
    }

    public function cutstok($ref_produk, $qty)
    {
      $stokada    = db_get_where('mproduk', array('id' => $ref_produk))->row_array()['stok'];
      $result     = db_update('mproduk', array('stok' => $stokada - $qty), array('id' => $ref_produk));
    }

    function cetak()
    {
      $this->load->view('sales/p_sales');
    }
}
