<?php

defined('BASEPATH') or exit('No direct script access allowed');

class libre
{

    public function pathupload()
    {
      return './uploads/';
    }

    public function companydata() {
      $ci=& get_instance();
      $result = $ci->db->get('tcompany')->row();
      return $result;
    }

    public function session()
    {
        $ci=& get_instance();
        $session  = sessdata('in');
        $akses    = sessdata('akses');
        $urlredir = 'auth';
        if ($session != TRUE) { redirect($urlredir); }
        $url    = $ci->uri->segment(1);
        $q = "SELECT
               *
              FROM
               makses
              INNER JOIN mmenu ON mmenu.id = makses.ref_menu
              WHERE
               ref_level = '$akses'
              AND mmenu.url = '$url'";
        $count = db_query($q)->num_rows();
        if (datauser('super') != 1) {
          if ($count <= 0) { redirect('landing'); }
        }
    }

    public function sessakses()
    {
      $ci=& get_instance();
      $session = sessdata('in');
      if ($session != TRUE) {
        redirect(base_url().'auth');
      } else {
        $this->getakses();
      }
    }

    public function getakses()
    {
        $ci=& get_instance();
        $menu       = $ci->uri->segment(1);
        $ref_level  = sessdata('ref_level');
        $q = "SELECT
              	tmenu.*
              FROM
              	takses
              LEFT JOIN tmenu ON tmenu.kode = takses.ref_menu
              WHERE
              	ref_level = '$ref_level'
              AND tmenu.url = '$menu'";
        $count = db_query($q)->num_rows();
        if ($count <= 0) {
          redirect(base_url().'landing');
        }
    }

    public function cetak($query, $filename, $title, $type = 'print')
    {
        $ci =& get_instance();
        $b = $ci->db->query($query)->result_array();
        $a = (count($b) > 0) ? $b[0] : $ci->db->query($query)->row_array() ;
        echo '
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }
        .main-table td, .main-table th {
            border: 1px solid #616161;
            text-align: left;
            padding: 5px;
        }
        </style>';
        echo '<title>'.$title.'</title>';
        if ($type == 'xls') {
          $extensi = 'xls';
          header("Content-type: application/octet-stream");
          header("Content-Disposition: attachment; filename=" . $filename . "." . $extensi);
          header("Pragma: no-cache");
          header("Expires: 0");
        } elseif ($type == 'print') {
          echo '<body onload="window.print()">';
        }
        echo '
	      <table>
	      <tr><td colspan="16"><font size="5"><strong>' . $title . '</strong></font></td></tr>
	      <tr><td colspan="16">Tanggal Cetak : '. date('d M Y, H:i:s') .'</td></tr>
	      <tr><td colspan="16"></td></tr>
	      </table> ';
        echo '
	      <table class="main-table">
	      <tr bgcolor="#D7EDE1" >' ;
        if (count($a) > 0) {
            foreach ($a as $key => $val) {
                if ($key!='myx') {
                    echo '<th>' .ucwords(str_replace("_", " ", $key)). '</th>';
                }
            }
        }
        if (count($b) > 0) {
            foreach ($b as $key => $val) {
                echo '<tr>';
                foreach ($val as $key => $vals) {
                    if ($key!='myx') {
                        echo "<td>". $vals ."</td>";
                    }
                }
                echo '</tr>';
            }
        }
        echo '</table>';
        echo '</body>';
    }

    public function upload($field,$filename,$dir)
    {
        $ci=& get_instance();
        $config['upload_path'] = $this->pathupload().$dir;
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }
        $config['allowed_types'] = '*';
        $config['file_name'] = $filename;
        $path = substr($config['upload_path'],1);
        $ci->upload->initialize($config);
        if ($ci->upload->do_upload($field)) {
            $this->img_resize('.'.$path.'/'.$ci->upload->data('file_name'));
            return $path.'/'.$ci->upload->data('file_name');
        } else {
            return null;
        }
    }

    public function img_resize($file)
    {
        $ci=& get_instance();
        $config['image_library']  = 'gd2';
        $config['source_image']   = $file;
        $config['create_thumb']   = FALSE;
        $config['quality']        = '70%';
        $config['width']          = '800';
        $config['height']         = '1';
        $config['maintain_ratio'] = TRUE;
        $config['master_dim']     = 'width';
        $config['new_image']      = $file;
        $ci->load->library('image_lib', $config);
        $done = $ci->image_lib->resize();
        return $done;
    }


    public function uploadbase64($sourceimg, $name, $dir, $resize = FALSE)
    {
        $img      = str_replace('data:image/png;base64,', '', $sourceimg);
      	$img      = str_replace(' ', '+', $img);
      	$img      = base64_decode($img);
        $filename = $name.'.png';
        $path     = $this->pathupload().$dir.'/'.$filename;
        $file     = fopen($path, 'wb');
        fwrite($file, $img);
        fclose($file);
        if ($resize) {
          $resize = $this->img_resize($path);
        }
        return substr($path,1);
    }

    public function delFile($link)
    {
        @unlink('.'.$link);
        return 'oke';
    }

    public function appname(){
        return '';
    }

    function get_province_ro(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: $this->roapi"
          ),
        ));
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        curl_close($curl);
        return array(
          'response' => $response,
          'err' => $err,
        );
    }

    function get_city_ro($provincecode){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province={$provincecode}",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: $this->roapi"
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

    function get_ongkir_ro($origin, $destination, $weight, $courier){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin={$origin}&destination={$destination}&weight={$weight}&courier={$courier}",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->roapi"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

    function get_province_pro()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->roapi"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

    function get_city_pro($provincecode)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/city?province={$provincecode}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->roapi"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

    function get_dist_pro($citycode)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city={$citycode}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $this->roapi"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

    function get_ongkir_pro($origin, $origintype, $destination, $destinationtype, $weight, $courier)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin={$origin}&originType={$origintype}&destination={$destination}&destinationType={$destinationtype}&weight={$weight}&courier={$courier}",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->roapi"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

    function get_resi_pro($resi, $courier)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/waybill",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "waybill={$resi}&courier={$courier}",
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->roapi"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }

}
