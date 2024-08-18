<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AbsenDosen extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			// $data['jurusan']=$this->Model->countjurusan()->num_rows();
			// $data['prodi']=$this->Model->countprodi()->num_rows();
			// $data['dosen']=$this->Model->countdosen()->num_rows();
			$data['data']=$this->Model->lihatabsendosen();
			$this->load->view('header');
			$this->load->view('absendosen',$data);
		}else{
			header("location: Login");
		}
	}
}
