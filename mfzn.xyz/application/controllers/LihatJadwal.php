<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LihatJadwal extends CI_Controller {
	public function index()
	{
		if(!empty($_SESSION['name'])){
			$data['data']=$this->Model->lihatjadwal();
		$this->load->view('header');
		$this->load->view('lihatjadwal',$data);
		}else{
			header("location: Login");
		}
		
	}
	public function delete()
	{
		$id = $this->input->get('id');
		$this->Model->deleteJadwal($id);
		header("location: ../LihatJadwal");
	}
}
