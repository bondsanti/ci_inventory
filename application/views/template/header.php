<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//ดึงการตั้งค่าเว็บ
$Qsetting= $this->db->query("SELECT * from tbl_setting WHERE set_id = '1' ");
foreach ($Qsetting->result_array() as $rs){
$set_name = $rs['set_name'];
$set_title = $rs['set_title'];
$set_title_logo = $rs['set_title_logo'];
$set_navbar_color = $rs['set_navbar_color'];
$set_sidebar_color = $rs['set_sidebar_color'];
$set_footer = $rs['set_footer'];
}
//ดึงจำนวนรายการขออนุมัติ
$Qalert_Req= $this->db->query("SELECT COUNT(mat_req_id) as Num_req from tbl_material_req WHERE mat_req_statas = '1' ");
foreach ($Qalert_Req->result_array() as $rs){
$Num_req = $rs['Num_req'];
}
//ดึงจำนวนรายการอนุมัติแล้ว
$Qalert_Req1= $this->db->query("SELECT COUNT(mat_req_id) as Num_aprove from tbl_material_req WHERE mat_req_statas = '2' ");
foreach ($Qalert_Req1->result_array() as $rs){
$Num_aprove = $rs['Num_aprove'];
}
//ดึงจำนวนสินค้าใกล้หมด
$Qalert_Req1= $this->db->query("SELECT COUNT(mat_reg_id) as Num_outstock from tbl_material_reg WHERE mat_reg_qty_stock <= mat_reg_qty_limit");
foreach ($Qalert_Req1->result_array() as $rs){
$Num_outstock = $rs['Num_outstock'];
}


