<?php
$dashboard = 'active';
$addnew = '';
$email = '';
$recenthistory = '';
$history = '';
session_start();
if (isset($_GET['role'])) {
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
          <h1>Dashboard Preventif Maintenance</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="">
              <div class="card-body">
                <!-- /.card-header -->
                <div class="row">
                <!-- sjadkjalskdja -->
                <?php
                $q = $con->query("SELECT 
                    hour_data.id, 
                    hour_data.engine_picture,
                    hour_data.name,
                    hour_data.merk,
                    hour_data.engine_description,
                    hour_data.weight,
                    hour_data.engine_condition,
                    hour_data.notif,
                    hour_data.notif_diaphgrams,
                    hour_data.notif_oil,
                    hour_data.notif_screw,
                    hour_data.time_notification, 
                    hour_data.time_diaphgrams,
                    hour_data.time_oil,
                    hour_data.time_screw,
                    hour_data.status,
                    hour_data.type,
                    SUM(total_runtime) AS total_runtime 
                  FROM all_history 
                  RIGHT JOIN hour_data 
                  ON all_history.id_alat=hour_data.id 
                  GROUP BY hour_data.id;");
                $no = 1;
                foreach ($q as $row) {
                  $minute = $row['total_runtime'] % 60;
                  $hour = intval($row['total_runtime'] / 60);
                  $limit_minute = $row['time_notification'] % 60;
                  $limit_hour = intval($row['time_notification'] / 60);
                  $notif = $row['notif'];
                  $type = $row['type'];
                //   if($type == 'Running Hour'){
                //     $hide3 = "";
                //   }else{
                //     $hide3 = "hidden";
                //     }
                //   $que ="SELECT COUNT(id) AS id from status_engine where id='".$row['id']."' AND TIMESTAMPDIFF(MINUTE,timestamp,NOW()) < 1;";
                //   $resu = mysqli_query($con, $que);
                //   $r = mysqli_fetch_assoc($resu);
                  
                //   if ($r['id'] > 0){
                //       $colr = "bg-success";
                //       $s = "ON";
                //   }else{
                //       $colr = "bg-danger";
                //       $s = "OFF";
                //   }
                  
                  if ($notif == 1) {
                    $status = 'OFF';
                    $color = '#d9534f';
                  } else {
                    $status = 'ON';
                    $color = '#0275d8';
                  }
                  $limit_minute2 = $row['time_diaphgrams'] % 60;
                  $limit_hour2 = intval($row['time_diaphgrams'] / 60);
                  $notif2 = $row['notif_diaphgrams'];
                  if ($notif2 == 1) {
                    $status2 = 'OFF';
                    $color2 = '#d9534f';
                  } else {
                    $status2 = 'ON';
                    $color2 = '#0275d8';
                  }
                  $limit_minute3 = $row['time_oil'] % 60;
                  $limit_hour3 = intval($row['time_oil'] / 60);
                  $notif3 = $row['notif_oil'];
                  if ($notif3 == 1) {
                    $status3 = 'OFF';
                    $color3 = '#d9534f';
                  } else {
                    $status3 = 'ON';
                    $color3 = '#0275d8';
                  }
                  $limit_minute4 = $row['time_screw'] % 60;
                  $limit_hour4 = intval($row['time_screw'] / 60);
                  $notif4 = $row['notif_screw'];
                  if ($notif4 == 1) {
                    $status4 = 'OFF';
                    $color4 = '#d9534f';
                  } else {
                    $status4 = 'ON';
                    $color4 = '#0275d8';
                  }
                  if($type == 'Running Hour'){
                    echo '       
                  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                    <div class="row">
                        <div class="col-sm-9 text-left">
                            <span class="badge bg-primary">' . $row['id'] . '</span>
                        </div>
                    </div>
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>' . $row['name'] . '</b></h2>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Merk </b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd float-right">' . $row['merk'] . '</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Kapasitas </b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd float-right">' . $row['engine_description'] . '</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Weight </b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd">' . $row['weight'] . ' Kg</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Condition</b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd">' . $row['engine_condition'] . '</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Status</b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd" id="badge"><span id="badgeee" class="badge badge-danger">OFF</span></div>
                          </div>
                        </div>
                     
                        <div class="col-5 text-center">
                          <img src="photo/' . $row['engine_picture'] . '" style="object-fit:cover; width:150px; height:130px" alt="user-avatar" class=" img-fluid">
                          <span type="button" class="mt-2 btn btn-block btn-primary btn-xs crd">Running Hour : ' . $hour . 'h ' . $minute . 'm</span>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="row">
                        <div class="col-sm-4" '.$hide1.'>
                        <a title="Start Engine" onclick="start2('.'\''.$row["id"].'\''.')" class=""><i class="fa-solid fa-gears text-left"><img type="button" src="https://sisemocs.com/hourmeter/photo/Start Stop Engine.png" class="float-left img-circle" style="width:70px; height:70px float:left"></i>
                        </a>
                      </div>
                      <div class="text-right pt-4" '.$hide1.'>
                        <a title="Delete" onclick="deletee('.'\''.$row["id"].'\''.')" class="btn btn-sm bg-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                        <a title="Reset" class="btn btn-sm bg-warning" onclick="reset('.'\''.$row["id"].'\''.')">
                          <i style="color:white" class="fas fa-sync-alt"></i>
                        </a>
                        <a title="Detail" onclick="detail2('.'\''.$row["id"].'\''.')" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Detail
                        </a>
                        <a title="Export PDF" onclick="exp('.'\''.$row["id"].'\''.')" class="btn btn-sm bg-teal">
                          <i class="fas fa-file-export"></i>
                        </a>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                ';  
                  }else{
                echo '       
                  <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                  <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                    <div class="row">
                        <div class="col-sm-9 text-left">
                            <span class="badge bg-primary">' . $row['id'] . '</span>
                        </div>
                    </div>
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>' . $row['name'] . '</b></h2>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Merk </b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd float-right">' . $row['merk'] . '</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Kapasitas </b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd float-right">' . $row['engine_description'] . '</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Weight </b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd">' . $row['weight'] . ' Kg</div>
                          </div>
                          <div class="row">
                            <div class="col-sm-4 crd"><b>Condition</b></div>
                            <div class="col-sm-1 crd">:</div>
                            <div class="col-sm-7 text-muted crd">' . $row['engine_condition'] . '</div>
                          </div>
                        </div>
                     
                        <div class="col-5 text-center">
                          <img src="photo/' . $row['engine_picture'] . '" style="object-fit:cover; width:150px; height:130px" alt="user-avatar" class=" img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <a title="Delete" onclick="deletee('.'\''.$row["id"].'\''.')" class="btn btn-sm bg-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                    </div>
                  </div>
                </div>
                ';      
                  }
                echo '
                <script>
                setInterval(function () {
                    load('.'\''.$row["id"].'\''.');
                }, 5000);
                </script>
                ';
                } ?>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
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
  // $(function () {
  $("#example1").DataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "responsive": true,
    "buttons": ["excel", "print"],
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
  // });
</script>

<script>
  function reset(id) {
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

  function reseted(id) {
    $.ajax({
      url: "reset.php",
      type: 'POST',
      data: {
        id: id
      },
      success: function(data) {
        if (data == 'ok') {
          location.reload();
        } else {
          alert('Reset Failed');
        }
      }
    });
  };
</script>
<script>
    function load(id) {
    $.ajax({
      url: "realtime_status.php",
      type: 'POST',
      data: {
        id: id
      },
      success: function(data) {
        if (parseInt(data) > 0) {
            $("#badgeee").addClass("bg-success");
            $("#badgeee").removeClass("bg-danger");
            $("#badgeee").html("ON");
        } else {
            $("#badgeee").addClass("bg-danger");
            $("#badgeee").removeClass("bg-success");
            $("#badgeee").html("OFF");
        }
      }
    });
  };
</script>

<script>
  function deletee(id) {
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

  function deleteed(id) {
    $.ajax({
      url: "delete.php",
      type: 'POST',
      data: {
        id: id
      },
      success: function(data) {
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
  function start2(id) {
    Swal.fire({  
      title: 'Are you sure to Start Engine?',
      text: "Insert the password if you want to start the Engine ",
      html: `
        <text>The Engine Will be Started. If stats does not change to ON, please repeat again.</text>
        <form class="form-horizontal" name="myForm" ;>
            <div class="card-body">            
                <div class="form-group row">
                    <div class="col-sm-12">
                    <input type="password" class="form-control" id="inputPass" placeholder="Insert the password if you want to start the Engine" style="text-align: center;">
                    </div>
                </div>
            </div>
        </form>`,
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Start Engine!'
    }).then((result) => {
      var pass = $('#inputPass').val();
      if (result.isConfirmed) {
        if(pass=="12345"){
            starts2(id);
            Swal.fire(
              'Started!',
              'If stats does not change to ON, please repeat again.',
              'success'
            )
        }else{
        alert("Can Start Engine\nMake Sure The Password is Correct");
        }
      }      
    })
  };

  function starts2(id) {
    $.ajax({
      url: "start.php",
      type: 'POST',
      data: {
        id: id
      },
      success: function(data) {
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
  function start(id) {
    Swal.fire({
      title: 'Are you sure to Start Engine?',
      text: "The Engine Will be Started. If stats does not change to ON, please repeat again. ",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Start Engine!'
    }).then((result) => {
      if (result.isConfirmed) {
        starts(id);
        Swal.fire(
          'Started!',
          'If stats does not change to ON, please repeat again.',
          'success'
        )
      }
    })
  };

  function starts(id) {
    $.ajax({
      url: "start.php",
      type: 'POST',
      data: {
        id: id
      },
      success: function(data) {
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
      data: {
        user: username,
        pass: pass
      },
      success: function(data) {
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
      success: function(data) {
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
  function detail2(id, img_name) {
    var engine_id = id;
    $.ajax({
      url: "detail3.php",
      type: 'POST',
      data: {
        id: id,
        img_name: img_name
      },
      //success: function (data) {
      success: function(response) {
        $('#modal-body').html(response);
        $('#empModal2').modal('show');
      }
    });
  };
    function exp(id) {
        $('#empModal3').modal('show');
        $('#idmesin').val(id);
  };
</script>
<script>
// function exportpdf() {
//     var id = $('#idmesin').val();
//     var oil = $('#oil').val();
//     var diap = $('#diap').val();
//     var valve = $('#valve').val();
//     var screw = $('#screw').val();
//     var rem_oil = $('#rem_oil').val();
//     var rem_diap = $('#rem_diap').val();
//     var rem_valve = $('#rem_valve').val();
//     var rem_screw = $('#rem_screw').val();
//     var manager = $('#manager').val();
//     $.ajax({
//       url: "exp_pdf.php",
//       type: 'POST',
//       data: {
//         'id': id, 'oil':oil, 'diap':diap, 'valve':valve, 'screw':screw, 'rem_oil':rem_oil, 'rem_diap':rem_diap, 'rem_valve':rem_valve, 'rem_screw':rem_screw, 'manager':manager
//       },
//       success: function(data) {
//         if (data == 'success') {
//           location.reload();
//         } else {
//           alert('Failed');
//         }
//       }
//     });
//   }
</script>
<div class="modal fade" id="empModal2" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Engine Detail</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>

      <!--Modal Body-->
      <div class="modal-body" id="modal-body">
      </div>
      <!--<div class="modal-footer">-->
      <!--<button type="button" class="btn btn-primary" data-dismiss="modal">Export PDF</button>-->

      <!--</div>-->
    </div>
  </div>
</div>
<div class="modal fade" id="empModal3" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Export PDF</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>

      <!--Modal Body-->
      <div class="modal-body">
          <form method="POST" action="exp_pdf.php">
    <div class="row">
            <input type="hidden" name="id" class="form-control" id="idmesin">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="rem_oil" placeholder="Remarks Inflation Pressure">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" value="1" class="form-check-input" name="oil">
                    <label class="form-check-label" for="exampleCheck1">Inflation Pressure</label>
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="rem_diap" placeholder="Remarks Water Intake">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" value="1" class="form-check-input" name="diap">
                    <label class="form-check-label" for="exampleCheck1">Water Intake</label>
                </div>
            </div>
        
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="rem_valve" placeholder="Remarks Pump Fastened">
                </div>        
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" value="1" class="form-check-input" name="valve">
                    <label class="form-check-label" for="exampleCheck1">Pump Fastened</label>
                </div>
            </div>
        
            <div class="col-md-6" hidden>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="rem_screw" placeholder="Remarks Screw Check">
                </div>        
            </div>
            <div class="col-md-6" hidden>
                <div class="form-check">
                    <input type="hidden" value="1" class="form-check-input" name="screw">
                    <label class="form-check-label" for="exampleCheck1">Check Screw</label>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="manager" placeholder="Port Manager Makassar">
                </div> 
            </div>
            <div class="col-md-9">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type=submit>Export PDF</button>
                <!--<a title="Export" onclick="exportpdf()" class="btn btn-sm bg-primary">Export PDF</a>-->
            </div>
            </form>
    </div>
  
        


</div>
      <!--<div class="modal-footer">-->
      <!--<button type="button" class="btn btn-primary" data-dismiss="modal">Export PDF</button>-->

      <!--</div>-->
    </div>
  </div>
</div>
<script>
//   function exportpdf(id, img_name) {
//     var engine_id = id;
//     $.ajax({
//       url: "download_detail.php",
//       type: 'POST',
//       data: {
//         id: id,
//         img_name: img_name
//       },
//       //success: function (data) {
//       success: function(response) {
//         $('.modal-body').html(response);
//         $('#empModal3').modal('show');
//       }
//     });
//   };
</script>

</body>

</html>