<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makassar extends CI_Controller {

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
		if(empty($_SESSION['name'])){
			header("location:login");
		}
		// $this->load->view('header');
		$this->load->view('makassar');
		// $this->load->view('footer');
	}

	public function marker(){
		$q1 = $this->db->query("SELECT *  FROM jetty1 where status='1'")->num_rows();
		$q2 = $this->db->query("SELECT *  FROM jetty2 where status='1'")->num_rows();
		$q3 = $this->db->query("SELECT *  FROM booking where status=1 AND time_start<CONVERT_TZ(NOW(),'+07:00','+08:00') AND etd>CONVERT_TZ(NOW(),'+07:00','+08:00')")->num_rows();
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
	}

	public function jetty3_list()
	{
		$query = $this->db->query("SELECT booking.*, name  FROM booking,user where status='1' AND booking.id_user=user.id_user ORDER BY time_start DESC");
		if($query->num_rows()>0){
			foreach ($query->result() as $row)
			{
					echo '
						<div class="accordion-item rounded mt-2">
	                        <div id="collapseTwo" class="accordion-collapse border-0" aria-labelledby="headingTwo" data-bs-parent="#buyingquestion" style="">
	                            <div class="accordion-body bg-white">
	                            <label class="form-label">'.$row->ship_name.'</label>&nbsp;<label>('.$row->name.')</label><br>
	                                <label>Waktu Booking : &nbsp;</label><label>'.$row->time_start.'</label><br>
	                                <label>Waktu Selesai : &nbsp;</label><label>'.$row->time_end.'</label><br>
	                                <label>Estimasi : &nbsp;</label><label>
	                                '.$row->time_end.'
	                                </label><label>&nbsp;Jam</label><br>
	                            </div>
	                        </div>
	                    </div>
					';
			}
		}else{
			echo "<center>No Data</center>";
		}
	}
	public function jetty1_berthed(){
		$query = $this->db->query("SELECT * FROM jetty1 where status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
		if ($_SESSION['role']!=1) {
			if($query->num_rows()>0){
					foreach ($query->result_array() as $row) {
						if ($_SESSION['role']==0) {$hide = "hidden";}else{$hide="";}
					echo '
						<form action="Makassar/updatetime" method="post"><input hidden name="id" value="'.$row['id_jetty'].'"></input>
						<div class="mb-2"><button '.$hide.' type="submit" class="btn btn-sm btn-primary" style="margin-right:10px">▲</button><img src="images/shipicon.png" width="40px"><span class="ms-4">'.$row['nama_kapal'].'</span></div></form>
					';	
				}
			}else{
				echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
			}
}else{
			echo "<center>Restricted Access</center>";
}

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
		
		// $this->db->query("UPDATE jetty1 SET status=3 WHERE status=1 AND etd<CONVERT_TZ(NOW(),'+07:00','+08:00') AND etc!='0000-00-00 00:00:00'");
		// $this->db->query("UPDATE jetty2 SET status=3 WHERE status=1 AND etd<CONVERT_TZ(NOW(),'+07:00','+08:00') AND etc!='0000-00-00 00:00:00'");
	}

	public function updatetime(){
		 $id = $_POST['id'];
		 $this->db->query("UPDATE jetty1 SET timestamp=CONVERT_TZ(NOW(),'+07:00','+08:00') where id_jetty='$id'");
		 header("location:../Makassar");
	}
	public function updatetime2(){
		 $id = $_POST['id'];
		 $this->db->query("UPDATE jetty2 SET timestamp=CONVERT_TZ(NOW(),'+07:00','+08:00') where id_jetty='$id'");
		 header("location:../Makassar");
	}

	public function jetty2_berthed(){
		$query = $this->db->query("SELECT * FROM jetty2 where status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
	if ($_SESSION['role']!=1) {
					if($query->num_rows()>0){
							foreach ($query->result_array() as $row) {
								if ($_SESSION['role']==0) {$hide = "hidden";}else{$hide="";}
							echo '
								<form action="Makassar/updatetime2" method="post"><input hidden name="id" value="'.$row['id_jetty'].'"></input>
								<div class="mb-2"><button '.$hide.' type="submit" class="btn btn-sm btn-primary" style="margin-right:10px">▲</button><img src="images/shipicon.png" width="40px"><span class="ms-4">'.$row['nama_kapal'].'</span></div></form>
							';	
						}
					}else{
						echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
					}
	}else{
					echo "<center>Restricted Access</center>";
	}
	}
	public function jetty1_list(){
		$query = $this->db->query("SELECT * FROM jetty1 where status='1' ORDER BY id_jetty DESC limit 1");
	if ($_SESSION['role']!=1) {
		if($query->num_rows()>0){
				$row = $query->row_array();
						echo '
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/shipicon.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["nama_kapal"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/lastport.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["last_port"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/ata.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["ATA"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/berthed.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["berthed"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/cargo.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["cargo"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/bunker.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["bunker"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/nextport.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["next_port"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/etc.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10" style="align-items: center-vertical;">
		                        	<span>'.$row["etc"].'</span>
		                        </div>
	                        </div>
							<div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/etd.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10" style="align-items: center-vertical;">
		                        	<span>'.$row["etd"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/remarks.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["remarks"].'</span>
		                        </div>
	                        </div>
						';
		}else{
			echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
		}
	}else{

				echo "<center>Restricted Access</center>";
	}
	}

	public function jetty2_list()
	{
		$query = $this->db->query("SELECT * FROM jetty2 where status='1' ORDER BY id_jetty DESC LIMIT 1");
	if ($_SESSION['role']!=1) {
		if($query->num_rows()>0){
				$row = $query->row_array();
						echo '
							<div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/shipicon.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["nama_kapal"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/lastport.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["last_port"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/ata.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["ATA"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/berthed.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["berthed"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/cargo.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["cargo"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/bunker.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["bunker"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/nextport.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["next_port"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/etc.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["etc"].'</span>
		                        </div>
	                        </div>
							<div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/etd.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10" style="align-items: center-vertical;">
		                        	<span>'.$row["etd"].'</span>
		                        </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-sm-2 mb-2">
		                        	<center><img src="images/remarks.png" width="40px"></center>
		                        </div>
		                        <div class="col-md-10">
		                        	<span>'.$row["remarks"].'</span>
		                        </div>
	                        </div>
						';
			
		}else{
			echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
		}
	}else{

				echo "<center>Restricted Access</center>";
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
		
		$query = $this->db->query("SELECT * FROM booking WHERE DATE(time_start)>='$datenow' AND DATE(time_start)<='$datenow' AND status='1' ORDER BY time_start ASC");
		if($query->num_rows()>0){
		    echo '
			<div class="text-center align-items-center border-0 bg-light">
            		<h4 style="color: #2f55d4" id="today">'.date("d M Y", strtotime($datenow)).'</h4>
            </div>';
			foreach ($query->result_array() as $row) {
			echo '
            <div class=" shadow rounded">
                    <div class="ps-5 pe-5 accordion-body text-muted bg-white" id="jetty3regist">
	                    <div class="mb-2"><img src="images/shipicon.png" width="40px"><span class="ms-4">'.$row["ship_name"].'</span></div>
	            		<div class="mb-2"><img src="images/etc.png" width="40px"><span style="font-size: 14px" class="ms-4">'.substr($row["time_start"], 11).' - '.substr($row["etd"], 11).'</span></div>
            		</div>
            </div>
			';	
		}
		}else{
			echo '
			<div class="text-center align-items-center border-0 bg-light">
            		<h4 style="color: #2f55d4" id="today">'.date("d M Y", strtotime($datenow)).'</h4>
            </div>
            <div>
                    <div class="ps-5 pe-5 accordion-body text-muted bg-white" id="jetty3regist">
	                    <center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>
            		</div>
            </div>
			';
		}
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
		
		$query = $this->db->query("SELECT * FROM booking WHERE DATE(time_start)>='$datenow' AND DATE(time_start)<='$datenow' AND status='1' ORDER BY time_start ASC");
		if($query->num_rows()>0){
			echo '
			<div class="text-center align-items-center border-0 bg-light">
            		<h4 style="color: #2f55d4" id="today">'.date("d M Y", strtotime($datenow)).'</h4>
            </div>';
			foreach ($query->result_array() as $row) {
			echo '
            <div class=" shadow rounded">
                    <div class="ps-5 pe-5 accordion-body text-muted bg-white" id="jetty3regist">
	                    <div class="mb-2"><img src="images/shipicon.png" width="40px"><span class="ms-4">'.$row["ship_name"].'</span></div>
	            		<div class="mb-2"><img src="images/berthing.png" width="40px"><span style="font-size: 14px" class="ms-4">'.substr($row["time_start"], 11).' - '.substr($row["etd"], 11).'</span></div>
            		</div>
            </div>
			';	
			}
		}else{
			echo '
			<div class="text-center align-items-center border-0 bg-light">
            		<h4 style="color: #2f55d4" id="today">'.date("d M Y", strtotime($datenow)).'</h4>
            </div>
            <div>
                    <div class="ps-5 pe-5 accordion-body text-muted bg-white" id="jetty3regist">
	                    <center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>
            		</div>
            </div>
			';
		}
	}
	public function loadDate(){
		if($this->input->post('date')==''){
				$datenow = date("Y-m-d");
		}else{
				$date = $this->input->post('date');
				// $datenow = date("Y-m-d", strtotime($date));  
				// $date = date("Y-m-d"); 
				$datenow = date("Y-m-d", strtotime("+1 days", strtotime($date)));
		}
		
		$query = $this->db->query("SELECT * FROM booking WHERE time_start>='$datenow' AND time_start<='$datenow' AND status='1' ORDER BY time_start ASC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) {
			echo '
			<div class="text-center align-items-center border-0 bg-light">
            		<h4 style="color: #2f55d4" id="today">'.date("d M Y", strtotime($datenow)).'</h4>
            </div>
            <div>
                    <div class="ps-5 pe-5 accordion-body text-muted bg-white" id="jetty3regist">
	                    <div class="mb-2"><img src="images/shipicon.png" width="20px"><span class="ms-4">'.$row["nama_kapal"].'</span></div>
	            		<div class="mb-2"><img src="images/berthing.png" width="20px"><span style="font-size: 14px" class="ms-4">'.$row["time_start"].' - '.$row["etd"].'</span></div>
            		</div>
            </div>
			';	
			}
		}else{
			echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
		}
	}
} 
