

<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from shreethemes.in/landrick/layouts/job-apply.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:17 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Add User</title>
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
        <!-- Main Css -->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/cupertino/jquery-ui.css">

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
            <a class="nav-link" href="Makassar">View Makassar</a>
          </li>
          <?php  
          if ($_SESSION['role']>1){
            echo '
            <li class="nav-item">
            <a class="nav-link " href="ListBooking">Planned Vessel</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Detail">Detail Data</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="AddVessel">Add Vessel Name</a>
            </li>
            ';
          }
          if ($_SESSION['role']==3){
            echo '
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
                    <div class="col-lg-10 col-md-7">
                    <div class="row">
                        <div class="card custom-form border-0">
                            <div class="card-body">
                                <form class="rounded shadow p-4" action="AddVessel/add" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Vessel Name :<span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" required id="name2" type="text" class="form-control ps-5" placeholder="Vessel Name :">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                    </div><!--end row-->
                                    <br><br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" id="submit" name="submit" class="submitBnt btn btn-primary" value="Add">
                                            <button type="button" onclick="showUser()" class="btn btn-primary">Show Vessel Name</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div> 
                        </div><!--end custom-form-->
                    </div>  
                </div>
                <div class="col-md-12 mt-4" id="user" hidden>
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>id</th>
                                                  <th>Vessel Name</th>
                                                  <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  
                                                foreach ($name->result() as $row)  
                                                {  
                                                   ?>
                                                   <tr>
                                                   <td><?php echo $row->id; ?></td>
                                                   <td><?php echo $row->name; ?></td>
                                                   <td><center><button id="delete1" class="btn btn-icon btn-danger"><i data-feather="trash" class="fea icon-sm"></i></button></center></td>  
                                                   </tr>  
                                                <?php }  
                                                ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                <th>id</th>
                                                  <th>Vessel Name</th>
                                                  <th>Delete</th>
                                                </tr>
                                                </tfoot>
                                              </table>
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
        </footer><!--end footer-->
        <!-- Footer End -->

        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- Style switcher -->

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
        <script type="text/javascript">
        $('#username').keyup(function(){
            var user = $('#username').val();
            $.ajax({
                        url: "AddUser/checkusername",
                        type: 'POST',
                        data:{username:user},
                        success: function (data) {
                            if(data==="error"){
                                $('#submit').attr("disabled", true);
                                $('#error').removeAttr("hidden");
                            }else{
                                $('#submit').removeAttr("disabled");
                                $('#error').attr("hidden", true);
                            }
                        }
            });
        })
            
        </script>
        <script>
    $('#example1').DataTable( {
      order: [ [ 0, "desc" ] ],
      "autoWidth": false,
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
        window.location.href='EditUser?id='+nmr;
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
        function showUser(){
            $('#user').removeAttr('hidden');
        }
        $('#deletejetty1').on('click', function () {
            var id = $('#jetty1id').val();
            $("#deletejetty1").prop("href", "AddVessel/delete1?id="+id)
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