<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('main')) {

    function getakses($url)
    {
        $level = sessdata('akses');
        $q = "SELECT
              	mmenu.nama menu,
              	mmenu.url,
              	mlevel.nama levelname,
              	makses.ref_level,
              	makses.add,
              	makses.edit,
              	makses.del,
              	makses.option,
              	makses.other
              FROM
              	makses
              	LEFT JOIN mmenu ON mmenu.id = makses.ref_menu
              	LEFT JOIN mlevel ON mlevel.id = makses.ref_level
              WHERE
              	1 = 1
              	AND mlevel.id = '$level'
              	AND mmenu.url = '$url'";
        $result  = db_query($q)->row_array();
        return json_encode($result);
    }

    function datauser($param)
    {
        $ci =& get_instance();
        $iduser = sessdata('iduser');
        $q= "SELECT
              	muser.*,
                mlevel.id level,
              	mlevel.nama namalevel
              FROM
              	muser
              INNER JOIN mlevel ON mlevel.id = muser.ref_level
              WHERE
              	aktif = 't'
              AND muser.id = '$iduser'";
        $result = db_query($q)->row_array();
        return $result[$param];
    }

    function menucheck($kode)
    {
        $ci =& get_instance();
        $level = sessdata('akses');
        $q  = "SELECT
              count(*) jml
            FROM
            	makses
            	JOIN mmenu ON mmenu.id = makses.ref_menu
            	JOIN mindukmenu ON mindukmenu.kode = mmenu.ref_indukmenu
            WHERE
            	1 = 1
            	AND mmenu.aktif = '1'
            	AND makses.ref_level = '$level'
            	AND mindukmenu.kode = '$kode'";
        $result = db_query($q)->row_array()['jml'];
        return $result;
    }

    function compdata($param)
    {
        $ci =& get_instance();
        $result = $ci->db->get('tcompany')->row_array();
        return $result[$param];
    }

    function sess_data($data) {
        $ci =& get_instance();
        return $ci->session->userdata($data);
    }

    function sessdata($param) {
        $ci =& get_instance();
        return $ci->session->userdata($param);
    }

    function epost($param) {
        $ci =& get_instance();
        return $ci->input->post($param);
    }

    function eget($param) {
        $ci =& get_instance();
        return $ci->input->get($param);
    }

    function db_query($db) {
        $ci =& get_instance();
        return $ci->db->query($db);
    }

    function db_get($db) {
        $ci =& get_instance();
        return $ci->db->get($db);
    }

    function db_get_where($db, $where) {
        $ci =& get_instance();
        return $ci->db->get_where($db, $where);
    }

    function db_insert($db, $data) {
        $ci =& get_instance();
        return $ci->db->insert($db, $data);
    }

    function db_update($db, $data, $where) {
        $ci =& get_instance();
        return $ci->db->update($db, $data, $where);
    }

    function db_delete($db, $where) {
        $ci =& get_instance();
        return $ci->db->delete($db, $where);
    }

    function db_insert_id() {
        $ci =& get_instance();
        return $ci->db->insert_id();
    }

    function datamenu($menukey, $param)
    {
        $ci =& get_instance();
        $result = db_get_where('mmenu', array('url' => $menukey))->row_array();
        return $result[$param];
    }

    function datauserin($param)
    {
        $ci =& get_instance();
        $result = db_get_where('muser', array('id' => sessdata('iduser')))->row_array();
        return $result[$param];
    }

    function msg_success() {
      return 'Data Berhasil Disimpan';
    }
    function msg_fail() {
      return 'Data Gagal Disimpan';
    }

    function appname() {
      return 'yes';
    }

    function notnull($text)
    {
        if ($text=='') {
            $text = NULL;
        }
        else {
            $text = $text;
        }
        return $text;
    }

    function todate($text)
    {
        if ($text=='') {
            $text = NULL;
        }
        else {
            $text = date('Y-m-d', strtotime($text));
        }
        return $text;
    }

    function query_to_var($query,$filter) {
        $find       = array_keys($filter);
        $replace    = array_values($filter);
        $n          = str_replace($find, $replace, $query);
        return $n ;
    }

    function slug($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
        {
            return 'n-a';
        }
        return $text;
    }

    function sekarang()
    {
      date_default_timezone_set('Asia/Jakarta');
      return date('Y-m-d H:i:s');
    }

    function tglsekarang()
    {
      date_default_timezone_set('Asia/Jakarta');
      return date('Y-m-d');
    }

    function indonesian_date($date)
    {
        $indonesian_month = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");
        $year        = substr($date, 0, 4);
        $month       = substr($date, 5, 2);
        $currentdate = substr($date, 8, 2);
        $result = $currentdate . " " . $indonesian_month[(int) $month - 1] . " " . $year;
        return $result;
    }

    function normal_date($date)
    {
        if ($date != NULL) {

        $indonesian_month = array("Jan", "Feb", "Mar",
            "Apr", "May", "Jun",
            "Jul", "Aug", "Sep",
            "Oct", "Nov", "Dec");
        $year        = substr($date, 0, 4);
        $month       = substr($date, 5, 2);
        $currentdate = substr($date, 8, 2);
        $result = $currentdate . " " . $indonesian_month[(int) $month - 1] . " " . $year;
        return $result;
        }
    }

    function urisegment($param)
    {
        $ci =& get_instance();
        $result = $ci->uri->segment($param);
        return $result;
    }

}
