<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Order extends CI_Controller {

    public $table       = 'torder';
    public $foldername  = 'torder';
    public $titlepage   = 'Pesanan';
    public $indexpage   = 'order/v_order';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $this->libre->session();
        $data['titlepage'] = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $tglawal   = todate(epost('tglawal'));
        $tglakhir  = todate(epost('tglakhir'));
        $idcust = epost('idcust');
        $q = "SELECT
                torder.*,
                mcustomer.nama namacustomer
              FROM
                torder
              LEFT JOIN mcustomer ON mcustomer.id = torder.ref_cust
              WHERE 1 = 1";
        $q .= " AND torder.void IS NOT TRUE";
        if ($idcust) {
          $q .= " AND torder.ref_cust = $idcust";
        }
        if ($tglawal && $tglakhir) {
          $q .= " AND torder.tgl BETWEEN '{$tglawal}' AND '{$tglakhir}'";
        }
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['sukses']  = $result ? 'success' : 'fail';
        $r['code']    = $result ? '200' : '400';
        echo json_encode($r);
    }

    public function getdetail()
    {
        $idorder = epost('idorder');
        $q_trans = "SELECT
                torder.*,
                mcustomer.nama namacustomer
              FROM
                torder
              LEFT JOIN mcustomer ON mcustomer.id = torder.ref_cust
              WHERE 1 = 1";
        $q_trans .= " AND torder.void IS NOT TRUE";
        $q_trans .= " AND torder.id = $idorder";
        $q = "SELECT
                torderdet.*,
                torder.tgl,
                torder.tglorder,
                mproduk.kode kodeproduk,
                mproduk.nama namaproduk,
                mproduk.image imageproduk
              FROM
                torderdet
              LEFT JOIN torder ON torder.id = torderdet.ref_order
              LEFT JOIN mproduk ON torderdet.ref_produk = mproduk.id
              WHERE 1 = 1
              AND torderdet.ref_order = '$idorder'";
        $result       = db_query($q)->result();
        $result_trans = db_query($q_trans)->row();
        $r['data']    = $result;
        $r['data_trx']= $result_trans;
        $r['sukses']  = $result ? 'success' : 'fail';
        $r['code']    = $result ? '200' : '400';
        echo json_encode($r);
    }

}
