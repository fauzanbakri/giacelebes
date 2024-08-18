<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

	public function checkLogin($username, $password)
	{
		$q = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
		return $q;
	}
	public function Login($nim, $password)
	{
		$q = $this->db->query("SELECT mahasiswa.*, nama_kelas, nama_prodi, nama_jurusan FROM mahasiswa,kelas,prodi,jurusan WHERE nim='$nim' AND password='$password' AND mahasiswa.id_kelas=kelas.id_kelas AND mahasiswa.id_prodi=prodi.id_prodi AND mahasiswa.id_jurusan=jurusan.id_jurusan");
		return $q;
	}
	public function Login2($nim, $password)
	{
		$q = $this->db->query("SELECT * FROM dosen WHERE nip_nidn='$nim' AND password='$password'");
		return $q;
	}
	public function dosen()
	{
		$q = $this->db->query("SELECT * FROM dosen");
		return $q;
	}
	public function jurusan()
	{
		$q = $this->db->query("SELECT * FROM jurusan");
		return $q;
	}
	public function searchProdi($id)
	{
		$q = $this->db->query("SELECT * FROM prodi where id_jurusan='$id'");
		return $q;
	}
	public function searchKelas($id)
	{
		$q = $this->db->query("SELECT * FROM kelas where id_prodi='$id'");
		return $q;
	}
	public function searchMK($id)
	{
		$q = $this->db->query("SELECT * FROM mata_kuliah where id_prodi='$id'");
		return $q;
	}
	public function inputJadwal($jurusan, $prodi, $kelas, $dosen, $matakuliah, $hari, $mulai, $selesai, $urut)
	{
		$q = $this->db->query("INSERT INTO jadwal(id_kelas,hari,jam_mulai,jam_selesai,id_dosen,id_mk,id_prodi,id_jurusan,urutan_hari) 
							   VALUES('$kelas','$hari','$mulai','$selesai','$dosen','$matakuliah','$prodi','$jurusan','$urut')");
		return $q;
	}
	public function inputMK($jurusan, $prodi, $matakuliah)
	{
		$q = $this->db->query("INSERT INTO mata_kuliah(id_jurusan,id_prodi,nama_mk) VALUES('$jurusan','$prodi','$matakuliah')");
		return $q;
	}
	public function inputDosen($nama, $nip, $pass)
	{
		$q = $this->db->query("INSERT INTO dosen(nip_nidn,nama,password) VALUES('$nip','$nama','$pass')");
		return $q;
	}
	public function inputMahasiswa($jurusan, $prodi, $kelas, $nama, $nim, $password)
	{
		$q = $this->db->query("INSERT INTO mahasiswa(nim,nama,password,id_kelas,id_prodi,id_jurusan) 
			VALUES('$nim','$nama','$password','$kelas','$prodi','$jurusan')");
		return $q;
	}
	public function checkschedule($id, $day, $time)
	{
		$q = $this->db->query("SELECT * FROM jadwal WHERE id_dosen='$id' AND hari='$day' AND jam_mulai<'$time' AND jam_selesai>'$time'");
		return $q;
	}
	public function dosenAbsen($id, $id_jadwal, $token, $ruangan)
	{
		$q = $this->db->query("INSERT INTO daftar_hadir_dosen(id_dosen,id_jadwal,token,ruangan) VALUES('$id','$id_jadwal','$token','$ruangan')");
		$id_dhd = $this->db->insert_id(); 
		$id_kelas = $this->db->query("SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'")->row()->id_kelas;
		$kelas = $this->db->query("SELECT * FROM mahasiswa WHERE id_kelas = '$id_kelas'");
		$this->db->trans_start();
		foreach($kelas->result_array() as $row){
			$this->db->query("INSERT INTO daftar_hadir(id_dhd,id_jadwal,id_mahasiswa,timestamp,ruangan,status) 
							  VALUES('$id_dhd','$id_jadwal','$row[id_mahasiswa]','0000-00-00 00:00:00','-','Tidak Hadir')");
		}
		$this->db->trans_complete();
		return $q;
	}
	public function checkjadwal($token, $time, $id_kelas, $day)
	{
		$q = $this->db->query("SELECT daftar_hadir_dosen.id_jadwal,hari,jam_mulai,jam_selesai,nama_kelas,nama_jurusan,dosen.nama,nama_prodi,nama_mk,id_dhd
							   FROM daftar_hadir_dosen,kelas,jurusan,prodi,dosen,mata_kuliah,jadwal
							   WHERE jadwal.id_kelas=kelas.id_kelas AND
							   jadwal.id_kelas='$id_kelas' AND 
							   jadwal.id_jurusan=jurusan.id_jurusan AND
							   jadwal.id_dosen=dosen.id_dosen AND 
							   jadwal.id_prodi=prodi.id_prodi AND
							   jadwal.id_mk=mata_kuliah.id_mk AND  
							   hari = '$day' AND
							   jam_mulai<'$time' AND jam_selesai>'$time' AND
							   token='$token'");
		return $q;
	}
	public function absenMahasiswa($id_dhd, $id_jadwal, $id_mahasiswa, $ruangan)
	{
		$q = $this->db->query("UPDATE daftar_hadir SET timestamp=NOW(), ruangan='$ruangan', status='Hadir' 
							   WHERE id_dhd='$id_dhd' AND id_mahasiswa='$id_mahasiswa' AND id_jadwal='$id_jadwal' ");
		// $q = $this->db->query("INSERT INTO daftar_hadir(id_dhd,id_jadwal,id_mahasiswa,ruangan) VALUES('$id_dhd','$id_jadwal','$id_mahasiswa','$ruangan')");
		return $q;
	}
	public function lihatjadwal()
	{
		$q = $this->db->query("SELECT jadwal.id_jadwal,hari,jam_mulai,jam_selesai,nama_kelas,nama_jurusan,dosen.nama,nama_prodi,nama_mk FROM kelas,jurusan,prodi,dosen,mata_kuliah,jadwal WHERE jadwal.id_kelas=kelas.id_kelas AND jadwal.id_jurusan=jurusan.id_jurusan AND jadwal.id_dosen=dosen.id_dosen AND jadwal.id_prodi=prodi.id_prodi AND jadwal.id_mk=mata_kuliah.id_mk;")->result();
		return $q;
	}
	public function deleteJadwal($id)
	{
		$this->db->query("DELETE FROM jadwal WHERE id_jadwal='$id'");
	}
	public function loadeditjadwal($id)
	{
		$q = $this->db->query("SELECT jadwal.*,kelas.nama_kelas,jurusan.nama_jurusan,prodi.nama_prodi,dosen.nama,mata_kuliah.nama_mk,dosen.nip_nidn
						FROM kelas,jadwal,jurusan,prodi,dosen,mata_kuliah
						WHERE 
							jadwal.id_jadwal='$id' AND
							jadwal.id_kelas=kelas.id_kelas AND
							jadwal.id_jurusan=jurusan.id_jurusan AND
							jadwal.id_prodi=prodi.id_prodi AND
							jadwal.id_dosen=dosen.id_dosen AND
							jadwal.id_mk=mata_kuliah.id_mk;");
		return $q;
	}
	public function EditJadwal($id, $jurusan, $prodi, $kelas, $dosen, $matakuliah, $hari, $mulai, $selesai)
	{
		$q = $this->db->query("UPDATE jadwal SET id_jurusan='$jurusan', id_prodi='$prodi', id_kelas='$kelas', id_dosen='$dosen', id_mk='$matakuliah', hari='$hari', jam_mulai='$mulai', jam_selesai='$selesai' WHERE id_jadwal='$id'");
		return $q;
	}
	public function countjurusan()
	{
		$q = $this->db->query("SELECT * FROM jurusan");
		return $q;
	}
	public function countprodi()
	{
		$q = $this->db->query("SELECT * FROM prodi");
		return $q;
	}
	public function countdosen()
	{
		$q = $this->db->query("SELECT * FROM dosen");
		return $q;
	}
	public function countmahasiswa()
	{
		$q = $this->db->query("SELECT * FROM mahasiswa");
		return $q;
	}
	public function lihatabsendosen()
	{
		$q = $this->db->query("SELECT id_dhd,dosen.nama,nama_kelas,nama_prodi,nama_jurusan,nama_mk,hari,timestamp,ruangan FROM (SELECT daftar_hadir_dosen.*,hari,id_jurusan,id_kelas,id_mk, id_prodi FROM daftar_hadir_dosen,jadwal WHERE daftar_hadir_dosen.id_jadwal=jadwal.id_jadwal) AS daftar,dosen,kelas,prodi,jurusan,mata_kuliah WHERE daftar.id_dosen=dosen.id_dosen AND daftar.id_kelas=kelas.id_kelas AND daftar.id_prodi=prodi.id_prodi AND daftar.id_jurusan=jurusan.id_jurusan AND daftar.id_mk=mata_kuliah.id_mk;")->result();
		return $q;
	}
	public function downloadabsen($id_dhd)
	{
		$q = $this->db->query("SELECT mata_kuliah.nama_mk, jurusan.nama_jurusan, prodi.nama_prodi, dosen.nama AS nama_dosen, kelas.nama_kelas, daftar_hadir_dosen.ruangan, daftar_hadir_dosen.timestamp, daftar_hadir.timestamp AS timestamp_mhs, mahasiswa.nim, mahasiswa.nama AS nama_mahasiswa, daftar_hadir.status FROM daftar_hadir INNER JOIN mahasiswa ON mahasiswa.id_mahasiswa = daftar_hadir.id_mahasiswa INNER JOIN jadwal ON jadwal.id_jadwal = daftar_hadir.id_jadwal INNER JOIN kelas ON kelas.id_kelas = jadwal.id_kelas INNER JOIN dosen ON dosen.id_dosen = jadwal.id_dosen INNER JOIN prodi ON prodi.id_prodi = jadwal.id_prodi INNER JOIN jurusan ON jurusan.id_jurusan = jadwal.id_jurusan INNER JOIN mata_kuliah ON mata_kuliah.id_mk = jadwal.id_mk INNER JOIN daftar_hadir_dosen ON daftar_hadir_dosen.id_dhd = daftar_hadir.id_dhd WHERE daftar_hadir.id_dhd ='$id_dhd'");
		return $q;
	}
	public function lihatabsenmhs()
	{
		$q = $this->db->query("SELECT data.*,mahasiswa.nama as nama_mahasiswa,dosen.nama as nama_dosen,nama_jurusan,nama_prodi,nama_kelas,nama_mk FROM (SELECT daftar.*,jadwal.id_jurusan,jadwal.id_prodi,jadwal.id_kelas,jadwal.id_mk,hari FROM (SELECT daftar_hadir.*, id_dosen FROM daftar_hadir,daftar_hadir_dosen WHERE daftar_hadir.id_dhd=daftar_hadir_dosen.id_dhd) AS daftar,jadwal WHERE daftar.id_jadwal=jadwal.id_jadwal) AS data,mahasiswa,dosen,jurusan,prodi,kelas,mata_kuliah WHERE data.id_mahasiswa=mahasiswa.id_mahasiswa AND data.id_dosen=dosen.id_dosen AND data.id_jurusan=jurusan.id_jurusan AND data.id_prodi = prodi.id_prodi AND data.id_kelas=kelas.id_kelas AND data.id_mk=mata_kuliah.id_mk;")->result();
		return $q;
	}
	public function historymahasiswa($id)
	{
		$q = $this->db->query("SELECT data.*,mahasiswa.nama as nama_mahasiswa,dosen.nama as nama_dosen,nama_jurusan,nama_prodi,nama_kelas,nama_mk FROM (SELECT daftar.*,jadwal.id_jurusan,jadwal.id_prodi,jadwal.id_kelas,jadwal.id_mk,hari FROM (SELECT daftar_hadir.*, id_dosen FROM daftar_hadir,daftar_hadir_dosen WHERE daftar_hadir.id_dhd=daftar_hadir_dosen.id_dhd) AS daftar,jadwal WHERE daftar.id_jadwal=jadwal.id_jadwal) AS data,mahasiswa,dosen,jurusan,prodi,kelas,mata_kuliah WHERE data.id_mahasiswa=mahasiswa.id_mahasiswa AND data.id_dosen=dosen.id_dosen AND data.id_jurusan=jurusan.id_jurusan AND data.id_prodi = prodi.id_prodi AND data.id_kelas=kelas.id_kelas AND data.id_mk=mata_kuliah.id_mk AND data.id_mahasiswa='$id' LIMIT 30;")->result();
		return $q;
	}
	public function historydosen($id)
	{
		$q = $this->db->query("SELECT id_dhd,dosen.nama,nama_kelas,nama_prodi,nama_jurusan,nama_mk,hari,timestamp,ruangan FROM (SELECT daftar_hadir_dosen.*,hari,id_jurusan,id_kelas,id_mk, id_prodi FROM daftar_hadir_dosen,jadwal WHERE daftar_hadir_dosen.id_jadwal=jadwal.id_jadwal) AS daftar,dosen,kelas,prodi,jurusan,mata_kuliah WHERE daftar.id_dosen=dosen.id_dosen AND daftar.id_kelas=kelas.id_kelas AND daftar.id_prodi=prodi.id_prodi AND daftar.id_jurusan=jurusan.id_jurusan AND daftar.id_mk=mata_kuliah.id_mk AND dosen.id_dosen='$id';")->result();
		return $q;
	}
	public function inputJurusan($jurusan)
	{
		$q = $this->db->query("INSERT INTO jurusan(nama_jurusan) VALUES('$jurusan')");
		return $q;
	}
	public function InputProdi($jurusan, $prodi)
	{
		$q = $this->db->query("INSERT INTO prodi(id_jurusan,nama_prodi) VALUES('$jurusan','$prodi')");
		return $q;
	}
	public function InputKelas($jurusan, $prodi, $kelas)
	{
		$q = $this->db->query("INSERT INTO kelas(id_jurusan,id_prodi,nama_kelas) VALUES('$jurusan','$prodi','$kelas')");
		return $q;
	}
	public function datajurusan()
	{
		$q = $this->db->query("SELECT * FROM jurusan");
		return $q;
	}
	public function deleteJurusan($id)
	{
		$this->db->query("DELETE FROM jurusan WHERE id_jurusan='$id'");
	}
	public function loadeditjurusan($id)
	{
		$q = $this->db->query("SELECT * FROM jurusan WHERE id_jurusan='$id'");
		return $q;
	}
	public function EditJurusan($id, $jurusan)
	{
		$q = $this->db->query("UPDATE jurusan SET nama_jurusan='$jurusan' WHERE id_jurusan='$id'");
		return $q;
	}
	public function dataprodi()
	{
		$q = $this->db->query("SELECT prodi.*,nama_jurusan FROM jurusan,prodi WHERE jurusan.id_jurusan=prodi.id_jurusan");
		return $q;
	}
	public function deleteProdi($id)
	{
		$this->db->query("DELETE FROM prodi WHERE id_prodi='$id'");
	}
	public function loadeditprodi($id)
	{
		$q = $this->db->query("SELECT prodi.*,nama_jurusan FROM prodi,jurusan WHERE id_prodi='$id' AND jurusan.id_jurusan=prodi.id_jurusan");
		return $q;
	}
	public function EditProdi($id, $jurusan, $prodi)
	{
		$q = $this->db->query("UPDATE prodi SET nama_prodi='$prodi', id_jurusan='$jurusan' WHERE id_prodi='$id'");
		return $q;
	}
	public function datakelas()
	{
		$q = $this->db->query("SELECT kelas.*,nama_jurusan,nama_prodi FROM jurusan,prodi,kelas WHERE jurusan.id_jurusan=kelas.id_jurusan AND prodi.id_prodi=kelas.id_prodi");
		return $q;
	}
	public function deleteKelas($id)
	{
		$this->db->query("DELETE FROM kelas WHERE id_kelas='$id'");
	}
	public function loadeditkelas($id)
	{
		$q = $this->db->query("SELECT kelas.*,nama_jurusan,nama_prodi FROM prodi,jurusan,kelas WHERE id_kelas='$id' AND jurusan.id_jurusan=kelas.id_jurusan AND prodi.id_prodi=kelas.id_prodi");
		return $q;
	}
	public function EditKelas($id, $jurusan, $prodi, $kelas)
	{
		$q = $this->db->query("UPDATE kelas SET nama_kelas='$kelas', id_jurusan='$jurusan', id_prodi='$prodi' WHERE id_kelas='$id'");
		return $q;
	}
	public function datamk()
	{
		$q = $this->db->query("SELECT mata_kuliah.*,nama_jurusan,nama_prodi FROM jurusan,prodi,mata_kuliah WHERE jurusan.id_jurusan=mata_kuliah.id_jurusan AND prodi.id_prodi=mata_kuliah.id_prodi");
		return $q;
	}
	public function deleteMatakuliah($id)
	{
		$this->db->query("DELETE FROM mata_kuliah WHERE id_mk='$id'");
	}
	public function loadeditmk($id)
	{
		$q = $this->db->query("SELECT mata_kuliah.*,nama_jurusan,nama_prodi FROM prodi,jurusan,mata_kuliah WHERE id_mk='$id' AND jurusan.id_jurusan=mata_kuliah.id_jurusan AND prodi.id_prodi=mata_kuliah.id_prodi");
		return $q;
	}
	public function EditMatakuliah($id, $jurusan, $prodi, $mk)
	{
		$q = $this->db->query("UPDATE mata_kuliah SET nama_mk='$mk', id_jurusan='$jurusan', id_prodi='$prodi' WHERE id_mk='$id'");
		return $q;
	}
	public function datamhs()
	{
		$q = $this->db->query("SELECT mahasiswa.*,nama_kelas,nama_jurusan,nama_prodi FROM jurusan,prodi,kelas,mahasiswa WHERE jurusan.id_jurusan=mahasiswa.id_jurusan AND prodi.id_prodi=mahasiswa.id_prodi AND kelas.id_kelas=mahasiswa.id_kelas");
		return $q;
	}
	public function deleteMhs($id)
	{
		$this->db->query("DELETE FROM mahasiswa WHERE id_mahasiswa='$id'");
	}
	public function loadeditmhs($id)
	{
		$q = $this->db->query("SELECT mahasiswa.*,nama_kelas,nama_jurusan,nama_prodi FROM jurusan,prodi,kelas,mahasiswa WHERE jurusan.id_jurusan=mahasiswa.id_jurusan AND prodi.id_prodi=mahasiswa.id_prodi AND kelas.id_kelas=mahasiswa.id_kelas AND id_mahasiswa='$id'");
		return $q;
	}
	public function EditMhs($id, $jurusan, $prodi, $kelas, $nama, $nim, $password)
	{
		$q = $this->db->query("UPDATE mahasiswa SET nim='$nim', password='$password', nama='$nama', id_jurusan='$jurusan', id_prodi='$prodi', id_kelas='$kelas' WHERE id_mahasiswa='$id'");
		return $q;
	}
	public function datadosen()
	{
		$q = $this->db->query("SELECT * FROM dosen");
		return $q;
	}
	public function deleteDosen($id)
	{
		$this->db->query("DELETE FROM dosen WHERE id_dosen='$id'");
	}
	public function loadeditdosen($id)
	{
		$q = $this->db->query("SELECT * FROM dosen WHERE id_dosen='$id'");
		return $q;
	}
	public function EditDosen($id, $nama, $nip, $password)
	{
		$q = $this->db->query("UPDATE dosen SET nama='$nama', password='$password', nip_nidn='$nip' WHERE id_dosen='$id'");
		return $q;
	}
	public function checkmac($mac)
	{
		$q = $this->db->query("SELECT * FROM mac WHERE mac_address ='$mac'");
		return $q;
	}
	public function lastactivity()
	{
		$q = $this->db->query("SELECT nama, 'Mahasiswa' AS role, timestamp, ruangan FROM daftar_hadir,mahasiswa WHERE daftar_hadir.id_mahasiswa=mahasiswa.id_mahasiswa UNION ALL SELECT nama, 'Dosen' AS role, timestamp, ruangan FROM daftar_hadir_dosen,dosen WHERE daftar_hadir_dosen.id_dosen=dosen.id_dosen ORDER BY timestamp DESC;");
		return $q;
	}
	public function inputRuangan($nama, $mac)
	{
		$q = $this->db->query("INSERT INTO mac(ruangan,mac_address) VALUES('$nama','$mac')");
		return $q;
	}
	public function dataruangan()
	{
		$q = $this->db->query("SELECT * FROM mac");
		return $q;
	}
	public function deleteruangan($id)
	{
		$q = $this->db->query("DELETE FROM mac WHERE id_mac='$id'");
		return $q;
	}
	public function lihatjadwaldosen($id)
	{
		$q = $this->db->query("SELECT jadwal.id_jadwal,hari,jam_mulai,jam_selesai,nama_kelas,nama_jurusan,dosen.nama,nama_prodi,nama_mk FROM kelas,jurusan,prodi,dosen,mata_kuliah,jadwal WHERE jadwal.id_kelas=kelas.id_kelas AND jadwal.id_jurusan=jurusan.id_jurusan AND jadwal.id_dosen=dosen.id_dosen AND jadwal.id_prodi=prodi.id_prodi AND jadwal.id_mk=mata_kuliah.id_mk AND dosen.id_dosen='$id' ORDER BY urutan_hari ASC;");
		return $q;
	}
	public function lihatjadwalmahasiswa($id)
	{
		$q = $this->db->query("SELECT jadwal.id_jadwal,hari,jam_mulai,jam_selesai,nama_kelas,nama_jurusan,dosen.nama,nama_prodi,nama_mk FROM kelas,jurusan,prodi,dosen,mata_kuliah,jadwal WHERE jadwal.id_kelas=kelas.id_kelas AND jadwal.id_jurusan=jurusan.id_jurusan AND jadwal.id_dosen=dosen.id_dosen AND jadwal.id_prodi=prodi.id_prodi AND jadwal.id_mk=mata_kuliah.id_mk AND jadwal.id_kelas='$id' ORDER BY urutan_hari ASC;");
		return $q;
	}
}
