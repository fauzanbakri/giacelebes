<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$this->load->view('success');
		// $this->load->view('footer');
	}
}
