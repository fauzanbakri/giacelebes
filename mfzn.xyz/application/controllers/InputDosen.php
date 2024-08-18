<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputDosen extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
			$this->load->view('inputdosen');
		}else{
			header("location: Login");
		}
		
	}
	public function input(){
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$pass = $this->input->post('password');
		$this->Model->inputDosen($nama,$nip,$pass);
		header("location: ../Home");
	}
}
