<?php
$dashboard = '';
$addnew = '';
$email = '';
$recenthistory = 'active';
$history = '';
session_start();
if(!isset($_SESSION['name'])){
  header('location: index.php');
}
include "header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Recent History</h1>
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
$.ajax({
  url: "load_history.php",
  type: 'GET',
  success: function (data) {
      $('#example1').html(data);
      // console.log(data);
  }   
});
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
  function reset(id){
  Swal.fire({
  title: 'Reset Time Run?',
  text: "Time Run Will be Reset to 0 !",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.isConfirmed) {
    reseted(id);
    Swal.fire(
      'Done',
      'The Time Run has been Reset',
      'success'
    )
  }
})
};
function reseted(id){
  $.ajax({
  url: "reset.php",
  type: 'POST',
  data: {id:id},
  success: function (data) {
     if(data=='ok'){
      location.reload();
     }else{
       alert('Failed');
     }
  }   
});
};
</script>

<script>
  function deletee(id){
  Swal.fire({
  title: 'Are you sure to Delete?',
  text: "The Engine Will be Delete ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    deleteed(id);
    Swal.fire(      
      'Deleted!',
      'Your Engine has been deleted.',
      'success'
    )
  }
})
};

function deleteed(id){
  $.ajax({
  url: "delete.php",
  type: 'POST',
  data: {id:id},
  success: function (data) {
     if(data=='success'){
      location.reload();
     }else{
       alert('Failed');
     }
  }   
});
}
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
