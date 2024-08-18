<?php
include 'config.php';
$id = $_POST['id'];
$name = $_POST['name'];
$merk = $_POST['merk'];
$capacity = $_POST['description'];
$weight = $_POST['weight'];
$condition = $_POST['condition'];
$status;
if(isset($_POST['status-checkbox'])){
    $status = 0;
}else{
    $status = 1;
}
$status2;
if(isset($_POST['status-checkbox2'])){
    $status2 = 0;
}else{
    $status2 = 1;
}
$status3;
if(isset($_POST['status-checkbox3'])){
    $status3 = 0;
}else{
    $status3 = 1;
}
$status4;
if(isset($_POST['status-checkbox4'])){
    $status4 = 0;
}else{
    $status4 = 1;
}
// echo $status; die();
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

$old_img = $_POST['old_image'];
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

if($img_name){
    //script Lama
    if(in_array($img_ext, $valid_ext)){
        if($img_size <= $max_size){
            unlink('photo/'.$old_img);

            move_uploaded_file($img_src, $folder.$new_name);
            $q = $con->query("UPDATE hour_data SET 
                        name = '$name',
                        merk = '$merk',
                        engine_description = '$capacity',
                        weight = '$weight',
                        engine_condition = '$condition',
                        engine_picture = '$new_name', 
                        time_notification = '$notiftime',
                        time_diaphgrams = '$notiftime2',
                        time_oil = '$notiftime3',
                        time_screw = '$notiftime4'
                        WHERE id = '$id'");
            if($q){
                echo "ok";
                // header("location:index.php");
            }else{
                echo 'failed';
                }
        }else{
            echo 'max image size 200kb';
        }
    }else{
        echo 'invalid image extensions';
    } 
    //End Script Lama
}else{
    $q = $con->query("UPDATE hour_data SET 
                        id ='$id', 
                        name = '$name',
                        merk = '$merk',
                        engine_description = '$capacity',
                        weight = '$weight',
                        engine_condition = '$condition',
                        time_notification = '$notiftime',
                        notif = '$status',
                        time_diaphgrams = '$notiftime2',
                        notif_diaphgrams = '$status2',
                        time_oil = '$notiftime3',
                        notif_oil = '$status3',
                        time_screw = '$notiftime4',
                        notif_screw = '$status4'
                        WHERE id = '$id'");
            if($q){
                // header("location:index.php");
                echo "ok";
            }else{
                echo 'failed';
            }
}
?>