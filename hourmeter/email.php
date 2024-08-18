<?php
$dashboard = '';
$addnew = '';
$email = 'active';
$recenthistory = '';
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
            <h1>E-mail List</h1>
          </div>
          <div class="col-sm-6 ">
            <a class="btn btn-primary float-right" onclick="new_email()";><i class="fas fa-plus"></i></a>
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
  url: "load_email.php",
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
function new_email(){
    Swal.fire({
    title: 'Add New Email',
    html: `
    <form class="form-horizontal"";>
    
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail" placeholder="Enter New Email">
                </div>
            </div>
        </div>
    </form>
    <div class="modal-footer">
    <button type="button"  onclick=add_email() class="btn btn-primary"">Submit</button>
    <button type="button" onclick=swal.close() class="btn btn-default" data-dismiss="modal">Close</button>
            </div>`,
                    showConfirmButton: false,
    confirmButtonColor: '#0275d8',
    confirmButtonText: 'Submit',
    }).then((result) => {
        if (result.isConfirmed) {
        add_email();
        }
    })
};
function add_email(){
var inputemail = $('#inputEmail').val();
$.ajax({
    url: "add_email.php",
    type: 'POST',
    data: {email:inputemail},
    success: function (data) {
      if(data=="ok"){
        location.reload();
      }else{
        alert("Email Alredy Exist");
      }      
      // console.log(data);
    }   
  })    
};
</script>

<script>
  function del_email(email){
  Swal.fire({
  title: 'Are you sure to Delete?',
  text: "The Email Will be Delete ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    delete_email(email);
    Swal.fire(      
      'Deleted!',
      'Email has been deleted.',
      'success'
    )
  }
})
};
function delete_email(email){
  $.ajax({
  url: "delete_email.php",
  type: 'POST',
  data: {email:email},
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
