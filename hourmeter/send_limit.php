<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include 'config.php';
$q3 = $con->query("SELECT email FROM data_email");
$q = $con->query("SELECT * FROM hour_data");
foreach($q as $row){
    // echo $row['id'];
$q2 = $con->query("SELECT SUM(total_runtime) AS a FROM all_history WHERE id_alat='$row[id]'");
$r = $q2 -> fetch_assoc();
$minute = $r['a'] % 60;
$hour = intval($r['a'] / 60);
$minute1 = $row['time_notification'] % 60;
$hour1 = intval($row['time_notification'] / 60);
echo 'tes';

//NOTIF PIPA
    if($r['a']>$row['time_notification'] && $row['notif']=='0'){
        
        $response = false;  
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'port.makassar@gmail.com';
        $mail->Password = 'uskesfhotjknqzrr';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        $mail->setFrom('admin@sisemocs.com', '');
        $mail->addReplyTo('port.makassar@gmail.com', '');
        foreach($q3 as $row3){
            $mail->addAddress($row3['email']);
        }
        $mail->Subject = 'Time Limit Reached';
        $mail->isHTML(true);
        $mail->Body =
        //start
        '<html>
        <head>
        <style>
        table, th, td {
          border: 0px solid black;
          border-collapse: collapse;
          position: center;
          font-size: 20px;
          color:black;
        }
        table.center {
          margin-left: auto; 
          margin-right: auto;
        }
        
        p{
            color:black;
        }
        h4{
            color:white;
        }
        
        img{
        height: 150px;
        width: 200px;
        }
        
        .table_engine {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          position: center;
        }
        .td_engine {
          text-align: left;
          color:black;
          
        }
        </style>
        </head>
        
        <body>
        <table style="width:100%">
          <thead style="background-color:#007bff">
          <tr>
          <td colspan = "4"><h2 style="color:white"><b><center>Hour Meter Notification</center></b></h2></td>
          </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan = "3"><p>Dear Admin Hour Meter</p></td>
            </tr>
            
            <tr>
              <td colspan = "3"><p>Kami mengirimkan pemberitahuan ini untuk mengingatkan anda bahwa mesin di bawah ini telah mencapai batas waktu pengoperasian</p></td>
            </tr>    
          </tbody>
         </table>
         
        <table class="center table_engine">
          <tr>
            <th rowspan="6"><img src="sisemocs.com/hourmeter/photo/'.$row['engine_picture'].'"></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td class="td_engine">ID</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['id'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Engine Name</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['name'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Merk</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['merk'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Total Runtime</td>
            <td class="td_engine">:</td>
            <td><b>'.$hour.'h '.$minute.'m</b></td>
          </tr>
          <tr>
            <td class="td_engine">Limit Runtime</td>
            <td class="td_engine">:</td>
            <td style="color:red"><b>'.$hour1.'h '.$minute1.'m</b></td>
          </tr>  
        </table>
        
        <table width= 100%>
            <thead>
              <tr >
                <td colspan = "4"><p><b>Action:</b> Check the accumulator inflation pressure (when present). Check the water intake circuit is intact.Check the pump is securely fastened to the structure of the machine that incorporates the pump.</p></td>
              </tr>
          </thead>
        </table>
        
        <table width= 100%>
            <thead>
              <tr>
                <td colspan="3" style="background-color:#007bff"><center>
                <h4 style="color:white, height:25px">~ Terimakasih ~</a></h4>
              </td>
          </thead>
        </table>
        </body>
        </html>
        ';
        //end

        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
            echo $row['id'];
            // $q=$con->query("UPDATE hour_data SET notif=1 WHERE id='$row[id]'");
            $q2=$con->query("UPDATE hour_data SET time_notification = '$row[time_notification]' + 3000 WHERE id='$row[id]'");
        }
        $mail->clearAddresses();
        $mail->clearAttachments();
    } 
    
    //NOTIF DIAFGRAFMA
    if($r['a']>$row['time_diaphgrams'] && $row['notif_diaphgrams']=='0'){
      $response = false;  
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host     = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'port.makassar@gmail.com';
      $mail->Password = 'uskesfhotjknqzrr';
      $mail->SMTPSecure = 'ssl';
      $mail->Port     = 465;
      $mail->setFrom('admin@sisemocs.com', '');
      $mail->addReplyTo('port.makassar@gmail.com', '');
      foreach($q3 as $row3){
          $mail->addAddress($row3['email']);
      }
      $mail->Subject = 'Diaphgrams Time Limit Reached';
      $mail->isHTML(true);
      $mail->Body =
      //start
      '<html>
        <head>
        <style>
        table, th, td {
          border: 0px solid black;
          border-collapse: collapse;
          position: center;
          font-size: 20px;
          color:black;
        }
        table.center {
          margin-left: auto; 
          margin-right: auto;
        }
        
        p{
            color:black;
        }
        h4{
            color:white;
        }
        
        img{
        height: 150px;
        width: 200px;
        }
        
        .table_engine {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          position: center;
        }
        .td_engine {
          text-align: left;
          color:black;
          
        }
        </style>
        </head>
        
        <body>
        <table style="width:100%">
          <thead style="background-color:#007bff">
          <tr>
          <td colspan = "4"><h2 style="color:white"><b><center>Hour Meter Notification</center></b></h2></td>
          </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan = "3"><p>Dear Admin Hour Meter</p></td>
            </tr>
            
            <tr>
              <td colspan = "3"><p>Kami mengirimkan pemberitahuan ini untuk mengingatkan anda bahwa mesin di bawah ini telah mencapai batas waktu pengoperasian</p></td>
            </tr>    
          </tbody>
         </table>
         
        <table class="center table_engine">
          <tr>
            <th rowspan="7"><img src="sisemocs.com/hourmeter/photo/'.$row['engine_picture'].'"></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td class="td_engine">ID</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['id'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Engine Name</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['name'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Merk</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['merk'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Total Runtime</td>
            <td class="td_engine">:</td>
            <td style="color:blue"><b>'.$r['a'].'</b></td>
          </tr>
          <tr>
            <td class="td_engine">Limit Runtime</td>
            <td class="td_engine">:</td>
            <td style="color:red"><b>'.$row['time_diaphgrams'].'</b></td>
          </tr>
          <tr>
            <td class="td_engine">Action</td>
            <td class="td_engine">:</td>
            <td style="color:red"><b>Check Diaphgrams</b></td>
          </tr>  
        </table>
            
        <table width= 100%>
            <thead>
              <tr >
                <td colspan = "4"><p>Silakan kunjungi https://sisemocs.com/ untuk reset waktu pengoperasian mesin. 
                Anda juga dapat menambah batas waktu pengoperasian mesin jika tidak ingin reset mesin. Mohon untuk 
                <b>mengaktifkan kembali status notifikasi</b> setelah mengatur waktu pengoperasian mesin agar kami dapat 
                mengirimkan pemberitahuan setelah waktu pengoperasian mesin tercapai.</p></td>
              </tr>
          </thead>
        </table>
        <table width= 100%>
            <thead>
              <tr>
                <td colspan="3" style="background-color:#007bff"><center>
                <h4 style="color:white, height:25px">~ Terimakasih ~</a></h4>
              </td>
          </thead>
        </table>
        </body>
        </html>
      ';
      //end

      if(!$mail->send()){
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
          echo 'Message has been sent';
          echo $row['id'];
          $q=$con->query("UPDATE hour_data SET notif_diaphgrams=1 WHERE id='$row[id]'");
      }
      $mail->clearAddresses();
      $mail->clearAttachments();
    }
    
    //NOTIF OIL
    if($r['a']>$row['time_oil'] && $row['notif_oil']=='0'){
      $response = false;  
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host     = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'port.makassar@gmail.com';
      $mail->Password = 'uskesfhotjknqzrr';
      $mail->SMTPSecure = 'ssl';
      $mail->Port     = 465;
      $mail->setFrom('admin@sisemocs.com', '');
      $mail->addReplyTo('port.makassar@gmail.com', '');
      foreach($q3 as $row3){
          $mail->addAddress($row3['email']);
      }
      $mail->Subject = 'Oil Time Limit Reached';
      $mail->isHTML(true);
      $mail->Body =
      //start
      '<html>
        <head>
        <style>
        table, th, td {
          border: 0px solid black;
          border-collapse: collapse;
          position: center;
          font-size: 20px;
          color:black;
        }
        table.center {
          margin-left: auto; 
          margin-right: auto;
        }
        
        p{
            color:black;
        }
        h4{
            color:white;
        }
        
        img{
        height: 150px;
        width: 200px;
        }
        
        .table_engine {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          position: center;
        }
        .td_engine {
          text-align: left;
          color:black;
          
        }
        </style>
        </head>
        
        <body>
        <table style="width:100%">
          <thead style="background-color:#007bff">
          <tr>
          <td colspan = "4"><h2 style="color:white"><b><center>Hour Meter Notification</center></b></h2></td>
          </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan = "3"><p>Dear Admin Hour Meter</p></td>
            </tr>
            
            <tr>
              <td colspan = "3"><p>Kami mengirimkan pemberitahuan ini untuk mengingatkan anda bahwa mesin di bawah ini telah mencapai batas waktu pengoperasian</p></td>
            </tr>    
          </tbody>
         </table>
         
        <table class="center table_engine">
          <tr>
            <th rowspan="7"><img src="sisemocs.com/hourmeter/photo/'.$row['engine_picture'].'"></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td class="td_engine">ID</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['id'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Engine Name</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['name'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Merk</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['merk'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Total Runtime</td>
            <td class="td_engine">:</td>
            <td style="color:blue"><b>'.$r['a'].'</b></td>
          </tr>
          <tr>
            <td class="td_engine">Limit Runtime</td>
            <td class="td_engine">:</td>
            <td style="color:red"><b>'.$row['time_oil'].'</b></td>
          </tr>
          <tr>
            <td class="td_engine">Action</td>
            <td class="td_engine">:</td>
            <td style="color:red"><b>Check Oil</b></td>
          </tr>  
        </table>
            
        <table width= 100%>
            <thead>
              <tr >
                <td colspan = "4"><p>Silakan kunjungi https://sisemocs.com/ untuk reset waktu pengoperasian mesin. 
                Anda juga dapat menambah batas waktu pengoperasian mesin jika tidak ingin reset mesin. Mohon untuk 
                <b>mengaktifkan kembali status notifikasi</b> setelah mengatur waktu pengoperasian mesin agar kami dapat 
                mengirimkan pemberitahuan setelah waktu pengoperasian mesin tercapai.</p></td>
              </tr>
          </thead>
        </table>
        <table width= 100%>
            <thead>
              <tr>
                <td colspan="3" style="background-color:#007bff"><center>
                <h4 style="color:white, height:25px">~ Terimakasih ~</a></h4>
              </td>
          </thead>
        </table>
        </body>
        </html>
      ';
      //end

      if(!$mail->send()){
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
          echo 'Message has been sent';
          echo $row['id'];
          $q=$con->query("UPDATE hour_data SET notif_oil=1 WHERE id='$row[id]'");
      }
      $mail->clearAddresses();
      $mail->clearAttachments();
    }
    if ($r['a']>$row['time_screw'] && $row['notif_screw']=='0'){
      $response = false;  
      $mail = new PHPMailer();
      $mail->isSMTP();
      $mail->Host     = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'port.makassar@gmail.com';
      $mail->Password = 'uskesfhotjknqzrr';
      $mail->SMTPSecure = 'ssl';
      $mail->Port     = 465;
      $mail->setFrom('admin@sisemocs.com', '');
      $mail->addReplyTo('port.makassar@gmail.com', '');
      foreach($q3 as $row3){
          $mail->addAddress($row3['email']);
      }
      $mail->Subject = 'Screw Time Limit Reached';
      $mail->isHTML(true);
      $mail->Body =
      //start
      '<html>
        <head>
        <style>
        table, th, td {
          border: 0px solid black;
          border-collapse: collapse;
          position: center;
          font-size: 20px;
          color:black;
        }
        table.center {
          margin-left: auto; 
          margin-right: auto;
        }
        
        p{
            color:black;
        }
        h4{
            color:white;
        }
        
        img{
        height: 150px;
        width: 200px;
        }
        
        .table_engine {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
          position: center;
        }
        .td_engine {
          text-align: left;
          color:black;
          
        }
        </style>
        </head>
        
        <body>
        <table style="width:100%">
          <thead style="background-color:#007bff">
          <tr>
          <td colspan = "4"><h2 style="color:white"><b><center>Hour Meter Notification</center></b></h2></td>
          </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan = "3"><p>Dear Admin Hour Meter</p></td>
            </tr>
            
            <tr>
              <td colspan = "3"><p>Kami mengirimkan pemberitahuan ini untuk mengingatkan anda bahwa mesin di bawah ini telah mencapai batas waktu pengoperasian</p></td>
            </tr>    
          </tbody>
         </table>
         
        <table class="center table_engine">
          <tr>
            <th rowspan="7"><img src="sisemocs.com/hourmeter/photo/'.$row['engine_picture'].'"></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td class="td_engine">ID</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['id'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Engine Name</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['name'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Merk</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['merk'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Total Runtime</td>
            <td class="td_engine">:</td>
            <td style="color:blue"><b>'.$r['a'].'</b></td>
          </tr>
          <tr>
            <td class="td_engine">Limit Runtime</td>
            <td class="td_engine">:</td>
            <td style="color:red"><b>'.$row['time_screw'].'</b></td>
          </tr>
          <tr>
            <td class="td_engine">Action</td>
            <td class="td_engine">:</td>
            <td style="color:red"><b>Check Screw</b></td>
          </tr>  
        </table>
            
        <table width= 100%>
            <thead>
              <tr >
                <td colspan = "4"><p>Silakan kunjungi https://sisemocs.com/ untuk reset waktu pengoperasian mesin. 
                Anda juga dapat menambah batas waktu pengoperasian mesin jika tidak ingin reset mesin. Mohon untuk 
                <b>mengaktifkan kembali status notifikasi</b> setelah mengatur waktu pengoperasian mesin agar kami dapat 
                mengirimkan pemberitahuan setelah waktu pengoperasian mesin tercapai.</p></td>
              </tr>
          </thead>
        </table>
        <table width= 100%>
            <thead>
              <tr>
                <td colspan="3" style="background-color:#007bff"><center>
                <h4 style="color:white, height:25px">~ Terimakasih ~</a></h4>
              </td>
          </thead>
        </table>
        </body>
        </html>
      ';
      //end

      if(!$mail->send()){
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      }else{
          echo 'Message has been sent';
          echo $row['id'];
          $q=$con->query("UPDATE hour_data SET notif_screw=1 WHERE id='$row[id]'");
      }
      $mail->clearAddresses();
      $mail->clearAttachments();
    }
}
    
?>