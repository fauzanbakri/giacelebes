<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataKelas extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['data']=$this->Model->datakelas()->result();
			$this->load->view('header');
			$this->load->view('datakelas',$data);
		}else{
			header("location: Login");
		}
		
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteKelas($id);
		header("location: ../DataKelas");
	}
}
