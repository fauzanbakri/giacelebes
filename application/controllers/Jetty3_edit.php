<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jetty3_edit extends CI_Controller {

	public function index()
	{
		if(empty($_SESSION['name']) OR $_SESSION['role']==0){
			header("location:login");
		}


		if ($this->input->get('id')!=""){
			$id = $this->input->get('id');
			$data['data'] = $this->db->query("SELECT * FROM booking where id_booking='$id'");
			$data['id'] = $id;




			$this->load->view('jetty3_edit', $data);
		}else{
			header("location:listBooking3");
		}
	
	}
	public function cek(){
		$time_start = $this->input->post('str');
		$time_end = $this->input->post('end');
		$id = $this->input->post('id');

		$query = $this->db->query("SELECT * from booking WHERE (status!=2 AND id_booking!='$id' AND '$time_start' BETWEEN time_start AND time_end) OR (status!=2 AND id_booking!='$id' AND '$time_end' BETWEEN time_start AND time_end) OR (status!=2 AND id_booking!='$id' AND '$time_start' < time_start AND '$time_end' > time_end);");
		if($query->num_rows()>0){
			echo "exist";
		}else{
			echo "notexist";
		}

	}

	public function edit(){
		$id = $this->input->post("id");
		$link = base_url("login?redirect=listBooking3");
		$status_loading = $this->input->post("status_loading");
		$namakapal = $this->input->post("namakapal");
		$loadingproduct = $this->input->post("loadingproduct");
		$nominasi = $this->input->post("nominasi");
		$time_start = $this->input->post("start");
		$time_end = $this->input->post("end");
		$etd = $this->input->post("etd");
		$rob = $this->input->post("rob");
		$request_tambahan = $this->input->post("req");
		$status = $this->input->post("status");
		$tujuan = $this->input->post("tujuan");
		$namaoperator = $this->input->post("namaoperator");
		$nohp = $this->input->post("nohp");
		if($status==1){
			$status_on_email="Terverifikasi";
			$title = "Inputan Telah Terverifikasi";
		}else if ($status==3) {
			$status_on_email="Waiting for Verification 2";
			$title = "Inputan Telah Di Verifikasi 1";
		}

		$query = $this->db->query("SELECT user.email, booking.id_user FROM booking,user where user.id_user=booking.id_user AND booking.id_booking='$id'");
			$row = $query->row_array();
			echo $row['id_user'];
			$body = '
	                	<body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; color: #161c2d;">

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
						                                    <td style="min-width: 130px; padding-bottom: 8px;">Nama Operator :</td>
						                                    <td style="color: #8492a6;">'.$namaoperator.'</td>
						                                </tr>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">No HP :</td>
						                                    <td style="color: #8492a6;">'.$nohp.'</td>
						                                </tr>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">Status :</td>
						                                    <td style="color: #8492a6;"><b>'.$status_on_email.'</b></td>
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
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$request_tambahan.'</td>
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
						</body>
						</html>

	                	';
	                	$body2 = '
	                	<body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; color: #161c2d;">
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
						                                    <td style="min-width: 130px; padding-bottom: 8px;">Nama Operator :</td>
						                                    <td style="color: #8492a6;">'.$namaoperator.'</td>
						                                </tr>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">No HP :</td>
						                                    <td style="color: #8492a6;">'.$nohp.'</td>
						                                </tr>
						                                <tr>
						                                    <td style="min-width: 130px; padding-bottom: 8px;">Status :</td>
						                                    <td style="color: #8492a6;"><b>'.$status_on_email.'</b></td>
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
						                                        <td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$request_tambahan.'</td>
						                                    </tr>
						                                </tbody>
						                            </table>
						                        </div>
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
						</body>
						</html>';

		if ($status==1) {
			$this->Mail->mail($row['email'], $title, $body2);
			$q = $this->db->query("SELECT email FROM user WHERE role>1");
        	foreach ($q->result() as $row) {
        		$this->Mail->mail($row->email, $title, $body);
        	}
        	$q2 = $this->db->query("SELECT email FROM email");
        	foreach ($q2->result() as $row) {
        		$this->Mail->mail($row->email, 'Input Baru Pada Jetty 3', $body);
        	}
		}elseif ($status==3) {
			$q = $this->db->query("SELECT email FROM user WHERE role>1");
        	foreach ($q->result() as $row) {
        		$this->Mail->mail($row->email, $title, $body);
        	}
        	$q2 = $this->db->query("SELECT email FROM email");
        	foreach ($q2->result() as $row) {
        		$this->Mail->mail($row->email, 'Input Baru Pada Jetty 3', $body);
        	}
		}


        $this->db->query("SET SESSION interactive_timeout = 28800;");
	    $input = $this->db->query("UPDATE booking SET nominasi_loading='$nominasi', rob='$rob', etd='$etd', status_loading='$status_loading', status='$status', time_start='$time_start', time_end='$time_end', ship_name='$namakapal', tujuan='$tujuan', loading_product='$loadingproduct', request_tambahan='$request_tambahan', nama_operator='$namaoperator', no_hp='$nohp' WHERE id_booking='$id'");
	    if($input){
	         header('location: ../listBooking3');
	    }
	      
	}
}
