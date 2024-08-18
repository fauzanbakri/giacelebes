<?php
include "config.php";
$id = $_GET['id'];
$time = $_GET['time'];

$q = $con->query("UPDATE hour_data SET timerun=timerun+'$time' WHERE id='$id'");
if($q){
    echo "ok";
}
?>