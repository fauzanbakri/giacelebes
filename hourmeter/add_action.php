<?php
include 'config.php';
$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$merk = $_POST['merk'];
$capasity = $_POST['description'];
$weight = $_POST['weight'];
$condition = $_POST['condition'];
$inphour = $_POST['time_hour']*60;
$inpminute = $_POST['time_minute'];
$notiftime = $inphour + $inpminute;
$inphour2 = $_POST['time_hour2']*60;
$inpminute2 = $_POST['time_minute2'];
$notiftime2 = $inphour2 + $inpminute2;
$inphour3 = $_POST['time_hour3']*60;
$inpminute3 = $_POST['time_minute3'];
$notiftime3 = $inphour3 + $inpminute3;
$inphour4 = $_POST['time_hour4']*60;
$inpminute4 = $_POST['time_minute4'];
$notiftime4 = $inphour4 + $inpminute4;
// if(isset($_POST['sbm'])){
    $folder = './photo/';
    $img_name = $_FILES['engine_image']['name'];
    $img_src = $_FILES['engine_image']['tmp_name'];
    //$img_ext = strtolower(end(explode('.', $img_name)));
    $img_ext = substr(strrchr($img_name, '.'), 1);
    $new_name = $id.'.'.$img_ext;
    $img_size = $_FILES['engine_image']['size'];
    $valid_ext = array('jpg', 'jpeg', 'png' );
    $max_size = 1024 * 200;

    if(in_array($img_ext, $valid_ext)){
        if($img_size <= $max_size){
            move_uploaded_file($img_src, $folder.$new_name);
            $q = $con->query("INSERT INTO hour_data 
            (id, name, merk, engine_description, weight, engine_condition, engine_picture, time_notification, notif, time_diaphgrams, notif_diaphgrams, time_oil, notif_oil, time_screw, notif_screw, status, type) 
            VALUES 
            ('$id', '$name', '$merk', '$capasity', '$weight', '$condition', '$new_name', '$notiftime','', '$notiftime2','', '$notiftime3','', '$notiftime4','','OFF','$type')");
            if($q){
                // header("location:index.php");
                // $con->query("INSERT INTO warming 
                // (id_alat, notif_mon, notif_wed, notif_fri) 
                // VALUES 
                // ('$id', 
                // CONCAT(DATE_ADD(CURDATE(), INTERVAL (9 - IF(DAYOFWEEK(CURDATE()) <=2, (7 + DAYOFWEEK(CURDATE())), DAYOFWEEK(CURDATE()))) DAY),' 10:00:00'), 
                // CONCAT(DATE_ADD(CURDATE(), INTERVAL (11 - IF(DAYOFWEEK(CURDATE()) <= 4, (7 + DAYOFWEEK(CURDATE())), DAYOFWEEK(CURDATE()))) DAY), ' 10:00:00'), 
                // CONCAT(DATE_ADD(CURDATE(), INTERVAL (13 - IF(DAYOFWEEK(CURDATE()) <= 6, (7 + DAYOFWEEK(CURDATE())), DAYOFWEEK(CURDATE()))) DAY),' 10:00:00'));");
                $con->query("INSERT INTO status_engine (id, timestamp, start_engine) VALUES ('$id', '0000-00-00 00:00:00
', 'OFF');");
                echo "ok";
            }else{
                echo 'failed';
                }
        }else{
            echo 'max image size 200kb';
        }
    }else{
        echo 'invalid image extensions';
    }     

// }

// $id = $_POST['id'];
// $name = $_POST['name'];
// $q = $con->query("INSERT INTO hour_data (id, name, timerun) VALUES ('$id', '$name', '')");

// if($q){
//     header("location:index.php");
// }
?>