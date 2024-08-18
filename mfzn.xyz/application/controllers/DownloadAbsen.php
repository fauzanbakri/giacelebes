<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DownloadAbsen extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
	function index()
	{
        $id_dhd = $this->input->get('id_dhd');
        $mhs = $this->Model->downloadabsen($id_dhd);
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,7,'DAFTAR HADIR MAHASISWA',0,1,'C');
        $pdf->Cell(20,7,'',0,1);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(20,7,'Mata Kuliah',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(130,7,$mhs->row()->nama_mk,0,0);
        $pdf->Cell(25,7,'Tanggal',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(130,7,substr($mhs->row()->timestamp, 0,10),0,1);

        $pdf->Cell(20,7,'Kelas',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(130,7,$mhs->row()->nama_kelas,0,0);
        $pdf->Cell(25,7,'Ruangan',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(130,7,$mhs->row()->ruangan,0,1);

        $pdf->Cell(20,7,'Dosen',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(130,7,$mhs->row()->nama_dosen,0,0);
        $pdf->Cell(25,7,'Jurusan/Prodi',0,0);
        $pdf->Cell(5,7,':',0,0);
        $pdf->Cell(130,7,$mhs->row()->nama_jurusan.'/'.$mhs->row()->nama_prodi,0,1);

        $pdf->Cell(7,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(30,6,'NIM',1,0,'C');
        $pdf->Cell(150,6,'Nama Mahasiswa',1,0,'C');
        $pdf->Cell(40,6,'Waktu Absen',1,0,'C');
        $pdf->Cell(30,6,'Status',1,1,'C');
        $pdf->SetFont('Arial','',8);
        $no=0;
        // echo $mhs->num_rows();
        // while ($mhs){
        //     $no++;
        //     $pdf->Cell(5,6,$no,1,0, 'C');
        //     $pdf->Cell(30,6,$mhs['nim'],1,0);
        //     $pdf->SetFont('Arial','',8);
        //     $pdf->Cell(50,6,$mhs['nama_mahasiswa'],1,0);
        //     $pdf->SetFont('Arial','',8);
        //     $pdf->Cell(20,6,substr($mhs['timestamp_mhs'], 10,8),1,0);
        //     $pdf->SetFont('Arial','',8);
        //     $pdf->Cell(30,6,$mhs['status'],1,1);
        // }
        foreach ($mhs->result() as $data){
            $no++;
            // echo '<br>'.$data->nim;
            $pdf->Cell(10,6,$no,1,0, 'C');
            $pdf->Cell(30,6,$data->nim,1,0,'C');
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(150,6,$data->nama_mahasiswa,1,0);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(40,6,substr($data->timestamp_mhs, 10,9),1,0,'C');
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,6,$data->status,1,1,'C');

        }
        $pdf->Output();
	}
}