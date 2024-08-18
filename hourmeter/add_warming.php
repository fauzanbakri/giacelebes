<?php
include 'config.php';
$id = $_POST['id'];
$day = $_POST['day'];
$time = $_POST['time'];
$q = $con->query("SELECT id FROM hour_data WHERE id='$id'");
// echo mysqli_num_rows($q); die();
if(mysqli_num_rows($q)>0 && $day!="" && $time!=""){
    $con->query("INSERT INTO warming (id, id_alat, day, time, exec_time) VALUES ('', '$id', '$day', '$time', '$time')");
    echo 'ok';
}else{
    echo 'bad';
}
?>