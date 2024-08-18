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
    height: 450px;
    width: 100%;
    text-align: center;
    overflow-y: scroll;
  }
.preventive {
    display: block;
    height: 120px;
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
</style>

<div class="containet">
  <div class="form-group row" style="height: 455px;">
    <!--Engine Detail-->
    <div class=col-sm-4 float=left>
      <h4><b><?php echo $row['name']; ?></b></h4>
      <table style="width: 100%;">
        <tr>
          <td colspan="3"><img class="img2" src="photo/<?php echo $row['engine_picture']; ?>"></td>
        </tr>
        <tr>
          <th style="text-align:left">ID</th>
          <td>:</td>
          <td><?php echo $row['id']; ?></td>
        </tr>
        <tr>
          <th style="text-align:left">Name</th>
          <td>:</td>
          <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
          <th style="text-align:left">Fuel</th>
          <td>:</td>
          <td><?php echo $row['engine_fuel']; ?></td>
        </tr>
        <tr>
          <th style="text-align:left">Description</th>
          <td>:</td>
          <td><?php echo $row['engine_description']; ?></td>
        </tr>
        <tr>
          <th style="text-align:left">Preventive</th>
          <td>:</td>
          <td></td>
        </tr>
        <!--Preventive-->
        <tr>
          <td colspan="3">
            <div>
                <table class="table table-bordered table-striped preventive">
                    <?php
                    $q = $con->query("SELECT * FROM preventive WHERE id_alat = '$engine_id'");
                    $no = 1;
                    foreach ($q as $row) {
                      echo '
                    <!-- Row data -->
                    <tr>
                      <td>' . $no . '</td>
                      <td style="width: 300px;">' . $row['prev_name'] . '</td>
                    </tr>
                    ';
                      $no++;
                    }
                    ?>
                  </table>
            </div>
            
          </td>
        </tr>
      </table>
    </div>

    <!--Data History-->
    <div id="pdf" class=col-sm-6 float=right>
      <h4><b><?php echo $row['id_alat']; ?> Data History</b></h4>
      <table class="table table-bordered table-striped history">
        <?php
        $q = $con->query("SELECT
                hour_data.id,
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
        echo '        
        <thead >
        	<tr>
        	  <th class="th2">NO</th>
        	  <th class="th2">ID</th>
       		  <th class="th2 ">Start Date Time</th>
              <th class="th2">End Date Time</th>
              <th class="th2 rowhistory">Run Time</th>
            <tr>
        </thead>
        ';
        $no = 1;
        foreach ($q as $row) {
        //   $minute = $row['timerun'] % 60;
        //   $hour = intval($row['timerun'] / 60);
          echo '
        
        <!-- Row data -->
        <tr>
          <td class="rowhistory th2">' . $no . '</td>
          <td class="rowhistory th2">' . $row['id_alat'] . '</td>
          <td class="rowhistory td2">' . $row['start_datetime'] . '</td>          
          <td class="rowhistory td2">' . $row['end_datetime'] . '</td>
          <td class="td2">' . $row['total_runtime'] . '</td>           
        </tr>
        ';
          $no++;
        }
        echo '
        <tfoot>
        	<tr>
        	  <th class="th2">NO</th>
        	  <th class="th2">ID</th>
       		  <th class="th2 ">Start Date Time</th>
              <th class="th2">End Date Time</th>
              <th class="th2 rowhistory">Run Time</th>
            <tr>
        </tfoot>
        ';
        ?>
      </table>
    </div>

    <!--Total Runtime-->
    <div class="form-group col-sm-2">
      <h4><b>Run Time</b>
      </h4>
      <table>
        <?php
        $q = "SELECT SUM(total_runtime) AS total_runtime FROM data_history WHERE id_alat = '$engine_id'";
        $result = mysqli_query($con, $q);
        $row = mysqli_fetch_assoc($result);
        $totalminute = $row['total_runtime'] % 60;
        $totalhour = intval($row['total_runtime'] / 60);
        ?>
        <tr>
          <td>
            <h6>TOTAL RUNTIME</h6>
          </td>
        </tr>
        <tr>
          <td>
            <h5><?php echo $totalhour . 'h ' . $totalminute . 'm' ?></h5>
          </td>
        </tr>
        <tr>
          <td>
            <h6>VALVE LIMIT</h6>
          </td>
        </tr>
        <tr>
          <td>
            <h5><?php echo $hour1 . 'h ' . $minute1 . 'm'; ?></h5>
          </td>
        </tr>
        <tr>
          <td>
            <h6>DIAPHGRAMS LIMIT</h6>
          </td>
        </tr>
        <tr>
          <td>
            <h5><?php echo $hour2 . 'h ' . $minute2 . 'm'; ?></h5>
          </td>
        </tr>
        <tr>
          <td>
            <h6>OIL LIMIT</h6>
          </td>
        </tr>
        <tr>
          <td>
            <h5><?php echo $hour3 . 'h ' . $minute3 . 'm'; ?></h5>
          </td>
        </tr>
        <tr>
          <td>
            <h6>SCREW LIMIT</h6>
          </td>
        </tr>
        <tr>
          <td>
            <h5><?php echo $hour4 . 'h ' . $minute4 . 'm'; ?></h5>
          </td>
        </tr>
        </tr>
      </table>
    </div>
  </div>
  <div class="row" style="margin-top:50px;">
    <div class="col-sm-12">
    <div class="float-right">
      <!--<a title="ExportPDF" class="btn btn-primary download" href="download_detail.php?id=">Export PDF</i>-->
      <!--</a>-->
      <!--<button type="button" class="btn btn-primary " onclick="printDiv('pdf','Title')">Export PDF</button>-->
      <a title="Edit" class="btn btn-success <?php echo $hide1; ?>" href="edit.php?id=<?php echo $engine_id; ?>">Edit</i>
      </a>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    // var doc = new jsPDF();

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

<?php
// } 
?>