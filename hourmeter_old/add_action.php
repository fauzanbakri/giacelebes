<?php
include 'config.php';
$id = $_POST['id'];
$name = $_POST['name'];
$q = $con->query("INSERT INTO hour_data (id, name, timerun) VALUES ('$id', '$name', '')");

if($q){
    header("location:index.php");
}
?>