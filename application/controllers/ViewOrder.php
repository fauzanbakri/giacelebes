<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewOrder extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(empty($_SESSION['name']) OR $_SESSION['role']<2){
			header("location:login");
		}
		// $this->load->view('header');
		$data['order']=$this->db->query("SELECT * FROM input_order ORDER BY id_order DESC");
		$this->load->view('viewOrder',$data);
		// $this->load->view('footer');
		// $this->upload("hahaha");
	}
	public function delete(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM input_order WHERE id_order = '$id'");
		header('location: ../ViewOrder');
	}
}
