<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditJadwal extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$this->load->view('header');
			$data['id'] = $this->input->get('id');
			$data['jadwal']=$this->Model->loadeditjadwal($data['id']);
			$data['jurusan']=$this->Model->jurusan()->result();
			$data['dosen']=$this->Model->dosen()->result();
		$this->load->view('editjadwal', $data);
		}else{
			header("location: Login");
		}
		
	}
	public function input()
	{
		$id = $this->input->post('id');
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$kelas = $this->input->post('kelas');
		$dosen = $this->input->post('dosen');
		$matakuliah = $this->input->post('matakuliah');
		$hari = $this->input->post('hari');
		$mulai = $this->input->post('mulai');
		$selesai = $this->input->post('selesai');
		$q = $this->Model->EditJadwal($id,$jurusan,$prodi,$kelas,$dosen,$matakuliah,$hari,$mulai,$selesai);
		if ($q){
			header("location: ../LihatJadwal");
		}

	}
}
