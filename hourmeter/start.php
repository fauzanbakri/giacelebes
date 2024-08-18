<?php
include 'config.php';
$id = $_POST['id'];

$con->query("UPDATE status_engine SET start_engine='ON' WHERE id='$id'");
echo "success";
?>