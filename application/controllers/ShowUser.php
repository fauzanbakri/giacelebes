<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowUser extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$data['user'] = $this->db->query("SELECT * FROM user");
		$this->load->view('showUser',$data);
		// $this->load->view('footer');
	}
	public function delete1(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM user WHERE id_user = '$id'");
		header('location: ../showUser');
	}
}
