<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen_layanan extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->database();
			$this->load->model('M_dokumen_layanan');

	}
	public function index()
	{
		$data['data_dokumen'] = $this->M_dokumen_layanan->lihat_dokumen();
		$data['data_layanan'] = $this->M_dokumen_layanan->lihat_layanan();
		$this->load->view('Jenis_dokumen_layanan',$data);
	}



}
