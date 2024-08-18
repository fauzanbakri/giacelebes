<?php 
include 'config.php';
$username = $_POST['user'];
$pass = md5($_POST['pass']);

$q = $con->query("SELECT * FROM admin WHERE username='$username' AND password='$pass'");
$row = mysqli_fetch_assoc($q);
if(mysqli_num_rows($q)>0){
    session_start();
    $_SESSION['name'] = $row['name'];
    echo "ok";
    // echo $_SESSION['name'];
}else{
    echo "bad";
}
?>