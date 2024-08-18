<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowEmail extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$data['email'] = $this->db->query("SELECT * FROM email");
		$this->load->view('showEmail',$data);
		// $this->load->view('footer');
	}
	public function delete1(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM email WHERE id_email = '$id'");
		header('location: ../showEmail');
	}
}
