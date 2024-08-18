<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataDosen extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
		$data['data']=$this->Model->datadosen()->result();
		$this->load->view('header');
		$this->load->view('datadosen',$data);
		}else{
			header("location: Login");
		}
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteDosen($id);
		header("location: ../DataDosen");
	}
}
