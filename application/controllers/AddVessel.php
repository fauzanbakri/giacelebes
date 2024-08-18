<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddVessel extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$data['name'] = $this->db->query("SELECT * FROM vessel_name");
		$this->load->view('addvessel',$data);
		// $this->load->view('footer');
	}
	public function add(){
		$name = $this->input->post('name');
		$this->db->query("INSERT INTO vessel_name(name) VALUES('$name')");
		header('location: ../AddVessel');
	}
	public function delete1(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM vessel_name WHERE id = '$id'");
		header('location: ../AddVessel');
	}
}
