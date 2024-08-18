<?php
include "config.php";
$id = $_GET['id'];
$time = $_GET['time'];
$date = $_GET['date'];
//$date = str_replace(".", ":", $datea);
$minute = $time%60;
$hour = intval($time/60);
$a = '+'.$hour.' hour +'.$minute.' minutes';
$dateend = date('Y-m-d H:i', strtotime($a,strtotime($date)));

//$q = $con->query("UPDATE hour_data SET timerun=timerun+'$time' WHERE id='$id'");
$q = $con->query("INSERT INTO data_history (id_alat, start_datetime, end_datetime, total_runtime) 
VALUE('$id', '$date', '$dateend', '$time') ");
$q2 = $con->query("INSERT INTO all_history (id_alat, start_datetime, end_datetime, total_runtime) 
VALUE('$id', '$date', '$dateend', '$time') ");
if($q){
    echo "ok";
}
?>