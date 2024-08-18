<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataJurusan extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['data']=$this->Model->datajurusan()->result();
			$this->load->view('header');
			$this->load->view('datajurusan',$data);
		}else{
			header("location: Login");
		}
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteJurusan($id);
		header("location: ../DataJurusan");
	}
}
