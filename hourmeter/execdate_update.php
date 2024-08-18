<?php
include 'config.php';
$id = $_GET['id'];
$q = $con->query("SELECT * FROM preventive WHERE id_prev='$id' AND exec_date ='0000-00-00'");
// echo $row['id_prev'];
// echo $id;
if(mysqli_num_rows($q)==0){
header('Location: https://sisemocs.com/hourmeter/exec_failed.php');
}else{
    $con->query("UPDATE preventive SET exec_date = CURDATE() WHERE id_prev=$id");
    header('Location: https://sisemocs.com/hourmeter/exec_success.php');;
}
?>