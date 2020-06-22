<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Apiongkir extends CI_Controller {

    public $table       = '';
    public $foldername  = '';
    public $titlepage   = '';
    public $indexpage   = '';

    function __construct() {
        parent::__construct();
    }

    function request_province()
    {
        $response = $this->libre->get_province_pro();
        $raw      = json_decode($response, true);
        $data     = $raw['rajaongkir']['results'];
        echo json_encode(
          array(
            'data'    => $data,
            'status'  => 'success'
        ));
    }

    function request_city()
    {
        $provincecode = $this->input->get('province');
        $response     = $this->libre->get_city_pro($provincecode);
        $raw          = json_decode($response, true);
        $data         = $raw['rajaongkir']['results'];
        echo json_encode(
          array(
            'data'    => $data,
            'status'  => 'success'
        ));
    }

    function request_dist()
    {
        $citycode = $this->input->get('city');
        $response = $this->libre->get_dist_pro($citycode);
        $raw      = json_decode($response, true);
        $data     = $raw['rajaongkir']['results'];
        echo json_encode(
          array(
            'data'    => $data,
            'status'  => 'success'
        ));
    }

    function request_ongkir()
    {
        $origin           = $this->libre->companydata()->dist_id; //pasarkliwon
        $origintype       = 'subdistrict';
        $destinationtype  = 'subdistrict';
        $destination      = $this->input->get('destination');
        $weight           = $this->input->get('weight');
        $courier          = $this->input->get('courier');
        $response         = $this->libre->get_ongkir_pro($origin, $origintype, $destination, $destinationtype, $weight, $courier);
        $raw              = json_decode($response, true);
        $data             = $raw['rajaongkir']['results'][0]['costs'];
        echo json_encode(
          array(
            'data'    => $data,
            'status'  => 'success'
        ));
    }

    function request_resi()
    {
        $waybill  = eget('resi');
        $courier  = strtolower(eget('kurir'));
        $response = $this->libre->get_resi_pro($waybill, $courier);
        $raw      = json_decode($response, true);
        $data     = $raw['rajaongkir'];
        echo json_encode(
          array(
            // 'delivered'   => $data['result']['delivered'],
            // 'details'     => $data['result']['details'],
            'summary'     => $data['result']['summary'],
            'manifest'    => $data['result']['manifest'],
        ));
    }

    function dapatongkir()
    {
        $origin           = 445;
        $origintype       = 'subdistrict';
        $destinationtype  = 'subdistrict';
        $destination      = 5779;
        $weight           = 1;
        $courier          = 'jne';
        $response         = $this->libre->get_ongkir_pro($origin, $origintype, $destination, $destinationtype, $weight, $courier);
        $raw              = json_decode($response, true);
        $data             = $raw['rajaongkir']['results'][0]['costs'];
        echo json_encode(
          array(
            'data'    => $data[0]['cost'][0]['value'],
            'status'  => 'success'
        ));
    }


}
