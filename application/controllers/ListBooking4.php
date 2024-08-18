<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListBooking4 extends CI_Controller {
	public function index()
	{
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$data['berth'] = $this->db->query("SELECT * FROM next_berth WHERE status!=4 ORDER BY FIELD(status, '3', '0', '2')");
		$this->load->view('listBooking4',$data);
		// $this->load->view('footer');
	}
	public function delete1(){
		$id = $this->input->get('id');
		$this->db->query("DELETE FROM next_berth WHERE id = '$id'");
		header('location: ../listBooking4');
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
	public function move1(){
		$id = $_GET['id'];
		$q = $this->db->query("SELECT * FROM next_berth WHERE id='$id'");
		$row = $q->row_array();
		$namakapal = $row['nama_kapal'];
		$lastport = $row['last_port'];
		$ata = $row['ATA'];
		$berthed = $row['berthed'];
		$cargo = $row['cargo'];
		$bunker = $row['bunker'];
		$next = $row['next_port'];
		$etc = $row['etc'];
		$remarks = $row['remarks'];
		$etd = $row['ATD'];
		$status = $row['status'];
			if ($status==0) {
				$status=2;
			}else if ($status==3) {
				$status=5;
			}else{
				$status=4;
			}
		$sql = $this->db->query("INSERT INTO jetty1(nama_kapal,last_port,ATA,berthed,cargo,bunker,next_port,etc,etd,remarks,status) VALUES('$namakapal', '$lastport', '$ata', '$berthed', '$cargo', '$bunker', '$next', '$etc','$etd', '$remarks', '$status')");
		if ($sql) {
			// $this->db->query("DELETE FROM next_berth WHERE id = '$id'");
		}
		// $w = $this->db->query("SELECT * FROM jetty1 WHERE status='0' OR status='2' OR status='4'");
		// foreach($w->result_array() as $row){
		// 	$jetty1.='<span><img style="vertical-align:middle; margin-right:10px;" width="30px" src="http://sisemocs.com/images/shipicon.png">'.$row['nama_kapal'].'</span><br>';
		// }
		// $w2 = $this->db->query("SELECT * FROM jetty2 WHERE status='0' OR status='2' OR status='4'");
		// foreach($w2->result_array() as $row){
		// 	$jetty2.='<span><img style="vertical-align:middle; margin-right:10px;" width="30px" src="http://sisemocs.com/images/shipicon.png">'.$row['nama_kapal'].'</span><br>';
		// }
		// $body = '
		// <body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; color: #161c2d;">
		// 	<div style="margin-top: 50px;">
		// 		<table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
		// 			<thead>
		// 				<tr style="background-color: #2f55d4; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
		// 					<th scope="col"><h6 style="margin-bottom: -10px;">Berthing Prospect Integrated Terminal Makassar</h6></th>
		// 				</tr>
		// 			</thead>

		// 			<tbody>
						
		// 				<tr>
		// 					<td style="padding: 24px;">
		// 						<div style="display: block; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 6px; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
		// 							<table cellpadding="0" cellspacing="0">
		// 							<thead class="bg-light">
		// 									<tr>
		// 										<th scope="col" colspan="4" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;"><center>'.date("d M Y").'</th>
		// 									</tr>
		// 								</thead>
		// 								<thead class="bg-light">
		// 									<tr>
		// 										<th scope="col" colspan="2" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">Next Berthing Plan Jetty 1</th>
		// 										<th scope="col" colspan="2" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">Next Berthing Plan Jetty 2</th>
		// 									</tr>
		// 								</thead>
		// 								<tbody>
		// 									<tr>
		// 										<td colspan="2" style="text-align: left; width: 30px; vertical-align:top; padding: 12px; border-top: 1px #dee2e6;">
		// 											'.$jetty1.'
		// 										</td>
		// 										<td colspan="2" style="text-align: left; vertical-align:top; padding: 12px; border-top: 1px #dee2e6;">
		// 											'.$jetty2.'
		// 										</td>
		// 									</tr>
		// 								</tbody>
		// 							</table>
		// 						</div>
		// 					</td>
		// 				</tr>
		// 				<tr>
		// 					<td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
								
		// 					</td>
		// 				</tr>
		// 				<tr>
		// 					<td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
		// 						© <script>document.write(new Date().getFullYear())</script> SISEMOCS.
		// 					</td>
		// 				</tr>
		// 			</tbody>
		// 		</table>
		// 	</div>
		// </body>
		// </html>
		// ';
		// // header('location: ../makassar');
		// $q = $this->db->query("SELECT email FROM user WHERE role>1");
		// foreach ($q->result() as $row) {
		// 	$this->Mail->mail($row->email, 'Berthing Prospect Integrated Terminal Makassar', $body);
		// }
		// $q2 = $this->db->query("SELECT email FROM email");
		// foreach ($q2->result() as $row) {
		// 	$this->Mail->mail($row->email, 'Berthing Prospect Integrated Terminal Makassar', $body);
		// }
		header('location: ../listBooking');
	}
	public function move2(){
		$id = $_GET['id'];
		$q = $this->db->query("SELECT * FROM next_berth WHERE id='$id'");
		$row = $q->row_array();
		$namakapal = $row['nama_kapal'];
		$lastport = $row['last_port'];
		$ata = $row['ATA'];
		$berthed = $row['berthed'];
		$cargo = $row['cargo'];
		$bunker = $row['bunker'];
		$next = $row['next_port'];
		$etc = $row['etc'];
		$etd = $row['ATD'];
		$remarks = $row['remarks'];
		$status = $row['status'];
		if ($status==0) {
			$status=2;
		}else if ($status==3) {
			$status=5;
		}else{
			$status=4;
		}
		$sql = $this->db->query("INSERT INTO jetty2(nama_kapal,last_port,ATA,berthed,cargo,bunker,next_port,etc,etd,remarks,status) VALUES('$namakapal', '$lastport', '$ata', '$berthed', '$cargo', '$bunker', '$next', '$etc','$etd', '$remarks', '$status')");
		if ($sql) {
			// $this->db->query("DELETE FROM next_berth WHERE id = '$id'");
		}
		// $w = $this->db->query("SELECT * FROM jetty1 WHERE status='0' OR status='2' OR status='4'");
		// foreach($w->result_array() as $row){
		// 	$jetty1.='<span><img style="vertical-align:middle; margin-right:10px;" width="30px" src="http://sisemocs.com/images/shipicon.png">'.$row['nama_kapal'].'</span><br>';
		// }
		// $w2 = $this->db->query("SELECT * FROM jetty2 WHERE status='0' OR status='2' OR status='4'");
		// foreach($w2->result_array() as $row){
		// 	$jetty2.='<span><img style="vertical-align:middle; margin-right:10px;" width="30px" src="http://sisemocs.com/images/shipicon.png">'.$row['nama_kapal'].'</span><br>';
		// }
		// $body = '
		// <body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; color: #161c2d;">
		// 	<div style="margin-top: 50px;">
		// 		<table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
		// 			<thead>
		// 				<tr style="background-color: #2f55d4; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
		// 					<th scope="col"><h6 style="margin-bottom: -10px;">Berthing Prospect Integrated Terminal Makassar</h6></th>
		// 				</tr>
		// 			</thead>

		// 			<tbody>
						
		// 				<tr>
		// 					<td style="padding: 24px;">
		// 						<div style="display: block; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 6px; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
		// 							<table cellpadding="0" cellspacing="0">
		// 							<thead class="bg-light">
		// 									<tr>
		// 										<th scope="col" colspan="4" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;"><center>'.date("d M Y").'</th>
		// 									</tr>
		// 								</thead>
		// 								<thead class="bg-light">
		// 									<tr>
		// 										<th scope="col" colspan="2" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">Next Berthing Plan Jetty 1</th>
		// 										<th scope="col" colspan="2" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">Next Berthing Plan Jetty 2</th>
		// 									</tr>
		// 								</thead>
		// 								<tbody>
		// 									<tr>
		// 										<td colspan="2" style="text-align: left; width: 30px; vertical-align:top; padding: 12px; border-top: 1px #dee2e6;">
		// 											'.$jetty1.'
		// 										</td>
		// 										<td colspan="2" style="text-align: left; vertical-align:top; padding: 12px; border-top: 1px #dee2e6;">
		// 											'.$jetty2.'
		// 										</td>
		// 									</tr>
		// 								</tbody>
		// 							</table>
		// 						</div>
		// 					</td>
		// 				</tr>
		// 				<tr>
		// 					<td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
								
		// 					</td>
		// 				</tr>
		// 				<tr>
		// 					<td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
		// 						© <script>document.write(new Date().getFullYear())</script> SISEMOCS.
		// 					</td>
		// 				</tr>
		// 			</tbody>
		// 		</table>
		// 	</div>
		// </body>
		// </html>
		// ';
		// // header('location: ../makassar');
		// $q = $this->db->query("SELECT email FROM user WHERE role>1");
		// foreach ($q->result() as $row) {
		// 	$this->Mail->mail($row->email, 'Berthing Prospect Integrated Terminal Makassar', $body);
		// }
		// $q2 = $this->db->query("SELECT email FROM email");
		// foreach ($q2->result() as $row) {
		// 	$this->Mail->mail($row->email, 'Berthing Prospect Integrated Terminal Makassar', $body);
		// }
		header('location: ../listBooking');
	}

	public function move(){
		$w = $this->db->query("SELECT * FROM jetty1 WHERE status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
		foreach($w->result_array() as $row){
			$jetty1.='<span><img style="vertical-align:middle; margin-right:10px;" width="30px" src="http://sisemocs.com/images/shipicon.png">'.$row['nama_kapal'].'</span><br>';
		}
		$w2 = $this->db->query("SELECT * FROM jetty2 WHERE status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
		foreach($w2->result_array() as $row){
			$jetty2.='<span><img style="vertical-align:middle; margin-right:10px;" width="30px" src="http://sisemocs.com/images/shipicon.png">'.$row['nama_kapal'].'</span><br>';
		}
		$body = '
		<body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; color: #161c2d;">
			<div style="margin-top: 50px;">
				<table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
					<thead>
						<tr style="background-color: #2f55d4; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
							<th scope="col"><h6 style="margin-bottom: -10px;">Berthing Prospect Integrated Terminal Makassar</h6></th>
						</tr>
					</thead>

					<tbody>
						
						<tr>
							<td style="padding: 24px;">
								<div style="display: block; overflow-x: auto; -webkit-overflow-scrolling: touch; border-radius: 6px; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
									<table cellpadding="0" cellspacing="0">
									<thead class="bg-light">
											<tr>
												<th scope="col" colspan="4" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;"><center>'.date("d M Y").'</th>
											</tr>
										</thead>
										<thead class="bg-light">
											<tr>
												<th scope="col" colspan="2" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">Next Berthing Plan Jetty 1</th>
												<th scope="col" colspan="2" style="text-align: left; vertical-align: bottom; border-top: 1px solid #dee2e6; padding: 12px;">Next Berthing Plan Jetty 2</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="2" style="text-align: left; width: 30px; vertical-align:top; padding: 12px; border-top: 1px #dee2e6;">
													'.$jetty1.'
												</td>
												<td colspan="2" style="text-align: left; vertical-align:top; padding: 12px; border-top: 1px #dee2e6;">
													'.$jetty2.'
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</td>
						</tr>
						<tr>
							<td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
								
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
		header('location: ../makassar');
		$q = $this->db->query("SELECT email FROM user WHERE role>1");
		foreach ($q->result() as $row) {
			$this->Mail->mail($row->email, 'Berthing Prospect Integrated Terminal Makassar', $body);
		}
		$q2 = $this->db->query("SELECT email FROM email");
		foreach ($q2->result() as $row) {
			$this->Mail->mail($row->email, 'Berthing Prospect Integrated Terminal Makassar', $body);
		}
	}
}
