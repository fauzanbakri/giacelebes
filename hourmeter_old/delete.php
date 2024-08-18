<?php 
include 'config.php';
$id = $_POST['id'];
$q = $con->query("DELETE FROM hour_data WHERE id ='$id'");
if($q){
    echo 'success';
}
?>