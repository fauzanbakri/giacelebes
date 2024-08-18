<?php
include "config.php";

$engine_id = $_POST['id'];

$q = "SELECT * FROM hour_data WHERE id = '$engine_id'";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($result);
$minute1 = $row['time_notification'] % 60;
$hour1 = intval($row['time_notification'] / 60);
$minute2 = $row['time_diaphgrams'] % 60;
$hour2 = intval($row['time_diaphgrams'] / 60);
$minute3 = $row['time_oil'] % 60;
$hour3 = intval($row['time_oil'] / 60);
$minute4 = $row['time_screw'] % 60;
$hour4 = intval($row['time_screw'] / 60);
$id = $row['id'];
$time_valve = $row['time_notification'];
$time_diaphgrams = $row['time_notification'];
$time_oil = $row['time_notification'];
$time_screw = $row['time_notification'];

$notif = $row['notif'];
  if ($notif == 1) {
    $status = 'OFF';
    $color1 = 'danger';
  } else {
    $status = 'ON';
    $color1 = 'primary';
  }
  $notif2 = $row['notif_diaphgrams'];
  if ($notif2 == 1) {
    $status2 = 'OFF';
    $color2 = 'danger';
  } else {
    $status2 = 'ON';
    $color2 = 'primary';
  }
  $notif3 = $row['notif_oil'];
  if ($notif3 == 1) {
    $status3 = 'OFF';
    $color3 = 'danger';
  } else {
    $status3 = 'ON';
    $color3 = 'primary';
  }
  $notif4 = $row['notif_screw'];
  if ($notif4 == 1) {
    $status4 = 'OFF';
    $color4 = 'danger';
  } else {
    $status4 = 'ON';
    $color4 = 'primary';
  }

?>

<!DOCTYPE html>
<html>
<style>
  .img2 {
    display: block;
    height: 200px;
    width: 200px;
    margin-left: auto;
    margin-right: auto;
  }

  div.ex1 {
    background-color: none;
    /*height: 120px;*/
    overflow: scroll;
    width: 100%;
  }

  .history {
    display: block;
    height: 470px;
    width: 100%;
    text-align: center;
    overflow-y: scroll;
  }
.preventive {
    display: block;
    height: 175px;
    overflow-y: scroll;
  }

  h4 {
    text-align: center;
  }

  h5 {
    outline: black solid 1px;
    margin: auto;
    padding: 10px;
    text-align: center;
    font-weight: bold;
    color: #0275d8;
  }

  h6 {
    text-align: center;
    margin: auto;
    font-weight: bold;
    padding: 10px;
  }
  .my-custom-scrollbar {
  position: relative;
  width: 800px;
  height: 400px;
  overflow: auto;
}
</style>

