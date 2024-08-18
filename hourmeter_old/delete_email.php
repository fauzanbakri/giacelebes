<?php
include 'config.php';
$email = $_POST['email'];
$q = $con->query("DELETE FROM data_email WHERE email='$email'");
if($q){
echo 'success';
}
?>