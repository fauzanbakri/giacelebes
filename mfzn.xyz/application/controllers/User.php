<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
		$this->load->view('user');
		}else{
			header("location: Login");
		}
		
	}
}
