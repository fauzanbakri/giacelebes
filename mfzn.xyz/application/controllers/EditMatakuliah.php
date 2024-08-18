<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditMatakuliah extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
			$data['id'] = $this->input->get('id');
			$data['value']=$this->Model->loadeditmk($data['id'])->row_array();
			$data['jurusan']=$this->Model->jurusan()->result();
			// $data['jurusan']=$this->Model->jurusan()->result();
			// $data['dosen']=$this->Model->dosen()->result();
			$this->load->view('editmatakuliah', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input()
	{
		$id = $this->input->post('id');
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$mk = $this->input->post('matakuliah');
		$q = $this->Model->EditMatakuliah($id,$jurusan,$prodi,$mk);
		if ($q){
			header("location: ../DataMatakuliah");
		}

	}
}
