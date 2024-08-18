<?php
include 'config.php';
$email = $_POST['email'];
$q = $con->query("SELECT email FROM data_email WHERE email='$email'");
if(mysqli_num_rows($q)>0){
echo'bad';
}else{
    $con->query("INSERT INTO data_email (id, email) VALUES ('', '$email')");
    echo 'ok';
}
?>