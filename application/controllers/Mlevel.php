<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mlevel extends CI_Controller {

    public $table       = 'mlevel';
    public $foldername  = 'mlevel';
    public $titlepage   = 'Master Level';
    public $indexpage   = 'mlevel/v_mlevel';

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
        $q = "SELECT
                mlevel.*
            FROM
                mlevel
            WHERE mlevel.super IS NOT TRUE";
        $result     = $this->db->query($q)->result();
        echo json_encode(array('data' => $result));
    }

    public function loadakses()
    {
        $ref_level = epost('ref_level');
        $q = "SELECT
              	*
              FROM
              	(
              	SELECT
              		*,
              		0 st
              	FROM
              		mmenu
              	WHERE
              		1 = 1
              		AND aktif = 1
              		AND mmenu.id NOT IN ( SELECT makses.ref_menu FROM makses WHERE ref_level = '$ref_level' ) UNION ALL
              	SELECT
              		*,
              		1 st
              	FROM
              		mmenu
              	WHERE
              		1 = 1
              		AND aktif = 1
              		AND mmenu.id IN ( SELECT makses.ref_menu FROM makses WHERE ref_level = '$ref_level' )
              	) x
              ORDER BY
              	urutan ASC";
        $result  = db_query($q)->result();
        echo json_encode(array('data' => $result));
    }

    public function changeakses()
    {
        $d['ref_menu']  = epost('ref_menu');
        $d['ref_level'] = epost('ref_level');
        $cekakses = db_get_where('makses', $d)->num_rows();
        if ($cekakses == 0) {
          $res['res'] = db_insert('makses', $d);
        } elseif ($cekakses == 1) {
          $res['res'] = db_delete('makses', $d);
        }
        $res['status']  =  'success';
        echo json_encode($res);
    }

    public function savedata()
    {
        $d['useri'] = sessdata('username');
        $d['nama']  = epost('nama');
        $d['ket']   = epost('ket');
        $result     = db_insert($this->table,$d);
        $r['sukses']= $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }

    public function edit()
    {
        $w['id']  = epost('id');
        $data     = db_get_where($this->table,$w)->row();
        echo json_encode($data);
    }

    function updatedata()
    {
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
