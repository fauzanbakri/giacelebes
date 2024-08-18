<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Jetty3 extends CI_Controller {


	public function index()
	{
		if($_SESSION['role']==0 OR empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$data['name'] = $this->db->query("SELECT * FROM vessel_name");
		$this->load->view('jetty3', $data);
		// $this->load->view('footer');
		// $this->upload("hahaha");
	}

	public function cek(){
		$time_start = $this->input->post('start');
		$time_end = $this->input->post('end');

		$query = $this->db->query("SELECT * from booking WHERE ( status!=2 AND '$time_start' BETWEEN time_start AND time_end) OR (status!=2 AND '$time_end' BETWEEN time_start AND time_end) OR (status!=2 AND '$time_start' < time_start AND '$time_end' > time_end);");
		if($query->num_rows()>0){
			echo "exist";
		}else{
			echo "notexist";
		}

	}

	public function upload(){
	// $this->load->library('upload');
	// if (isset($_POST['submit'])){
	$link = base_url("login?redirect=listBooking3");
	$id_user = $_SESSION['id_user'];
	$namakapal = $this->input->post("namakapal");
	$status = $this->input->post("status");
	$loadingproduct = $this->input->post("loadingproduct");
	$rob = $this->input->post("robnominasi");
	$nominasi = $this->input->post("nominasi");
	$time_start = $this->input->post("start");
	$time_end = $this->input->post("end");
	$tujuan = $this->input->post("tujuan");
	$nohp = $this->input->post("nohp");
	$namaoperator = $this->input->post("namaoperator");
	$req = $this->input->post("req");
	$request_tambahan = $this->input->post("req");

	$morring = rand(0,999999999999999999).basename($_FILES['morring']['name']);
	$ukuran_file_1 = ($_FILES['morring']['size']);
	$tmp_1 = ($_FILES['morring']['tmp_name']);
	$type_1 = ($_FILES['morring']['type']);
	$tujuan_1 =  "assets/uploads/morring_unmorring/".$morring;
	$link_1 = $tujuan_1;

	$bmbb = rand(0,999999999999999999).basename($_FILES['bmbb']['name']);
	$ukuran_file_2 = ($_FILES['bmbb']['size']);
	$tmp_2 = ($_FILES['bmbb']['tmp_name']);
	$type_2 = ($_FILES['bmbb']['type']);
	$tujuan_2 =  "assets/uploads/bmbb/".$bmbb;
	$link_2 = $tujuan_2;
	
	$lo = rand(0,999999999999999999).basename($_FILES['LO']['name']);
	$ukuran_file_3 = ($_FILES['LO']['size']);
	$tmp_3 = ($_FILES['LO']['tmp_name']);
	$type_3 = ($_FILES['LO']['type']);
	$tujuan_3 =  "assets/uploads/LO/".$lo;
	$link_3 = $tujuan_3;

	$pakta = rand(0,999999999999999999).basename($_FILES['pakta']['name']);
	$ukuran_file_4 = ($_FILES['pakta']['size']);
	$tmp_4 = ($_FILES['pakta']['tmp_name']);
	$type_4 = ($_FILES['pakta']['type']);
	$tujuan_4 =  "assets/uploads/pakta_integritas/".$pakta;
	$link_4 = $tujuan_4;

	$simfit = rand(0,999999999999999999).basename($_FILES['simfit']['name']);
	$ukuran_file_5 = ($_FILES['simfit']['size']);
	$tmp_5 = ($_FILES['simfit']['tmp_name']);
	$type_5 = ($_FILES['simfit']['type']);
	$tujuan_5 =  "assets/uploads/simfit/".$simfit;
	$link_5 = $tujuan_5;

	$psa = rand(0,999999999999999999).basename($_FILES['psa']['name']);
	$ukuran_file_6 = ($_FILES['psa']['size']);
	$tmp_6 = ($_FILES['psa']['tmp_name']);
	$type_6 = ($_FILES['psa']['type']);
	$tujuan_6 =  "assets/uploads/psa/".$psa;
	$link_6 = $tujuan_6;

	$query = $this->db->query("SELECT * from booking WHERE ( status!=2 AND '$time_start' BETWEEN time_start AND time_end) OR (status!=2 AND '$time_end' BETWEEN time_start AND time_end) OR (status!=2 AND '$time_start' < time_start AND '$time_end' > time_end);");
	if($query->num_rows()>0){
		header('location: ../Jetty3?msg=timenotavailable');
	}else{
		if($ukuran_file_1 <= 4500000000 || $ukuran_file_2 <= 4500000000 || $ukuran_file_3 <= 4500000000 || $ukuran_file_4 <= 4500000000 || $ukuran_file_5 <= 4500000000 || $ukuran_file_6 <= 4500000000){

	        $upload_1 = move_uploaded_file($tmp_1,$tujuan_1);
	        $upload_2 = move_uploaded_file($tmp_2,$tujuan_2);
	        $upload_3 = move_uploaded_file($tmp_3,$tujuan_3);
	        $upload_4 = move_uploaded_file($tmp_4,$tujuan_4);
			$upload_5 = move_uploaded_file($tmp_5,$tujuan_5);
			$upload_6 = move_uploaded_file($tmp_6,$tujuan_6);
	        if($upload_1 && $upload_2 && $upload_3 && $upload_4 && $upload_5 && $upload_6){

	        $input = $this->db->query("INSERT INTO booking (id_user, time_start, time_end, ship_name, status, tujuan, nominasi_loading, request_tambahan, morring, bmbb, lo, pakta_integritas, status_loading, loading_product, nama_operator, no_hp, rob, simfit, psa) VALUES('$id_user', '$time_start', '$time_end', '$namakapal', 0, '$tujuan', '$nominasi', '$request_tambahan', '$link_1', '$link_2', '$link_3', '$link_4', '$status', '$loadingproduct', '$namaoperator', '$nohp', '$rob', '$link_5', '$link_6')");

	                //jika query input sukses
	                if($input){
	                	$body = '
						    <body>
						    <center>
						    <img width="500px" src="http://sisemocs.com/images/thankyou.png">
						</body>
	                	';
	                	$body2 = '
	                	<body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; color: #161c2d;">
						    <!-- Loader -->
						    <!-- <div id="preloader">
						        <div id="status">
						            <div class="spinner">
						                <div class="double-bounce1"></div>
						                <div class="double-bounce2"></div>
						            </div>
						        </div>
						    </div> -->
						    <!-- Loader -->

						    <!-- Hero Start -->
						    <div style="margin-top: 50px;">
						        <table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
						            <thead>
						                <tr style="background-color: #2f55d4; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
						                    <th scope="col"><h5 style="margin-bottom: -10px;">Jetty 3</h5></th>
						                </tr>
						            </thead>

						            <tbody>
						                <tr>
						                    <td style="padding: 24px 24px 0;">
						                        <table cellpadding="0" cellspacing="0" style="border: none;">
						                            <tbody>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">Waktu Input :</td>
						                                    <td style="color: #8492a6;">'.Date("d/m/Y H:i:s").'</td>
						                                </tr>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">Nama Operator :</td>
						                                    <td style="color: #8492a6;">'.$namaoperator.'</td>
						                                </tr>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">No HP :</td>
						                                    <td style="color: #8492a6;">'.$nohp.'</td>
						                                </tr>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">Status :</td>
						                                    <td style="color: #8492a6;">Waiting for Verification 1</td>
						                                </tr>
						                            </tbody>
						                        </table>
						                    </td>
						                </tr>
						                
						                <tr>
						                    <td style="padding: 24px;">
						                        <div style="display: block; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 6px; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
						                            <table cellpadding="0" cellspacing="0">
						                                <thead class="bg-light">
						                                    <tr>
						                                        <th scope="col" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">Informasi</th>
						                                    </tr>
						                                </thead>
						                                <tbody>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">1</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">Nama PT</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$_SESSION["name"].'</td>
						                                    </tr>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">2</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">Nama Kapal</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$namakapal.'</td>
						                                    </tr>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">3</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">Loading Product</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$loadingproduct.'</td>
						                                    </tr>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">4</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">Nominasi Loading</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$nominasi.'</td>
						                                    </tr>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">5</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">ETB</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$time_start.'</td>
						                                    </tr>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">6</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">ETC</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$time_end.'</td>
						                                    </tr>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">7</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">Tujuan</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$tujuan.'</td>
						                                    </tr>
						                                    <tr>
						                                        <th scope="row" style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">8</th>
						                                        <td style="text-align: left; padding: 12px; border-top: 1px solid #dee2e6;">Req Tambahan</td>
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$req.'</td>
						                                    </tr>
						                                </tbody>
						                            </table>
						                        </div>
						                    </td>
						                </tr>
						                <tr>
						                    <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
						                     <a href="'.$link.'" style="cursor: pointer; padding: 11px 35px; color: #fff; background-color: #2f55d4; border: none; border-radius: 8px">
										    Planned Vessel
										    </a>   
						                    </td>
						                </tr>
						                <tr>
						                    <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
						                        © <script>document.write(new Date().getFullYear())</script> SISEMOCS.
						                    </td>
						                </tr>
						            </tbody>
						        </table>
						    </div>
						    <!-- Hero End -->
						</body>
						</html>

	                	';
	                	$mail = $_SESSION['email'];
	                	$this->Mail->mail($mail, 'Anda Telah Menginput pada Jetty 3', $body);
	                    header('location: ../makassar');
	                	$q = $this->db->query("SELECT email FROM user WHERE role>1 AND email!='$mail'");

	                	foreach ($q->result() as $row) {
	                		$this->Mail->mail($row->email, 'Input Baru Pada Jetty 3', $body2);
	                	}
	                	$q2 = $this->db->query("SELECT email FROM email");
	                	foreach ($q2->result() as $row) {
	                		$this->Mail->mail($row->email, 'Input Baru Pada Jetty 3', $body2);
	                	}
	                    
	                 }
	        }
      }else{
		header('location: ../Jetty3?msg=filetoobig');
	  }
	}
	}
	// }
	public function tesmail(){
	    $sub = $this->input->get('sub');
		$cont = $this->input->get('cont');
		$this->Mail->mail('ramadanti.amelia@gmail.com', $sub, $cont);
	}
}
