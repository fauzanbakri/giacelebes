<?php
include 'config.php';
$id = $_POST['id'];
$prev = $_POST['prev'];
$plan1 = $_POST['plan'];
$q = $con->query("SELECT id FROM hour_data WHERE id='$id'");
$plan = date("Y-m-d", strtotime($plan1));
// echo mysqli_num_rows($q); die();
if(mysqli_num_rows($q)>0){
    $con->query("INSERT INTO preventive (id_prev, id_alat, prev_name, plan_date, notif_date, exec_date) VALUES ('', '$id', '$prev', '$plan', '$plan', '0000-00-00')");
    echo 'ok';
}else{
    echo 'bad';
}
?>