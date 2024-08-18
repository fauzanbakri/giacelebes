<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function prodi()
	{
		$id = $this->input->post('jurusan');
		$data = $this->Model->searchProdi($id);
		foreach ($data->result() as $row) {
			echo '
			<option value="'.$row->id_prodi.'">'.$row->nama_prodi.'</option>
			';
		}
	}
	public function kelas()
	{
		$id = $this->input->post('prodi');
		$data = $this->Model->searchKelas($id);
		foreach ($data->result() as $row) {
			echo '
			<option value="'.$row->id_kelas.'">'.$row->nama_kelas.'</option>
			';
		}
	}
	public function matakuliah()
	{
		$id = $this->input->post('prodi');
		$data = $this->Model->searchMK($id);
		foreach ($data->result() as $row) {
			echo '
			<option value="'.$row->id_mk.'">'.$row->nama_mk.'</option>
			';
		}
	}
}
