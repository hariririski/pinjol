<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_user extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->database();
			$this->load->model('M_pegawai_user');

	}
	public function index()
	{
		$data['data_pegawai'] = $this->M_pegawai_user->lihat_pegawai();
		$this->load->view('Pegawai_user',$data);
	}



}
