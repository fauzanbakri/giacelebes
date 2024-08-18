<?php
include 'config.php';
$id = $_GET['id'];

$q = "SELECT * FROM status_engine WHERE id = '$id'";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($result);

echo $row['start_engine'];

?>