<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {

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
	
	}
	public function login()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));

		$login = $this->db->query("SELECT * FROM user WHERE username='$email' AND password='$password'");
		if($login->num_rows()>0){
			$row[] = $login->row_array();
			echo json_encode($row);
		}else{
				echo "wrong";
		}
	}
	public function weather(){
		$url = 'https://api.weather.com/v2/pws/observations/current?stationId=IMAKAS3&format=json&units=e&apiKey=4dd9c44d5243495099c44d5243c95038';
		$ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	    $response = curl_exec($ch);
	    curl_close($ch);
	    echo $response;

	}
	public function input_jetty1(){
		$namakapal = $this->input->post('namakapal');
		$lastport = $this->input->post('lastport');
		$ata = $this->input->post('ata');
		$berthed = $this->input->post('berthed');
		$cargo = $this->input->post('cargo');
		$bunker = $this->input->post('bunker');
		$next = $this->input->post('next');
		$etc = $this->input->post('etc');
		$etd = $this->input->post('etd');
		$remarks = $this->input->post('remarks');
		$status = $this->input->post('status');

		$q = $this->db->query("INSERT INTO jetty1(nama_kapal,last_port,ATA,berthed,cargo,bunker,next_port,etc,status,remarks,etd) VALUES('$namakapal','$lastport','$ata','$berthed','$cargo','$bunker','$next','$etc','$status','$remarks','$etd')");
	}
	public function input_jetty2(){
		$namakapal = $this->input->post('namakapal');
		$lastport = $this->input->post('lastport');
		$ata = $this->input->post('ata');
		$berthed = $this->input->post('berthed');
		$cargo = $this->input->post('cargo');
		$bunker = $this->input->post('bunker');
		$next = $this->input->post('next');
		$etc = $this->input->post('etc');
		$etd = $this->input->post('etd');
		$remarks = $this->input->post('remarks');
		$status = $this->input->post('status');

		$q = $this->db->query("INSERT INTO jetty2(nama_kapal,last_port,ATA,berthed,cargo,bunker,next_port,etc,status,remarks,etd) VALUES('$namakapal','$lastport','$ata','$berthed','$cargo','$bunker','$next','$etc','$status','$remarks','$etd')");
		
	}
	public function showjetty1(){
		$q = $this->db->query("SELECT * FROM jetty1 where status='1' ORDER BY id_jetty DESC limit 1");
		if($q->num_rows()>0){
			$row[] = $q->row_array();
			echo json_encode($row);
		}else{
				echo "nodata";
		}
	}
	public function showjetty2(){
		$q = $this->db->query("SELECT * FROM jetty2 where status='1' ORDER BY id_jetty DESC limit 1");
		if($q->num_rows()>0){
			$row[] = $q->row_array();
			echo json_encode($row);
		}else{
				echo "nodata";
		}
	}
	public function jetty1_berthed(){
		$q = $this->db->query("SELECT * FROM jetty1 where status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
		echo json_encode($q->result_array());
	}
	public function jetty2_berthed(){
		$q = $this->db->query("SELECT * FROM jetty2 where status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
		echo json_encode($q->result_array());

	}
	public function listuser(){
		$q = $this->db->query("SELECT * FROM user");
		echo json_encode($q->result_array());

	}
	public function listvessel(){
		$q = $this->db->query("SELECT * FROM vessel_name");
		echo json_encode($q->result_array());

	}
	public function listemail(){
		$q = $this->db->query("SELECT * FROM email");
		echo json_encode($q->result_array());

	}
	public function selectuser(){
		$id = $_POST['id'];
		$q = $this->db->query("SELECT * FROM user WHERE id_user='$id'");
		echo json_encode($q->result_array());

	}
	public function deleteuser(){
		$id = $_POST['id'];
		$this->db->query("DELETE FROM user WHERE id_user='$id'");
   }
   public function deletejetty1(){
	$id = $_POST['id'];
	$this->db->query("DELETE FROM jetty1 WHERE id_jetty='$id'");
   }
   public function deletejetty2(){
	$id = $_POST['id'];
	$this->db->query("DELETE FROM jetty2 WHERE id_jetty='$id'");
   }
   public function deletejetty3(){
	$id = $_POST['id'];
	$this->db->query("DELETE FROM booking WHERE id_booking='$id'");
   }
   public function deletenextberth(){
	$id = $_POST['id'];
	$this->db->query("DELETE FROM next_berth WHERE id='$id'");
   }
   public function deleteemail(){
	$id = $_POST['id'];
	$this->db->query("DELETE FROM email WHERE id_email='$id'");
	}
	public function updatetime(){
		 $id = $_POST['id'];
		 $this->db->query("UPDATE jetty1 SET timestamp=CONVERT_TZ(NOW(),'+07:00','+08:00') where id_jetty='$id'");
	}
	public function updatetime2(){
		 $id = $_POST['id'];
		 $this->db->query("UPDATE jetty2 SET timestamp=CONVERT_TZ(NOW(),'+07:00','+08:00') where id_jetty='$id'");
	}
	public function jetty1_detail(){
		$id = $this->input->post("id");
		$q = $this->db->query("SELECT * FROM jetty1 WHERE id_jetty='$id'");	
		echo json_encode($q->result_array());
	}
	public function jetty2_detail(){
		$id = $this->input->post("id");
		$q = $this->db->query("SELECT * FROM jetty2 WHERE id_jetty='$id'");	
		echo json_encode($q->result_array());
	}
	public function jetty3_detail(){
		$id = $this->input->post("id");
		$q = $this->db->query("SELECT booking.*, name FROM booking, user WHERE id_booking='$id' AND booking.id_user=user.id_user ORDER BY id_booking DESC");
		echo json_encode($q->result_array());
	}
	public function vessel_detail(){
		$id = $this->input->post("id");
		$q = $this->db->query("SELECT * FROM next_berth WHERE id='$id'");
		echo json_encode($q->result_array());
	}
	public function jetty1_list(){
		$q = $this->db->query("SELECT * FROM jetty1 WHERE status!=3 ORDER BY id_jetty DESC");	
		echo json_encode($q->result_array());
	}
	public function nextberth_list(){
		$q = $this->db->query("SELECT * FROM next_berth WHERE status!=4 ORDER BY FIELD(status, '3', '0', '2')");
		echo json_encode($q->result_array());
	}
	public function jetty2_list(){
		$q = $this->db->query("SELECT * FROM jetty2 WHERE status!=3 ORDER BY id_jetty DESC");	
		echo json_encode($q->result_array());
	}
	public function jetty3_list(){
		$q = $this->db->query("SELECT booking.*, name FROM booking, user WHERE status!=2 AND booking.id_user=user.id_user ORDER BY id_booking DESC");
		echo json_encode($q->result_array());
	}
	
	
	public function updateuser(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$role = $this->input->post('role');

		$query = "UPDATE user SET name='$nama', username='$username', password='$password', role='$role', email='$email' WHERE id_user='$id'";
		if($this->db->query($query)){
			echo "success";
		}else{
			echo "error";
		}
   }
   public function addemail(){
		$email = $this->input->post('email');
		$role = $this->input->post('role');

		$query = "INSERT INTO email (email,role) VALUES ('$email','$role')";
		if($this->db->query($query)){
			echo "success";
		}else{
			echo "error";
		}
	}
	public function adduser(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$email = $this->input->post('email');
		$role = $this->input->post('role');

		$query = "INSERT INTO user (name,username,password,role,email) VALUES ('$nama','$username','$password','$role','$email')";
		if($this->db->query($query)){
			echo "success";
		}else{
			echo "error";
		}
	}


	public function dateslidedec(){
		if($this->input->post('date')==''){
				$datenow = date("Y-m-d");
		}else{
				$date = $this->input->post('date');
				// $datenow = date("Y-m-d", strtotime($date));  
				// $date = date("Y-m-d"); 
				 $datenow = date("Y-m-d", strtotime("-1 days", strtotime($date)));
		}
		echo date("d M Y", strtotime($datenow));
	}
	public function dateslideadd(){
		if($this->input->post('date')==''){
				$datenow = date("Y-m-d");
		}else{
				$date = $this->input->post('date');
				// $datenow = date("Y-m-d", strtotime($date));  
				// $date = date("Y-m-d"); 
				$datenow = date("Y-m-d", strtotime("+1 days", strtotime($date)));
		}
		echo date("d M Y", strtotime($datenow));
	}
	public function loadjetty3(){
		if($this->input->post('date')==''){
				$datenow = date("Y-m-d");
		}else{
				$date = $this->input->post('date');
				$datenow = date("Y-m-d", strtotime("+0 days", strtotime($date)));
		}
		$query = $this->db->query("SELECT * FROM booking WHERE DATE(time_start)>='$datenow' AND DATE(time_start)<='$datenow' AND status='1' ORDER BY time_start ASC");
		if($query->num_rows()>0){
			echo json_encode($query->result_array());
		}else{
			echo 'nodata';
		}
	}
	public function vessel_name(){
		$query = $this->db->query("SELECT * FROM vessel_name ORDER BY name ASC");
		if($query->num_rows()>0){
			echo json_encode($query->result_array());
		}else{
			echo 'nodata';
		}
	}
	public function marker(){
		$q1 = $this->db->query("SELECT * FROM jetty1 where status='1'")->num_rows();
		$q2 = $this->db->query("SELECT * FROM jetty2 where status='1'")->num_rows();
		$q3 = $this->db->query("SELECT * FROM booking where status=1 AND time_start<CONVERT_TZ(NOW(),'+07:00','+08:00') AND time_end>CONVERT_TZ(NOW(),'+07:00','+08:00')")->num_rows();
		if ($q1>0 && $q2>0 && $q3>0){
			echo "123";
		}else if ($q1>0 && $q2==0 && $q3==0){
			echo "1";
		}else if ($q1>0 && $q2>0 && $q3==0){
			echo "12";
		}else if ($q1>0 && $q2==0 && $q3>0){
			echo "13";
		}else if ($q1==0 && $q2>0 && $q3==0){
			echo "2";
		}else if ($q1==0 && $q2>0 && $q3>0){
			echo "23";
		}else if ($q1==0 && $q2==0 && $q3>0){
			echo "3";
		}else{
			echo "0";
		}

		//UPDATE EACH TIME
		$this->db->query("UPDATE next_berth SET status=4 WHERE status=3 AND eta_next<CONVERT_TZ(NOW(),'+07:00','+08:00') AND (eta_next!='0000-00-00 00:00:00' OR eta_next!='')");	
		$this->db->query("UPDATE booking SET status=2 WHERE status=1 AND etd<CONVERT_TZ(NOW(),'+07:00','+08:00')");	
		$q0 = $this->db->query("SELECT * FROM jetty1 WHERE status=1");
		foreach($q0->result_array() as $row){
			$namakapal = $row['nama_kapal'];
			$this->db->query("DELETE FROM next_berth WHERE nama_kapal='$namakapal'");
		}
		$q01 = $this->db->query("SELECT * FROM jetty2 WHERE status=1");
		foreach($q01->result_array() as $row){
			$namakapal = $row['nama_kapal'];
			$this->db->query("DELETE FROM next_berth WHERE nama_kapal='$namakapal'");
		}

		$w = $this->db->query("SELECT * FROM jetty1 WHERE status=5");
		foreach($w->result_array() as $row){
			$namakapal = $row['nama_kapal'];
			// $ata = $row['ATA'];
			$etd = $row['etd'];
			$cargo = $row['cargo'];
			$bunker = $row['bunker'];
			$next = $row['next_port'];
			$etc = $row['etc'];
			$remarks = $row['remarks'];
			$status = "5";
			$sql = $this->db->query("INSERT INTO next_berth(nama_kapal,ATD,cargo,status,remarks) 
					VALUES('$namakapal','$etd','$cargo','$status','$remarks')");
			if($sql){
				$this->db->query("DELETE FROM jetty1 WHERE id_jetty='$row[id_jetty]'");
			}
		}
		$w2 = $this->db->query("SELECT * FROM jetty2 WHERE status=5");
		foreach($w2->result_array() as $row){
			$namakapal = $row['nama_kapal'];
			// $ata = $row['ATA'];
			$etd = $row['etd'];
			$cargo = $row['cargo'];
			$bunker = $row['bunker'];
			$next = $row['next_port'];
			$etc = $row['etc'];
			$remarks = $row['remarks'];
			$status = "5";
			$sql = $this->db->query("INSERT INTO next_berth(nama_kapal,ATD,cargo,status,remarks) 
					VALUES('$namakapal','$etd','$cargo','$status','$remarks')");
			if($sql){
				$this->db->query("DELETE FROM jetty2 WHERE id_jetty='$row[id_jetty]'");
			}
		}

		$q = $this->db->query("SELECT * FROM jetty1 WHERE status=1 AND etd<CONVERT_TZ(NOW(),'+07:00','+08:00') AND etd!='0000-00-00 00:00:00'");
		foreach($q->result_array() as $row){
			$namakapal = $row['nama_kapal'];
			$lastport = $row['last_port'];
			$ata = $row['ATA'];
			$etd = "0000-00-00 00:00:00";
			$berthed = $row['berthed'];
			$cargo = $row['cargo'];
			$bunker = $row['bunker'];
			$next = $row['next_port'];
			$etc = $row['etc'];
			$remarks = $row['remarks'];
			$status = "5";
			$sql = $this->db->query("INSERT INTO next_berth(eta_next,nama_kapal,last_port,ATA,ATD,berthed,cargo,bunker,next_port,etc,status,remarks) 
					VALUES('0000-00-00 00:00:00','$namakapal','$lastport','$ata','$etd','$berthed','$cargo','$bunker','$next','$etc','$status','$remarks')");
			if($sql){
				$this->db->query("DELETE FROM jetty1 WHERE id_jetty='$row[id_jetty]'");
			}
		}
		$q2 = $this->db->query("SELECT * FROM jetty2 WHERE status=1 AND etd<CONVERT_TZ(NOW(),'+07:00','+08:00') AND etd!='0000-00-00 00:00:00'");
		foreach($q2->result_array() as $row2){
			$namakapal2 = $row2['nama_kapal'];
			$lastport2 = $row2['last_port'];
			$ata2 = $row2['ATA'];
			$etd2 = "0000-00-00 00:00:00";
			$berthed2 = $row2['berthed'];
			$cargo2 = $row2['cargo'];
			$bunker2 = $row2['bunker'];
			$next2 = $row2['next_port'];
			$etc2 = $row2['etc'];
			$remarks2 = $row2['remarks'];
			$status2 = "5";
			$sql2 = $this->db->query("INSERT INTO next_berth(nama_kapal,last_port,ATA,ATD,berthed,cargo,bunker,next_port,etc,status,remarks) 
					VALUES('$namakapal2','$lastport2','$ata2','$etd2','$berthed2','$cargo2','$bunker2','$next2','$etc2','$status2','$remarks2')");
			if($sql2){
				$this->db->query("DELETE FROM jetty2 WHERE id_jetty='$row2[id_jetty]'");
			}
		}
	}


	public function detaildata(){
		$q = $this->db->query(
			"select id_booking as id_jetty, etd, name as user, time_start as etb, time_end as etc, ship_name, tujuan as next_port, nominasi_loading, request_tambahan, loading_product, '-' as ATA, '-' as last_port, '-' as cargo, '-' as bunker, '-' as remarks, status, 'Jetty 3' as src
			from booking, user WHERE booking.id_user=user.id_user
			union all
			select id_jetty, etd, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, next_port, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, cargo, bunker, remarks, status, 'Jetty 2' as src
			from jetty2
			union all
			select id_jetty, etd, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, next_port, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, cargo, bunker, remarks, status, 'Jetty 1' as src
			from jetty1
			union all
			select id as id_jetty, ATD as etd, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, next_port, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, cargo, bunker, remarks, status, 'Vessel Activity' as src
			from next_berth;"
			);
		echo json_encode($q->result_array());
	}
	public function subdetaildata(){
		$jetty = $this->input->post('jetty');
		$id = $this->input->post('id');
		$q = $this->db->query(
			"select * from (select id_booking as id_jetty, name as user, time_start as etb, time_end as etc, etd, ship_name, tujuan as next_port, nominasi_loading, request_tambahan, loading_product, '-' as ATA, '-' as last_port, '-' as cargo, '-' as bunker, '-' as remarks, status, 'Jetty 3' as src
			from booking, user WHERE booking.id_user=user.id_user
			union all
			select id_jetty, '-' as user,  berthed as etb, etc, etd, nama_kapal as ship_name, next_port, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, cargo, bunker, remarks, status, 'Jetty 2' as src
			from jetty2
			union all
			select id_jetty, '-' as user,  berthed as etb, etc, etd, nama_kapal as ship_name, next_port, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, cargo, bunker, remarks, status, 'Jetty 1' as src
			from jetty1
			union all
			select id as id_jetty, '-' as user,  berthed as etb, etc, ATD as etd, nama_kapal as ship_name, next_port, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, cargo, bunker, remarks, status, 'Vessel Activity' as src
			from next_berth
			) as z 
			where z.src='$jetty' AND z.id_jetty='$id';"
			);
		echo json_encode($q->result_array());
	}

	public function download(){
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data_All.xls");
		$data = $this->db->query(
			"select id_booking as id_jetty, name as user, time_start as etb, time_end as etc, ship_name, tujuan, nominasi_loading, request_tambahan, loading_product, '-' as ATA, '-' as last_port, '-' as next_port, '-' as cargo, '-' as bunker, '-' as remarks, status, 'Jetty 3' as src
			from booking, user WHERE booking.id_user=user.id_user
			union all
			select id_jetty, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Jetty 2' as src
			from jetty2 where status!=2
			union all
			select id_jetty, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Jetty 1' as src
			from jetty1 where status!=2
			union all
			select id as id_jetty, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Vessel Activity' as src
			from next_berth;"
			);
		  echo '
		  <table border="1">
			<tr>
				  <th>Jetty</th>
				  <th>Nama Kapal</th>
				  <th>Nama PT</th>
				  <th>ETB</th>
				  <th>ETC</th>
				  <th>ATA</th>
				  <th>Tujuan</th>
				  <th>Loading Produk</th>
				  <th>Nominasi Loading (KL)</th>
				  <th>Request</th>
				  <th>Last Port</th>
				  <th>Next Port</th>
				  <th>Cargo</th>
				  <th>Bunker</th>
				  <th>Remarks</th>
				  <th>Status</th>
			</tr>
		  ';
		
		  foreach ($data->result() as $row) {
			echo "<tr>";
				   echo '<td>'.$row->src.'</td>'; 
				   echo '<td>'.$row->ship_name.'</td>';  
				   echo '<td>'.$row->user.'</td>';
				   echo '<td>'.$row->etb.'</td>';
				   echo '<td>'.$row->etc.'</td>';
				   echo '<td>'.$row->ATA.'</td>';
				   echo '<td>'.$row->tujuan.'</td>';
				   echo '<td>'.$row->loading_product.'</td>';
				   echo '<td>'.$row->nominasi_loading.'</td>';
				   echo '<td>'.$row->request_tambahan.'</td>';
				   echo '<td>'.$row->last_port.'</td>';
				   echo '<td>'.$row->next_port.'</td>';
				   echo '<td>'.$row->cargo.'</td>';
				   echo '<td>'.$row->bunker.'</td>';
				   echo '<td>'.$row->remarks.'</td>';
		
				   if($row->status==0 AND $row->src=='Jetty 3'){
						echo '<td> Belum Verifikasi </td>';
					}else if($row->status==1 AND $row->src=='Jetty 3'){
						echo '<td> Terverifikasi </td>';
					}else if($row->status==2 AND $row->src=='Jetty 3'){
					  echo '<td> Selesai </td>';
					}else if($row->status==2 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
					  echo '<td> Incoming </td>';
					}else if($row->status==1 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
					  echo '<td>At Jetty</td>';
					}else if($row->status==0 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
					  echo '<td> Next Berthing </td>';
					}else if($row->status==4 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
					  echo '<td> Incoming </td>';
					}else if($row->status==3 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
					  echo '<td> Selesai </td>';
					}else if($row->status==0 AND $row->src=='Vessel Activity'){
					  echo '<td> Anchored </td>';
					}else if($row->status==1 AND $row->src=='Vessel Activity'){
					  echo '<td> Clearance Only </td>';
					}else if($row->status==2 AND $row->src=='Vessel Activity'){
					  echo '<td> Incoming </td>';
					}
		
				 echo "</tr>";
		  }
		
		  echo '</table>';
		  }
		  public function edit_jetty1(){
			$namakapal = $this->input->post('namakapal');
			$lastport = $this->input->post('lastport');
			$ata = $this->input->post('ata');
			$berthed = $this->input->post('berthed');
			$cargo = $this->input->post('cargo');
			$bunker = $this->input->post('bunker');
			$next = $this->input->post('next');
			$etc = $this->input->post('etc');
			$etd = $this->input->post('etd');
			$remarks = $this->input->post('remarks');
			$status = $this->input->post('status');
			$id_jetty = $this->input->post('id');
	
			$q = $this->db->query("UPDATE jetty1 SET remarks='$remarks', nama_kapal='$namakapal',last_port='$lastport',ATA='$ata',berthed='$berthed',cargo='$cargo',bunker='$bunker',next_port='$next',etc='$etc',etd='$etd',status='$status' WHERE id_jetty='$id_jetty'");

		}
		public function edit_jetty2(){
			$namakapal = $this->input->post('namakapal');
			$lastport = $this->input->post('lastport');
			$ata = $this->input->post('ata');
			$berthed = $this->input->post('berthed');
			$cargo = $this->input->post('cargo');
			$bunker = $this->input->post('bunker');
			$next = $this->input->post('next');
			$etc = $this->input->post('etc');
			$etd = $this->input->post('etd');
			$status = $this->input->post('status');
			$id_jetty = $this->input->post('id');
			$remarks = $this->input->post('remarks');
	
			$q = $this->db->query("UPDATE jetty2 SET remarks='$remarks', nama_kapal='$namakapal',last_port='$lastport',ATA='$ata',berthed='$berthed',cargo='$cargo',bunker='$bunker',next_port='$next',etc='$etc',etd='$etd',status='$status' WHERE id_jetty='$id_jetty'");
		}
		public function input_vessel(){
			$namakapal = $this->input->post('namakapal');
			$lastport = $this->input->post('lastport');
			$ata = $this->input->post('ata');
			$eta = $this->input->post('eta');
			$etanext = $this->input->post('etanext');
			$atd = $this->input->post('atd');
			$berthed = $this->input->post('berthed');
			$cargo = $this->input->post('cargo');
			$bunker = $this->input->post('bunker');
			$next = $this->input->post('next');
			$etc = $this->input->post('etc');
			$remarks = $this->input->post('remarks');
			$status = $this->input->post('status');
	
			$q = $this->db->query("INSERT INTO next_berth(nama_kapal,last_port,ATA,ETA,ATD,eta_next,berthed,cargo,bunker,next_port,etc,status,remarks) VALUES('$namakapal','$lastport','$ata','$eta','$atd','$etanext','$berthed','$cargo','$bunker','$next','$etc','$status','$remarks')");
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
		public function edit_vessel(){
			$namakapal = $this->input->post('namakapal');
			$lastport = $this->input->post('lastport');
			$ata = $this->input->post('ata');
			$berthed = $this->input->post('berthed');
			$cargo = $this->input->post('cargo');
			$bunker = $this->input->post('bunker');
			$etanext = $this->input->post('etanext');
			$next = $this->input->post('next');
			$eta = $this->input->post('eta');
			$atd = $this->input->post('atd');
			$status = $this->input->post('status');
			$remarks = $this->input->post('remarks');
			$id_jetty = $this->input->post('id');
	
			$q = $this->db->query("UPDATE next_berth SET remarks='$remarks', ATD='$atd', eta_next='$etanext', nama_kapal='$namakapal',last_port='$lastport',ATA='$ata',berthed='$berthed',cargo='$cargo',bunker='$bunker',next_port='$next',eta='$eta',status='$status' WHERE id='$id_jetty'");
		}	
		public function move1(){
			$id = $_POST['id'];
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
			$sql = $this->db->query("INSERT INTO jetty1(nama_kapal,last_port,ATA,berthed,cargo,bunker,next_port,etc,etd,remarks,status) VALUES('$namakapal', '$lastport', '$ata', '$berthed', '$cargo', '$bunker', '$next', '$etc',''$etd, '$remarks', '$status')");
			// if ($sql) {
			// 	$this->db->query("DELETE FROM next_berth WHERE id = '$id'");
			// }
		}
		public function move2(){
			$id = $_POST['id'];
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
			// if ($sql) {
			// 	$this->db->query("DELETE FROM next_berth WHERE id = '$id'");
			// }
		}
		public function check_connection(){
			echo "success";
		}
		public function checktime(){
			$time_start = $this->input->post('start');
			$time_end = $this->input->post('end');
			if($time_start=="" OR $time_start=="0000-00-00 00:00" OR $time_end=="" OR $time_end=="0000-00-00 00:00"){
				echo "exist";
			}else{
				$query = $this->db->query("SELECT * from booking WHERE ( status!=2 AND '$time_start' BETWEEN time_start AND time_end) OR (status!=2 AND '$time_end' BETWEEN time_start AND time_end) OR (status!=2 AND '$time_start' < time_start AND '$time_end' > time_end);");
				if($query->num_rows()>0){
					echo "exist";
				}else{
					echo "notexist";
				}
			}
		}
		public function upload(){
			// $this->load->library('upload');
			// if (isset($_POST['submit'])){
			$link = base_url("login?redirect=listBooking3");
			$id_user = $this->input->post("id_user");
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
		
			$bmbb = rand(0,999999999999999999);//.basename($_FILES['bmbb']['name']);
			$ukuran_file_2 = ($_FILES['bmbb']['size']);
			$tmp_2 = ($_FILES['bmbb']['tmp_name']);
			$type_2 = ($_FILES['bmbb']['type']);
			$tujuan_2 =  "assets/uploads/bmbb/".$bmbb;
			$link_2 = $tujuan_2;
			
			$lo = rand(0,999999999999999999);//.basename($_FILES['LO']['name']);
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
																		<td style="text-align: end; padding: 12px; border-top: 1px solid #dee2e6;">'.$_POST["name"].'</td>
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
								$mail = $_POST['email'];
								$this->Mail->mail($mail, 'Anda Telah Menginput pada Jetty 3', $body);
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
			  }
			}
			// }
			public function tesmail(){
				$this->Mail->mail('mfzn.zoldyck@gmail.com', 'tes', 'tes');
			}


			public function editjetty3(){
				$id = $this->input->post("id");
				$link = base_url("login?redirect=listBooking3");
				$status_loading = $this->input->post("status_loading");
				$namakapal = $this->input->post("namakapal");
				$loadingproduct = $this->input->post("loadingproduct");
				$nominasi = $this->input->post("nominasi");
				$time_start = $this->input->post("start");
				$time_end = $this->input->post("end");
				$rob = $this->input->post("rob");
				$etd = $this->input->post("etd");
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
				$input = $this->db->query("UPDATE booking SET nominasi_loading='$nominasi', etd='$etd',rob='$rob', status_loading='$status_loading', status='$status', time_start='$time_start', time_end='$time_end', ship_name='$namakapal', tujuan='$tujuan', loading_product='$loadingproduct', request_tambahan='$request_tambahan', nama_operator='$namaoperator', no_hp='$nohp' WHERE id_booking='$id'"); 
			}
		  
}
