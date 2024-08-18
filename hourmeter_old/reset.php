<?php 
include 'config.php';
$id = $_POST['id'];
$q = $con->query("UPDATE hour_data SET timerun='' WHERE id='$id'");
if($q){
    echo 'ok';
}
?>