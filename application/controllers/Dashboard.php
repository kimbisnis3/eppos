<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public $table       = '';
	public $titlepage   = 'Dashboard';
  public $indexpage   = 'dashboard/v_dashboard';

	public function index()
	{
		$data['titlepage'] = $this->titlepage;
		$this->load->view($this->indexpage,$data);
	}

}
