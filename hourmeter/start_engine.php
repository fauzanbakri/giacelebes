<?php
include 'config.php';
$id = $_GET['id'];

$con->query("UPDATE status_engine SET start_engine='OFF' WHERE id='$id'");

?>