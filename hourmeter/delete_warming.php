<?php 
include 'config.php';
$id = $_POST['id'];
$sql = $con->query("SELECT * FROM warming WHERE id = '$id'");
$data = $sql->fetch_assoc();

$q = $con->query("DELETE FROM warming WHERE id ='$id'");
if($q){
    echo 'success';
}
?>