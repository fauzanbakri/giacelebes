<?php 
include 'config.php';
$id = $_POST['id'];
$q = $con->query("UPDATE hour_data SET notif='' WHERE id='$id'");
if($q){
    $q2 = $con->query("DELETE FROM data_history WHERE id_alat='$id'");
    if($q2){
    echo 'ok';
    }
}
?>