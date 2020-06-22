<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class _akses extends CI_Controller {

    public $table       = 'makses';

    function __construct() {
        parent::__construct();
    }

    public function getakses()
    {
        $url   = eget('url');
        $level = sessdata('akses');
        $q = "SELECT
              	mmenu.nama menu,
              	mmenu.url,
              	mlevel.nama levelname,
              	makses.ref_level,
              	makses.add,
              	makses.edit,
              	makses.del
              FROM
              	makses
              	LEFT JOIN mmenu ON mmenu.id = makses.ref_menu
              	LEFT JOIN mlevel ON mlevel.kode = makses.ref_level
              	LEFT JOIN mindukmenu ON mindukmenu.kode = mmenu.ref_indukmenu
              WHERE
              	mmenu.aktif = '1'
              AND mlevel.kode = '$level'
              AND mmenu.url = '$url'";
        $result  = db_query($q)->row();
        echo json_encode(array('result' => $result));
    }

}
