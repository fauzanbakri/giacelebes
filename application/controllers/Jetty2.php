<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jetty2 extends CI_Controller {

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
		if(empty($_SESSION['name']) OR $_SESSION['role']!=3){
			header("location:login");
		}
		// $this->load->view('header');
		$this->load->view('jetty2');
		// $this->load->view('footer');
		// $this->upload("hahaha");
	}
	public function submit(){
		$namakapal = $this->input->post('namakapal');
		$lastport = $this->input->post('lastport');
		$ata = $this->input->post('ata');
		$berthed = $this->input->post('berthed');
		$cargo = $this->input->post('cargo');
		$bunker = $this->input->post('bunker');
		$next = $this->input->post('next');
		$etc = $this->input->post('etc');
		$etd = $this->input->post('etd');
		$remarks = $this->input->post('remarks');
		$status = $this->input->post('status');

		$q = $this->db->query("INSERT INTO jetty2(nama_kapal,last_port,ATA,berthed,cargo,bunker,next_port,etc,etd,status,remarks) VALUES('$namakapal','$lastport','$ata','$berthed','$cargo','$bunker','$next','$etc','$etd','$status','$remarks')");
		if ($q) {
				header('location: ../ListBooking2');
		}
	}
}
