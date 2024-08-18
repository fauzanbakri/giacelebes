

<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from shreethemes.in/landrick/layouts/index-online-learning.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:11:42 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Ship Scheduling, Monitoring, and Controlling System" />
        <meta name="keywords" content="Sisemocs, Ship, Scheduling, Monitoring, Controlling System, Ship Scheduling, Monitoring, and Controlling System" />
        <meta name="author" content="muhfauzanbakri" />
        <meta name="email" content="port.makassar@gmail.com" />
        <meta name="website" content="http://sisemocs.com/" />
        <meta name="Version" content="v1.0" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/sisemocs-logo3.png">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- tobii css -->
        <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/line.css">
        <!-- Slider -->               
        <link rel="stylesheet" href="css/tiny-slider.css"/>
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
        
        <!-- Hero Start -->
        <div>
            <!-- <div class="container"> -->
                <div id="map" style="height:600px"></div>
                <!-- </div> --><!--end row-->
            <!--end container fluid-->
        </div><!--end section-->
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
        
        <!-- end Style switcher -->

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- SLIDER -->
        <script src="js/tiny-slider.js"></script>
        <!-- tobii js -->
        <script src="js/tobii.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->

		<script src="https://maps.google.com/maps/api/js?key=AIzaSyDzWZ3TJQ0Z_qy3__1yNaBgCiXQAP8-NBk"></script>

		<script type="text/javascript">
		    var center = new google.maps.LatLng(-2.427252,120.154189);

		    var map = new google.maps.Map(document.getElementById('map'), {
		        zoom: 5	,
		        center: center,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    });
		    var point = new google.maps.LatLng(-5.216776,119.430534);


		    makassar = new google.maps.Marker({
		            position: new google.maps.LatLng(-5.216776,119.430534),
		            label: "Makassar",
		            map: map
		        });

		    google.maps.event.addListener(makassar, 'click', (function() {
		            window.location.href = "makassar";
		    }));
		    parepare = new google.maps.Marker({
		            position: new google.maps.LatLng(-4.011535,119.624437),
		            label: "Pare-pare",
		            map: map
		        });

		    google.maps.event.addListener(parepare, 'click', (function() {
		                alert("Pare-pare");
		    }));
		    baubau = new google.maps.Marker({
		            position: new google.maps.LatLng(-5.473832,122.638757),
		            label: "Bau-bau",
		            map: map
		        });

		    google.maps.event.addListener(baubau, 'click', (function() {
		                alert("Bau-bau");
		    }));
		   
		    kendari = new google.maps.Marker({
		            position: new google.maps.LatLng(-4.80356770187883, 122.71291084174435),
		            label: "Raha",
		            map: map
		        });

		    google.maps.event.addListener(kendari, 'click', (function() {
		                alert("Kendari");
		    }));

            Kolaka = new google.maps.Marker({
                    position: new google.maps.LatLng(-4.073306129431867, 121.60227839512352),
                    label: "Kolaka",
                    map: map
                });

            google.maps.event.addListener(Kolaka, 'click', (function() {
                        alert("Kolaka");
            }));
            Kendari = new google.maps.Marker({
                    position: new google.maps.LatLng(-3.9780979059637507, 122.5601489066918),
                    label: "Kendari",
                    map: map
                });

            google.maps.event.addListener(Kendari, 'click', (function() {
                        alert("Kendari");
            }));
            Palopo = new google.maps.Marker({
                    position: new google.maps.LatLng(-2.99118819983062, 120.20366602421231),
                    label: "Palopo",
                    map: map
                });

            google.maps.event.addListener(Palopo, 'click', (function() {
                        alert("Palopo");
            }));
            Kolonedale = new google.maps.Marker({
                    position: new google.maps.LatLng(-2.01368566353544, 121.37043355472765),
                    label: "Kolonedale",
                    map: map
                });

            google.maps.event.addListener(Kolonedale, 'click', (function() {
                        alert("Kolonedale");
            }));
            Poso = new google.maps.Marker({
                    position: new google.maps.LatLng(-1.3901092448711223, 120.74984512475737),
                    label: "Poso",
                    map: map
                });

            google.maps.event.addListener(Poso, 'click', (function() {
                        alert("Poso");
            }));
            Donggala = new google.maps.Marker({
                    position: new google.maps.LatLng(-0.6847182736207658, 119.73403985254288),
                    label: "Donggala",
                    map: map
                });

            google.maps.event.addListener(Donggala, 'click', (function() {
                        alert("Donggala");
            }));
            Luwuk = new google.maps.Marker({
                    position: new google.maps.LatLng(-0.9198654115817337, 122.80431951957793),
                    label: "Luwuk",
                    map: map
                });

            google.maps.event.addListener(Luwuk, 'click', (function() {
                        alert("Luwuk");
            }));
            Banggai = new google.maps.Marker({
                    position: new google.maps.LatLng(-1.586018356403933, 123.50329806701811),
                    label: "Banggai",
                    map: map
                });

            google.maps.event.addListener(Banggai, 'click', (function() {
                        alert("Banggai");
            }));
            Tolitoli = new google.maps.Marker({
                    position: new google.maps.LatLng(1.0953076869912626, 120.7988389600901),
                    label: "Tolitoli",
                    map: map
                });

            google.maps.event.addListener(Tolitoli, 'click', (function() {
                        alert("Tolitoli");
            }));
            Mautang = new google.maps.Marker({
                    position: new google.maps.LatLng(0.47151438549108016, 121.27244593386011),
                    label: "Mautang",
                    map: map
                });

            google.maps.event.addListener(Mautang, 'click', (function() {
                        alert("Tolitoli");
            }));
            Gorontalo = new google.maps.Marker({
                    position: new google.maps.LatLng(0.5664524022973507, 123.03248708737247),
                    label: "Gorontalo",
                    map: map
                });

            google.maps.event.addListener(Gorontalo, 'click', (function() {
                        alert("Gorontalo");
            }));
            Amurang = new google.maps.Marker({
                    position: new google.maps.LatLng(1.1826519955304742, 124.57051134875387),
                    label: "Amurang",
                    map: map
                });

            google.maps.event.addListener(Amurang, 'click', (function() {
                        alert("Amurang");
            }));
            
            Bitung = new google.maps.Marker({
                    position: new google.maps.LatLng(1.4507060026302085, 125.10890305960288),
                    label: "Bitung",
                    map: map
                });

            google.maps.event.addListener(Bitung, 'click', (function() {
                        alert("Bitung");
            }));
            Tahuna = new google.maps.Marker({
                    position: new google.maps.LatLng(2.378532318956788, 125.45868731678183),
                    label: "Tahuna",
                    map: map
                });

            google.maps.event.addListener(Bitung, 'click', (function() {
                        alert("Tahuna");
            }));
            
            
		</script>
    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/index-online-learning.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:11:42 GMT -->
</html>