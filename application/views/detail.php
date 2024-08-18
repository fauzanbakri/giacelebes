

<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from shreethemes.in/landrick/layouts/index-online-learning.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:11:42 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Detail</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="website" content="https://shreethemes.in/" />
        <meta name="Version" content="v3.5.0" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/sisemocs-logo3.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <!-- tobii css -->
        <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/line.css">
        <!-- Slider -->               
        <link rel="stylesheet" href="css/tiny-slider.css"/>
        <link href="css/simplebar.css" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
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
        <section style="padding-top: 100px">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="Makassar">View Makassar</a>
          </li>
          <?php  
          if ($_SESSION['role']==2 OR $_SESSION['role']==3 OR $_SESSION['role']==4){
            echo '
            <li class="nav-item">
            <a class="nav-link" href="ListBooking">Planned Vessel</a>
            </li>
            ';
          }

          if ($_SESSION['role']==3){
            echo '
            <li class="nav-item">
            <a class="nav-link active" href="Detail">Detail Data</a>
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
        <!-- Hero Start -->
        <section class="section">
            <div class="" style="margin-right:30px; margin-left:30px;margin-top:-50px;">
                <label class="form-label"> Filter :</label>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <div class="form-icon position-relative md-form md-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar fea icon-sm icons"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <input name="mindate" id="min" onkeydown="return false" type="text" class=" form-control ps-5 example" placeholder="Start :">
                            </div>
                        </div>
                    </div>
                    _
                    <div class="col-md-3">
                        <div class="mb-3">
                            <div class="form-icon position-relative md-form md-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar fea icon-sm icons"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                <input name="maxdate" id="max" onkeydown="return false" type="text" class=" form-control ps-5 example" placeholder="End :">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button id="clear" class="btn btn-primary btn-sm mb-3">Clear</button>
                    </div>
                </div>
                <div class="row"> 
                    <table style="font-size: 10px" id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>id</th>
                          <th id="zzz">Jetty</th>
                          <th>Ship Name</th>
                          <th>Nama PT</th>
                          <th>ATA</th>
                          <th>Berthed</th>
                          <th>Completed</th>
                          <th>Departure</th>
                          <th>Loading Produk</th>
                          <th>Nominasi Loading (KL)</th>
                          <th>Request</th>
                          <th>Last Port</th>
                          <th>Next Port</th>
                          <th>Cargo</th>
                          <th>Bunker</th>
                          <th>Remarks</th>
                          <th>Status</th>
                          <th>Back Jetty 3</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                        foreach ($data->result() as $row)  
                        {  
                           ?>
                           <tr>
                           <td><?php echo $row->id_jetty; ?></td>
                           <td><?php echo $row->src; ?></td> 
                           <td><?php echo $row->ship_name; ?></td>  
                           <td><?php echo $row->user; ?></td>
                           <td><?php echo $row->ATA; ?></td>
                           <td><?php echo $row->etb; ?></td>
                           <td><?php echo $row->etc; ?></td>
                           <td><?php echo $row->etd; ?></td>
                           <td><?php echo $row->loading_product; ?></td>
                           <td><?php echo $row->nominasi_loading; ?></td>
                           <td><?php echo $row->request_tambahan; ?></td>
                           <td><?php echo $row->last_port; ?></td>
                           <td><?php echo $row->next_port; ?></td>
                           <td><?php echo $row->cargo; ?></td>
                           <td><?php echo $row->bunker; ?></td>
                           <td><?php echo $row->remarks; ?></td>
                           <td><?php 
                                if($row->status==0 AND $row->src=='Jetty 3'){
                                    echo '<span class="badge bg-warning"> Belum Verifikasi </span>';
                                }else if($row->status==1 AND $row->src=='Jetty 3'){
                                    echo '<span class="badge bg-success"> Terverifikasi </span>';
                                }else if($row->status==2 AND $row->src=='Jetty 3'){
                                  echo '<span class="badge bg-danger"> Selesai </span>';
                                
                                }else if($row->status==2 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
                                  echo '<span class="badge bg-primary"> Anchored </span>';
                                }else if($row->status==1 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
                                  echo '<span class="badge bg-success">At Jetty</span>';
                                }else if($row->status==0 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
                                  echo '<span class="badge bg-warning"> Next Berthing </span>';
                                }else if($row->status==3 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
                                  echo '<span class="badge bg-danger"> Selesai </span>';
                                }else if($row->status==4 AND ($row->src=='Jetty 2' OR $row->src=='Jetty 1')){
                                  echo '<span class="badge bg-dark"> Incoming </span>';

                                }else if($row->status==0 AND $row->src=='Vessel Activity'){
                                  echo '<span class="badge bg-primary"> Anchored </span>';
                                }else if($row->status==1 AND $row->src=='Vessel Activity'){
                                  echo '<span class="badge bg-info"> Clearance Only </span>';
                                }else if($row->status==2 AND $row->src=='Vessel Activity'){
                                  echo '<span class="badge bg-dark"> Incoming </span>';
                                }else{
                                    echo '<span class="badge bg-info"> Departure </span>';
                                }
                                ?></td>
                                <td>
                                    <?php
                                    if($row->status==2 AND $row->src=='Jetty 3'){
                                        echo '<button id="back" class="badge btn-xs btn-primary">Back</button>';
                                    }
                                    ?>
                                </td>
                           </tr>  
                        <?php }  
                        ?>
                        </tbody>  
                        <tfoot>
                      
                        </tfoot>  
                    </table>
                </div><!--end row-->
                <div class="row">
                    <div class="col-sm-5">
                        <a href="Detail/downloadjetty1" class="btn btn-primary btn-sm mb-3">Download Jetty 1</a>
                        <a href="Detail/downloadjetty2" class="btn btn-primary btn-sm mb-3">Download Jetty 2</a>
                        <a href="Detail/downloadjetty3" class="btn btn-primary btn-sm mb-3">Download Jetty 3</a>
                        <a href="Detail/download" class="btn btn-primary btn-sm mb-3">Download All Data</a>
                    </div>
                </div>
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->

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

        <!-- Offcanvas Start -->
        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- Style switcher -->
        <div id="style-switcher" class="bg-light border p-3 pt-2 pb-2" onclick="toggleSwitcher()">
            <div>
                <h6 class="title text-center">Select Your Color</h6>
                <ul class="pattern">
                    <li class="list-inline-item">
                        <a class="color1" href="javascript: void(0);" onclick="setColor('default')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color2" href="javascript: void(0);" onclick="setColor('green')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color3" href="javascript: void(0);" onclick="setColor('purple')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color4" href="javascript: void(0);" onclick="setColor('red')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color5" href="javascript: void(0);" onclick="setColor('skyblue')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color6" href="javascript: void(0);" onclick="setColor('skobleoff')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color7" href="javascript: void(0);" onclick="setColor('cyan')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color8" href="javascript: void(0);" onclick="setColor('slateblue')"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="color9" href="javascript: void(0);" onclick="setColor('yellow')"></a>
                    </li>
                </ul>

                <h6 class="title text-center pt-3 mb-0 border-top">Theme Option</h6>
                <ul class="text-center list-unstyled mb-0">
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary rtl-version t-rtl-light mt-2" onclick="setTheme('style-rtl')">RTL</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary ltr-version t-ltr-light mt-2" onclick="setTheme('style')">LTR</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-rtl-version t-rtl-dark mt-2" onclick="setTheme('style-dark-rtl')">RTL</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-primary dark-ltr-version t-ltr-dark mt-2" onclick="setTheme('style-dark')">LTR</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark dark-version t-dark mt-2" onclick="setTheme('style-dark')">Dark</a></li>
                    <li class="d-grid"><a href="javascript:void(0)" class="btn btn-sm btn-block btn-dark light-version t-light mt-2" onclick="setTheme('style')">Light</a></li>
                </ul>
            </div>
        </div>
        <!-- end Style switcher -->

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- SLIDER -->
        <script src="js/tiny-slider.js"></script>
         <script src="js/simplebar.min.js"></script>
        <!-- tobii js -->
        <script src="js/tobii.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
        var minDate, maxDate;
        $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
            var min1 = $('#min').datetimepicker({format: 'YYYY-MM-DD HH:mm'})
            var max1 = $('#max').datetimepicker({format: 'YYYY-MM-DD HH:mm'})
            var min = new Date($('#min').val());
            var max = new Date($('#max').val());
            var startDate = new Date(data[4]);
            if (min == 'Invalid Date' && max == 'Invalid Date') { return true; }
            if (min == null && startDate <= max) { return true; }
            if (max == null && startDate >= min) { return true; }
            if (startDate <= max && startDate >= min) { return true; }
            return false;
          }
        );
        $.fn.dataTable.ext.search.push(
          function (settings, data, dataIndex) {
            var jetty = $('#jetty').val()
            var tablejetty =data[1];
            if (jetty != 0) { return true; }
            return false;
          }
        );

        $(document).ready(function() {
         
            // DataTables initialisation
            var table = $('#example').DataTable( {
                            initComplete: function () {
                            this.api().columns([1]).every( function () {
                                var column = this;
                                var select = $('<select><option value=""></option></select>')
                                    .appendTo( $('#zzz'))
                                    .on( 'change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                        );
                 
                                        column
                                            .search( val ? '^'+val+'$' : '', true, false )
                                            .draw();
                                    } );
                 
                                column.data().unique().sort().each( function ( d, j ) {
                                    select.append( '<option value="'+d+'">'+d+'</option>' )
                                } );
                            } );
                        },
                          order: [ [ 1, "asc" ] ],
                          buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                          ],
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
                                    "searchable": false
                            },
                             ]
                        } );
                $('#example tbody').on('click', '#back', function () {
                var data = table.row( $(this).parents('tr') ).data();
                var nmr = data[0];
                // alert("Jetty 1");
                window.location.href='Detail/back?id='+nmr;
            });
            // Refilter the table
            $('#min, #max').on('dp.change', function () {
                table.draw();
            });
            $('#jetty').on('onchange click', function () {
                table.draw();
            });
            $('#clear').on('click', function (){
            $('#min, #max').val('');
            table.draw();
        });
        });

                function list(){    
                    $.ajax({
                        url: "Makassar/jetty3_list",
                        type: 'GET',
                        dataType: 'text',
                        success: function (data) {
                            // console.log(data.observations[0].imperial.temp);
                            $('#list').html(data);      
                        }
                    });
                }

                function list_jetty1(){ 
                    $.ajax({
                        url: "Makassar/jetty1_list",
                        type: 'GET',
                        dataType: 'text',
                        success: function (data) {
                            // console.log(data.observations[0].imperial.temp);
                            $('#jetty1').html(data);      
                        }
                    });
                }

                function list_jetty2(){ 
                    $.ajax({
                        url: "Makassar/jetty2_list",
                        type: 'GET',
                        dataType: 'text',
                        success: function (data) {
                            // console.log(data.observations[0].imperial.temp);
                            $('#jetty2').html(data);      
                        }
                    });
                }

                function wunder(){
                    $.ajax({
                        url: "https://api.weather.com/v2/pws/observations/current?stationId=IJENEP1&format=json&units=e&apiKey=4dd9c44d5243495099c44d5243c95038",
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // console.log(data.observations[0].imperial.temp);
                            $('#wind').html(data.observations[0].imperial.windSpeed);
                            $('#pressure').html(data.observations[0].imperial.pressure);
                            $('#humidity').html(data.observations[0].humidity);
                            $('#temperature').html(Math.round((parseInt(data.observations[0].imperial.temp)-32)*5/9));
                        }
                    });
                }
                list();
                list_jetty1();
                list_jetty2();
                wunder();
                setInterval(function(){ 
                    list();
                    wunder();
                }, 30000);
        </script>   
    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/index-online-learning.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:11:42 GMT -->
</html>