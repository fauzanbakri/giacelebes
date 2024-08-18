<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InputJadwal extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
		$data['jurusan']=$this->Model->jurusan()->result();
		$data['dosen']=$this->Model->dosen()->result();
		$this->load->view('inputjadwal', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input()
	{
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$kelas = $this->input->post('kelas');
		$dosen = $this->input->post('dosen');
		$matakuliah = $this->input->post('matakuliah');
		$hari = $this->input->post('hari');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');
		if ($hari == 'Mon'){
			$urut_hari = 1;
		}else if ($hari == 'Tue'){
			$urut_hari = 2;
		}else if ($hari == 'Wed'){
			$urut_hari = 3;
		}else if ($hari == 'Thu'){
			$urut_hari = 4;
		}else if ($hari == 'Fri'){
			$urut_hari = 5;
		}else{
			$urut_hari = 0;
		}
		$q = $this->Model->inputJadwal($jurusan,$prodi,$kelas,$dosen,$matakuliah,$hari,$mulai,$selesai,$urut_hari);
		if ($q){
			header("location: ../Home");
		}

	}
}
