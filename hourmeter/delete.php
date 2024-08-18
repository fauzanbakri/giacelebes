<?php 
include 'config.php';
$id = $_POST['id'];
$sql = $con->query("SELECT * FROM hour_data WHERE id = '$id'");
$data = $sql->fetch_assoc();
$img_name = $data['engine_picture'];

if(file_exists("./photo/$img_name")){
    unlink("./photo/$img_name");
}

$q = $con->query("DELETE FROM hour_data WHERE id ='$id'");
if($q){
    echo 'success';
    // $con->query("DELETE FROM data_history WHERE id_alat='$id'");
    $con->query("DELETE FROM warming WHERE id_alat='$id'");
    $con->query("DELETE FROM status_engine WHERE id='$id'");
}
?>