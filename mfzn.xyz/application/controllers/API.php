<?php

defined('BASEPATH') or exit('No direct script access allowed');



class API extends CI_Controller
{
	public function Login()
	{
		$nim = $this->input->post('nim_nip');
		$password = $this->input->post('password');
		$login = $this->Model->Login($nim, $password);
		if ($login->num_rows() > 0) {
			$row = $login->row_array();
			$data[] = array(
				'status' => 'mahasiswa',
				'id_mahasiswa' => $row['id_mahasiswa'],
				'id_jurusan' => $row['id_jurusan'],
				'id_prodi' => $row['id_prodi'],
				'id_kelas' => $row['id_kelas'],
				'nama_kelas' => $row['nama_kelas'],
				'nama_prodi' => $row['nama_prodi'],
				'nama_jurusan' => $row['nama_jurusan'],
				'nama' => $row['nama']
			);
			echo json_encode($data);
		} else {
			$login2 = $this->Model->Login2($nim, $password);
			if ($login2->num_rows() > 0) {
				$row = $login2->row_array();
				$data[] = array(
					'status' => 'dosen',
					'id_dosen' => $row['id_dosen'],
					'nip_nidn' => $row['nip_nidn'],
					'nama' => $row['nama']
				);
				echo json_encode($data);
			} else {
				echo "false";
			}
		}
	}
	public function generateQR()
	{
		$id = $this->input->post('id');
		$ruangan = $this->input->post('ruangan');
		$day = date('D');
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$check = $this->Model->checkschedule($id, $day, $time);
		// echo $time;
		if ($check->num_rows() > 0) {
			$row = $check->row_array();
			$id_jadwal = $row['id_jadwal'];
			$data = $this->db->query("SELECT * FROM daftar_hadir_dosen WHERE id_jadwal='$id_jadwal' AND date(timestamp)='$date'");
			if ($data->num_rows() > 0) {
				$token = $data->row_array();
				echo $token['token'];
			} else {
				$token = md5(time());
				$this->Model->dosenAbsen($id, $id_jadwal, $token, $ruangan);
				echo $token;
			}
		} else {
			echo "false";
		}
		// $data = $this->Model->generate();
	}
	public function absen()
	{
		$token = $this->input->post('token');
		$id_mahasiswa = $this->input->post('id');
		$id_kelas = $this->input->post('id_kelas');
		$ruangan = $this->input->post('ruangan');
		$day = date('D');
		$time = date('H:i:s');

		$check = $this->Model->checkjadwal($token, $time, $id_kelas, $day);
		if ($check->num_rows() > 0) {
			$row = $check->row_array();
			$id_dhd = $row['id_dhd'];
			$id_jadwal = $row['id_jadwal'];
			$absen = $this->Model->absenMahasiswa($id_dhd, $id_jadwal, $id_mahasiswa, $ruangan);
			$data = $check->result();
			if ($absen) {
				echo json_encode($data);
			} else {
				echo "false";
			}
		} else {
			echo "false";
		}
	}
	public function historymahasiswa()
	{
		$id = $this->input->post('id');
		$data = $this->Model->historymahasiswa($id);
		echo json_encode($data);
	}
	public function historydosen()
	{
		$id = $this->input->post('id');
		$data = $this->Model->historydosen($id);
		echo json_encode($data);
	}
	public function checkmac()
	{
		$mac = $this->input->post('mac');
		$check = $this->Model->checkmac($mac);
		if ($check->num_rows() > 0) {
			$data = $check->result();
			echo json_encode($data);
		} else {
			echo "false";
		}
	}
	public function jadwalDosen()
	{
		$id = $this->input->post('id');
		$check = $this->Model->lihatjadwaldosen($id);
		if ($check->num_rows() > 0) {
			$data = $check->result();
			echo json_encode($data);
		} else {
			echo "null";
		}
	}
	public function jadwalMahasiswa()
	{
		$id = $this->input->post('id');
		$check = $this->Model->lihatjadwalmahasiswa($id);
		if ($check->num_rows() > 0) {
			$data = $check->result();
			echo json_encode($data);
		} else {
			echo "null";
		}
	}
}
