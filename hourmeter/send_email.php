<?php
include 'config.php';
$id = $_GET['id'];

$con->query("UPDATE status_engine SET timestamp=NOW() WHERE id='$id'");

?>