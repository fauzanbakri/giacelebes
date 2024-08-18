<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdfController extends CI_Controller {

    public function __construct()
    {   
        parent::__construct();
        $this->load->library('Pdf');
    }
public function view()
    {
        $date3 = $this->input->get('date');
        $hum = $this->input->get('hum');
        $wind = $this->input->get('wind');
        $temp = $this->input->get('temp');
        $press = $this->input->get('press');
        $heig = $this->db->query("SELECT status, COUNT(*) as cou FROM next_berth WHERE status!=4 GROUP BY status ORDER BY cou DESC LIMIT 1")->row_array();
        $jt1 = $this->db->query("SELECT status, COUNT(*) as cou FROM jetty1 WHERE status='0' OR status='2' OR status='4' GROUP BY status ORDER BY cou DESC LIMIT 1")->row_array(); 
        $jt2 = $this->db->query("SELECT status, COUNT(*) as cou FROM jetty2 WHERE status='0' OR status='2' OR status='4' GROUP BY status ORDER BY cou DESC LIMIT 1")->row_array();
        if($jt1==NULL){
            $jt1['cou'] = 1;
        }
        if($jt2==NULL){
            $jt2['cou'] = 1;
        }
        if($jt1['cou']>=$jt2['cou']){
            $nn = $jt1['cou'];
        } else{
            $nn = $jt2['cou'];
        } 
        if($heig!=NULL){
            if($heig['cou']==1){
                $hhh=300+($nn*10);
            }else{
                $hhh=250+($heig['cou']*95)+($nn*10);
            }
        }else{
            $hhh=300;
        }
        
        $pass = $this->db->query("SELECT pass FROM pdf_pass ORDER BY id DESC LIMIT 1")->row_array();
        $custom = array(216, $hhh);
        $pdf = new Pdf('P', 'mm', $custom, true, 'UTF-8', false);
        $pdf->SetProtection(array('modify','copy', 'view'), $pass['pass'], "Fauzanbakri_97", 0, null);
        // $pdf->SetFont('times', 'B', 20);
        $pdf->SetTitle('Export View Makassar');
        $pdf->SetTopMargin(0);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Sisemocs');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage('P', $custom);
        // $pdf->Image('images/pertamina.png', 33, 2, 25, 7, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        // $pdf->SetXY(15, 0);
        // $pdf->Write(37, date('d/m/y h:i:s'));
        $pdf->SetXY(15, 7);
        $pdf->Cell(30, 30, date('d/m/y H:i:s'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('', '', 9);
        $pdf->Image('images/sisemocs-logo1P.png', 10, $hhh-15, 50, 7, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->Image('images/sisemocs-logo1P.png', 155, 3, 50, 7, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->SetFont('', 'B', 10);
        $pdf->SetXY(15, 0);
        $pdf->Write(37, 'View Makassar');
        $pdf->SetFont('', '', 9);

       
        // $pdf->Image('images/pertamina.png', 33, 2, 25, 7, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        // $pdf->Image('images/sisemocs-logo1.png', 10, 2, 20, 7, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->Image('images/jetty.png', 30, 20, 150, 13, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->Image('images/weather.png', 15, 35, 47, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->Image('images/weather.png', 81, 35, 47, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->Image('images/weather.png', 147, 35, 47, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->SetFont('', '', 7);
        $pdf->SetXY(17, 30);
        $pdf->Write(37, $wind);
        $pdf->SetXY(29, 30);
        $pdf->Write(37, $temp);
        $pdf->SetXY(41, 30);
        $pdf->Write(37, $hum);
        $pdf->SetXY(53, 30);
        $pdf->Write(37, $press);

        $pdf->SetXY(83, 30);
        $pdf->Write(37, $wind);
        $pdf->SetXY(95, 30);
        $pdf->Write(37, $temp);
        $pdf->SetXY(108, 30);
        $pdf->Write(37, $hum);
        $pdf->SetXY(119, 30);
        $pdf->Write(37, $press);


        $pdf->SetXY(149, 30);
        $pdf->Write(37, $wind);
        $pdf->SetXY(161, 30);
        $pdf->Write(37, $temp);
        $pdf->SetXY(173, 30);
        $pdf->Write(37, $hum);
        $pdf->SetXY(185, 30);
        $pdf->Write(37, $press);

        $pdf->SetFont('', '', 9);

        $query = $this->db->query("SELECT * FROM jetty1 where status='1' ORDER BY id_jetty DESC limit 1");
        if($query->num_rows()>0){
                $pdf->Image('images/iconn.png', 10, 53, 8, 100, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                $row = $query->row_array();
                $pdf->SetXY(20, 40);
                $pdf->Write(37, $row["nama_kapal"]);
                $pdf->SetXY(20, 51);
                $pdf->Write(37, $row["last_port"]);
                $pdf->SetXY(20, 61);
                $pdf->Write(37, $row["ATA"]);
                $pdf->SetXY(20, 70);
                $pdf->Write(37, $row["berthed"]);
                if(strlen($row["cargo"])>30){
                    $pdf->SetXY(20, 77);
                    $pdf->Write(37, substr($row["cargo"],0, 30));
                    $pdf->SetXY(20, 80);
                    $pdf->Write(37, substr($row["cargo"], 30));
                }else{
                    $pdf->SetXY(20, 79);
                    $pdf->Write(37, $row["cargo"]);
                }
                $pdf->SetXY(20, 88);
                $pdf->Write(37, $row["bunker"]);
                $pdf->SetXY(20, 99);
                $pdf->Write(37, $row["next_port"]);
                $pdf->SetXY(20, 109);
                $pdf->Write(37, $row["etc"]);
                $pdf->SetXY(20, 119);
                $pdf->Write(37, $row["etd"]);
                if(strlen($row["remarks"])>30){
                    $pdf->SetXY(20, 127);
                    $pdf->Write(37, substr($row["remarks"],0, 30));
                    $pdf->SetXY(20, 130);
                    $pdf->Write(37, substr($row["remarks"], 30));
                }else{
                    $pdf->SetXY(20, 129);
                    $pdf->Write(37, $row["remarks"]);
                }
                $pdf->SetFont('', '', 9);
        }else{
            $pdf->SetXY(25, 40);
            $pdf->Write(37, "No Data");
        }
        $query = $this->db->query("SELECT * FROM jetty2 where status='1' ORDER BY id_jetty DESC LIMIT 1");
        if($query->num_rows()>0){
            $pdf->Image('images/iconn.png', 75, 53, 8, 100, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
            $row = $query->row_array();
            $pdf->SetXY(85, 40);
            $pdf->Write(37, $row["nama_kapal"]);
            $pdf->SetXY(85, 51);
            $pdf->Write(37, $row["last_port"]);
            $pdf->SetXY(85, 61);
            $pdf->Write(37, $row["ATA"]);
            $pdf->SetXY(85, 70);
            $pdf->Write(37, $row["berthed"]);
            if(strlen($row["cargo"])>30){
                $pdf->SetXY(85, 77);
                $pdf->Write(37, substr($row["cargo"],0, 30));
                $pdf->SetXY(85, 80);
                $pdf->Write(37, substr($row["cargo"], 30));
            }else{
                $pdf->SetXY(85, 79);
                $pdf->Write(37, $row["cargo"]);
            }
            $pdf->SetXY(85, 88);
            $pdf->Write(37, $row["bunker"]);
            $pdf->SetXY(85, 99);
            $pdf->Write(37, $row["next_port"]);
            $pdf->SetXY(85, 109);
            $pdf->Write(37, $row["etc"]);
            $pdf->SetXY(85, 119);
            $pdf->Write(37, $row["etd"]);
            if(strlen($row["remarks"])>30){
                $pdf->SetXY(85, 127);
                $pdf->Write(37, substr($row["remarks"],0, 30));
                $pdf->SetXY(85, 130);
                $pdf->Write(37, substr($row["remarks"], 30));
            }else{
                $pdf->SetXY(85, 129);
                $pdf->Write(37, $row["remarks"]);
            }
        
            $pdf->SetFont('', '', 9);
            }else{
                $pdf->SetXY(85, 40);
                $pdf->Write(37, "No Data");
            }
        $datenow = date("Y-m-d", strtotime("-0 days", strtotime($date3)));
        $query = $this->db->query("SELECT * FROM booking WHERE DATE(time_start)>='$datenow' AND DATE(time_start)<='$datenow' AND status='1' ORDER BY time_start ASC");
        $pdf->SetXY(160, 40);
        $pdf->Write(37, $date3);
        if($query->num_rows()>0){
            $p = 50;
            $o = 64;
            foreach ($query->result_array() as $row) {
                $pdf->Image('images/iconn2.png', 140, $o, 9, 23, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                $pdf->SetXY(150, $p);
                $pdf->Write(37, $row["ship_name"]);
                $pdf->SetXY(150, $p+10);
                $pdf->Write(37, substr($row["time_start"], 11).' - '.substr($row["etd"], 11));
                $p = $p+25;
                $o = $o+25;
            }
                
        }else{
            $pdf->SetXY(150, 50);
            $pdf->Write(37, "No Data");
        }
        $query = $this->db->query("SELECT * FROM jetty1 where status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
        $k = 168;
        $j = 155; 
        if($query->num_rows()>0){
                foreach ($query->result_array() as $row) {
                $pdf->Image('images/iconn3.png', 10, $k, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                $pdf->SetXY(20, $j);
                $pdf->Write(37, $row['nama_kapal']);	
                $k = $k+10;
                $j = $j+10;
                }
           
        }else{
                $pdf->SetXY(25, 156);
                $pdf->Write(37, "No Data");	
        }
        $query = $this->db->query("SELECT * FROM jetty2 where status='0' OR status='2' OR status='4' ORDER BY timestamp DESC");
        $h = 168;
        $g = 155;
        if($query->num_rows()>0){
                foreach ($query->result_array() as $row) {
                $pdf->Image('images/iconn3.png', 75, $h, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                $pdf->SetXY(85, $g);
                $pdf->Write(37, $row['nama_kapal']);	
                $h = $h+10;
                $g = $g+10;
                }
        }else{
                $h = $h+10;
                $g = $g+10;
                $pdf->SetXY(80, 156);
                $pdf->Write(37, "No Data");	
        }
        if($h>=$k){
            $h = $h;
        }else{
            $h = $k;
        }
        $h=$h+8;
        $pdf->Image('images/line.png', 10, $h, 195, 0.2, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
        $pdf->Image('images/line.png', 10, $h+9, 195, 0.2, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
        $pdf->Image('images/line2.png', 70, $h, 0.2, $hhh-$h-20, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
        $pdf->Image('images/line2.png', 140, $h, 0.2, $hhh-$h-20, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
        $pdf->SetFont('', 'B', 11);
        $pdf->SetXY(10, 148);
        $pdf->Write(37, 'Next Berthing Plan Jetty 1');
        $pdf->SetXY(75, 148);
        $pdf->Write(37, 'Next Berthing Plan Jetty 2');
        $pdf->SetXY(30, $h-12);
        $pdf->Write(37, 'Incoming');
        $pdf->SetXY(95, $h-12);
        $pdf->Write(37, 'Anchored');
        $pdf->SetXY(165, $h-12);
        $pdf->Write(37, 'Departure');
        $pdf->SetFont('', '', 9);

        $query = $this->db->query("SELECT * FROM next_berth");
        $h = $h+10;
        $i = 0;
        $gg = $h;
        $g=$h;
        $b=$h;
        $t=0;
        $u=0;
        $y=0;
        if($query->num_rows()>0){
                foreach ($query->result_array() as $row) {
                    if($row['status']==2){
                           $pdf->Image('images/iconn3.png', 10, $gg, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(20, $gg-13);
                            $pdf->Write(37, $row['nama_kapal']);	
                            $pdf->SetXY(20, $gg-2);
                            $pdf->Image('images/lastport.png', 10, $gg+11, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->Write(37, $row['last_port']);
                            $pdf->SetXY(20, $gg+8);
                            $pdf->Image('images/eta_icon.png', 10, $gg+22, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                            $pdf->Write(37, $row['ETA']);
                            $pdf->Image('images/cargo.png', 10, $gg+33, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            if(strlen($row["cargo"])>30){
                                $pdf->SetXY(20, $gg+17);
                                $pdf->Write(37, substr($row["cargo"],0, 30));
                                $pdf->SetXY(20, $gg+21);
                                $pdf->Write(37, substr($row["cargo"], 30));
                            }else{
                                $pdf->SetXY(20, $gg+20);
                                $pdf->Write(37, $row["cargo"]);
                            }
                            $pdf->Image('images/bunker.png', 10, $gg+44, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(20, $gg+30);
                            $pdf->Write(37, $row['bunker']);
                            $pdf->Image('images/nextport.png', 10, $gg+55, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(20, $gg+40);
                            $pdf->Write(37, $row['next_port']);
                            $pdf->Image('images/remarks.png', 10, $gg+66, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            if(strlen($row["remarks"])>30){
                                $pdf->SetXY(20, $gg+48);
                                $pdf->Write(37, substr($row["remarks"],0, 30));
                                $pdf->SetXY(20, $gg+51);
                                $pdf->Write(37, substr($row["remarks"], 30));
                            }else{
                                $pdf->SetXY(20, $gg+50);
                                $pdf->Write(37, $row['remarks']);
                            }
                            $gg = $gg+95;
                        $y++; 
                    }else if($row['status']==0){
                       
                            $pdf->Image('images/iconn3.png', 75, $g, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(85, $g-13);
                            $pdf->Write(37, $row['nama_kapal']);	
                            $pdf->SetXY(85, $g-2);
                            $pdf->Image('images/lastport.png', 75, $g+11, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->Write(37, $row['last_port']);
                            $pdf->SetXY(85, $g+8);
                            $pdf->Image('images/ata_icon.png', 75, $g+22, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                            $pdf->Write(37, $row['ATA']);
                            $pdf->Image('images/cargo.png', 75, $g+33, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            if(strlen($row["cargo"])>30){
                                $pdf->SetXY(85, $g+17);
                                $pdf->Write(37, substr($row["cargo"],0, 30));
                                $pdf->SetXY(85, $g+21);
                                $pdf->Write(37, substr($row["cargo"], 30));
                            }else{
                                $pdf->SetXY(85, $g+20);
                                $pdf->Write(37, $row["cargo"]);
                            }
                            $pdf->Image('images/bunker.png', 75, $g+44, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(85, $g+30);
                            $pdf->Write(37, $row['bunker']);
                            $pdf->Image('images/nextport.png', 75, $g+55, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(85, $g+40);
                            $pdf->Write(37, $row['next_port']);
                            $pdf->Image('images/remarks.png', 75, $g+66, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            if(strlen($row["remarks"])>30){
                                $pdf->SetXY(85, $g+48);
                                $pdf->Write(37, substr($row["remarks"],0, 30));
                                $pdf->SetXY(85, $g+51);
                                $pdf->Write(37, substr($row["remarks"], 30));
                            }else{
                                $pdf->SetXY(85, $g+50);
                                $pdf->Write(37, $row['remarks']);
                            }
                            $g = $g+95;
                       
                    }else if($row['status']==3){
                            $pdf->Image('images/iconn3.png', 145, $b, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(155, $b-13);
                            $pdf->Write(37, $row['nama_kapal']);	
                            $pdf->SetXY(155, $b-2);
                            $pdf->Image('images/atd_icon.png', 145, $b+11, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->Write(37, $row['ATD']);
                            $pdf->SetXY(155, $b+8);
                            $pdf->Image('images/cargo.png', 145, $b+22, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            if(strlen($row["cargo"])>30){
                                $pdf->SetXY(155, $b+6);
                                $pdf->Write(37, substr($row["cargo"],0, 30));
                                $pdf->SetXY(155, $b+9);
                                $pdf->Write(37, substr($row["cargo"], 30));
                            }else{
                                $pdf->SetXY(155, $b+8);
                                $pdf->Write(37, $row["cargo"]);
                            }
                            $pdf->Image('images/etanext_icon.png', 145, $b+33, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            $pdf->SetXY(155, $b+20);
                            $pdf->Write(37, $row['eta_next']);
                            $pdf->Image('images/remarks.png', 145, $b+44, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                            if(strlen($row["remarks"])>30){
                                $pdf->SetXY(155, $b+28);
                                $pdf->Write(37, substr($row["remarks"],0, 30));
                                $pdf->SetXY(155, $b+31);
                                $pdf->Write(37, substr($row["remarks"], 30));
                            }else{
                                $pdf->SetXY(155, $b+30);
                                $pdf->Write(37, $row['remarks']);
                            }
                            $b = $b+73;
                        
                        $t++;
                    }
                }
        }else{
                $pdf->SetXY(20, $h-13);
                $pdf->Write(37, "No Data");	
        }

        $pdf->Output(date("d-m-Y").'-ViewMakassar.pdf', 'I');
    }

    
    public function viewactivityvessel(){

        $pdf = new Pdf('L', 'mm', 'F4', true, 'UTF-8', false);
        // $pdf->SetFont('times', 'B', 20);
        $pdf->SetTitle('Export Vessel Activity');
        $pdf->SetTopMargin(0);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Sisemocs');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage('P', 'F4');
        // $pdf->Image('images/pertamina.png', 33, 2, 25, 7, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        // $pdf->SetXY(15, 0);
        // $pdf->Write(37, date('d/m/y h:i:s'));
        $pdf->SetXY(15, 7);
        $pdf->Cell(30, 30, date('d/m/y h:i:s'), 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->SetFont('', '', 9);
        $pdf->Image('images/sisemocs-logo1P.png', 10, 315, 50, 7, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
        $pdf->SetFont('', 'B', 10);
        $pdf->SetXY(15, 0);
        $pdf->Write(37, 'Vessel Activity (Anchored)');
        $pdf->SetFont('', '', 9);
        
        $query = $this->db->query("SELECT * FROM next_berth WHERE status='0' ORDER BY id DESC");
        $query2 = $this->db->query("SELECT * FROM next_berth WHERE status='2' ORDER BY id DESC");
        $i = 0;
        $h = 25;
        $g = 11;
        $h2 = 25;
        $g2 = 11;
        $c = 0;
        $d = 0;
        $x = 0;
        if($query->num_rows()>0){
            // $pdf->Image('images/line.png', 100, 25, 1, 265, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                foreach ($query->result_array() as $row) {
                    $status="Anchored";
                    $ata_eta = "ata_icon.png";
                    $TA = "ATA";
                    
                    if($c%2==0){
                        $pdf->Image('images/iconn3.png', 15, $h, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                        $pdf->SetXY(25, $g);
                        $pdf->Write(37, $row['nama_kapal']);
                        $pdf->Image('images/'.$ata_eta, 15, $h+11, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+11);
                        $pdf->Write(37, $row[$TA]);
                        $pdf->Image('images/cargo_icon.png', 15, $h+22, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+22);
                        $pdf->Write(37, $row['bunker']);
                        $pdf->Image('images/bunker_icon.png', 15, $h+33, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+33);
                        $pdf->Write(37, $row['cargo']);
                        $pdf->Image('images/remarks_icon.png', 15, $h+44, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+44);
                        $pdf->Write(37, $row['remarks']);
                        $pdf->Image('images/status.png', 15, $h+55, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+55);
                        $pdf->Write(37, $status);
                        $x = $x+1;
                    }else{
                        $pdf->Image('images/iconn3.png', 115, $h, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                        $pdf->SetXY(125, $g);
                        $pdf->Write(37, $row['nama_kapal']);
                        $pdf->Image('images/'.$ata_eta, 115, $h+11, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+11);
                        $pdf->Write(37, $row[$TA]);
                        $pdf->Image('images/cargo_icon.png', 115, $h+22, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+22);
                        $pdf->Write(37, $row['bunker']);
                        $pdf->Image('images/bunker_icon.png', 115, $h+33, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+33);
                        $pdf->Write(37, $row['cargo']);
                        $pdf->Image('images/remarks_icon.png', 115, $h+44, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+44);
                        $pdf->Write(37, $row['remarks']);
                        $pdf->Image('images/status.png', 115, $h+55, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+55);
                        $pdf->Write(37, $status);
                        $h = $h+73;
                        $g = $g+73;
                    }
                    if($x>3){
                        $pdf->AddPage('P', 'F4');
                        $h = 25;
                        $g = 11;
                        $h2 = 25;
                        $g2 = 11;
                        $x = 0;
                    }
                    $i=$i+1;
                    $c++;
                }
        }else{
                $pdf->SetXY(115, 131);
                // $pdf->Write(37, "No Data");	
        }
        $h = $h+73;
        $g = $g+73;
        $pdf->Image('images/line.png', 10, $h-5, 190, 0.2, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
        $pdf->SetFont('', 'B', 10);
        $pdf->SetXY(15, $h-20);
        $pdf->Write(37, 'Vessel Activity (Incoming)');
        $pdf->SetFont('', '', 9);
        if($query2->num_rows()>0){
                foreach ($query2->result_array() as $row) {
                    $status="Incoming";
                    $ata_eta = "eta_icon.png";
                    $TA = "ETA";
                    
                    if($d%2==0){
                        $pdf->Image('images/iconn3.png', 15, $h, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                        $pdf->SetXY(25, $g);
                        $pdf->Write(37, $row['nama_kapal']);
                        $pdf->Image('images/'.$ata_eta, 15, $h+11, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+11);
                        $pdf->Write(37, $row[$TA]);
                        $pdf->Image('images/cargo_icon.png', 15, $h+22, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+22);
                        $pdf->Write(37, $row['bunker']);
                        $pdf->Image('images/bunker_icon.png', 15, $h+33, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+33);
                        $pdf->Write(37, $row['cargo']);
                        $pdf->Image('images/remarks_icon.png', 15, $h+44, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+44);
                        $pdf->Write(37, $row['remarks']);
                        $pdf->Image('images/status.png', 15, $h+55, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(25, $g+55);
                        $pdf->Write(37, $status);
                        $x=$x+1;
                        
                    }else{
                        $pdf->Image('images/iconn3.png', 115, $h, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 1, false, false, false);
                        $pdf->SetXY(125, $g);
                        $pdf->Write(37, $row['nama_kapal']);
                        $pdf->Image('images/'.$ata_eta, 115, $h+11, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+11);
                        $pdf->Write(37, $row[$TA]);
                        $pdf->Image('images/cargo_icon.png', 115, $h+22, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+22);
                        $pdf->Write(37, $row['bunker']);
                        $pdf->Image('images/bunker_icon.png', 115, $h+33, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+33);
                        $pdf->Write(37, $row['cargo']);
                        $pdf->Image('images/remarks_icon.png', 115, $h+44, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+44);
                        $pdf->Write(37, $row['remarks']);
                        $pdf->Image('images/status.png', 115, $h+55, 8, 11, 'PNG', 'http://sisemocs.com', '', false, 150, '', false, false, 0, false, false, false);
                        $pdf->SetXY(125, $g+55);
                        $pdf->Write(37, $status);
                        $h = $h+73;
                        $g = $g+73;
                    }
                    
                    if($x>3){
                        $pdf->AddPage('P', 'F4');
                        $h = 25;
                        $g = 11;
                        $h2 = 25;
                        $g2 = 11;
                        $x = 0;
                    }
                    
                    $i=$i+1;
                    $d++;
                }
        }else{
                $pdf->SetXY(115, 131);
                // $pdf->Write(37, "No Data");	
        }
        
        $pdf->Output(date("d-m-Y").'-VesselActivity.pdf', 'I');
    }
}
?>