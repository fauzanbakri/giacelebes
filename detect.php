<?php
include 'conn.php';
$i1 = $_GET['i1'];
$i2 = $_GET['i2'];
$i3 = $_GET['i3'];
$i4 = $_GET['i4'];
$q1 = "select name from device order by abs(ampere - ".$i1.") limit 1;";
$q2 = "select name from device order by abs(ampere - ".$i2.") limit 1;";
$q3 = "select name from device order by abs(ampere - ".$i3.") limit 1;";
$q4 = "select name from device order by abs(ampere - ".$i4.") limit 1;";

$result1 = $conn->query($q1);
$result2 = $conn->query($q2);
$result3 = $conn->query($q3);
$result4 = $conn->query($q4);

if($i1<0.2){
    $d11 = "No Device";
}else{
    $d11 = $result1->fetch_assoc()['name'];
}

if($i2<0.2){
    $d22 = "No Device";
}else{
    $d22 = $result2->fetch_assoc()['name'];
}

if($i3<0.2){
    $d33 = "No Device";
}else{
    $d33 = $result3->fetch_assoc()['name'];
}

if($i4<0.2){
    $d44 = "No Device";
}else{
    $d44 = $result1->fetch_assoc()['name'];
}

$d1 = str_replace(' ', '%20', $d11);
$d2 = str_replace(' ', '%20', $d22);
$d3 = str_replace(' ', '%20', $d33);
$d4 = str_replace(' ', '%20', $d44);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://sisemocs.com/Jetty3/tesmail?sub=List%20Device%20Terpasang&cont=Relay%201=%20".$d1.",%20%20Relay%202=%20".$d2.",%20%20Relay%203=%20".$d3.",%20%20Relay%204=%20".$d4);

// curl_setopt($ch, CURLOPT_URL, "https://sisemocs.com/Jetty3/tesmail?sub=asdasd&cont=aaa");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
curl_close($ch);      
echo $output;

// echo $d1."\n".$d2."\n".$d3."\n".$d4;
?>