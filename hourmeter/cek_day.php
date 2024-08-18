<?php
include 'config.php';
$id = $_POST['id'];
$day = $_POST['day'];
$q = $con->query("SELECT day FROM warming WHERE id_alat='$id' AND day='$day'");
// echo $id;
if(mysqli_num_rows($q)>0){
    echo "bad";
}else{
    echo "ok";
}
?>