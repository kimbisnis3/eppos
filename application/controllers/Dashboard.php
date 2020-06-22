<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $table       = '';
	public $titlepage   = 'Welcome';
  public $foldername  = 'landing';
  public $indexpage   = 'landing/v_landing';

	public function index()
	{
		if (!sessdata('in')) {
			redirect(base_url('auth'));
		}
		$data['titlepage'] = $this->titlepage;
		$this->load->view($this->indexpage,$data);
	}

}
