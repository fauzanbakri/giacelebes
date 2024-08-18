<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditKelas extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
			$data['id'] = $this->input->get('id');
			$data['value']=$this->Model->loadeditkelas($data['id'])->row_array();
			$data['jurusan']=$this->Model->jurusan()->result();
		// $data['jurusan']=$this->Model->jurusan()->result();
		// $data['dosen']=$this->Model->dosen()->result();
		$this->load->view('editkelas', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input()
	{
		$id = $this->input->post('id');
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$kelas = $this->input->post('kelas');
		$q = $this->Model->EditKelas($id,$jurusan,$prodi,$kelas);
		if ($q){
			header("location: ../DataKelas");
		}

	}
}
