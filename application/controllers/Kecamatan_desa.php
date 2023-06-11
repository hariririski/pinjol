<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_desa extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->database();
			$this->load->model('M_kecamatan_desa');

	}
	public function index()
	{
		$data['data_kecamatan'] = $this->M_kecamatan_desa->lihat_kecamatan();
		$data['data_desa'] = $this->M_kecamatan_desa->lihat_desa();
		$this->load->view('Kecamatan_desa',$data);
	}



}
