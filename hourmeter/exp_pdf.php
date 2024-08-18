<?php
include('config.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$id = $_POST['id'];

if (isset($_POST['oil'])) {
    $oil = "V";
} else {
    $oil = "-";
}
if (isset($_POST['diap'])) {
    $diap = "V";
} else {
    $diap = "-";
}

if (isset($_POST['screw'])) {
    $screw = "V";
} else {
    $screw = "-";
}

if (isset($_POST['valve'])) {
    $valve = "V";
} else {
    $valve = "-";
}

if ($_POST['manager']==""){
    $manager = "............................";
}else{
    $manager = $_POST['manager'];
}


if (isset($_POST['rem_oil'])){
    $rem_oil = $_POST['rem_oil'];
}else{
    $rem_oil = "";
}

if (isset($_POST['rem_diap'])){
    $rem_diap = $_POST['rem_diap'];
}else{
    $rem_diap = "";
}

if (isset($_POST['rem_screw'])){
    $rem_screw = $_POST['rem_screw'];
}else{
    $rem_screw = "";
}

if (isset($_POST['rem_valve'])){
    $rem_valve = $_POST['rem_valve'];
}else{
    $rem_valve = "";
}

$query = 
"SELECT 
hour_data.id, 
hour_data.engine_picture,
hour_data.name,
hour_data.merk,
hour_data.engine_description,
hour_data.weight,
hour_data.engine_condition,
hour_data.notif,
hour_data.notif_diaphgrams,
hour_data.notif_oil,
hour_data.notif_screw,
hour_data.time_notification, 
hour_data.time_diaphgrams,
hour_data.time_oil,
hour_data.time_screw,
hour_data.status,
SUM(total_runtime) AS total_runtime  
FROM all_history 
RIGHT JOIN hour_data 
ON all_history.id_alat=hour_data.id WHERE id='".$id."'
GROUP BY hour_data.id;";
$res = mysqli_query($con, $query);
$rows = mysqli_fetch_assoc($res);
$minute = $rows['total_runtime'] % 60;
$hour = intval($rows['total_runtime'] / 60);

$q = "SELECT * FROM hour_data WHERE id = '$id'";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($result);

$html = "<html>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

img {
    position:fixed;
    right:0;
    top:0;
    margin:0;
    padding:0;
    width:15%;
}

.b1 {
    position:fixed;
    right:50;
    bottom:230;
    margin:0;
    padding:0;
    width:15%;
}
</style>";
$html .= '
<img width="300px" src="photo/pertamina-kontinental.png">
<center><h3>Check List Perawatan '.$rows["name"].'</h3></center><br/><br/><h5>PORT MAKASSAR</h5>
';
$html .= '<table border="1" width="100%">
 <tr>
 <th width="180px" bgcolor="#ACB9CA"><center>Total Run</th>
 <th width="180px" bgcolor="#ACB9CA"><center>Limit For Maintenance</th>
 <th width="180px" bgcolor="#ACB9CA"><center>Date</th>
 <th width="150px" bgcolor="#ACB9CA"><center>Interval Maintenance</th>
 <th width="100px" bgcolor="#ACB9CA"><center>Action</th>
 <th bgcolor="#ACB9CA"><center>Keterangan</th>
 <th width="100px" bgcolor="#ACB9CA"><center>Paraf Pemeriksa</th>
 </tr>
 
 <tr>
 <td><center>'.$hour.' Jam '.$minute.' Menit</td>
 <td><center>'.intval($row["time_notification"] / 60).' Jam '.intval($row["time_oil"]%60).' Menit</td>
 <td><center>'.date("d/m/Y").'</td>
 <td bgcolor="#ACB9CA"><center>Check Accumulator Inflation Pressure</td>
 <td><center><b>'.$oil.'</b></td>
 <td><center>'.$rem_oil.'</td>
 <td><center></td>
 </tr>
 
 <tr>
 <td><center>'.$hour.' Jam '.$minute.' Menit</td>
 <td><center>'.intval($row["time_notification"] / 60).' Jam '.intval($row["time_diaphgrams"]%60).' Menit</td>
 <td><center>'.date("d/m/Y").'</td>
 <td bgcolor="#ACB9CA"><center>Check Water Intake Circuit is Intact</td>
 <td><center><b>'.$diap.'</b></td>
 <td><center>'.$rem_diap.'</td>
 <td></td>
 </tr>
 
 <tr>
 <td><center>'.$hour.' Jam '.$minute.' Menit</td>
 <td><center>'.intval($row["time_notification"] / 60).' Jam '.intval($row["time_notification"] % 60).' Menit</td>
 <td><center>'.date("d/m/Y").'</td>
 <td bgcolor="#ACB9CA"><center>Check Pump Is Securely Fastened to The Structure of Machine</td>
 <td><center><b>'.$valve.'</b></td>
 <td><center>'.$rem_valve.'</td>
 <td></td>
 </tr>
 </table>
 <br>
 <div class=b1>
 Mengetahui, <br>
 Makassar, '.date("d/m/Y").' <br>
 Port Manager Makassar <br><br><br><br><br>
 '.$manager.'

 <div>
 ';
 
// $no = 1;
// while($row = mysqli_fetch_array($query))
// {
//  $html .= "<tr>
//  <td>".$no."</td>
//  <td>".$row['nama']."</td>
//  <td>".$row['kelas']."</td>
//  <td>".$row['alamat']."</td>
//  </tr>";
//  $no++;
// }
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
// echo $html;
$dompdf->stream('export.pdf');
?>