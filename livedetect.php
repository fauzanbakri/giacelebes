<?php
include 'conn.php';
$i = $_GET['i'];
$q = "select name from device order by abs(ampere - ".$i.") limit 1;";

if($i<0.2){
    $d = "No Device";
}else{
    $result = $conn->query($q);
    $d = $result->fetch_assoc()['name'];
}
echo $d;
?>