<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddUser extends CI_Controller {
	public function index()
	{
		if($_SESSION['role']!=3){
			header("location:login");
		}
		// $this->load->view('header');
		$data['user'] = $this->db->query("SELECT * FROM user");
		$this->load->view('addUser', $data);
		// $this->load->view('footer');
	}
	public function add(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$role = $this->input->post('role');

		$query = "INSERT INTO user (name,username,password,role,email) VALUES ('$nama','$username','$password','$role','$email')";
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
