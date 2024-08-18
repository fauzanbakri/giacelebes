<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from shreethemes.in/landrick/layouts/job-apply.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:17 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Vessel Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="support@shreethemes.in" />
        <meta name="website" content="https://shreethemes.in/" />
        <meta name="Version" content="v3.5.0" />
        <!-- favicon -->
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css?0925" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">


        <link rel="shortcut icon" href="images/sisemocs-logo3.png">
        <!-- Bootstrap -->

        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/line.css">
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
        <section class="bg-half-170 bg-primary d-table w-100" style="background-image: url('images/job/bg1.jpeg');">
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="pages-heading">
                            <!-- <h2 class="title text-white title-dark mb-0"> Jetty 1 </h4> -->
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
                
                <div class="position-breadcrumb">
                    <nav aria-label="breadcrumb" class="d-inline-block">
                        <ul class="breadcrumb bg-white rounded shadow mb-0 px-4 py-2">
                            <li class="breadcrumb-item active" aria-current="page">Vessel Register Jetty 1</li>
                        </ul>
                    </nav>
                </div>
            </div> <!--end container-->
        </section><!--end section-->
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
        
        <!-- Job apply form Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-7">
                        <div class="card custom-form border-0">
                            <div class="card-body">
                                <form class="rounded shadow p-4" action="jetty1/submit" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Kapal :<span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="anchor" class="fea icon-sm icons"></i>
                                                    <input name="namakapal" required id="name2" type="text" class="form-control ps-5" placeholder="Nama Kapal :">
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Last Port :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="anchor" class="fea icon-sm icons"></i>
                                                    <input name="lastport" id="name2" type="text" class="form-control ps-5" placeholder="Last Port :">
                                                </div>
                                            </div>
                                        </div>
                                       <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Actual Time of Arrival (ATA) :</label>
                                                <div class="form-icon position-relative md-form md-outline">
                                                    <i data-feather="calendar" class="fea icon-sm icons"></i>
                                                    <input name="ata" id="start" onkeydown="return false" type="text" class=" form-control ps-5 example" placeholder="Actual Time of Arrival (ATA) :">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label"> Berthed :</label>
                                                <div class="form-icon position-relative md-form md-outline">
                                                    <i data-feather="calendar" class="fea icon-sm icons"></i>
                                                    <input name="berthed" id="end1" onkeydown="return false" type="text" class=" form-control ps-5 example" placeholder="Berthed :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Cargo :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="box" class="fea icon-sm icons"></i>
                                                    <input name="cargo" type="text" class="form-control ps-5" placeholder="Cargo :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Bunker :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="database" class="fea icon-sm icons"></i>
                                                    <input name="bunker" type="text" class="form-control ps-5" placeholder="Bunker :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Next Port :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="compass" class="fea icon-sm icons"></i>
                                                    <input name="next" id="email2" type="text" class="form-control ps-5" placeholder="Next Port :">
                                                </div>
                                            </div> 
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label"> Estimation Time Completed (ETC) :</label>
                                                <div class="form-icon position-relative md-form md-outline">
                                                    <i data-feather="calendar" class="fea icon-sm icons"></i>
                                                    <input name="etc" id="end" onkeydown="return false" type="text" class=" form-control ps-5 example" placeholder="Estimation Time Completed (ETC) :">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label"> Estimation Time Departure (ETD) :</label>
                                                <div class="form-icon position-relative md-form md-outline">
                                                    <i data-feather="calendar" class="fea icon-sm icons"></i>
                                                    <input name="etd" id="end" onkeydown="return false" type="text" class=" form-control ps-5 example2" placeholder="Estimation Time Departure (ETD) :">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Remarks :</label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="edit" class="fea icon-sm icons"></i>
                                                    <input name="remarks" id="email2" type="text" class="form-control ps-5" placeholder="Remarks :">
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status :<span class="text-danger">*</span></label>
                                                <select required name="status" class="form-control form-select" id="jam">
                                                <option value="4">Incoming</option>    
                                                <option value="5">Departure</option>
                                                    <option value="2">Anchored</option>
                                                    <!-- <option value="0">Next Berthing</option> -->
                                                    <option value="1">At Jetty</option>
                                                    <option value="3">Selesai</option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input required type="submit" id="submit" name="submit" class="submitBnt btn btn-primary" value="Submit">
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div> 
                        </div><!--end custom-form-->
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

        <!-- Offcanvas Start -->
        

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <!-- Style switcher -->

        <!-- javascript -->
        <!-- <script src="assets/js/jquery.min.js"></script> -->
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
                
        <script type="text/javascript">
        $(function () {    
         var datetime1 = $('.example').val() != "" ? new Date($('.example').val()) : false;
         var datetime2 = $('.example2').val() != "" ? new Date($('.example2').val()) : false;
                $('.example').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                // maxDate: moment().add(21, 'days'),
                minDate: moment().add(-90, 'hour')
                });
                
                $('.example2').datetimepicker({
                  //Important! See issue #1075
                  format: 'YYYY-MM-DD HH:mm',
                  minDate: datetime1,
                //   maxDate: moment().add(21, 'days')
                });
                
                $(".example2").on("dp.change", function (e) {
                  setTimeout(() => {
                         // $(".example").data("DateTimePicker").minDate(e.date);
                    }, 0);
                });      
                
                $(".example").on("dp.change", function (e) {
                    setTimeout(() => {
                         $(".example2").data("DateTimePicker").minDate(e.date);;
                    }, 1);
                });
            });
        
        //   $('.example').datetimepicker({
        //     format: 'YYYY-MM-DD HH:mm',
        //     minDate: moment().add(-90, 'days'),
        //     maxDate: moment().add(21, 'days')
        //   }).on('dp.change', function(){
        //     // check();'
        //     $('.ex').datetimepicker({
        //         format: 'YYYY-MM-DD HH:mm',
        //         setDate: $('.ex').val()
        //     })
        //     console.log(String($('#end').val()));
        //   });
        

        $('#start').on("change paste keyup click keydown",function(){
        	// check();
        // 	$('#end1').val(String($('#end').val()));
        });
        $('#end').on("change paste keyup click keydown",function(){
            // check();
        });

        function check(){
        	var start = $('#start').val();
        	var end = $('#end').val();
        	if (start==="" || end===""){

        	}else{
        		$.ajax({
                url: "jetty3/cek",
                type: 'POST',
                data:{start:start, end:end},
                success: function (data) {
                    console.log(data);
                    if(data==="exist"){
                        $('#submit').attr("disabled", true);
                        $('#error').removeAttr("hidden");
                        $('#ok').attr("hidden", true);
                    }else{
                        $('#ok').removeAttr("hidden");
                        $('#submit').removeAttr("disabled");
                        $('#error').attr("hidden", true);
                    }
                }
            });
        	}

        }
            
        </script>
    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/job-apply.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:17 GMT -->
</html>