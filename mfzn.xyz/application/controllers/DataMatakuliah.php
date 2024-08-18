<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMatakuliah extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['data']=$this->Model->datamk()->result();
			$this->load->view('header');
			$this->load->view('datamatakuliah',$data);
		}else{
			header("location: Login");
		}
		
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteMatakuliah($id);
		header("location: ../DataMatakuliah");
	}
}
