<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends CI_Controller {

    public $table       = 'tcompany';
    public $foldername  = 'company';
    public $titlepage   = 'Company';
    public $indexpage   = 'company/v_company';

    function __construct() {
        parent::__construct();
        $this->libre->session();
    }

    function index()
    {
        $data['titlepage'] = $this->titlepage;
        $this->load->view($this->indexpage,$data);
    }

    public function getall(){
        $result     = $this->db->get($this->table)->result();
        echo json_encode(array('data' => $result));
    }

    public function edit()
    {
        $w['id']= epost('id');
        $data   = $this->db->get_where($this->table,$w)->row();
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

        if (!empty($_FILES['file_splash']['name'])) {
            $path = $this->libre->upload('file_splash','img-'.time(),$this->foldername);
            $d['splash'] = $path;
            $oldpath = epost('splash');
            @unlink(".".$oldpath);
        } else {
            $d['splash'] = epost('splash');
        }

        $d['nama']      = epost('nama');
        $d['telp']      = epost('telp');
        // $d['telp2']     = epost('telp2');
        $d['email']     = epost('email');
        // $d['email2']    = epost('email2');
        $d['alamat']    = epost('alamat');
        $d['ket']       = epost('ket');

        $w['id'] = epost('id');
        $result = $this->db->update($this->table,$d,$w);
        $r['sukses'] = $result ? 'success' : 'fail' ;
        echo json_encode($r);
    }


}
