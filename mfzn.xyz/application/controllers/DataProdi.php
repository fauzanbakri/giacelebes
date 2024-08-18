<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataProdi extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['data']=$this->Model->dataprodi()->result();
			$this->load->view('header');
			$this->load->view('dataprodi',$data);
		}else{
			header("location: Login");
		}
		
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteProdi($id);
		header("location: ../DataProdi");
	}
}
