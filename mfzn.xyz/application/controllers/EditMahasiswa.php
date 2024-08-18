<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditMahasiswa extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
			$data['id'] = $this->input->get('id');
			$data['jadwal']=$this->Model->loadeditmhs($data['id']);
			$data['jurusan']=$this->Model->jurusan()->result();
			// $data['dosen']=$this->Model->dosen()->result();
			$this->load->view('editmahasiswa', $data);
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
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$q = $this->Model->EditMhs($id,$jurusan,$prodi,$kelas,$nama,$nim,$password);
		if ($q){
			header("location: ../DataMahasiswa");
		}

	}
}
