<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apilocation extends CI_Controller
{
    public $table       = '';
    public $foldername  = '';

    function __construct()
    {
        parent::__construct();
    }

    function getprov()
    {
        $response = db_get('provinces')->result_array();
        echo json_encode(
          array(
            'data'    => $response,
            'status'  => 'success'
        ));
    }

    function getcity()
    {
        $province_id= epost('province_id');
        $response   = db_get_where('regencies', array('province_id' => $province_id))->result_array();
        echo json_encode(
          array(
            'data'    => $response,
            'status'  => 'success'
        ));
    }

    function getkec()
    {
        $regency_id = epost('regency_id');
        $response   = db_get_where('districts', array('regency_id' => $regency_id))->result_array();
        echo json_encode(
          array(
            'data'    => $response,
            'status'  => 'success'
        ));
    }

    function getkel()
    {
        $district_id= epost('district_id');
        $response   = db_get_where('villages', array('district_id' => $district_id))->result_array();
        echo json_encode(
          array(
            'data'    => $response,
            'status'  => 'success'
        ));
    }
}
