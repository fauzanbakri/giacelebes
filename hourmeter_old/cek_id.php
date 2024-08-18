<?php
include 'config.php';
$id = $_POST['id'];
$q = $con->query("SELECT id FROM hour_data WHERE id='$id'");
// echo $id;
if(mysqli_num_rows($q)>0){
    echo "bad";
}else{
    echo "ok";
}
?>