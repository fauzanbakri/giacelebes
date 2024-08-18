<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DownloadAbsenDosen extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
	function index()
	{
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,7,'DAFTAR HADIR DOSEN',0,1,'C');
        $pdf->Cell(5,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(5,6,'No',1,0,'C');
        $pdf->Cell(30,6,'Jurusan',1,0,'C');
        $pdf->Cell(50,6,'Prodi',1,0,'C');
        $pdf->Cell(20,6,'Kelas',1,0,'C');
        $pdf->Cell(40,6,'Mata Kuliah',1,0,'C');
        $pdf->Cell(40,6,'Dosen',1,0,'C');
        $pdf->Cell(15,6,'Hari',1,0,'C');
        $pdf->Cell(30,6,'Jam/Tanggal',1,0,'C');
        $pdf->Cell(30,6,'Ruangan',1,1,'C');
        $pdf->SetFont('Arial','',8);
        $mhs = $this->Model->lihatabsendosen();
        $no=0;
        foreach ($mhs as $data){
            $no++;
            if ($data->hari=='Mon') {
                $hari='Senin';
            }else if ($data->hari=='Tue') {
                $hari='Selasa';
            }else if ($data->hari=='Wed') {
                $hari='Rabu';
            }else if ($data->hari=='Thu') {
                $hari='Kamis';
            }else if ($data->hari=='Fri') {
                $hari='Jumat';
            }else{
                $hari = 'undefined';
            }
            $pdf->Cell(5,6,$no,1,0, 'C');
            $pdf->Cell(30,6,$data->nama_jurusan,1,0);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(50,6,$data->nama_prodi,1,0);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(20,6,$data->nama_kelas,1,0);
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(40,6,$data->nama_mk,1,0);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(40,6,$data->nama,1,0);
            $pdf->Cell(15,6,$hari,1,0);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,6,$data->timestamp,1,0);
            $pdf->SetFont('Arial','',8);
            $pdf->Cell(30,6,$data->ruangan,1,1);

        }
        $pdf->Output();
	}
}