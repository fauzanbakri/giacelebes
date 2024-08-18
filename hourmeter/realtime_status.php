<?php
include 'config.php';
$id = $_POST['id'];
$que ="SELECT COUNT(id) AS id from status_engine where id='".$id."' AND TIMESTAMPDIFF(MINUTE,timestamp,NOW()) < 1;";
$resu = mysqli_query($con, $que);
$r = mysqli_fetch_assoc($resu);

echo $r['id'];

?>