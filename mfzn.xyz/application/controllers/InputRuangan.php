<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputRuangan extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
		$this->load->view('inputruangan');
		}else{
			header("location: Login");
		}
		
	}
	public function input(){
		$nama = $this->input->post('nama');
		$mac = $this->input->post('mac');
		$this->Model->inputRuangan($nama,$mac);
		header("location: ../Home");
	}
}
