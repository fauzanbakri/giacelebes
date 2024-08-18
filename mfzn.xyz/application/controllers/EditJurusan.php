<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditJurusan extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
			$data['id'] = $this->input->get('id');
			$data['row']=$this->Model->loadeditjurusan($data['id'])->row_array();
			// $data['jurusan']=$this->Model->jurusan()->result();
			// $data['dosen']=$this->Model->dosen()->result();
			$this->load->view('editjurusan', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input()
	{
		$id = $this->input->post('id');
		$jurusan = $this->input->post('jurusan');
		$q = $this->Model->EditJurusan($id,$jurusan);
		if ($q){
			header("location: ../DataJurusan");
		}

	}
}
