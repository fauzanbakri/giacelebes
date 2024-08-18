	<?php

	defined('BASEPATH') OR exit('No direct script access allowed');



	class InputMahasiswa extends CI_Controller {

		public function index()

		{

			if(!empty($_SESSION['name'])){

				$data['jurusan']=$this->Model->jurusan()->result();

			$this->load->view('header');

			$this->load->view('inputmahasiswa',$data);

			}else{

				header("location: Login");

			}

			

		}

		public function input()

		{

			$jurusan = $this->input->post('jurusan');

			$prodi = $this->input->post('prodi');

			$kelas = $this->input->post('kelas');

			$nama = $this->input->post('nama');

			$nim = $this->input->post('nim');

			$password = $this->input->post('password');

			$this->Model->inputMahasiswa($jurusan,$prodi,$kelas,$nama,$nim,$password);

			header("location: ../Home");

		}

	}

