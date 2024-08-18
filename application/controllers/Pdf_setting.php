<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_setting extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$this->load->view('pdf_setting');
		// $this->load->view('footer');
	}
	public function add(){
		$name = $this->input->post('pass');
		$this->db->query("INSERT INTO pdf_pass(pass) VALUES('$name')");
		header('location: ../Makassar');
	}
}