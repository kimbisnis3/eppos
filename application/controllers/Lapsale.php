<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lapsale extends CI_Controller {

    public $table       = '';
    public $foldername  = '';
    public $titlepage   = 'Laporan Penjualan';
    public $indexpage   = 'lapsale/v_lapsale';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $data['titlepage']  = datamenu($this->uri->segment(1), 'nama');
        $data['iconpage']   = datamenu($this->uri->segment(1), 'icon');
        $this->load->view($this->indexpage,$data);
    }

    function cetak()
    {
        $tglawal    = todate(eget('tglawal'));
        $tglakhir   = todate(eget('tglakhir'));
        $tipecetak  = eget('tipecetak');
        $q = "SELECT
                torder.kode kode,
                mcustomer.nama Customer,
                torder.tgl tanggal,
                torder.total total,
                torder.diskon diskon
              FROM
                torder
              LEFT JOIN mcustomer ON mcustomer.id = torder.ref_cust
              WHERE 1 = 1";
        $q .= " AND torder.void IS NOT TRUE";
        if ($tglawal && $tglakhir) {
          $q .= " AND torder.tgl BETWEEN '{$tglawal}' AND '{$tglakhir}'";
        }
        $this->libre->cetak($q, '_laporan_absensi', $this->titlepage, $tipecetak == '1' ? 'print' : 'xls', '');
    }

}
