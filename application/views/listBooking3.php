<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from shreethemes.in/landrick/layouts/job-apply.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:17 GMT -->
<head>
        <meta charset="utf-8" />
        <title>List Data</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="website" content="https://shreethemes.in/" />
        <meta name="Version" content="v3.5.0" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/sisemocs-logo3.png">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/line.css">
        <!-- Main Css -->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/cupertino/jquery-ui.css">
        <style type="text/css">
          table{
            font-size: 14px;
          }
        </style>
    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->
        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky bg-white">
            <div class="container">
                <!-- Logo container-->
                <a class="logo" href="index.html">
                    <img src="images/sisemocs-logo1.png" height="40" class="logo-light-mode" alt="">
                    <img src="images/logo-light.png" height="24" class="logo-dark-mode" alt="">
                </a>
                
                <!-- Logo End -->

                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <!--Login button Start-->
                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item mb-0">
                        <a href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <div class="nav-light"><?php echo $_SESSION['name']; ?></div>
                        </a>
                    </li>
                    
                    <li class="list-inline-item ps-1 mb-0">
                        <a href="login/logout">
                            <div class="login-btn-primary"><span class="btn btn-icon btn-pills btn-primary"><i data-feather="log-out" class="fea log-out"></i></span></div>
                            <div class="login-btn-light"><span class="btn btn-icon btn-pills btn-light"><i data-feather="log-out" class="fea log-out"></i></span></div>
                        </a>
                    </li>
                </ul>
                <!--Login button End-->
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="Home" class="sub-menu-item">Home</a></li>
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Port List</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Sulawesi </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="Makassar" class="has-submenu parent-menu-item">Makassar</a></li>
                                        <li><a href="#" class="sub-menu-item">Bau-Bau</a></li>
                                        <li><a href="#" class="sub-menu-item">Poso</a></li>
                                        <li><a href="#" class="sub-menu-item">Donggala</a></li>
                                        <li><a href="#" class="sub-menu-item">Raha</a></li>
                                        <li><a href="#" class="sub-menu-item">Kendari</a></li>
                                        <li><a href="#" class="sub-menu-item">Moutong</a></li>
                                        <li><a href="#" class="sub-menu-item">Pare-pare</a></li>
                                        <li><a href="#" class="sub-menu-item">Toli-toli</a></li>
                                        <li><a href="#" class="sub-menu-item">Palopo</a></li>
                                        <li><a href="#" class="sub-menu-item">Gorontalo</a></li>
                                        <li><a href="#" class="sub-menu-item">Kolonedale</a></li>
                                        <li><a href="#" class="sub-menu-item">Bitung</a></li>
                                        <li><a href="#" class="sub-menu-item">Banggai</a></li>
                                        <li><a href="#" class="sub-menu-item">Tahuna</a></li>
                                        <li><a href="#" class="sub-menu-item">Luwuk</a></li>
                                    </ul> 
                                </li>   
                            </ul>
                        </li>
                        <?php  
                        if ($_SESSION['role']==3){ 
                            // echo '
                            // <li class="has-submenu parent-parent-menu-item">
                            // <a href="javascript:void(0)">Order</a><span class="menu-arrow"></span>
                            // <ul class="submenu">
                            //     <li><a href="Order" class="has-submenu parent-menu-item">Upload LO</a></li>
                            //     <li><a href="ViewOrder" class="sub-menu-item">View LO</a></li>   
                            // </ul>
                            // </li>
                            // ';

                            echo '<li><a href="addUser" class="sub-menu-item">Add User</a></li>';
                        }
                        // else if($_SESSION['role']==2){
                        //     echo '
                        //     <li class="has-submenu parent-parent-menu-item">
                        //     <a href="javascript:void(0)">Order</a><span class="menu-arrow"></span>
                        //     <ul class="submenu">
                        //         <li><a href="Order" class="has-submenu parent-menu-item">Upload LO</a></li>
                        //         <li><a href="ViewOrder" class="sub-menu-item">View LO</a></li>   
                        //     </ul>
                        //     </li>
                        //     ';
                        // }

                        ?>
                    </ul>
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        
        <!-- Hero Start -->
        
        <!-- Hero End -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->
        <section style="padding-top: 100px">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="Makassar">View Makassar</a>
          </li>
          <?php  
          if ($_SESSION['role']>1){
            echo '
            <li class="nav-item">
            <a class="nav-link active" href="ListBooking">Planned Vessel</a>
            </li>
            ';
          }

          if ($_SESSION['role']==3){
            echo '
            <li class="nav-item">
            <a class="nav-link" href="Detail">Detail Data</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="AddVessel">Add Vessel Name</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="https://sisemocs.com/hourmeter/index.php?role=3">DIPMA</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Pdf_setting">PDF Setting</a>
            </li>
            ';
          }
          ?>
        </ul>
        <!-- Job apply form Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-7">
                        <div class="p-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded" id="pills-tab" role="tablist">
                                                    <?php   
                                                        if ($_SESSION['role']==3) {
                                                            echo '
                                                            <li class="nav-item">
                                                                <a class="nav-link rounded" href="listBooking">
                                                                    <div class="text-center py-2">
                                                                        <h6 class="mb-0">Jetty 1</h6>
                                                                    </div>
                                                                </a><!--end nav link-->
                                                            </li><!--end nav item-->
                                                            <li class="nav-item">
                                                                <a class="nav-link rounded" href="listBooking2">
                                                                    <div class="text-center py-2">
                                                                        <h6 class="mb-0">Jetty 2</h6>
                                                                    </div>
                                                                </a><!--end nav link-->
                                                            </li>
                                                            ';
                                                        }
                                                    ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link rounded active" href="listBooking3">
                                                            <div class="text-center py-2">
                                                                <h6 class="mb-0">Jetty 3</h6>
                                                            </div>
                                                        </a><!--end nav link-->
                                                    </li>
                                                    <?php   
                                                        if ($_SESSION['role']==3) {
                                                            echo '
                                                            <li class="nav-item">
                                                                <a class="nav-link rounded" href="listBooking4">
                                                                    <div class="text-center py-2">
                                                                        <h6 class="mb-0">Vessel Activity</h6>
                                                                    </div>
                                                                </a><!--end nav link-->
                                                            </li>
                                                            ';
                                                        }
                                                    ?>
                                                </ul><!--end nav pills-->
                                            </div><!--end col-->
                                        </div><!--end row-->

                                        <div class="row pt-2">
                                            <div class="col-12">
                                                <div class="tab-content" id="pills-tabContent">
                        
                                                    <div class="tab-pane active fade show" id="pills-apps" role="tabpanel" aria-labelledby="pills-apps-tab">
                                                    <a href="jetty3" class="btn btn-primary btn-sm mb-3">Input Jetty 3</a>
                                                        <center>
                                                          <table id="example3" class="table table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                              <th>id</th>
                                                              <th>Ship Name</th>
                                                              <th>Nama PT</th>
                                                              <th>Status Loading</th>
                                                              <th>ROB</th>
                                                              <th>Tujuan</th>
                                                              <th>ETB</th>
                                                              <th>ETC</th>
                                                              <th>ETD</th>
                                                              <th>Loading Product</th>
                                                              <th>Nominasi</th>
                                                              <th>Request</th>
                                                              <th>Status</th>
                                                              <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php  
                                                            foreach ($jetty3->result() as $row)  
                                                            {  
                                                               ?>
                                                               <tr>
                                                               <td><?php echo $row->id_booking; ?></td>  
                                                               <td><?php echo $row->ship_name; ?></td>  
                                                               <td><?php echo $row->name; ?></td>
                                                               <td><?php echo $row->status_loading; ?></td>
                                                               <td><?php echo $row->rob; ?></td>
                                                               <td><?php echo $row->tujuan; ?></td>
                                                               <td><?php echo $row->time_start; ?></td>
                                                               <td><?php echo $row->time_end; ?></td>
                                                               <td><?php echo $row->etd; ?></td>
                                                               <td><?php echo $row->loading_product; ?></td>
                                                               <td><?php echo $row->nominasi_loading; ?></td>
                                                               <td><?php echo $row->request_tambahan; ?></td>
                                                               <td><?php 
                                                                    if($row->status==0){
                                                                        echo '<span class="badge bg-warning"> Aw. Verification 1 </span>';
                                                                    }else if($row->status==1){
                                                                        echo '<span class="badge bg-success"> Terverifikasi </span>';
                                                                    }else if($row->status==3){
                                                                        echo '<span class="badge bg-warning"> Aw. Verification 2 </span>';
                                                                    }else{
                                                                      echo '<span class="badge bg-primary"> Selesai </span>';
                                                                    }
                                                                    ?></td>
                                                               <td><center><button id="edit3" class="btn btn-icon btn-primary"><i data-feather="edit-3" class="fea icon-sm"></i></button><button id="delete3" class="btn btn-icon btn-danger"><i data-feather="trash" class="fea icon-sm"></i></button></center></td>  
                                                               </tr>  
                                                            <?php }  
                                                            ?>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                              <th>id</th>
                                                              <th>Ship Name</th>
                                                              <th>Nama PT</th>
                                                              <th>Status Loading</th>
                                                              <th>ROB</th>
                                                              <th>Tujuan</th>
                                                              <th>ETB</th>
                                                              <th>ETC</th>
                                                              <th>ETD</th>
                                                              <th>Loading Product</th>
                                                              <th>Nominasi</th>
                                                              <th>Request</th>
                                                              <th>Status</th>
                                                              <th>Action</th>
                                                            </tr>
                                                            </tfoot>
                                                          </table>
                                                          </center>                       
                                                    </div><!--end teb pane-->
                                                </div><!--end tab content-->
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                    </div>  
                </div>
            </div><!--end container-->
        </section><!--end section-->
        <!-- Job apply form End -->

        <!-- Footer Start -->
        <footer class="footer">    
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60">
                            <div class="row">
                                <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                                    <a href="#" class="logo-footer">
                                        <img src="assets/images/pertamina.png" height="40" alt="">
                                    </a>
                                    <p class="mt-4">Jl. Medan Merdeka Timur 1A, Jakarta 10110 <br>Email: pcc135@pertamina.com</p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="https://www.facebook.com/pertamina/" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.instagram.com/pertamina" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="https://twitter.com/pertamina" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.linkedin.com/company/pertamina" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.youtube.com/user/PTPertamina" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                                    </ul><!--end icon-->
                                </div><!--end col-->
                                
                                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Company</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> About us</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Team</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Pricing</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Project</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Careers</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Blog</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Login</a></li>
                                    </ul>
                                </div><!--end col-->
                                
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Usefull Links</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Terms of Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Privacy Policy</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Documentation</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Changelog</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="uil uil-angle-right-b me-1"></i> Components</a></li>
                                    </ul>
                                </div><!--end col-->
            
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Newsletter</h5>
                                    <p class="mt-4">Sign up and receive the latest tips via email.</p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="foot-subscribe mb-3">
                                                    <label class="form-label">Write your email <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="Your email : " required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-grid">
                                                    <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="Subscribe">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="footer-py-30 footer-bar">
                <div class="container text-center">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="text-sm-start">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> SISEMOCS. All Rights Reserved</p>
                            </div>
                        </div><!--end col-->
    
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->
        <!-- Footer End -->

        <!-- Offcanvas Start -->
        

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- end Style switcher -->
        <div class="modal hide fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
              </div>
              <div class="modal-body">
                Data yang dihapus tidak dapat di restore.
              </div>
              <div class="modal-footer">
                <input type="hidden" id="jetty1id">
                <a type="button" class="close btn btn-secondary" id="modalClose" data-dismiss="modal">Batal</a>
                <a type="button" id="deletejetty1" class="btn btn-primary">Hapus</a>
              </div>
            </div>
          </div>
        </div>
        <div class="modal hide fade" id="phoneModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
              </div>
              <div class="modal-body">
                Data yang dihapus tidak dapat di restore.
              </div>
              <div class="modal-footer">
              <input type="hidden" id="jetty2id">
                <a type="button" class="close btn btn-secondary" id="modalClose2" data-dismiss="modal">Batal</a>
                <a type="button" id="deletejetty2" class="btn btn-primary">Hapus</a>
              </div>
            </div>
          </div>
        </div>
        <div class="modal hide fade" id="phoneModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
              </div>
              <div class="modal-body">
                Data yang dihapus tidak dapat di restore.
              </div>
              <div class="modal-footer">
              <input type="hidden" id="jetty3id">
                <a type="button" class="close btn btn-secondary" id="modalClose3" data-dismiss="modal">Batal</a>
                <a type="button" id="deletejetty3" class="btn btn-primary">Hapus</a>
              </div>
            </div>
          </div>
        </div>
        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

        <script>
    $('#example1').DataTable( {
      order: [ [ 0, "desc" ] ],
      responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
        },
        {
                "targets": [ 0 ],
                "visible": false,
                "searchable": true
        },
         ]
    } );
    var table = $('#example1').DataTable();
     
    $('#example1 tbody').on('click', '#edit1', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var nmr = data[0];
        window.location.href='jetty1_edit?id='+nmr;
        // alert( 'You clicked on '+data[0]+'\'s row' );
    });
    $('#example1 tbody').on('click', '#delete1', function () {
        var data = table.row( $(this).parents('tr') ).data();
        // alert( 'You clicked on '+data[0]+'\'s row' );
        var nmr = data[0];
          $('#jetty1id').val(data[0]);
          $('#phoneModal').modal('show');
    });
    $(function () {
        $('#modalClose').on('click', function () {
            $('#phoneModal').modal('hide');
        })
    });


    $('#example2').DataTable( {
      order: [ [ 0, "desc" ] ],
      responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
        },
        {
                "targets": [ 0 ],
                "visible": false,
                "searchable": true
        },
         ]
    } );
    var table2 = $('#example2').DataTable();
     
    $('#example2 tbody').on('click', '#edit2', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        var nmr = data[0];
        window.location.href='jetty2_edit?id='+nmr;
        
    });
    $('#example2 tbody').on('click', '#delete2', function () {
        var data = table2.row( $(this).parents('tr') ).data();
        // alert( 'You clicked on '+data[0]+'\'s row' );
        $('#jetty2id').val(data[0]);
        var nmr = data[0];
          
          $('#phoneModal2').modal('show');
    });
    $(function () {
        $('#modalClose2').on('click', function () {
            $('#phoneModal2').modal('hide');
        })
    });

    $('#example3').DataTable( {
      order: [ [ 0, "desc" ] ],
      responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        columnDefs: [ {
            className: 'control',
            orderable: false,
        },
        {
                "targets": [ 0 ],
                "visible": false,
                "searchable": true
        },
         ]
    } );
    var table3 = $('#example3').DataTable();
     
    $('#example3 tbody').on('click', '#edit3', function () {
        var data = table3.row( $(this).parents('tr') ).data();
        var nmr = data[0];
        window.location.href='jetty3_edit?id='+nmr;
    });
    $('#example3 tbody').on('click', '#delete3', function () {
        var data = table3.row( $(this).parents('tr') ).data();
        var nmr = data[0];
          $('#jetty3id').val(data[0]);
          $('#phoneModal3').modal('show');
    });
    $(function () {
        $('#modalClose3').on('click', function () {
            $('#phoneModal3').modal('hide');
        })
    })

</script>
<script type="text/javascript">
        $('#deletejetty1').on('click', function () {
            var id = $('#jetty1id').val();
            $("#deletejetty1").prop("href", "listBooking/delete1?id="+id)
        });
        $('#deletejetty2').on('click', function () {
            var id = $('#jetty2id').val();
            $("#deletejetty2").prop("href", "listBooking/delete2?id="+id)
        });
        $('#deletejetty3').on('click', function () {
            var id = $('#jetty3id').val();
            $("#deletejetty3").prop("href", "listBooking/delete3?id="+id)
        });
</script>
    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/job-apply.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:17 GMT -->
</html>