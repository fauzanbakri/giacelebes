<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include 'config.php';
$q = $con->query("SELECT * FROM warming WHERE day = DAYNAME(CURRENT_DATE()) AND time<=TIME(NOW()) AND time = exec_time");
foreach ($q as $row) {
    $id_warming = $row['id'];
    $id = $row['id_alat'];
    $day = $row['day'];
    $time = $row['time'];
    $time_exec = $row['exec_time'];

    echo $row['id'];
    // if (mysqli_num_rows($q)>0) {
        echo 'ada perlu notif';
        $q2 = $con->query("SELECT email FROM data_email");
        $q3 = $con->query("SELECT * FROM data_history WHERE id_alat='$id' AND 
                    DATE(start_datetime) = CURDATE();");
        $engine = $con->query("SELECT * FROM hour_data WHERE id='$id'");
        $rows = $engine->fetch_assoc();
        
        //Belum Dipanasi
        if (mysqli_num_rows($q3) == 0 && $time_exec === $time) {
            echo 'belum dipanasi';
            $response = false;
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'port.makassar@gmail.com';
            $mail->Password = 'uskesfhotjknqzrr';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('admin@sisemocs.com', '');
            $mail->addReplyTo('port.makassar@gmail.com', '');
            foreach ($q2 as $row2) {
                $mail->addAddress($row2['email']);
            }
            $mail->Subject = 'Pemberitahuan Memanaskan Mesin';
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
            <td colspan = "4"><h2 style="color:white"><b><center>Warming Notification</center></b></h2></td>
          </tr>
          </thead>
          
          <tbody>
            <tr>
              <td colspan = "3"><p>Dear Admin Hour Meter</p></td>
            </tr>
            
            <tr>
              <td colspan = "3"><p>Kami informasikan bahwa mesin di bawa ini dalam proses pemanasan mesin</p></td>
            </tr>    
          </tbody>
         </table>
         
        <table class="center table_engine">
          <tr>
            <th rowspan="7"><img src="sisemocs.com/hourmeter/photo/' . $rows['engine_picture'] . '"></th>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td class="td_engine">ID</td>
            <td class="td_engine">:</td>
            <td class="td_engine">' . $rows['id'] . '</td>
          </tr>
          <tr>
            <td class="td_engine">Engine Name</td>
            <td class="td_engine">:</td>
            <td class="td_engine">' . $rows['name'] . '</td>
          </tr>
          <tr>
            <td class="td_engine">Merk</td>
            <td class="td_engine">:</td>
            <td class="td_engine">' . $rows['merk'] . '</td>
          </tr>
          <tr>
            <td class="td_engine">Kapasitas</td>
            <td class="td_engine">:</td>
            <td class="td_engine">' . $rows['engine_description'] . '</td>
          </tr>
          <tr>
            <td class="td_engine">Weight</td>
            <td class="td_engine">:</td>
            <td class="td_engine">' . $rows['weight'] . '</td>
          </tr>
          <tr>
            <td class="td_engine">Condition</td>
            <td class="td_engine">:</td>
            <td class="td_engine">' . $rows['engine_condition'] . '</td>
          </tr>  
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

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
                echo $id;
                $q = $con->query("UPDATE status_engine SET start_engine = 'ON' WHERE id ='$id'");
                $q2 = $con->query("UPDATE warming SET exec_time = DATE_ADD(exec_time, INTERVAL 2 HOUR) WHERE id ='$id_warming'");
            }
            $mail->clearAddresses();
            $mail->clearAttachments();
        } else {
            echo 'sudah dipanasi';
            $q = $con->query("UPDATE warming SET exec_time = '$time' WHERE id ='$id_warming'");
            echo 'sudah update exec';
        }
    // }
}

?>