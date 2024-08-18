<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputProdi extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['jurusan']=$this->Model->jurusan()->result();
		$data['dosen']=$this->Model->dosen()->result();
		$this->load->view('header');
		$this->load->view('inputprodi', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input(){
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$this->Model->InputProdi($jurusan,$prodi);
		header("location: ../Home");
	}
}