if(!function_exists('active_link')) {
    function activate_menu($controller)
    {
        // Getting CI class instance.
        $CI = get_instance();
        // Getting router class to active.
        $class = $CI->router->fetch_class();
        $is_active = FALSE;
        if(is_array($controller)) {
            foreach ($controller as $cont){
               if($cont == $class){
                   $is_active = TRUE;
               }
            }
        }else{
            if($controller == $class){
                $is_active = TRUE;
            }
        }

        return ($is_active) ? "active" : "";
    }
}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $set_title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="<?php echo base_url('img/logo');?>/<?php echo $set_title_logo;?>"/>
  <!-- Font Awesome -->
  <?php echo link_tag('bootstrap/plugins/fontawesome-free/css/all.min.css');?>
  
  <!-- iCheck -->
  <?php echo link_tag('bootstrap/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <?php echo link_tag('bootstrap/dist/css/adminlte.min.css');?>
  
  <!-- overlayScrollbars -->
  <?php echo link_tag('bootstrap/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>
  
  <!-- Daterange picker -->
  <?php echo link_tag('bootstrap/plugins/daterangepicker/daterangepicker.css');?>
  

  <?php echo link_tag('bootstrap/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');?>

    <!-- DataTables -->
  <?php echo link_tag('bootstrap/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>
  <?php echo link_tag('bootstrap/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>

  <!-- Select2 -->
  <?php echo link_tag('bootstrap/plugins/select2/css/select2.min.css');?>
  <?php echo link_tag('bootstrap/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>
  <!-- pace-progress -->
  <?php echo link_tag('bootstrap/plugins/pace-progress/themes/black/pace-theme-flat-top.css');?>

  <!-- jsGrid -->

  <?php echo link_tag('bootstrap/plugins/jsgrid/jsgrid.min.css');?>
  <?php echo link_tag('bootstrap/plugins/jsgrid/jsgrid-theme.min.css');?>

<!-- sweetalert -->
<!--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js"></script>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style type="text/css" media="screen">
  .fr{

    color: red;
  }

  </style>


    
    <script type="text/javascript">
          function isEngchar(str,obj){
            var orgi_text="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                var str_length=str.length;
                var str_length_end=str_length-1;
            var isEng=true;
            var Char_At="";
              for(i=0;i<str_length;i++){
                Char_At=str.charAt(i);
                if(orgi_text.indexOf(Char_At)==-1){
                    isEng=false;
                }   
              }

              if(str_length>=1){
                if(isEng==false){
                    obj.value=str.substr(0,str_length_end);
                    obj.value="";
                }
              }
              return isEng; // กรอกข้อมูลได้เฉพาะ ENG และ ตัวเลข
          }
        </script>

        <script language="JavaScript">
            function chkNumber(ele)
            {
            var vchar = String.fromCharCode(event.keyCode);
            if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
            ele.onKeyPress=vchar;
            }
        </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed pace-maroon">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-<?php echo $set_navbar_color;?> navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> สิทธิใช้งาน : <?php echo $lev_name;?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">จัดการข้อมูล Profile</span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('profile/edit_profile');?>" class="dropdown-item">
            <i class="fas fa-address-card mr-2"></i> แก้ไขข้อมูลส่วนตัว
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('login/logout');?>" onclick="return confirm('ยืนยัน');" class="dropdown-item text-danger">
            <i class="fas fa-sign-out-alt mr-2"></i> ออกจากระบบ
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-<?php echo $set_sidebar_color;?> elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('home');?>" class="brand-link">
      <img src="<?php echo base_url('img/logo');?>/<?php echo $set_title_logo;?>" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">

      <span class="brand-text font-weight-light"><?php echo $set_name;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('img/user');?>/<?php echo $mem_img;?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">คุณ <?php echo $mem_fname;?> <?php echo $mem_lname;?></a>
          <a href="#" class="d-block">ตน. <?php echo $member_position;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header text-warning">สำหรับสมาชิก</li>
            <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B' OR $this->session->userdata('lev_ref')=='C') { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('home');?>" class="nav-link <?=activate_menu('home');?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                หน้าหลัก
             
              </p>
            </a>
          </li>
    
        <?php }?>
                <?php if ($this->session->userdata('lev_ref')=='B' OR $this->session->userdata('lev_ref')=='C'OR $this->session->userdata('lev_ref')=='D') { ?>
        <li class="nav-item">
            <a href="<?php echo site_url('material_history');?>" class="nav-link <?=activate_menu('material_history');?>">
              <i class="nav-icon fas fa-id-badge"></i>
              <p>
                ประวัติการเบิก
              </p>
              <!--<span class="badge badge-success right"><?php echo $Num_aprove;?></span>-->
            </a>
          </li>
        <?php } ?>
          <li class="nav-item">
            <a href="<?php echo site_url('profile/edit_profile');?>" class="nav-link <?=activate_menu('profile');?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                แก้ไขข้อมูล
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('login/logout');?>" onclick="return confirm('ยืนยัน');" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                ออกจากระบบ
              </p>
            </a>
          </li>
          <li class="nav-header text-warning">ข้อมูลการเบิก-จ่าย (วัสดุ)</li>

         <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B' OR $this->session->userdata('lev_ref')=='C'OR $this->session->userdata('lev_ref')=='D') { ?>
           <li class="nav-item">
            <a href="<?php echo site_url('material_req');?>" class="nav-link <?=activate_menu('material_req');?>">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                เบิกวัสดุ
              </p>
            </a>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B' OR $this->session->userdata('lev_ref')=='C') { ?>
          <li class="nav-item">
            <a href="<?php echo site_url('material_approve');?>" class="nav-link <?=activate_menu('material_approve');?>">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p class="">
                อนุมัติ เบิก-จ่าย
              </p>
              <span class="badge badge-warning right"><?php echo $Num_req;?></span>
            </a>
          </li>
         <li class="nav-item">
            <a href="<?php echo site_url('approve_history/list');?>" class="nav-link <?=activate_menu('approve_history');?>">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>
               รายการอนุมัติ เบิก-จ่าย
              </p>
              <!--<span class="badge badge-success right"><?php echo $Num_aprove;?></span>-->
            </a>
          </li>
         
        <?php } ?>


              <li class="nav-item">
                <a href="<?php echo site_url('out_stock');?>" class="nav-link <?=activate_menu('out_stock');?>">
                  <i class="far fa-bell nav-icon"></i>
                  <p>วัสดุใกล้หมด</p>
                  <span class="badge badge-danger right"><?php echo $Num_outstock;?></span>
                </a>
              </li>
              <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B') { ?>
                <li class="nav-item">
                <a href="<?php echo site_url('material_stock');?>" class="nav-link <?=activate_menu('material_stock');?>">
                  <i class="far fa-folder-open nav-icon"></i>
                  <p>รับเข้า in Stock</p>
                </a>
              </li>
            <?php }?>
               <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B') { ?>
          <li class="nav-header text-warning">รายงาน</li>


              <li class="nav-item">
                <a href="<?php echo site_url('report');?>" class="nav-link <?=activate_menu('report');?>">
                  <i class="far fa-file-alt nav-icon"></i>
                  <p>รายงานการเบิก-จ่าย</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('report_instock');?>" class="nav-link <?=activate_menu('report_instock');?>">
                  <i class="far fa-file-alt nav-icon"></i>
                  <p>รายงานรับเข้าวัสดุ</p>
                </a>
              </li>
 <?php }?>
        <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B'OR $this->session->userdata('lev_ref')=='C') { ?>
          <li class="nav-header text-warning">จัดการข้อมูลวัสดุ</li>
         

              <li class="nav-item">
                <a href="<?php echo site_url('unit');?>" class="nav-link <?=activate_menu('unit');?>">
                  <i class="far fa-hdd nav-icon"></i>
                  <p>หน่วยนับ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('material');?>" class="nav-link <?=activate_menu('material');?>">
                  <i class="far fa-hdd nav-icon"></i>
                  <p>ประเภทวัสดุ</p>
                </a>
              </li>
     
             <li class="nav-item">
                <a href="<?php echo site_url('material_reg');?>" class="nav-link <?=activate_menu('material_reg');?>">
                  <i class="far fa-hdd nav-icon"></i>
                  <p>ข้อมูลทะเบียนวัสดุ</p>
                </a>
              </li>
          <?php }?>
  
  <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B') { ?>

          <li class="nav-header text-warning">จัดการข้อมูลพื้นฐาน</li>

        

          <li class="nav-item">
             <a href="<?php echo site_url('member');?>" class="nav-link <?=activate_menu('member');?>">
                  <i class="far fa-user nav-icon"></i>
                  <p>จัดการผู้ใช้งานระบบ</p>
                </a>
          </li>

          
    <!--     <li class="nav-item">
             <a href="<?php echo site_url('members');?>" class="nav-link <?=activate_menu('members');?>">
                  <i class="far fa-user-circle nav-icon"></i>
                  <p>จัดการสมาชิก</p>
                </a>
          </li>
        -->
        <?php } ?>
  <?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B') { ?>
           <li class="nav-item">
             <a href="<?php echo site_url('setting/edit_data');?>" class="nav-link <?=activate_menu('setting','edit_data');?>">
                 <i class="nav-icon fas fa-cog"></i>
                  <p>ตั้งค่าเว็บไซต์</p>
                </a>
          </li>

        <?php }?>

