<?php
$dashboard = 'active';
$addnew = '';
$email = '';
$recenthistory = '';
$history = '';
$engine_id = $_GET['id'];
session_start();
if(!isset($_SESSION['name'])){
  header('location: index.php');
}
include "header.php";
?>

<style>
h6 {color:#0275d8;}
</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
              <h4><b><?php echo $_GET[id]; ?> Data History</b></h4>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            
            <!--Data History-->
            <div class=col-sm-6 float=right>
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
                  $minute = $row['timerun'] % 60;
                  $hour = intval($row['timerun'] / 60);
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
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>

<script>
$.ajax({
  url: "load_data.php",
  type: 'GET',
  success: function (data) {
      $('#example1').html(data);
  }   
});

$("#form").on('submit',(function(e) {
  e.preventDefault();
  var id = $('#input_id').val();
  var name = $('#input_name').val(); 
  var desc = $('#input_desc').val();
  var fuel = $('#input_fuel').val();
  var hour = $('#input_hour').val();
  var minute = $('#input_minute').val();
  var status = $('#input_status').val();
  var hour2 = $('#input_hour2').val();
  var minute2 = $('#input_minute2').val();
  var status2 = $('#input_status2').val();
  var hour3 = $('#input_hour3').val();
  var minute3 = $('#input_minute3').val();
  var status3 = $('#input_status3').val();
  var hour4 = $('#input_hour4').val();
  var minute4 = $('#input_minute4').val();
  var status4 = $('#input_status4').val();
  var fd = new FormData(this);
  // var img = fd.append('file', $('#input_img').get(0).files[0]);
  $.ajax({
  url: "edit_action.php",
  type: 'POST',
  data:  new FormData(this),
   contentType: false,
   processData:false,
  success: function (data) {
      if (data=="ok"){
        toastr.success('Insert Success');
        window.setTimeout(function(){
        window.location.href = "index.php";
        }, 5000);      
    }else{
      toastr.error(data);
    }
  }   
  });
}));
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel","print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
     $("#notif").attr("hidden", "true");
    $( "#input_id" ).keyup(function() {
       
        var id=$('#input_id').val();
        $.ajax({
        url: "cek_id.php",
        type: 'POST',
        data: {id:id},
        success: function (data) {
            console.log(data);
            if(data=="ok"){
                $("#notif").attr("hidden", true);
                $("#sbm").prop("disabled", false);
            }else{
                $("#notif").attr("hidden", false);
                $("#sbm").prop("disabled", true);
            }
        }
    });
});
</script>

<script>
  function login(){
    var username = $('#inputUsername').val();
    var pass = $('#inputPassword').val();
    $.ajax({
    url: "login.php",
    type: 'POST',
    data: {user:username, pass:pass},
    success: function (data) {
      if(data=="ok"){
        location.reload();
      }else{
        alert("Wrong Username or Password!");
      }
      
      // console.log(data);
    }   
  });
  }

  function logout(){
    $.ajax({
    url: "logout.php",
    type: 'GET',
    success: function (data) {
      location.reload();
      // console.log(data);
    }   
  });
  }
</script>

<script>
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>

</body>
</html>
