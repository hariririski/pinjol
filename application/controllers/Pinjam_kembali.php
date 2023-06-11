<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_kembali extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->database();
			$this->load->model('M_pinjam');

	}
	public function index()
	{
		$data['data_pinjam'] = $this->M_pinjam->lihat_pinjam();
		$this->load->view('pinjam',$data);
	}



}
