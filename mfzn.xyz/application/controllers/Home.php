<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['jurusan']=$this->Model->countjurusan()->num_rows();
			$data['prodi']=$this->Model->countprodi()->num_rows();
			$data['dosen']=$this->Model->countdosen()->num_rows();
			$data['mahasiswa']=$this->Model->countmahasiswa()->num_rows();
			$data['aktivitas']=$this->Model->lastactivity()->result();
			$this->load->view('header');
			$this->load->view('home',$data);
		}else{
			header("location: Login");
		}
	}
}
