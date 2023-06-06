<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->database();
			//$this->load->model('M_login');
			//$this->load->helper('string');
			// $admin=$this->session->userdata('admin');
	}
	public function index()
	{
			$this->load->view('Masuk');
	}

	function keluar(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


	public function proses_login() {
		$cek=$this->M_login->login();
		if($cek==true){
		  session_save_path();
      $username = $this->input->post('username');
      $password= $this->input->post('password');
      $password=md5($password);
            $sql="SELECT * FROM admin where username='$username' and password='$password' and status='1'";
      $query = $this->db->query($sql);
      $data=$query->result();
			$token=random_string('alnum',20);
      foreach ($data as $isi) {

            $arraydata = array(
                 'nama_lengkap'  => $isi->nama_lengkap,
                 'level'     => $isi->level,
                 'username' => $isi->username,
                 'image' => $isi->image,
                 'token' => $token,
                 'id' => $isi->id_admin,
                 'darkmode' => $isi->darkmode,
         );
				 //print_r($arraydata);
         $this->session->set_userdata($arraydata);
      }
			$isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
			if($isMob){
				redirect(base_url('mobile/home'));
				redirect(base_url('home'));
			}else{
				redirect(base_url('home'));
			}
		}else{
      echo"<script>alert('Anda Gagal Login')</script>";
			$isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
			if($isMob){
				redirect(base_url('login_mobile'));
				redirect(base_url('home'));
			}else{
				redirect(base_url('login'));
			}
		}
	}


}
