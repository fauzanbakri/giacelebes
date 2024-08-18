<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRuangan extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['data']=$this->Model->dataruangan()->result();
			$this->load->view('header');
			$this->load->view('dataruangan',$data);
		}else{
			header("location: Login");
		}
		
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteRuangan($id);
		header("location: ../DataRuangan");
	}
}
