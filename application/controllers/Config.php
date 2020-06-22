<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Config extends CI_Controller {

    public $table       = 'tconfig';
    public $titlepage   = '';
    public $indexpage   = '';

    function __construct() {
        parent::__construct();
    }

    function index()
    {
        $data['titlepage']  = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getsplash()
    {
        $result       = db_get_where('tcompany', array('id' => 1))->row();
        $r['data']    = $result->splash;
        $r['sukses']  = 'success';
        $r['code']    = '200';
        echo json_encode($r);
    }

}
