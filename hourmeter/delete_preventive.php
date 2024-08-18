<?php 
include 'config.php';
$id = $_POST['id'];
$sql = $con->query("SELECT * FROM preventive WHERE id_prev = '$id'");
$data = $sql->fetch_assoc();

$q = $con->query("DELETE FROM preventive WHERE id_prev ='$id'");
if($q){
    echo 'success';
}
?>