<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	function __construct() {
		parent::__construct();
		if (!$this->session->userdata("token")){
			   redirect('login/logout', 'refresh');
			}
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		$this->load->model('M_provinsi');
		$this->load->helper('string');

	}
	public function index(){
		$data['data_provinsi'] = $this->M_provinsi->lihat();
		$this->load->view('data_provinsi',$data);
	}

	function edit_prov(){
        $id=$this->uri->segment('3');
        $data=$this->M_provinsi->lihat_prov($id);
        echo json_encode($data);
  }

	function simpan_edit_prov(){
        $id=$this->uri->segment('3');
        $nama=$this->uri->segment('4');
        $data=$this->M_provinsi->edit_prov($id,$nama);
				if($data>0){
					$data=1;
				}else{
					$data=0;
				}
        echo json_encode($data);
  }

	function edit_kota(){
        $id=$this->uri->segment('3');
        $data=$this->M_provinsi->getKota($id);
        echo json_encode($data);
  }

	function simpan_edit_kota(){
        $kode_kota=$this->uri->segment('3');
        $id_kota=$this->uri->segment('4');
        $nama_kota=$this->uri->segment('5');
				$nama_kota=preg_replace('/%20/'," ", $nama_kota);
        $data=$this->M_provinsi->edit_kota($kode_kota,$id_kota,$nama_kota);
				if($data>0){
					$data=1;
				}else{
					$data=0;
				}
        echo json_encode($data);
  }

	function edit_kec(){
        $id=$this->uri->segment('3');
        $data=$this->M_provinsi->getKec($id);
        echo json_encode($data);
  }

	function simpan_edit_kec(){
        $kode_kec=$this->uri->segment('3');
        $id_kec=$this->uri->segment('4');
        $nama_kec=$this->uri->segment('5');
				$nama_kec=preg_replace('/%20/'," ", $nama_kec);
        $data=$this->M_provinsi->edit_kec($kode_kec,$id_kec,$nama_kec);
				if($data>0){
					$data=1;
				}else{
					$data=0;
				}
        echo json_encode($data);
  }

	function edit_desa(){
        $id=$this->uri->segment('3');
        $data=$this->M_provinsi->getDesa($id);
        echo json_encode($data);
  }

	function simpan_edit_desa(){
				$kode_desa=$this->uri->segment('3');
				$id_desa=$this->uri->segment('4');
				$nama_desa=$this->uri->segment('5');
				$nama_desa=preg_replace('/%20/'," ", $nama_desa);
				$data=$this->M_provinsi->edit_desa($kode_desa,$id_desa,$nama_desa);
				if($data>0){
					$data=1;
				}else{
					$data=0;
				}
				echo json_encode($data);
	}

	function getKota(){
        $id=$this->input->get('id');
        $data=$this->M_provinsi->getKota($id);
        echo json_encode($data);
  }

	function getKec(){
        $id=$this->input->get('id');
        $data=$this->M_provinsi->getKec($id);
        echo json_encode($data);
  }

	function getDesa(){
        $id=$this->input->get('id');
        $data=$this->M_provinsi->getDesa($id);
        echo json_encode($data);
  }

	public function tambah()
	{
		$kode_prov=random_string('alnum',10);
		$cek= $this->M_provinsi->add($kode_prov);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."dataprovinsi';</script>");
		}else{
			echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Berhasil Di Simpan');window.location.href='dataprovinsi';</script>");
		}
	}

	public function kota(){
		$id_prov = $this->input->get('prov');
		$data['data_prov'] = $this->M_provinsi->lihat_prov($id_prov);
		$data['data_kota'] = $this->M_provinsi->lihat_kota($id_prov);
		$this->load->view('data_kota',$data);
	}

	public function tambah_kota(){
		$kode_kota=random_string('alnum',10);
		$id_prov = $this->input->get('prov');
		$cek= $this->M_provinsi->tambah_kota($id_prov,$kode_kota);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datakota?prov=".$id_prov."';</script>");

		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datakota?prov=".$id_prov."';</script>");
		}
	}

	public function kecamatan(){
		$id_kota = $this->input->get('kota');
		$data['data_kota'] = $this->M_provinsi->lihat_kota2($id_kota);
		$data['data_kecamatan'] = $this->M_provinsi->lihat_kecamatan($id_kota);
		$this->load->view('data_kecamatan',$data);
	}

	public function tambah_kec(){
		$kode_kec=random_string('alnum',10);
		$id_kota= $this->input->get('kota');
		$cek= $this->M_provinsi->tambah_kec($id_kota,$kode_kec);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datakecamatan?kota=".$id_kota."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datakecamatan';</script>");
		}
	}

	public function desa(){
		$id_kec= $this->input->get('kec');
		$data['data_kecamatan'] = $this->M_provinsi->lihat_kecamatan2($id_kec);
		$data['data_desa'] = $this->M_provinsi->lihat_desa($id_kec);
		$this->load->view('data_desa',$data);
	}

	public function tambah_desa(){
		$kode_desa=random_string('alnum',10);
		$id_kec= $this->input->get('kec');
		$cek= $this->M_provinsi->tambah_desa($id_kec,$kode_desa);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datadesa?kec=".$id_kec."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datadesa';</script>");
		}
	}


	function hapus_desa(){
		$kode_kec=$this->uri->segment('3');
		$kode_desa=$this->uri->segment('4');
		$where = array('kode_desa' => $kode_desa);
		$cek= $this->M_provinsi->hapus_data($where,'desa');
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datadesa?kec=".$kode_kec."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datadesa?kec=".$kode_kec."';</script>");
		}
	}

	function hapus_kec(){
		$kode_kota=$this->uri->segment('3');
		$kode_kec=$this->uri->segment('4');
		$where1 = array('kode_kec' => $kode_kec);
		$cek1= $this->M_provinsi->hapus_data($where1,'desa');
		$where2 = array('kode_kec' => $kode_kec);
		$cek2= $this->M_provinsi->hapus_data($where2,'kec');
		if($cek1>0&&$cek2>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datakecamatan?kota=".$kode_kota."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datakecamatan?kota=".$kode_kota."';</script>");
		}
	}

	function hapus_kota(){
		$kode_prov=$this->uri->segment('3');
		$kode_kota=$this->uri->segment('4');
		$cek= $this->M_provinsi->hapus_kota($kode_kota);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datakota?prov=".$kode_prov."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datakota?prov=".$kode_prov."';</script>");
		}
	}

	function hapus_prov(){
		$kode_prov=$this->uri->segment('3');
		$cek= $this->M_provinsi->hapus_prov($kode_prov);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."dataprovinsi';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."data_provinsi';</script>");
		}
	}

	function aktif_prov(){
		$kode_prov=$this->uri->segment('3');
		$aktif=$this->uri->segment('4');
		$cek= $this->M_provinsi->aktif_prov($kode_prov,$aktif);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."dataprovinsi';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."dataprovinsi';</script>");
		}
	}

	function aktif_kota(){
		$kode_prov=$this->uri->segment('3');
		$kode_kota=$this->uri->segment('4');
		$aktif=$this->uri->segment('5');
		$cek= $this->M_provinsi->aktif_kota($kode_kota,$aktif);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datakota?prov=".$kode_prov."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datakota?prov=".$kode_prov."';</script>");
		}
	}

	function aktif_kec(){
		$kode_kota=$this->uri->segment('3');
		$kode_kec=$this->uri->segment('4');
		$aktif=$this->uri->segment('5');
		$cek= $this->M_provinsi->aktif_kec($kode_kec,$aktif);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datakecamatan?kota=".$kode_kota."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datakecamatan?kota=".$kode_kota."';</script>");
		}
	}

	function aktif_desa(){
		$kode_kec=$this->uri->segment('3');
		$kode_desa=$this->uri->segment('4');
		$aktif=$this->uri->segment('5');
		$cek= $this->M_provinsi->aktif_desa($kode_desa,$aktif);
		if($cek>0){
			echo ("<script LANGUAGE='JavaScript'>window.location.href='".base_url()."datadesa?kec=".$kode_kec."';</script>");
		}else{
		echo ("<script LANGUAGE='JavaScript'>window.alert('Data Gagal Di Simpan');window.location.href='".base_url()."datadesa?kec=".$kode_kec."';</script>");
		}
	}



}
