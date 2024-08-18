<!DOCTYPE html>
    <html lang="en">
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
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/sisemocs-logo3.png">
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="<?php echo base_url(); ?>css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/line.css">
        <link href="<?php echo base_url(); ?>css/simplebar.css" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="<?php echo base_url(); ?>css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="<?php echo base_url(); ?>css/colors/default.css" rel="stylesheet" id="color-opt">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/slide.css">
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
        
        <!-- Hero Start -->
        
        <!-- Job List Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <center><a href="jetty1" class="btn btn-soft-primary">JETTY 1</a></center>
                    <label class="mt-4 form-label">Vessel at Jetty 1</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty1">
                            <?php
                            	$query = $this->db->query("SELECT * FROM jetty1 where status='1' ORDER BY id_jetty DESC limit 1");
                                    if($query->num_rows()>0){
                                            $row = $query->row_array();
                                                    echo '
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/shipicon.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["nama_kapal"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/lastport.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["last_port"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/ata.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["ATA"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/berthed.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["berthed"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/cargo.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["cargo"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/bunker.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["bunker"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/nextport.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["next_port"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="'.base_url().'images/etc.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10" style="align-items: center-vertical;">
                                                                <span>'.$row["etc"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/remarks.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["remarks"].'</span>
                                                            </div>
                                                        </div>
                                                    ';
                                    }else{
                                        echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
                                    }
                            ?>
                        </div>
                        </div>
                    </div>
                    <label class="mt-4 form-label">Next Berthing Plan Jetty 1</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty1berth">
                            <?php
                            $query = $this->db->query("SELECT * FROM jetty1 where status='0' ORDER BY timestamp DESC");
                            if($query->num_rows()>0){
                                    foreach ($query->result_array() as $row) {
                                    echo '
                                        <form action="Makassar/updatetime"><input hidden name="id" value="'.$row['id_jetty'].'"></input>
                                        <div class="mb-2"><button type="submit" class="btn btn-sm btn-primary" style="margin-right:10px">▲</button><img src="images/shipicon.png" width="40px"><span class="ms-4">'.$row['nama_kapal'].'</span></div></form>
                                    ';	
                                    }
                               
                            }else{
                                echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
                            }
                            $this->db->query("UPDATE booking SET status=2 WHERE status=1 AND time_end<now()");	
                            $this->db->query("UPDATE jetty1 SET status=3 WHERE status=1 AND etc<now() AND etc!='0000-00-00 00:00:00'");
                            $this->db->query("UPDATE jetty2 SET status=3 WHERE status=1 AND etc<now() AND etc!='0000-00-00 00:00:00'");
                            ?>
                        </div>
                        </div>
                    </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <center><a href="jetty2" class="btn btn-soft-primary">JETTY 2</a></center>
                    <label class="mt-4 form-label">Vessel at Jetty 2</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty2">
                            <?php
                            	$query = $this->db->query("SELECT * FROM jetty2 where status='1' ORDER BY id_jetty DESC LIMIT 1");
                                    if($query->num_rows()>0){
                                            $row = $query->row_array();
                                                    echo '
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/shipicon.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["nama_kapal"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/lastport.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["last_port"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/ata.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["ATA"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/berthed.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["berthed"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/cargo.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["cargo"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/bunker.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["bunker"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/nextport.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["next_port"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/etc.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["etc"].'</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2 mb-2">
                                                                <center><img src="images/remarks.png" width="40px"></center>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <span>'.$row["remarks"].'</span>
                                                            </div>
                                                        </div>
                                                    ';
                                        
                                    }else{
                                        echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
                                    }
                            ?>
                        </div>
                        </div>
                    </div>
                    <label class="mt-4 form-label">Next Berthing Plan Jetty 2</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-4" id="jetty2berth">
                            <?php
                            $query = $this->db->query("SELECT * FROM jetty2 where status='0' ORDER BY timestamp DESC");
                           
                                            if($query->num_rows()>0){
                                                    foreach ($query->result_array() as $row) {
                                                    echo '
                                                        <form action="Makassar/updatetime2"><input hidden name="id" value="'.$row['id_jetty'].'"></input>
                                                        <div class="mb-2"><button type="submit" class="btn btn-sm btn-primary" style="margin-right:10px">▲</button><img src="images/shipicon.png" width="40px"><span class="ms-4">'.$row['nama_kapal'].'</span></div></form>
                                                    ';	
                                                }
                                            }else{
                                                echo '<center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>';
                                            }
                            ?>
                        </div>
                        </div>
                    </div>
                    </div><!--end col-->
                    <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <center><a href="jetty3" class="btn btn-soft-primary">JETTY 3</a></center>
                    <label class="mt-4 form-label">Jetty 3 Vessel Registered</label>
                    <div class="row">
                        <div class="col-md-12 col-12">
                        <div class=" shadow rounded p-0">
                        <div id="date_data">   
                            <?php
                            $datenow = date("Y-m-d");
                            $query = $this->db->query("SELECT * FROM booking WHERE DATE(time_start)>='$datenow' AND DATE(time_start)<='$datenow' AND status='1' ORDER BY time_start ASC");
                            if($query->num_rows()>0){
                                echo '
                                <div class="text-center align-items-center border-0 bg-light">
                                        <h4 style="color: #2f55d4" id="today">'.date("d M Y", strtotime($datenow)).'</h4>
                                </div>';
                                foreach ($query->result_array() as $row) {
                                echo '
                                <div class=" shadow rounded">
                                        <div class="ps-5 pe-5 accordion-body text-muted bg-white" id="jetty3regist">
                                            <div class="mb-2"><img src="images/shipicon.png" width="40px"><span class="ms-4">'.$row["ship_name"].'</span></div>
                                            <div class="mb-2"><img src="images/etc.png" width="40px"><span style="font-size: 14px" class="ms-4">'.substr($row["time_start"], 11).' - '.substr($row["time_end"], 11).'</span></div>
                                        </div>
                                </div>
                                ';	
                            }
                            }else{
                                echo '
                                <div class="text-center align-items-center border-0 bg-light">
                                        <h4 style="color: #2f55d4" id="today">'.date("d M Y", strtotime($datenow)).'</h4>
                                </div>
                                <div>
                                        <div class="ps-5 pe-5 accordion-body text-muted bg-white" id="jetty3regist">
                                            <center><div class=""><i class="uil uil-newspaper h3 mb-0"></i><span class="ms-1">No Data</span></div></center>
                                        </div>
                                </div>
                                ';
                            }
                                ?>
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
        

    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/job-list-four.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Jul 2021 09:14:17 GMT -->
</html>