<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
		if($_SESSION['role']==0 OR empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$this->load->view('order');
		// $this->load->view('footer');
		// $this->upload("hahaha");
	}

	public function upload(){
	// $this->load->library('upload');
	// if (isset($_POST['submit'])){
	$namakapal = $this->input->post("namakapal");
	$namapt = $this->input->post("namapt");
	$tujuan = $this->input->post("tujuan");
	$nominasi = $this->input->post("nominasi");
	$loading_order_date = $this->input->post("lodate");

	$dok = rand(0,999999999999999999).basename($_FILES['dok']['name']);
	$ukuran_file_1 = ($_FILES['dok']['size']);
	$tmp_1 = ($_FILES['dok']['tmp_name']);
	$type_1 = ($_FILES['dok']['type']);
	$tujuan_1 =  "assets/uploads/dokumen/".$dok;
	$link_1 = $tujuan_1;


	if($ukuran_file_1 <= 500000000){

	        $upload_1 = move_uploaded_file($tmp_1,$tujuan_1);
	        if($upload_1){

	        $input = $this->db->query("INSERT INTO input_order (nama_kapal,nama_pt,tujuan,nominasi,dokumen,loading_order_date) VALUES('$namakapal','$namapt','$tujuan','$nominasi','$link_1','$loading_order_date')");
	                //jika query input sukses
	                if($input){
	                     header('location: ../viewOrder');
	                    
	                 }
	        }
      }
	}
	// }
}
