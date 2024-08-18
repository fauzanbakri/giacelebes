<?php
$dashboard = 'active';
$addnew = '';
$email = '';
$recenthistory = '';
$history = '';
session_start();
if(!isset($_SESSION['name'])){
  header('location: index.php');
}
include "header.php";
$q = $con->query("SELECT * FROM warming WHERE id='$_GET[id]'");
$row = mysqli_fetch_array($q);
$que = $con->query("SELECT * FROM hour_data");
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
            <h1>Edit Data</h1>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Warming</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!--<form id="form" method="post" enctype="multipart/form-data" id="quickForm">-->
              <form class="form-horizontal">
                <div class="card-body">
                   <div class="form-group">
                    <input type="hidden" name="warming" id="input_warming" required value="<?php echo $row['id']?>" class="form-control">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1" class="col-form-label">ID Engine :</label>
                    <div>
                        <select class="form-control cekdup" id="input_id" name="id">
                            <option selected="selected" disabled="true" value="">Please Select - Current ID: <?php echo $row['id_alat']?></option>
                            <?php
                            foreach($que as $rows){
                            echo '<option value="'.$rows[id].'">'.$rows[id].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="exampleInputPassword1" class="col-form-label">Day :</label>
                    <div>
                        <select class="form-control cekdup" id="input_day" name="day">
                            <option selected="selected" disabled="true" value="">Please Select - Current Day: <?php echo $row['day']?></option>
                            <option value="Sunday">Minggu</option>
                            <option value="Monday">Senin</option>
                            <option value="Tuesday">Selasa</option>
                            <option value="Wednesday">Rabu</option>
                            <option value="Thursday">Kamis</option>
                            <option value="Friday">Jumat</option>
                            <option value="Saturday">Sabtu</option>
                        </select>
                    </div>
                    <div hidden id="notif2" class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <label><i class="icon fas fa-ban"></i> Max Warming Notif only Onces per Day!</label>
                    </div>
                  </div>
                    
                  <div class="form-group">
                    <label for="exampleInputPassword1">Time :</label>
                    <input type="time" name="time" id="input_time" required value="<?php echo $row['time']?>" class="form-control" placeholder="Enter Time">
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </form>
                <div class="modal-footer">
                    <button type="submit" id="sbm" name="sbm" onclick=edit_warming() class="btn btn-primary">Submit</button>
                    <a href="warming.php"><button type="submit" class="btn btn-default">Close</button></a>
                </div>
              
            </div>
            <!-- /.card -->
            </div>
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

$("#notif2").attr("hidden");
// $('.cekdup').on("change paste keyup click keydown",function(){
//         var day=$('#input_day').val();
//         var id=$('#input_id').val();
//         $.ajax({
//         url: "cek_day.php",
//         type: 'POST',
//         data: {day:day, id:id},
//         success: function (data) {
//             console.log(data);
//             if(data=="ok"){
//                 $("#notif2").attr("hidden", true);
//                 $("#sbm").removeAttr("disabled");
//                 console.log("safeeee");
//             }else{
//                 $("#notif2").removeAttr("hidden", true);
//                 $("#sbm").attr("disabled", true);
//                 console.log("not safeeee");
//             }
//         }
//      });
// });
</script>

<script>
function edit_warming(){
    var id_warm = $('#input_warming').val();
    var id = $('#input_id').val();
    var day = $('#input_day').val();
    var time = $('#input_time').val(); 
    $.ajax({
    url: "edit_warm.php",
    type: 'POST',
    data: {'id_warm':id_warm, id:id, day:day, time:time},
    success: function (data) {
      if(data=="ok"){
         window.location.href = "warming.php";
      }else{
        alert("Can Edit Warming\nPlease Select ID Engine and Day");
      }      
       console.log(data);
    }   
  })    
};
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
