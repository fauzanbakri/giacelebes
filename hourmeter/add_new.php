<?php
$dashboard = '';
$addnew = 'active';
$email = '';
$recenthistory = '';
$history = '';
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
            <h1>Add New</h1>
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
                <h3 class="card-title">Add New Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form" method="post" action="add_action.php" enctype="multipart/form-data" id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label>Type</label>
                    <div>
                        <select class="form-control" id="input_type" name="type">
                            <option selected="selected" disabled="true" value="">--Please Select --</option>
                            <option value="Running Hour">Running Hour</option>
                            <option value="Not Running Hour">Not Running Hour</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID :</label>
                    <input type="text" name="id" id="input_id" required class="form-control" placeholder="Enter ID">
                  </div>
                    <div id="notif" class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <label><i class="icon fas fa-ban"></i> ID Already Exist!</label>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name :</label>
                    <input type="text" name="name" id="input_name" required class="form-control" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Merk :</label>
                    <input type="text" name="merk" id="input_merk" required class="form-control" placeholder="Enter Merk">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Capasity :</label>
                    <input type="text" name="description" id="input_desc" required class="form-control" placeholder="Enter Capasity of The Engine">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Weight :</label>
                    <input type="number" name="weight" required id="input_weight" class="form-control" placeholder="Enter Engine's Weight (Kg)">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Condition :</label>
                    <input type="text" name="condition" required id="input_condition" class="form-control" placeholder="Enter Engine's Condition">
                  </div>
                  <!--Valve-->
                  <h6><b>Time Limit</b></h6>
                  <div class="form-group row">
                      <div class=col-sm-6 float=left>
                        <label for="exampleInputPassword1">Hour :</label>
                        <input type="number" name="time_hour" required id="input_hour" class="form-control" step="1" min="0" value="0" placeholder="Enter Engine's Fuel Type">
                      </div>
                      <div class=col-sm-6 float=right>
                        <label for="exampleInputPassword1">Minute :</label>
                        <input type="number" name="time_minute" required id="input_minute" step="1" min="0" value="0" class="form-control" placeholder="Enter Engine's Fuel Type">
                      </div>
                  </div>
                  
                  <!--Diaphgrams-->
                  <h6><b hidden>DIAPHGRAMS</b></h6>
                  <div class="form-group row" hidden>
                      <div class=col-sm-6 float=left>
                        <label for="exampleInputPassword1">Hour :</label>
                        <input type="hidden" name="time_hour2" required id="input_hour2" class="form-control" step="1" min="0" value="0" placeholder="Enter Engine's Fuel Type">
                      </div>
                      <div class=col-sm-6 float=right>
                        <label for="exampleInputPassword1">Minute :</label>
                        <input type="hidden" name="time_minute2" required id="input_minute2" step="1" min="0" value="0" class="form-control" placeholder="Enter Engine's Fuel Type">
                      </div>
                  </div>
                  
                  <!--Oil-->
                  <h6><b hidden>OIL</b></h6>
                  <div class="form-group row" hidden>
                      <div class=col-sm-6 float=left>
                        <label for="exampleInputPassword1">Hour :</label>
                        <input type="hidden" name="time_hour3" required id="input_hour3" class="form-control" step="1" min="0" value="0" placeholder="Enter Engine's Fuel Type">
                      </div>
                      <div class=col-sm-6 float=right>
                        <label for="exampleInputPassword1">Minute :</label>
                        <input type="hidden" name="time_minute3" required id="input_minute3" step="1" min="0" value="0" class="form-control" placeholder="Enter Engine's Fuel Type">
                      </div>
                  </div>
                  <!--Screw-->
                  <h6><b hidden>SCREW</b></h6>
                  <div class="form-group row" hidden>
                      <div class=col-sm-6 float=left>
                        <label for="exampleInputPassword1">Hour :</label>
                        <input type="hidden" name="time_hour4" required id="input_hour4" class="form-control" step="1" min="0" value="0" placeholder="Enter Engine's Fuel Type">
                      </div>
                      <div class=col-sm-6 float=right>
                        <label for="exampleInputPassword1">Minute :</label>
                        <input type="hidden" name="time_minute4" required id="input_minute4" step="1" min="0" value="0" class="form-control" placeholder="Enter Engine's Fuel Type">
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Image :</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="input_img" class="custom-file-input" name="engine_image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button id="sbm" type="submit" name="sbm" type="button" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
  var type = $('#input_type').val();
  var name = $('#input_name').val();
  var merk = $('#input_merk').val();
  var desc = $('#input_desc').val();
  var weight = $('#input_weight').val();
  var condition = $('#input_condition').val();
  var hour = $('#input_hour').val();
  var minute = $('#input_minute').val();
  var hour2 = $('#input_hour2').val();
  var minute2 = $('#input_minute2').val();
  var hour3 = $('#input_hour3').val();
  var minute3 = $('#input_minute3').val();
  var hour4 = $('#input_hour4').val();
  var minute4 = $('#input_minute4').val();
  var fd = new FormData(this);
  // var img = fd.append('file', $('#input_img').get(0).files[0]);
  $.ajax({
  url: "add_action.php",
  type: 'POST',
  data:  new FormData(this),
   contentType: false,
   processData:false,
  success: function (data) {
      if (data=="ok"){
        toastr.success('Insert Success');
        window.setTimeout(function(){
        window.location.href = "index.php";
        }, 3000);      
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

</body>
</html>
