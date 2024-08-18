<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include 'config.php';
$q3 = $con->query("SELECT email FROM data_email");
$q = $con->query("SELECT * FROM preventive");
$engine = $con->query("SELECT * FROM hour_data");
$rows = $engine -> fetch_assoc();
foreach($q as $row){
$prev_id = $row['id_prev'];
    if($row['notif_date']<= date("Y-m-d") && $row['exec_date']==='0000-00-00' ){
        echo 'hjdahsdkjsahdkjashdkjahd';
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
        $mail->Subject = 'Preventive Notification';
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
        .button {
          background-color: #4CAF50;
          border: none;
          color: white;
          padding: 10px 10px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 6px;
          cursor: pointer;
          border-radius: 12px;
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
            <td colspan = "4"><h2 style="color:white"><b><center>Preventive Notification</center></b></h2></td>
          </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan = "3"><p>Dear Admin Hour Meter</p></td>
            </tr>
            
            <tr>
              <td colspan = "3"><p>Kami mengirimkan pemberitahuan ini untuk mengingatkan anda bahwa preventive berikut telah mencapai tanggal plan pengerjaan.</p></td>
            </tr>    
          </tbody>
         </table>
         
        <table class="center table_engine">
          <tr>
            <th rowspan="10"><img src="sisemocs.com/hourmeter/photo/'.$rows['engine_picture'].'"></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td class="td_engine">ID</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$rows['id'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Engine Name</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$rows['name'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Merk</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$rows['merk'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Kapasitas</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$rows['engine_description'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Weight</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$rows['weight'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Engine Condition</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$rows['engine_condition'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Detail Preventive</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['prev_name'].'</td>
          </tr>
          <tr>
            <td class="td_engine">Plan Date</td>
            <td class="td_engine">:</td>
            <td class="td_engine">'.$row['plan_date'].'</td>
          </tr>  
        </table>
            
        <table width= 100%>
            <thead>
              <tr >
                <td colspan = "4"><p>Silahkan tekan tombol <b>DONE</b> jika preventive tersebut telah dieksekusi. Abaikan email ini jika belum mengerjakan preventive tersebut.</p></td>
              </tr>
          </thead>
        </table>
        
        <table width= 100%>
            <thead>
              <tr>
                <td colspan="3"><center>
                <button class="button">
                    <a class="button" href="https://sisemocs.com/hourmeter/execdate_update.php?id='.$row['id_prev'].'" style="color:white">DONE</a>
                </button>
              </td>
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
            echo $row['id_prev'];
            $q=$con->query("UPDATE preventive SET notif_date = DATE_ADD(CURDATE(), INTERVAL 1 DAY) WHERE id_prev='$row[id_prev]'");
        }
        $mail->clearAddresses();
        $mail->clearAttachments();
    }
}
    
?>