<div class="container">
  <div class="form-group row">
    <!--Engine Detail-->
    <div class=col-sm-4 float=left>
      <h4><b>
          <?php echo $row['name']; ?>
        </b></h4>
      <table style="width: 100%;">
        <tr>
          <td colspan="3"><img class="img2 mb-4" src="photo/<?php echo $row['engine_picture']; ?>"></td>
        <tr>
          <th style="text-align:left">Merk</th>
          <td>:</td>
          <td>
            <?php echo $row['merk']; ?>
          </td>
        </tr>
        <tr>
          <th style="text-align:left">Kapasitas</th>
          <td>:</td>
          <td>
            <?php echo $row['engine_description']; ?>
          </td>
        </tr>
        <tr>
          <th style="text-align:left">Weight</th>
          <td>:</td>
          <td>
            <?php echo $row['weight']; ?> Kg
          </td>
        </tr>
        <tr>
          <th style="text-align:left">Kondisi</th>
          <td>:</td>
          <td>
            <?php echo $row['engine_condition']; ?>
          </td>
        </tr>
        <tr>
          <th style="text-align:left">Special Maintenance</th>
          <td>:</td>
          <td></td>
        </tr>
        <!--Preventive-->
        <tr>
          <td colspan="3">
            <div>
              <table class="table table-bordered table-striped preventive mt-2">
                <?php
                $q = $con->query("SELECT * FROM preventive WHERE id_alat = '$engine_id'");
                foreach ($q as $row) {
                  echo '
                    <!-- Row data -->
                    <tr>
                      <td style="width: 200px;">' . $row['prev_name'] . '</td>
                      <td style="width: 200px;">' . $row['plan_date'] . '</td>
                    </tr>
                    ';
                }
                ?>
              </table>
            </div>
          </td>
        </tr>
      </table>
    </div>

    <!--Data History-->
    <div id="pdf" class=col-sm-5 float=right>
      <h4><b>
          <?php echo $engine_id; ?> Data History
        </b></h4>
      <div class="card card-outline card-info">
        <div class="card-header">
          <div class=" row">
            <div class="center col-md-5 card-title"><b>Start Date</b></div>
            <div class="center col-md-5 card-title"><b>End Date</b></div>
            <div class="center col-md-2 card-tools"><b>Total</b></div>
          </div>
        </div>
      </div>
      <div class="history my-costum-scrollbar" >
        <?php
        $q = $con->query("SELECT
                        hour_data.id,
                        hour_data.notif,
                        hour_data.notif_diaphgrams,
                        hour_data.notif_oil,
                        hour_data.notif_screw,
                        all_history.id_alat,
                        all_history.start_datetime,
                        all_history.end_datetime,
                        all_history.total_runtime
                        FROM all_history
                        RIGHT JOIN hour_data
                        ON all_history.id_alat=hour_data.id
                        WHERE all_history.id_alat = '$engine_id'
                        ORDER BY all_history.start_datetime DESC;
                        ");
        $no = 1;
        foreach ($q as $row) {
            $minuterun = $row['total_runtime'] % 60;
            $hourrun = intval($row['total_runtime'] / 60);
          echo '
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class=" row">
                    <div class=" col-md-5 card-title">' . $row['start_datetime'] . '</div>
                    <div class=" col-md-5 card-title">' . $row['end_datetime'] . '</div>
                    <div class=" col-md-2 card-tools"><span class="badge bg-info">' .$hourrun. 'h ' .$minuterun. 'm</span></div>
                </div>
              </div>
            </div>
                  ';
        }
        ?>
      </div>
    </div>

    <!--Total Runtime-->
    <div class="form-group col-sm-3 ">
      <h4 class><b>Maintenance</b></h4>

      <!--Total Runtime-->
      <?php
      $q = "SELECT SUM(total_runtime) AS total_runtime FROM all_history WHERE id_alat = '$engine_id'";
      $result = mysqli_query($con, $q);
      $row = mysqli_fetch_assoc($result);
      $totalminute = $row['total_runtime'] % 60;
      $totalhour = intval($row['total_runtime'] / 60);
      if ($time_valve == 0) {
        $time_valve = 1;
      }
      if ($time_diaphgrams == 0) {
        $time_diaphgrams = 1;
      }
      if ($time_oil == 0) {
        $time_oil = 1;
      }
      if ($time_screw == 0) {
        $time_screw = 1;
      }
      $bar_valve = $row['total_runtime'] / $time_valve * 100;
      $bar_diaphgrams = $row['total_runtime'] / $time_diaphgrams * 100;
      $bar_oil = $row['total_runtime'] / $time_oil * 100;
      $bar_screw = $row['total_runtime'] / $time_screw * 100;
      $remind = $time_valve - $row['total_runtime'];
      $minremind = $remind % 60;
      $houremind = intval($remind / 60);
      ?>
      <div class="info-box bg-gradient-info">
        <div class="info-box-content">
          <!--Interval-->
          <br><span class="info-box-text d-flex justify-content-center">Current Limit:</span>
          <span class="info-box-number d-flex justify-content-center"> 
            <?php echo $hour1 . 'h ' . $minute1 . 'm' ?>
          </span><br>

          <!--Reminder-->
          <span class="info-box-text d-flex justify-content-center"> Maintenance Remind on:</span>
          <span class="info-box-number d-flex justify-content-center">
            <?php echo $houremind . 'h ' . $minremind . 'm' ?>
          </span><br>

          <!--Diaphgrams-->
          <span>
            <div class="form-group row">
              <div class="col-sm-4">
                <span class="info-box-icon"><i class="fas fa-tachometer-alt"></i></span>
              </div>
              <div class="col-sm-8">
                <span class="info-box-text">Inflation Pressure</span>
                <div class="progress">
                  <div class="progress-bar" style="width:<?php echo $bar_diaphgrams ?>%"></div>
                </div>
              </div>
            </div>
          </span><br>
          
          <!--Valve-->
          <span>
            <div class="form-group row">
              <div class="col-sm-4">
                <span class="info-box-icon"><i class="fas fa-tint"></i></span>
              </div>
              <div class="col-sm-8">
                <span class="info-box-text">Water Intake</span>
                <div class="progress">
                  <div class="progress-bar" style="width:<?php echo $bar_valve ?>%"></div>
                </div>
              </div>
            </div>
          </span><br>

          <!--Oil-->
          <span>
            <div class="form-group row">
              <div class="col-sm-4">
                <span class="info-box-icon"><i class="fas fa-gas-pump"></i></span>
              </div>
              <div class="col-sm-8">
                <span class="info-box-text">Pump Fastened</span>
                <div class="progress">
                  <div class="progress-bar" style="width:<?php echo $bar_oil ?>%"></div>
                </div>
              </div>
            </div>
          </span><br>

          <!--Screw-->
          <span hidden>
            <div class="form-group row">
              <div class="col-sm-4">
                <span class="info-box-icon"><i class="fas fa-wrench"></i></span>
              </div>
              <div class="col-sm-8">
                <span class="info-box-text">Screw Notif</span>
                <div class="progress">
                  <div class="progress-bar" style="width:<?php echo $bar_screw ?>%"></div>
                </div>
              </div>
            </div>
          </span>

        </div>
        <!-- /.info-box-content -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="float-right">
        <!--<a title="ExportPDF" class="btn btn-primary download" href="download_detail.php?id=">Export PDF</i>-->
        <!--</a>-->
        <!--<button title="Export PDF" type="button" class="btn btn-primary " onclick="printDiv('pdf','Title')">Export-->
        <!--  PDF</button>-->
        <a title="Edit" class="btn btn-success <?php echo $hide1; ?>"
          href="edit.php?id=<?php echo $engine_id; ?>">Edit</i>
        </a>
        <button title="Close" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</html>

<script>
  function exportpdf(id,img_name){
  var engine_id = id;
  $.ajax({
  url: "download_detail.php",
  type: 'POST',
  data: {id:id, img_name:img_name},
  //success: function (data) {
  success: function (response) {
    $('.modal-body').html(response); 
    $('#empModal2').modal('show');
  }   
});
};
</script>

<script>
    var doc = new jsPDF();

 function saveDiv(divId, title) {
 doc.fromHTML(document.getElementById(divId).innerHTML);
 doc.save('div.pdf');
}

function printDiv(divId,
  title) {
  let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');

  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('</head><body >');
  mywindow.document.write(document.getElementById(divId).innerHTML);
  mywindow.document.write('</body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  mywindow.close();

  return true;
}

</script>
