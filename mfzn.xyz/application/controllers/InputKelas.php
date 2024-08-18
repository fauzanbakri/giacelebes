<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputKelas extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['jurusan']=$this->Model->jurusan()->result();
		$this->load->view('header');
		$this->load->view('inputkelas', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input(){
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$kelas = $this->input->post('kelas');
		$this->Model->InputKelas($jurusan,$prodi,$kelas);
		header("location: ../Home");
	}
}
