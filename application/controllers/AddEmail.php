<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddEmail extends CI_Controller {
	public function index()
	{
		if($_SESSION['role']!=3){
			header("location:login");
		}
		// $this->load->view('header');
		$this->load->view('addEmail');
		// $this->load->view('footer');
	}
	public function add(){
		$email = $this->input->post('email');
		$role = $this->input->post('role');

		$query = "INSERT INTO email (email,role) VALUES ('$email','$role')";
		if($this->db->query($query)){
			header("location:../success");
		}else{
			header("location:../error");
		}
	}
	public function checkusername(){
		$username = $this->input->post('username');
		$query = "SELECT username FROM user where username='$username'";
		$res = $this->db->query($query);
		if ($res->num_rows()>0) {
			echo "error";
		}else{
			echo "success";
		}

	}
}
