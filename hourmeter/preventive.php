<?php
$dashboard = '';
$addnew = '';
$email = '';
$recenthistory = '';
$history = '';
$prevent = 'active';
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
          <h1>Special Maintenance</h1>
        </div>
        <div class="col-sm-6 ">
            <a class="btn btn-primary float-right" onclick="new_preventive()";><i class="fas fa-plus"></i></a>
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
                $q = $con->query("SELECT * FROM preventive");
                echo '
                <thead>
                  <tr>
                    <th>No</th>
                    <th hidden>Preventive ID</th>
                    <th>Engine ID</th>
                    <th>Special Maintenance</th>
                    <th>Plan Date</th>
                    <th>Execution Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                ';
                $no=1;
                foreach($q as $row){
                echo '

                <tr>
                  <td><center>'.$no.'</td>
                  <td hidden><center>'.$row['id_prev'].'</td>
                  <td><center>'.$row['id_alat'].'</td>
                  <td><center>'.$row['prev_name'].'</td>
                  <td><center>'.$row['plan_date'].'</td>
                  <td><center>'.$row['exec_date'].'</td>
                  <td style="vertical-align:middle;" '.$hide1.'><center>
                    <a title="Delete" class="btn btn-danger" onclick="deleteprev('.'\''.$row['id_prev'].'\''.')"><i class="fas fa-trash"></i></a>
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
                    <th>Special Maintenance</th>
                    <th>Plan Date</th>
                    <th>Execution Date</th>
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
function new_preventive(){
    Swal.fire({
    title: 'Add New Special Maintenance',
    html: `
    <form class="form-horizontal"";>
    
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Engine ID</label>
                <div class="col-sm-8">
                <select class="form-control" id="inputId">
                    <?php
                    foreach($que as $rows){
                    echo '<option value="'.$rows[id].'">'.$rows[id].'</option>';
                    }
                    ?>
                    
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" >Special Maintenance</label>
                <div class="col-sm-8 pt-3">
                <input type="text" class="form-control" id="inputPrev" placeholder="Enter New Special Maintenance">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Plan Date</label>
                <div class="col-sm-8">
                <input type="date" class="form-control" id="inputPlan" placeholder="Enter Your Plan Date">
                </div>
            </div>
        </div>
    </form>
    <div class="modal-footer">
    <button type="button"  onclick=add_preventive() class="btn btn-primary"">Submit</button>
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
};
function add_preventive(){
var inputid = $('#inputId').val();
var inputprev = $('#inputPrev').val();
var inputplan = $('#inputPlan').val();
$.ajax({
    url: "add_preventive.php",
    type: 'POST',
    data: {id:inputid, prev:inputprev, plan:inputplan},
    success: function (data) {
      if(data=="ok"){
        location.reload();
      }else{
        alert("Can Insert New Preventive");
      }      
       console.log(data);
    }   
  })    
};
</script>

<script>
  function deleteprev(id) {
    Swal.fire({
      title: 'Are you sure to Delete?',
      text: "The Special Maintenance Will be Delete ",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        deletedprev(id);
        Swal.fire(
          'Deleted!',
          'Your Special Maintenance has been deleted.',
          'success'
        )
      }
    })
  };

  function deletedprev(id) {
    $.ajax({
      url: "delete_preventive.php",
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