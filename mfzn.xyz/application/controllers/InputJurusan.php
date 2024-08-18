<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputJurusan extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
		$this->load->view('inputjurusan');
		}else{
			header("location: Login");
		}
		
	}
	public function input(){
		$jurusan = $this->input->post('jurusan');
		$this->Model->inputJurusan($jurusan);
		header("location: ../Home");
	}
}
