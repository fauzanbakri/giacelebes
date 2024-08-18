<?php
$dashboard = '';
$addnew = '';
$email = '';
$recenthistory = '';
$history = '';
$preventive = '';
$warming = 'active';
session_start();
if(!isset($_SESSION['name'])){
  header('location: index.php');
}
include "header.php";
$que = $con->query("SELECT * FROM hour_data");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Warming</h1>
        </div>
        <div class="col-sm-6 ">
            <a class="btn btn-primary float-right" onclick="new_warming()";><i class="fas fa-plus"></i></a>
          </div>   
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <?php
                $q = $con->query("SELECT * FROM warming");
                echo '
                <thead>
                  <tr>
                    <th>No</th>
                    <th hidden>Warming ID</th>
                    <th>Engine ID</th>
                    <th>Day</th>
                    <th>Date</th>
                    <th hidden>Execution Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                ';
                $no=1;
                foreach($q as $row){
                echo '

                <tr>
                  <td><center>'.$no.'</td>
                  <td hidden><center>'.$row['id'].'</td>
                  <td><center>'.$row['id_alat'].'</td>
                  <td><center>'.$row['day'].'</td>
                  <td><center>'.$row['time'].'</td>
                  <td hidden><center>'.$row['exec_time'].'</td>
                  <td style="vertical-align:middle;" '.$hide1.'><center>
                    <a title="Delete" class="btn btn-danger" onclick="deletewarming('.'\''.$row['id'].'\''.')"><i class="fas fa-trash"></i></a>
                    <a href="edit_warming.php?id='.$row["id"].'" class="btn bg-teal">
                          <i class="fas fa-edit"></i>
                        </a>
                </td>
                </tr>

                ';
                $no++;
                }
                echo '
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th hidden>Preventive ID</th>
                    <th>Engine ID</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th hidden>Execution Time</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                ';
                ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->

<script>
  //   $(function () {
  //     $("#example1").DataTable({
  //       "responsive": true, "lengthChange": false, "autoWidth": false,
  //       "buttons": ["excel","print"]
  //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //     $('#example2').DataTable({
  //       "paging": true,
  //       "lengthChange": false,
  //       "searching": false,
  //       "ordering": true,
  //       "info": true,
  //       "autoWidth": false,
  //       "responsive": true,
  //     });
  //   });

</script>
<script>
function new_warming(){
    Swal.fire({
    title: 'Add New Warming',
    html: `
    <form class="form-horizontal" name="myForm" ;>
    
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Engine ID</label>
                <div class="col-sm-8">
                <select class="form-control cekdup" id="inputId" name="id">
                    <option selected="selected" disabled="true" value="">--Please Select --</option>
                    <?php
                    foreach($que as $rows){
                    echo '<option value="'.$rows[id].'">'.$rows[id].'</option>';
                    }
                    ?>
                    
                </select>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Day</label>
                <div class="col-sm-8">
                    <select class="form-control cekdup" id="inputDay" name="day">
                        <option selected="selected" disabled="true" value="">--Please Select --</option>
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
            
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Time</label>
                <div class="col-sm-8">
                <input type="time" class="form-control" id="inputTime" placeholder="Enter Time">
                </div>
            </div>
        </div>
    </form>
    <div class="modal-footer sbm">
        <button type="submit" id="sbm" name="sbm" onclick=add_warming() class="btn btn-primary" >Submit</button>
        <button type="button" onclick=swal.close() class="btn btn-default" data-dismiss="modal">Close</button>
    </div>`,
    showConfirmButton: false,
    confirmButtonColor: '#0275d8',
    confirmButtonText: 'Submit',
    }).then((result) => {
        if (result.isConfirmed) {
        add_preventive();
        }
    })
    $("#notif2").attr("hidden");
$('.cekdup').on("change paste keyup click keydown",function(){
        var day=$('#inputDay').val();
        var id=$('#inputId').val();
        $.ajax({
        url: "cek_day.php",
        type: 'POST',
        data: {day:day, id:id},
        success: function (data) {
            console.log(data);
            if(data=="ok"){
                $("#notif2").attr("hidden", true);
                $("#sbm").removeAttr("disabled");
                console.log("safeeee");
            }else{
                $("#notif2").removeAttr("hidden", true);
                $("#sbm").attr("disabled", true);
                console.log("not safeeee");
            }
        }
     });
});
};
</script>

<script>
function add_warming(){
var inputid = $('#inputId').val();
var inputday = $('#inputDay').val();
var inputtime = $('#inputTime').val();
$.ajax({
    url: "add_warming.php",
    type: 'POST',
    data: {id:inputid, day:inputday, time:inputtime},
    success: function (data) {
      if(data=="ok"){
        location.reload();
      }else{
        alert("Can Insert New Warming!\nMake Sure The Form Not Empty");
      }      
       console.log(data);
    }   
  })    
};
</script>


<script>

</script>

<script>
  function deletewarming(id) {
    Swal.fire({
      title: 'Are you sure to Delete?',
      text: "The Timetable Will be Delete ",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        deletedwarming(id);
        Swal.fire(
          'Deleted!',
          'Your Warming Timetable has been deleted.',
          'success'
        )
      }
    })
  };

  function deletedwarming(id) {
    $.ajax({
      url: "delete_warming.php",
      type: 'POST',
      data: { id: id },
      success: function (data) {
        if (data == 'success') {
          location.reload();
        } else {
          alert('Failed');
        }
      }
    });
  }
</script>

<script>
  function login() {
    var username = $('#inputUsername').val();
    var pass = $('#inputPassword').val();
    $.ajax({
      url: "login.php",
      type: 'POST',
      data: { user: username, pass: pass },
      success: function (data) {
        if (data == "ok") {
          location.reload();
        } else {
          alert("Wrong Username or Password!");
        }

        // console.log(data);
      }
    });
  }

  function logout() {
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