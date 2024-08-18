<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMahasiswa extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['data']=$this->Model->datamhs()->result();
			$this->load->view('header');
			$this->load->view('datamahasiswa',$data);
		}else{
			header("location: Login");
		}
		
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteMhs($id);
		header("location: ../DataMahasiswa");
	}
}
