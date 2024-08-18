<?php
include "config.php";
if(isset($_SESSION['role'])){
  $hide1 = "";
  $hide2 = "hidden";
  $_SESSION['name'] = "Port Makassar";
}else{
  $hide1 = "hidden";
  $hide2 = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DIPMA</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://sisemocs.com/images/sisemocs-logo3.png" rel='shorcut icon'>
  <style>th {text-align:center}</style>

<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: grey;
  color: #fff;
  text-align: center;  
  border-color: black;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

.crd{
    font-size: 10px;
    padding-right: 5px;
}
</style>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown" <?php echo $hide1;?>>
        <a class="nav-link" href="http://sisemocs.com">
          <label>Back to Sisemocs</label>
        </a>
      </li>
      <li class="nav-item dropdown" <?php echo $hide2;?>>
        <!--<a class="nav-link" data-toggle="dropdown" href="#">-->
        <!--  <label>Login</label>-->
        <!--</a>-->

        <!-- Start -->
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- Horizontal Form -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Login Admin</h3>
              </div>
              <!-- /.card-header -->
            <form class="form-horizontal">
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-4 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputUsername" placeholder="Username">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                  </div>
                </div>
                <!-- <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck2">
                      <label class="form-check-label" for="exampleCheck2">Remember me</label>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
                <a class="btn btn-primary float-right" onclick="login()">Login</a>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>
        </div>
        <!-- End -->
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="https://sisemocs.com/images/sisemocs-logo3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b>DIPMA</b></span><br>
      <center><b class="brand-text font-weight-light center" style="font-size: 14px;">Digitalization Preventive Maintenance</b></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="visibility:<?php echo $hide1;?>">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link <?php echo $dashboard;?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item" <?php echo $hide1;?>>
            <a href="add_new.php" class="nav-link <?php echo $addnew;?>">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add New
              </p>
            </a>
          </li>

          <li class="nav-item" <?php echo $hide1;?>>
            <a href="email.php" class="nav-link <?php echo $email;?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Email
              </p>
            </a>
          </li>

          <!--<li class="nav-item" <?php echo $hide1;?>>-->
          <!--  <a href="recent_history.php" class="nav-link <?php echo $recenthistory;?>">-->
          <!--    <i class="nav-icon fas fa-hourglass"></i>-->
          <!--    <p>-->
          <!--      Recent History-->
          <!--    </p>-->
          <!--  </a>-->
          <!--</li>-->

          <li class="nav-item" <?php echo $hide1;?>>
            <a href="history.php" class="nav-link <?php echo $history;?>">
              <i class="nav-icon fas fa-hourglass"></i>
              <p>
                History
              </p>
            </a>
          </li>
          
          <li class="nav-item" <?php echo $hide1;?>>
            <a href="preventive.php" class="nav-link <?php echo $prevent;?>">
              <i class="nav-icon fa fa-check-square"></i>
              <p>
                Special Maintenance
              </p>
            </a>
          </li>
          
          <li class="nav-item" <?php echo $hide1;?>>
            <a href="warming.php" class="nav-link <?php echo $warming;?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Warming
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>