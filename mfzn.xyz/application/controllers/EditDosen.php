<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditDosen extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
			$data['id'] = $this->input->get('id');
			$data['row']=$this->Model->loadeditdosen($data['id'])->row_array();
			// $data['jurusan']=$this->Model->jurusan()->result();
			// $data['dosen']=$this->Model->dosen()->result();
			$this->load->view('editdosen', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');
		$q = $this->Model->EditDosen($id,$nama,$nip,$password);
		if ($q){
			header("location: ../DataDosen");
		}

	}
}
