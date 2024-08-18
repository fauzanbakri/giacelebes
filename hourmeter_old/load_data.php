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
$q = $con->query("SELECT * FROM hour_data");
echo '
    <thead>
        <tr>
        <th>No</th>
        <th>ID</th>
        <th>Name</th>
        <th>Time Run</th>
        <th '.$hide1.'>Action</th>
        </tr>
    </thead>
';
$no=1;
foreach($q as $row){
    $minute=$row['timerun']%60;
    $hour=intval($row['timerun']/60);
    echo '
        <tbody>        
        <tr>
        <td><center>'.$no.'</td>
        <td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td><center>'.$hour.'h '.$minute.'m</td>
        <td '.$hide1.'><center><a class="btn btn-primary" onclick="reset('.'\''.$row["id"].'\''.')"><i class="fas fa-sync-alt"></i></a>
        <a class="btn btn-danger" onclick="deletee('.'\''.$row["id"].'\''.')"><i class="fas fa-trash"></i></a></td>
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
        <th '.$hide1.'>Action</th>
        </tr>
        </tfoot>
';
?>