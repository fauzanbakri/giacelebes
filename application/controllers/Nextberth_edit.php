<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nextberth_edit extends CI_Controller {

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
			$data['data'] = $this->db->query("SELECT * FROM next_berth where id='$id'");
			$data['id'] = $id;
			$this->load->view('nextberth_edit', $data);
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
		$etanext = $this->input->post('etanext');
		$etc = $this->input->post('etc');
		$eta = $this->input->post('eta');
		$atd = $this->input->post('atd');
		$status = $this->input->post('status');
		$remarks = $this->input->post('remarks');
		$id_jetty = $this->input->post('id');

		$q = $this->db->query("UPDATE next_berth SET ETA='$eta',remarks='$remarks', nama_kapal='$namakapal',last_port='$lastport',ATA='$ata',eta_next='$etanext',ATD='$atd',berthed='$berthed',cargo='$cargo',bunker='$bunker',next_port='$next',etc='$etc',status='$status' WHERE id='$id_jetty'");
		if ($q) {
				header('location: ../listBooking4');
		}
	}
}
