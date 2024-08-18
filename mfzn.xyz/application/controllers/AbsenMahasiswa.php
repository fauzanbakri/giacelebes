<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsenMahasiswa extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			// $data['jurusan']=$this->Model->countjurusan()->num_rows();
			// $data['prodi']=$this->Model->countprodi()->num_rows();
			// $data['dosen']=$this->Model->countdosen()->num_rows();
			$data['data']=$this->Model->lihatabsenmhs();
			$this->load->view('header');
			$this->load->view('absenmahasiswa',$data);
		}else{
			header("location: Login");
		}
	}
}
