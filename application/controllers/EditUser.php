<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditUser extends CI_Controller {
	public function index()
	{
		if($_SESSION['role']!=3){
			header("location:login");
		}
		$id = $_GET['id'];
		$data['user']=$this->db->query("SELECT * FROM user WHERE id_user='$id'");
		// $this->load->view('header');
		$this->load->view('editUser',$data);
		// $this->load->view('footer');
	}
	public function add(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$role = $this->input->post('role');

		$query = "UPDATE user SET name='$nama', username='$username', password='$password', role='$role', email='$email' WHERE id_user='$id'";
		if($this->db->query($query)){
			header("location:../showUser");
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
