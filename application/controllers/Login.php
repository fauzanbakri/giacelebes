<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if(!empty($_SESSION['name'])){
			if(isset($_GET['redirect'])){
				header("location:".$_GET['redirect']);
			}else{
				header("location:home");
			}
		}
	
		$this->load->view('login');
	
	}
	public function action()
	{
		$this->load->library('session');
		$redirect = $this->input->post('redirect');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'");
		if ($query->num_rows()>0) {
			$row=$query->row_array();
			$_SESSION['id_user']=$row['id_user'];
			$_SESSION['name']=$row['name'];
			$_SESSION['username']=$row['username'];
			$_SESSION['role']=$row['role'];
			$_SESSION['email']=$row['email'];
			if (!empty($redirect)){
				header("location:../".$redirect);	
			}else{	
				header("location:../home");
			}
		}else{
			header("location:../login?wrong");
		}
	}
	public function logout()
	{
		session_destroy();
		header("location:../login");
	}
}
