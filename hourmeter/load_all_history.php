<?php
include "config.php";
session_start();
if(isset($_SESSION['name'])){
  $hide1 = "";
  $hide2 = "hidden";
}else{
  $hide1 = "hidden";
  $hide2 = "";
}
$q = $con->query("SELECT 
    hour_data.name, 
    all_history.id_alat, 
    all_history.start_datetime, 
    all_history.end_datetime, 
    all_history.total_runtime
    FROM all_history
    RIGHT JOIN hour_data 
    ON all_history.id_alat=hour_data.id
    ORDER BY all_history.start_datetime DESC;
    ");
echo '
    <thead>
        <tr>
        <th>No</th>
        <th id="zzz">Engine ID</th>
        <th>Engine Name</th>
        <th>Start Date Time</th>
        <th>End Date Time</th>
        <th>Total Runtime</th>
        </tr>
    </thead>
';
$no=1;
foreach($q as $row){
    $minute=$row['timerun']%60;
    $hour=intval($row['timerun']/60);
    echo '
              
      <tr>
        <td><center>'.$no.'</td>
        <td>'.$row['id_alat'].'</td>
        <td>'.$row['name'].'</td>
        <td><center>'.$row['start_datetime'].'</td>
        <td><center>'.$row['end_datetime'].'</td>
        <td><center>'.$row['total_runtime'].'</td>
      </tr>
      
';
$no++;
}
echo '
      <tfoot>
        <tr>
        <th>No</th>
        <th>Engine ID</th>
        <th>Engine Name</th>
        <th>Start Date Time</th>
        <th>End Date Time</th>
        <th>Total Runtime</th>
        </tr>
      </tfoot>
';
?>