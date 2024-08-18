<?php
include "config.php";

$engine_id = $_POST['id'];

$q = "SELECT * FROM hour_data WHERE id = '$engine_id'";
$result = mysqli_query($con, $q);
while($row = mysqli_fetch_array($result)){
$minute=$row['time_notification']%60;
$hour=intval($row['time_notification']/60);
?>
<table border=0px; width='100%'>
<tr>
    <td colspan = "4"><h5><b><?php echo $row['name']; ?></h5></td>
</tr>

<tr>
    <td rowspan="4"><img src="photo/<?php echo $row['engine_picture']; ?>" height="150" width="150">
    <td><p>ID</p></td>
    <td><p>:</p></td>
    <td><p><?php echo $row['id']; ?></td>
</tr>
<tr>
    <td><p>Engine Name</p></td>
    <td><p>:</p></td>   
    <td><p><?php echo $row['name']; ?></p></td>
</tr>
<tr>
    <td text-align= center;><p>Fuel</p></td>
    <td><p>:</p></td>   
    <td><p><?php echo $row['engine_fuel']; ?></p></td>
</tr>
<tr>
    <td text-align= center;><p>Limit Time Run</p></td>
    <td><p>:</p></td>   
    <td><p><?php echo $hour.'h '.$minute.'m' ?></p></td>
</tr>

<tr>
      <td colspan = "5"><b>Deskripsi :</b></td>
    </tr>
<tr>
    <td colspan = "5"><?php echo $row['engine_description']; ?></td>
</tr>
</table>
    
<?php } ?>
