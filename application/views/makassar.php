

<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from shreethemes.in/landrick/layouts/job-list-four.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:15 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Makassar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="website" content="https://shreethemes.in/" />
        <meta name="Version" content="v3.5.0" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/sisemocs-logo3.png">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/line.css">
        <link href="css/simplebar.css" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
        <link rel="stylesheet" type="text/css" href="css/slide.css">
        <style type="">
            @keyframes alert{
                from {background-color: white;}
                to {background-color: red}
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
        <section style="padding-top: 100px">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="Makassar">View Makassar</a>
          </li>
          <?php  

          if ($_SESSION['role']==2 OR $_SESSION['role']==4){
            echo '
            <li class="nav-item">
            <a class="nav-link" href="ListBooking">Planned Vessel</a>
            </li>
            <li class="nav-item">
            ';
          }else if($_SESSION['role']==3){
            echo '
            <li class="nav-item">
            <a class="nav-link" href="ListBooking">Planned Vessel</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Detail">Detail Data</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="AddVessel">Add Vessel Name</a>
            </li>
            <a class="nav-link" href="https://sisemocs.com/hourmeter/index.php?role=3">DIPMA</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Pdf_setting">PDF Setting</a>
            </li>
            <li class="nav-item">
            ';
          }else if($_SESSION['role']==1){
            echo '
            <li class="nav-item">
            <a class="nav-link" href="Jetty3">Vessel Register Jetty 3</a>
            </li>
            ';
          }
          ?>
          </li>
        </ul>
        <!-- <div class="container">
                    <h6>View Makassar</h6>
        </div> -->
                    <div id="map" style="height: 400px"></div>
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Shape Start -->
        <!--Shape End-->
        
        <!-- Job List Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-bottom pb-4">
                            <div class="row">
                                <div class="col-lg-9 col-md-8">
                                    <div class="section-title">
                                    <div <?php if($_SESSION['role']!=3){echo "hidden";} ?> class="form custom-form">
                                            <button onclick='export1()' class="btn btn-outline-primary">Export</button>
                                            <button onclick='share()' class="btn btn-outline-primary">Share BP</button>
                                    </div>
                                    </div>
                                </div><!--end col-->
            
                                <div class="col-lg-3 col-md-4">
                                    <div <?php if($_SESSION['role']!=3){echo "hidden";} ?> class="form custom-form">
                                            <label class="form-label">Halaman Detail : </label>
                                            <a href="detail" class="btn btn-outline-primary">Detail</a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <center><a href="jetty1" class="btn btn-soft-primary">JETTY 1</a></center>
                    <div hidden class="warn alert alert-danger alert-dismissible fade show mb-2 mt-2" style="animation-name: alert; animation-duration: 2s;animation-iteration-count: infinite; background-color: white" role="alert">
                        <strong><i class="uil uil-exclamation-triangle"></i> Warning! </strong> Wind Speed Limit Exceed.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class="d-flex align-items-center features feature-clean shadow rounded p-4">
                            <div class="icons text-primary text-center">
                                <i class="uil uil-wind-sun d-block rounded h3 mb-0"></i><p style="font-size: 10px">Wind Speed</p><h6 class="wind">0Kn</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil uil-temperature-three-quarter d-block rounded h3 mb-0"></i><p style="font-size: 10px">Temperature</p><h6 class="temperature">0°C</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil uil-raindrops-alt d-block rounded h3 mb-0"></i><p style="font-size: 10px">Humidity</p><h6 class="humidity">0%</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil  uil-tachometer-fast-alt d-block rounded h3 mb-0"></i><p style="font-size: 10px">Pressure</p><h6 class="pressure">0In</h6>
                            </div>
                        </div>
                        </div> 
                    </div>
                    <label class="mt-4 form-label">Vessel at Jetty 1</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty1">
                            
                        </div>
                        </div>
                    </div>
                    <label class="mt-4 form-label">Next Berthing Plan Jetty 1</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty1berth">
                            
                        </div>
                        </div>
                    </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <center><a href="jetty2" class="btn btn-soft-primary">JETTY 2</a></center>
                    <div hidden class="warn alert alert-danger alert-dismissible fade show mb-2 mt-2" style="animation-name: alert; animation-duration: 2s;animation-iteration-count: infinite; background-color: white" role="alert">
                        <strong><i class="uil uil-exclamation-triangle"></i> Warning! </strong> Wind Speed Limit Exceed.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class="d-flex align-items-center features feature-clean shadow rounded p-4">
                            <div class="icons text-primary text-center">
                                <i class="uil uil-wind-sun d-block rounded h3 mb-0"></i><p style="font-size: 10px">Wind Speed</p><h6 class="wind">0Kn</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil uil-temperature-three-quarter d-block rounded h3 mb-0"></i><p style="font-size: 10px">Temperature</p><h6 class="temperature">0°C</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil uil-raindrops-alt d-block rounded h3 mb-0"></i><p style="font-size: 10px">Humidity</p><h6 class="humidity">0%</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil  uil-tachometer-fast-alt d-block rounded h3 mb-0"></i><p style="font-size: 10px">Pressure</p><h6 class="pressure">0In</h6>
                            </div>
                        </div>
                        </div> 
                    </div>
                    <label class="mt-4 form-label">Vessel at Jetty 2</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty2">
                            
                        </div>
                        </div>
                    </div>
                    <label class="mt-4 form-label">Next Berthing Plan Jetty 2</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty2berth">
                            
                        </div>
                        </div>
                    </div>
                    
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <center><a href="jetty3" class="btn btn-soft-primary">JETTY 3</a></center>
                    <div hidden class="warn alert alert-danger alert-dismissible fade show mb-2 mt-2" style="animation-name: alert; animation-duration: 2s;animation-iteration-count: infinite; background-color: white" role="alert">
                        <strong><i class="uil uil-exclamation-triangle"></i> Warning! </strong> Wind Speed Limit Exceed.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class="d-flex align-items-center features feature-clean shadow rounded p-4">
                            <div class="icons text-primary text-center">
                                <i class="uil uil-wind-sun d-block rounded h3 mb-0"></i><p style="font-size: 10px">Wind Speed</p><h6 id="wind" class="wind">0Kn</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil uil-temperature-three-quarter d-block rounded h3 mb-0"></i><p style="font-size: 10px">Temperature</p><h6 id="temperature" class="temperature">0°C</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil uil-raindrops-alt d-block rounded h3 mb-0"></i><p style="font-size: 10px">Humidity</p><h6 id="humidity" class="humidity">0%</h6>
                            </div>
                            <div class="icons text-primary ms-3 text-center">
                                <i class="uil  uil-tachometer-fast-alt d-block rounded h3 mb-0"></i><p style="font-size: 10px">Pressure</p><h6 id="pressure" class="pressure">0In</h6>
                            </div>
                        </div>
                        </div> 
                    </div>
                    <label class="mt-4 form-label">Jetty 3 Vessel Registered</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-0">
                        <div id="date_data">   
                                
                        </div>
                                <a class="prev" onclick="prevdate()">&#10094;</a>
                                <a class="next" onclick="nextdate()">&#10095;</a>

                            
                        </div>
                        </div>
                    </div>
                    <!-- <label class="mt-4 form-label">Next Berthing Plan Jetty 3</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4">
                            <div class="mb-2"><img src="images/shipicon.png" width="20px"><span class="ms-4">MT. ABCD</span></div>
                        </div>
                        </div>
                    </div> -->
                    </div>
                   

                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Job List End -->

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
        
        <!-- Offcanvas End -->

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- Style switcher -->
        
        <!-- end Style switcher -->

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Icons -->
        <script src="js/simplebar.min.js"></script>
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        <script type="text/javascript">
				function list(){	
					$.ajax({
			            url: "Makassar/Jetty3_list",
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
			            url: "Makassar/Jetty1_list",
			            type: 'GET',
			            dataType: 'text',
			            success: function (data) {
			            	// console.log(data.observations[0].imperial.temp);
			                $('#jetty1').html(data);      
			            }
			        });
				}

                function berth_jetty1(){ 
                    $.ajax({
                        url: "Makassar/Jetty1_berthed",
                        type: 'GET',
                        dataType: 'text',
                        success: function (data) {
                            // console.log(data.observations[0].imperial.temp);
                            $('#jetty1berth').html(data);      
                        }
                    });
                }
                function berth_jetty2(){ 
                    $.ajax({
                        url: "Makassar/Jetty2_berthed",
                        type: 'GET',
                        dataType: 'text',
                        success: function (data) {
                            // console.log(data.observations[0].imperial.temp);
                            $('#jetty2berth').html(data);      
                        }
                    });
                }

				function list_jetty2(){	
					$.ajax({
			            url: "Makassar/Jetty2_list",
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
			            url: "https://api.weather.com/v2/pws/observations/current?stationId=IMAKAS3&format=json&units=e&apiKey=b9035848e8f34874835848e8f3a874c2",
			            type: 'GET',
			            dataType: 'json',
			            success: function (data) {
			            	// console.log(data.observations[0].imperial.temp);
                            var wind = data.observations[0].imperial.windSpeed/1.151;
                            if (wind > 15){
                                $('.warn').removeAttr('hidden');
                            }else{
                                $('.warn').attr('hidden', true);
                            }
			                $('.wind').html(Math.round(wind)+"Kn");
			                $('.pressure').html(data.observations[0].imperial.pressure+"In");
			                $('.humidity').html(data.observations[0].humidity+"%");
			                $('.temperature').html(Math.round((parseInt(data.observations[0].imperial.temp)-32)*5/9)+"°C");
			            },
                        error: function () {
			            	api2();
			            }
			        });
				}
                function api2(){
                    $.ajax({
                            url: "https://api.weather.com/v2/pws/observations/current?stationId=IMAKAS3&format=json&units=e&apiKey=b9035848e8f34874835848e8f3a874c2",
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                    // console.log(data.observations[0].imperial.temp);
                                    var wind = data.observations[0].imperial.windSpeed/1.151;
                                    if (wind > 15){
                                        $('.warn').removeAttr('hidden');
                                    }else{
                                        $('.warn').attr('hidden', true);
                                    }
                                    $('.wind').html(Math.round(wind)+"Kn");
                                    $('.pressure').html(data.observations[0].imperial.pressure+"In");
                                    $('.humidity').html(data.observations[0].humidity+"%");
                                    $('.temperature').html(Math.round((parseInt(data.observations[0].imperial.temp)-32)*5/9)+"°C");
                                }   
                            });
                };
				list();
                berth_jetty1();
                berth_jetty2();
				list_jetty1();
				list_jetty2();
				wunder();
				setInterval(function(){ 
					list();
					wunder();
				}, 60000);
        </script>
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyDzWZ3TJQ0Z_qy3__1yNaBgCiXQAP8-NBk"></script>

        <script type="text/javascript">
            var center = new google.maps.LatLng(-5.113129,119.411269);

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                center: center,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var point = new google.maps.LatLng(-5.216776,119.430534);

            var jetty1location = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.113280168038874, 119.40971058643761),
                                    //icon: 'images/ship.png',
                                    label: 'Jetty 3',
                                    map: map
                                });
            google.maps.event.addListener(jetty1location, 'click', (function() {
                                    window.location.href = "jetty3";
                            }));
            var jetty2location = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112555843375943, 119.41219821924717),
                                    //icon: 'images/ship.png',
                                    label: 'Jetty 2',
                                    map: map
                                });
            google.maps.event.addListener(jetty2location, 'click', (function() {
                                    window.location.href = "jetty2";
                            }));
            var jetty3location = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112790938673123, 119.41046014787678),
                                    //icon: 'images/ship.png',
                                    label: 'Jetty 1',
                                    map: map
                                });
            google.maps.event.addListener(jetty3location, 'click', (function() {
                                    window.location.href = "jetty1";
                            }));

            
            
        </script>
        <script type="text/javascript">

                $.ajax({
                    url:    "Makassar/marker",
                    type : 'POST',
                    success : function(data) {
                        console.log(data);
                        if (data=='123') {
                            var jetty1 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112253,119.410286),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty1, 'click', (function() {
                                    window.location.href = "jetty1";
                            }));
                            var jetty2 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.111683474922729, 119.41187378707988),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty2, 'click', (function() {
                                    window.location.href = "jetty2";
                            }));
                            var jetty3 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112836692989717, 119.40886841034225),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty3, 'click', (function() {
                                    window.location.href = "jetty3";
                            }));
                        }else if (data=='1') {
                            var jetty1 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112253,119.410286),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty1, 'click', (function() {
                                    window.location.href = "jetty1";
                            }));
                        }else if (data=='12') {
                            var jetty1 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112253,119.410286),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty1, 'click', (function() {
                                    window.location.href = "jetty1";
                            }));
                            var jetty2 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.111683474922729, 119.41187378707988),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty2, 'click', (function() {
                                    window.location.href = "jetty2";
                            }));
                        }else if (data=='13') {
                            var jetty1 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112253,119.410286),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty1, 'click', (function() {
                                    window.location.href = "jetty1";
                            }));
                            var jetty3 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112836692989717, 119.40886841034225),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty3, 'click', (function() {
                                    window.location.href = "jetty3";
                            }));
                        }else if (data=='2') {
                            var jetty2 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.111683474922729, 119.41187378707988),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty2, 'click', (function() {
                                    window.location.href = "jetty2";
                            }));
                        }else if (data=='23') {
                            var jetty2 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.111683474922729, 119.41187378707988),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty2, 'click', (function() {
                                    window.location.href = "jetty2";
                            }));
                            var jetty3 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112836692989717, 119.40886841034225),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty3, 'click', (function() {
                                    window.location.href = "jetty3";
                            }));
                        }
                        else if (data=='3') {
                            var jetty3 = new google.maps.Marker({
                                    position: new google.maps.LatLng(-5.112836692989717, 119.40886841034225),
                                    icon: 'images/ship.png',
                                    map: map
                                });

                            google.maps.event.addListener(jetty3, 'click', (function() {
                                    window.location.href = "jetty3";
                            }));
                        }
                    }
                });

        function export1(){
            location.href = "GeneratePdfController/view?date="+$('#today').text()+"&hum="+$('#humidity').text()+"&press="+$('#pressure').text()+"&wind="+$('#wind').text()+"&temp="+$('#temperature').text();
        }
        function share(){
            location.href = "ListBooking4/move";
        }
        function prevdate(){
            var date = $('#today').text();
            $.ajax({
                    url: "Makassar/dateslidedec",
                    type: 'POST',
                    dataType: 'text',
                    data: {date:date},
                    success: function (data) {
                        // console.log(data.observations[0].imperial.temp);
                        $('#date_data').html(data);      
                    }
            });
        }

        function nextdate(){
            var date = $('#today').text();
            $.ajax({
                    url: "Makassar/dateslideadd",
                    type: 'POST',
                    dataType: 'text',
                    data: {date:date},
                    success: function (data) {
                        // console.log(data.observations[0].imperial.temp);
                        $('#date_data').html(data);      
                    }
            });

        }

        function today(){
            $.ajax({
                url: "Makassar/loadDate",
                type: 'GET',
                dataType: 'text',
                success: function(data){
                    $('#date_data').html(data);      
                }
            });
        }
        nextdate();
        </script>

    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/job-list-four.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:17 GMT -->
</html>