<?php 
if (isset($_GET['wrong'])) {
    $check=1;
}else{
    $check=0;
}
?>
<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from shreethemes.in/landrick/layouts/auth-bs-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:15:14 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login</title>
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
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v3.0.6/css/line.css">
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
        <?php
        if(date('D')=='Sun'){
            $pict = "assets/jetty/1.jpg";
        }else if(date('D')=='Mon'){
            $pict = "assets/jetty/2.jpg";
        }else if(date('D')=='Tue'){
            $pict = "assets/jetty/3.jpg";
        }else if(date('D')=='Wed'){
            $pict = "assets/jetty/4.jpg";
        }else if(date('D')=='Thu'){
            $pict = "assets/jetty/5.jpg";
        }else if(date('D')=='Fri'){
            $pict = "assets/jetty/6.jpg";
        }else if(date('D')=='Sat'){
            $pict = "assets/jetty/7.jpg";
        }
        ?>
        <img style="position: absolute;max-width: 100%; margin-height: 100%; margin: auto;" src="<?php echo $pict; ?>">
        <section class="bg-home d-flex align-items-center position-relative" style="background: url('') center;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-signin p-4 bg-white rounded shadow">
                            <form method="post" action="login/action">
                                <a href="index.html"><img src="images/sisemocs-logo2.png" width="100px" class="avatar mb-4 d-block mx-auto" alt=""></a>
                                <h5 class="mb-3 text-center">Please sign in</h5>
                                <div <?php if($check==0){echo "hidden";} ?> class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Oops!</strong> You entered wrong username or password.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="hidden" name="redirect" value="<?php if(isset($_GET['redirect'])){echo $_GET['redirect'];}else{echo "";} ?>">
                                    <input type="text" name="username" required class="form-control" id="floatingInput" placeholder="Username">
                                    <label for="floatingInput">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" required class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                </div>
                            
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                        </div>
                                    </div>
                                    <p class="forgot-pass mb-0"><a href="auth-bs-reset.html" class="text-dark small fw-bold">Forgot password ?</a></p>
                                </div>
                
                                <button class="btn btn-primary w-100" type="submit">Sign in</button>

                                <div class="col-12 text-center mt-3">
                                    <!-- <p class="mb-0 mt-3"><small class="text-dark me-2">Don't have an account ?</small> <a href="auth-bs-signup.html" class="text-dark fw-bold">Sign Up</a></p> -->
                                    <br>
                                </div><!--end col-->

                                <p class="mb-0 text-muted mt-3 text-center">© <script>document.write(new Date().getFullYear())</script> SISEMOCS.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
           <!--  <div class="bottom">
                <a href="javascript: void(0);" class="settings bg-white title-bg-dark shadow d-block"><i class="mdi mdi-cog ms-1 mdi-24px position-absolute mdi-spin text-primary"></i></a>
            </div> -->
        </div>
        <!-- end Style switcher -->

        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->        
    </body>


<!-- Mirrored from shreethemes.in/landrick/layouts/auth-bs-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:15:17 GMT -->
</html>