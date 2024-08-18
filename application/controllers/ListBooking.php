<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListBooking extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		$data['jetty1'] = $this->db->query("SELECT * FROM jetty1 WHERE status!=3 ORDER BY id_jetty DESC");
		$data['jetty2'] = $this->db->query("SELECT * FROM jetty2 WHERE status!=3 ORDER BY id_jetty DESC");
		$data['jetty3'] = $this->db->query("SELECT booking.*, name FROM booking, user WHERE booking.id_user=user.id_user ORDER BY id_booking DESC");
		if($_SESSION['role']==3) {
		$this->load->view('listBooking',$data);
		}else if($_SESSION['role']==2 OR $_SESSION['role']==4){
		header('location: listBooking3');
		}
		// $this->load->view('header');
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
		header('location: ../listBooking2');
	}
	public function delete3(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM booking WHERE id_booking = '$id'");
		header('location: ../listBooking3');
	}
}
