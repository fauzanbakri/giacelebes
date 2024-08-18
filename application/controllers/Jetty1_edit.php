<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jetty1_edit extends CI_Controller {

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
		if($_SESSION['role']!=3){
			header("location:login");
		}
		// $this->load->view('header');
		
		if ($this->input->get('id')!=""){
			$id = $this->input->get('id');
			$data['data'] = $this->db->query("SELECT * FROM jetty1 where id_jetty='$id'");
			$data['id'] = $id;
			$this->load->view('jetty1_edit', $data);
		}else{
			header("location:listBooking");
		}

	}

	public function edit(){
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
		$id_jetty = $this->input->post('id');

		$q = $this->db->query("UPDATE jetty1 SET remarks='$remarks', nama_kapal='$namakapal',last_port='$lastport',ATA='$ata',berthed='$berthed',cargo='$cargo',bunker='$bunker',next_port='$next',etc='$etc',etd='$etd',status='$status' WHERE id_jetty='$id_jetty'");
		if ($q) {
				header('location: ../listBooking');
		}
	}
}
