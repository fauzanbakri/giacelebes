<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListBooking3 extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$data['jetty1'] = $this->db->query("SELECT * FROM jetty1 ORDER BY id_jetty DESC");
		$data['jetty2'] = $this->db->query("SELECT * FROM jetty2 ORDER BY id_jetty DESC");
		$data['jetty3'] = $this->db->query("SELECT booking.*, name FROM booking, user WHERE status!=2 AND booking.id_user=user.id_user ORDER BY id_booking DESC");
		$this->load->view('listBooking3',$data);
		// $this->load->view('footer');
	}
	public function delete1(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM jetty1 WHERE id_jetty = '$id'");
		header('location: ../listBooking');
	}
	public function delete2(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM jetty2 WHERE id_jetty = '$id'");
		header('location: ../listBooking');
	}
	public function delete3(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM booking WHERE id_booking = '$id'");
		header('location: ../listBooking');
	}
}