<?php if ($this->session->userdata('lev_ref')=='A' OR $this->session->userdata('lev_ref')=='B'OR $this->session->userdata('lev_ref')=='C') { ?>
<li class="nav-header text-warning">ระบบหลักค้ำประกันสัญญา</li>
           <li class="nav-item">
             <a href="<?php echo site_url('guarantee');?>" class="nav-link <?=activate_menu('guarantee');?>">
                 <i class="nav-icon fas fa-file-alt"></i>
                  <p>ทะเบียนข้อมูล</p>
                </a>
          </li>
        <li class="nav-item">
             <a href="<?php echo site_url('guarantee_report');?>" class="nav-link <?=activate_menu('guarantee_report');?>">
                 <i class="nav-icon fas fa-file-alt"></i>
                  <p>รายงานครบคืน</p>
                </a>
          </li>

        <?php }?>
         
         
          <li class="nav-header text-green">คู่มือใช้งาน</li>
          <?php if ($this->session->userdata('lev_ref')=='B') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Administartor</p>
            </a>
          </li>
          <?php }?>
          <?php if ($this->session->userdata('lev_ref')=='C') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Staff</p>
            </a>
          </li>
           <?php }?>
            <?php if ($this->session->userdata('lev_ref')=='D') { ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>User</p>
            </a>
          </li>
        <?php }?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
