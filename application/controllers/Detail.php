<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {
  public function index()
  {
    if($_SESSION['role']!=3){
      header("location:login");
    }
    // $this->load->view('header');
    $data['data'] = $this->db->query(
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
    $this->load->view('detail', $data);
    // $this->load->view('footer');
  }
  public function download(){
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_All.xls");
$data = $this->db->query(
    "select id_booking as id_jetty, etd, name as user, time_start as etb, time_end as etc, ship_name, tujuan, nominasi_loading, request_tambahan, loading_product, '-' as ATA, '-' as last_port, '-' as next_port, '-' as cargo, '-' as bunker, '-' as remarks, status, 'Jetty 3' as src
    from booking, user WHERE booking.id_user=user.id_user
    union all
    select id_jetty, etd, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Jetty 2' as src
    from jetty2 where status!=2
    union all
    select id_jetty, etd, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Jetty 1' as src
    from jetty1 where status!=2
    union all
    select id as id_jetty, ATD as etd, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Vessel Activity' as src
    from next_berth;"
    );
  echo '
  <table border="1">
    <tr>
          <th>Jetty</th>
          <th>Ship Name</th>
          <th>Nama PT</th>
          <th>ATA</th>
          <th>Berthed</th>
          <th>Completed</th>
          <th>Departure</th>
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
        echo '<td>'.$row->ATA.'</td>';
        echo '<td>'.$row->etb.'</td>';
        echo '<td>'.$row->etc.'</td>';
        echo '<td>'.$row->etd.'</td>';
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

public function downloadjetty1(){
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Jetty1.xls");
$data = $this->db->query(
    "select id_jetty, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Jetty 1' as src
    from jetty1;"// where status!=2;"
    );
  echo '
  <table border="1">
    <tr>
        <th>Jetty</th>
        <th>Ship Name</th>
        <th>Nama PT</th>
        <th>ATA</th>
        <th>Berthed</th>
        <th>Completed</th>
        <th>Departure</th>
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
          echo '<td>'.$row->ATA.'</td>';
          echo '<td>'.$row->etb.'</td>';
          echo '<td>'.$row->etc.'</td>';
          echo '<td>'.$row->etd.'</td>';
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
            }else if($row->status==3 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
              echo '<td> Selesai </td>';
            }else if($row->status==4 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
              echo '<td> Incoming </td>';
            }
         echo "</tr>";
  }

  echo '</table>';
  }
  public function downloadjetty2(){
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Jetty2.xls");
$data = $this->db->query(
    "select id_jetty, '-' as user,  berthed as etb, etc, nama_kapal as ship_name, '-' as tujuan, '-' as nominasi_loading, '-' request_tambahan, '-' as loading_product, ATA, last_port, next_port, cargo, bunker, remarks, status, 'Jetty 2' as src
    from jetty2;"// where status!=2;"
    );
  echo '
  <table border="1">
    <tr>
        <th>Jetty</th>
        <th>Ship Name</th>
        <th>Nama PT</th>
        <th>ATA</th>
        <th>Berthed</th>
        <th>Completed</th>
        <th>Departure</th>
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
          echo '<td>'.$row->ATA.'</td>';
          echo '<td>'.$row->etb.'</td>';
          echo '<td>'.$row->etc.'</td>';
          echo '<td>'.$row->etd.'</td>';
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
            }else if($row->status==3 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
              echo '<td> Selesai </td>';
            }

         echo "</tr>";
  }

  echo '</table>';
  }
  public function downloadjetty3(){
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Jetty3.xls");
$data = $this->db->query(
    "select id_booking as id_jetty, name as user, time_start as etb, time_end as etc, ship_name, tujuan, nominasi_loading, request_tambahan, loading_product, '-' as ATA, '-' as last_port, '-' as next_port, '-' as cargo, '-' as bunker, '-' as remarks, status, 'Jetty 3' as src
    from booking, user WHERE booking.id_user=user.id_user"
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
            }else if($row->status==2 AND $row->src=='Jetty 2' OR $row->src=='Jetty 1'){
              echo '<td> Queued List </td>';
            }else if($row->status==1 AND $row->src=='Jetty 2' OR $row->src=='Jetty 1'){
              echo '<td>At Jetty</td>';
            }else if($row->status==0 AND $row->src=='Jetty 2' OR $row->src=='Jetty 1'){
              echo '<td> Next Berthing </td>';
            }

         echo "</tr>";
  }

  echo '</table>';
  }
  public function back(){
		$id = $_GET['id'];
		$q = $this->db->query("UPDATE booking set status=1 WHERE id_booking='$id'");
    header('location: ../ListBooking3');
  }
}
