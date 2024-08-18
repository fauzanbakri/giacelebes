<?php
$dashboard = 'active';
$addnew = '';
$email = '';
$recenthistory = '';
$history = '';
session_start();
if(isset($_GET['role'])){
    $_SESSION['role'] = $_GET['role'];
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
            <h1>Engine Running Duration</h1>
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
                $q = $con->query("SELECT 
                    hour_data.id, 
                    hour_data.engine_picture,
                    hour_data.name,
                    hour_data.notif,
                    hour_data.notif_diaphgrams,
                    hour_data.notif_oil,
                    hour_data.notif_screw,
                    hour_data.time_notification, 
                    hour_data.time_diaphgrams,
                    hour_data.time_oil,
                    hour_data.time_screw,
                    SUM(total_runtime) AS total_runtime 
                  FROM data_history 
                  RIGHT JOIN hour_data 
                  ON data_history.id_alat=hour_data.id 
                  GROUP BY hour_data.id;");
                echo '
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Engine Photo</th>
                        <th>Name</th>
                        <th>Time Run</th>
                        <th>Parameter</th>
                        <th>Limit Time Run</th>
                        <th>Notification</th>
                        <th '.$hide1.'>Action</th>
                        </tr>
                    </thead>
                ';
                $no=1;
                foreach($q as $row){
                    $minute=$row['total_runtime']%60;
                    $hour=intval($row['total_runtime']/60);
                    $limit_minute=$row['time_notification']%60;
                    $limit_hour=intval($row['time_notification']/60);
                    $notif = $row['notif'];
                    if($notif==1){
                      $status = 'OFF';
                      $color = '#d9534f';
                    }else{
                      $status = 'ON';
                      $color = '#0275d8';
                    }
                    $limit_minute2=$row['time_diaphgrams']%60;
                    $limit_hour2=intval($row['time_diaphgrams']/60);
                    $notif2 = $row['notif_diaphgrams'];
                    if($notif2==1){
                      $status2 = 'OFF';
                      $color2 = '#d9534f';
                    }else{
                      $status2 = 'ON';
                      $color2 = '#0275d8';
                    }
                    $limit_minute3=$row['time_oil']%60;
                    $limit_hour3=intval($row['time_oil']/60);
                    $notif3 = $row['notif_oil'];
                    if($notif3==1){
                      $status3 = 'OFF';
                      $color3 = '#d9534f';
                    }else{
                      $status3 = 'ON';
                      $color3 = '#0275d8';
                    }
                    $limit_minute4=$row['time_screw']%60;
                    $limit_hour4=intval($row['time_screw']/60);
                    $notif4 = $row['notif_screw'];
                    if($notif4==1){
                      $status4 = 'OFF';
                      $color4 = '#d9534f';
                    }else{
                      $status4 = 'ON';
                      $color4 = '#0275d8';
                    }
                    
                    echo '       
                        <tr>
                        <td rowspan="4" style="vertical-align:middle;"><center>'.$no.'</td>
                        <td rowspan="4" style="vertical-align:middle;"><center><a class="btn-xs" data-id="btn_id" onclick="detail2('.'\''.$row["id"].'\''.')">'.$row['id'].'</a></td>
                        <td rowspan="4" style="vertical-align:middle;"><center><img height="120" width="120" src="photo/'.$row['engine_picture'].'"</td>
                        <td rowspan="4" style="vertical-align:middle;">'.$row['name'].'</td>
                        <td rowspan="4" style="vertical-align:middle;"><center>'.$hour.'h '.$minute.'m</td>
                        <td>Check Valve</td>
                        <td style="vertical-align:middle;"><center>'.$limit_hour.'h '.$limit_minute.'m</td>
                        <td style="vertical-align:middle; color:'.$color.'"><center><b>'.$status.'</td>
                        <td rowspan="4" style="vertical-align:middle;" '.$hide1.'><center>
                          <a title="Edit" class="btn btn-success" href="edit.php?id='.$row["id"].'"><i class="fas fa-edit"></i>
                          </a>
                          <a title="Reset" class="btn btn-primary" onclick="reset('.'\''.$row["id"].'\''.')"><i class="fas fa-sync-alt"></i></a>
                          <a title="Delete" class="btn btn-danger" onclick="deletee('.'\''.$row["id"].'\''.')"><i class="fas fa-trash"></i></a>
                        </td>
                        </tr>
                        <tr>
                            <td>Check Diaphgrams</td>
                            <td style="vertical-align:middle;"><center>'.$limit_hour2.'h '.$limit_minute2.'m</td>
                            <td style="vertical-align:middle; color:'.$color2.'"><center><b>'.$status2.'</td>
                        </tr>
                        <tr>
                            <td>Replace Oil</td>
                            <td style="vertical-align:middle;"><center>'.$limit_hour3.'h '.$limit_minute3.'m</td>
                            <td style="vertical-align:middle; color:'.$color3.'"><center><b>'.$status3.'</td>
                        </tr>
                        <tr>
                            <td>Check Screws</td>
                            <td style="vertical-align:middle;"><center>'.$limit_hour4.'h '.$limit_minute4.'m</td>
                            <td style="vertical-align:middle; color:'.$color4.'"><center><b>'.$status4.'</td>
                        </tr>
                ';
                $no++;
                }
                echo '
                        <tfoot>
                        <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Engine Photo</th>
                        <th>Name</th>
                        <th>Time Run</th>
                        <th>Parameter</th>
                        <th>Limit Time Run</th>
                        <th>Notification</th>
                        <th '.$hide1.'>Action</th>
                        </tr>
                        </tfoot>
                ';?>
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
// $.ajax({
//   url: "load_data.php",
//   type: 'GET',
//   success: function (data) {
//       $('#example1').html(data);
//       // console.log(data);
//   }   
// });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
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
       alert('Reset Failed');
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

<!--<script>-->
<!--  function detail(id,img_name){-->
<!--  var engine_id2 = id;-->
<!--  $.ajax({-->
<!--  url: "detail.php",-->
<!--  type: 'POST',-->
<!--  data: {id:id, img_name:img_name},-->
<!--  success: function (response) {-->
<!--    $('.modal-body').html(response); -->
<!--    $('#empModal').modal('show');-->
<!--  }   -->
<!--});-->
<!--};-->
<!--</script>-->


<!--<div class="modal fade" id="empModal" role="dialog">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header" >-->
<!--                <h4 class="modal-title">Engine Detail</h4>-->
<!--              <button type="button" class="close" data-dismiss="modal">×</button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--              <a title="Edit" class="btn btn-success" href="edit.php?id=">Edit</i></a>-->
<!--              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--Detail 2-->
<script>
  function detail2(id,img_name){
  var engine_id = id;
  $.ajax({
  url: "detail2.php",
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

<div class="modal fade" id="empModal2" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" >
                <h4 class="modal-title">Engine Detail</h4>
              <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            
            <!--Modal Body-->
            <div class="modal-body">
            </div>
            <!--<div class="modal-footer">-->
                <!--<button type="button" class="btn btn-primary" data-dismiss="modal">Export PDF</button>-->
                
            <!--</div>-->
        </div>
    </div>
</div>

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

</body>
</html>
