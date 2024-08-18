<?php
include 'conn.php';
$id = $_GET['id'];
$v = $_GET['v'];
$i = $_GET['i'];
$q = "INSERT INTO data (station, voltage, ampere)
VALUES ($id, $v, $i)";
$conn->query($q)
?>