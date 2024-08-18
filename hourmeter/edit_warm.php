<?php
include 'config.php';
$id_warm = $_POST['id_warm'];
$id = $_POST['id'];
$day = $_POST['day'];
$time = $_POST['time'];

if($day!="" && $id!=""){
   $q = $con->query("UPDATE warming SET id_alat = '$id', day = '$day', time = '$time', exec_time = '$time' WHERE id = '$id_warm'");
        if($q){
            echo 'ok';
            // header("location:index.php");
        }else{
            echo 'failed';
            } 
}else{
    echo 'failed';
}

?>