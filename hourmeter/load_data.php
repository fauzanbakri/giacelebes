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
//$q = $con->query("SELECT * FROM hour_data");
$q = $con->query("SELECT 
                    hour_data.id, 
                    hour_data.name,
                    SUM(total_runtime) AS total_runtime 
                  FROM data_history 
                  RIGHT JOIN hour_data 
                  ON data_history.id_alat=hour_data.id 
                  GROUP BY hour_data.id;");
echo '
    <thead>
        <tr>
        <th>No</th>
        <th>ID</th>
        <th>Name</th>
        <th>Time Run</th>
        <th>Notification Status</th>
        <th '.$hide1.'>Action</th>
        </tr>
    </thead>
';
$no=1;
foreach($q as $row){
    $minute=$row['total_runtime']%60;
    $hour=intval($row['total_runtime']/60);
    echo '
        <tbody>        
        <tr>
        <td><center>'.$no.'</td>
        <td><center><a class="btn-xs" data-id="btn_id" onclick="detail('.'\''.$row["id"].'\''.')">'.$row['id'].'</a></td>
        <td>'.$row['name'].'</td>
        <td><center>'.$hour.'h '.$minute.'m</td>
        <td>Hello</td>
        <td '.$hide1.'><center>
          <a class="btn btn-primary" onclick="reset('.'\''.$row["id"].'\''.')"><i class="fas fa-sync-alt"></i></a>
          <a class="btn btn-danger" onclick="deletee('.'\''.$row["id"].'\''.')"><i class="fas fa-trash"></i></a>
        </td>
        </tr>
        </tbody>
';
$no++;
}
echo '
        <tfoot>
        <tr>
        <th>No</th>
        <th>ID</th>
        <th>Name</th>
        <th>Time Run</th>
        <th>Notification Status</th>
        <th '.$hide1.'>Action</th>
        </tr>
        </tfoot>
';
?>
