<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}
	public function check(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = $this->Model->checkLogin($username,$password);
		$data = $login->row_array();
		$this->session->set_userdata('name', $data['username']);
		if($login->num_rows()>0){
			header("location: ../Home");
		}else{
			header("location: ../Login?wrong");
		}
	}
	public function logout(){
		session_destroy();
		header("location: ../Login");
	}
}
