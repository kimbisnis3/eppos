<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {

    public $table       = 'mlaporan';
    public $titlepage   = 'Laporan';
    public $indexpage   = 'laporan/v_laporan';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $data['titlepage']  = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getall()
    {
        $q = "SELECT
                mlaporan.*
              FROM
                mlaporan";
        $result       = db_query($q)->result();
        $r['data']    = $result;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

    function getlaporan()
    {
      $id           = eget('id');
      $res          = db_get_where('mlaporan', array('id' => $id))->row_array();
      $r['res']     = $res;
      $r['header']  = db_query($res['query'])->row_array();
      echo json_encode($r);
    }

    function cetak() {
      $id       = eget('kode');
      $tipe     = eget('tipe');
      $order    = eget('order');
      $r_from   = todate(eget('from'));
      $r_to     = todate(eget('to'));
      $laporan  = db_get_where('mlaporan', array('id' => $id))->row_array();
      $q        = $laporan['query'];
      $q       .= " WHERE 1 = 1 ";
      if ($laporan['filter_where']) {
        $q .= " AND {$laporan['filter_where']}";
      }
      if ($laporan['filter_range'] && $r_from && $r_to) {
        $q .= " AND {$laporan['filter_range']} BETWEEN $r_from AND $r_to";
      }
      if ($laporan['order'] && $order) {
        $q .= " ORDER BY $order";
      }
  		$this->libre->cetak($q, str_replace(" ", "_", $laporan['nama']), $laporan['nama'], $tipe);
  	}

}
