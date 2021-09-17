
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ทะเบียน <small class="text-muted">คุมหนังสือ ค้ำประกันสัญญา</small></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

         <div class="row">

            <div class="col-md-12">
            


              <div class="card card-green">
                <div class="card-header">
                  <h3 class="card-title"><i class="far fa-list-alt"></i> ตารางข้อมูล </h3>



                  <div class="card-tools">
                    
                      <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-square"></i> เพิ่มข้อมูล </a> 



                  <a href="<?php echo base_url('guarantee/export_data');?>" target="_blank" role="button" class="btn btn-primary btn-create"><i class="fas fa-file-excel"></i> Export all </a> 


                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                     <form role="form" action="<?php echo base_url('guarantee/seach');?>" method="post"  id="form">
<p class="">
ค้นหางบตามปี : 
                                  
                                    
                                      
                                      <select name="year">
                                       
                                        <option value="">เลือกปี</option>
                                        <?php
                                        $year=date("Y");
                                        //$Tyear=date("Y")+543;

                                        for ($y=2012; $y <=$year+1 ; $y++) { 
                                          

                                        ?>

                                         <option value="<?php echo $y;?>">ปี <?php echo $y;?> / <?php echo $Tyear=date($y+543);?></option>

                                       <?php } ?>

                                      </select>
                                       <button type="submit" name="s" value="se" class="btn btn-success btn-sm">ค้นหา</button>
                           
                                  
</p>
</form>
                    <table id="tbl1" class="table table-hover table-striped projects table-bordered">
                    <thead>
                    <tr class="text-center">
                      <th width="5%">#</th>
                      <th width="10%">สัญญาเลขที่</th>
                      <th width="30%">โครงการ</th>
                      <th width="17%">หนังสือหลักค้ำ</th>
                      <th width="10%">สถานะหลักค้ำ</th>
                      <th width="10%">ประเภทหลักค้ำ</th>
                      <th width="7%">งบปี</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php 

                      $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                      $i=0;
                      foreach ($Query as $rs) { 

                      $i++;

if (!empty($rs->contract_date)) {


$strDate = $rs->contract_date;
$Y = substr($strDate,0,4);
$Y = $Y+543;
$m = substr($strDate,5,2);
$d = substr($strDate,8,2);
$strMonth= date("n",strtotime($strDate));
$strMonthThai=$strMonthCut[$strMonth];
$strDate_new = implode("/",array($d,$strMonthThai,$Y)); //วันที่ลงสัญญา

}
if (!empty($rs->checkin_date)) {
$checkinDate = $rs->checkin_date;
$Y = substr($checkinDate,0,4);
$Y = $Y+543;
$m = substr($checkinDate,5,2);
$d = substr($checkinDate,8,2);
$strMonth= date("n",strtotime($checkinDate));
$strMonthThai=$strMonthCut[$strMonth];
$checkinDate = implode("/",array($d,$strMonthThai,$Y)); //วันที่ตรวจรับงาน
}
if (!empty($rs->enddate_bookbank)) {
$endinDate = $rs->enddate_bookbank;
$Y = substr($endinDate,0,4);
$Y = $Y+543;
$m = substr($endinDate,5,2);
$d = substr($endinDate,8,2);
$strMonth= date("n",strtotime($endinDate));
$strMonthThai=$strMonthCut[$strMonth];
$endinDate = implode("/",array($d,$strMonthThai,$Y)); //วันที่กำหนดคืนหนังสือหลักค้ำ 
}
if (!empty($rs->inspect_date)) {
$inspectDate = $rs->inspect_date;
$Y = substr($inspectDate,0,4);
$Y = $Y+543;
$m = substr($inspectDate,5,2);
$d = substr($inspectDate,8,2);
$strMonth= date("n",strtotime($inspectDate));
$strMonthThai=$strMonthCut[$strMonth];
$inspectDate = implode("/",array($d,$strMonthThai,$Y)); //แจ้งตรวจสภาพงาน 
}
if (!empty($rs->checkout_date)) {
$checkoutDate = $rs->checkout_date;
$Y = substr($checkoutDate,0,4);
$Y = $Y+543;
$m = substr($checkoutDate,5,2);
$d = substr($checkoutDate,8,2);
$strMonth= date("n",strtotime($checkoutDate));
$strMonthThai=$strMonthCut[$strMonth];
$checkoutDate = implode("/",array($d,$strMonthThai,$Y)); //แจ้งตรวจสภาพงาน 
}
?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="text-left">
                          <a class="text-danger">
                          <?php echo $rs->contract_no;?>
                          </a>
                          <br/>
                          <small>
                            <b>ลงวันที่</b> : <?php echo $strDate_new;?>
                          </small>
                       </td>
                      <td class="text-left">
                          <a>
                          <?php echo $rs->project_name;?>
                          </a>
                          <br/>
                          <small>
                              <b>ผู้รับจ้าง</b> : <?php echo $rs->contract_name;?> <b>สัญญาวงเงิน</b> <?php echo number_format($rs->credit_limit,2);?>
                          </small>
                       </td>
                        <td>
                          <a>
                          <b><?php echo $rs->main_bookbank;?></b>
                          </a>                   
                              สาขา <?php echo $rs->sub_bookbank;?>
                   
                          <br/>
                          <small>
                              <b>วงเงินค้ำประกัน</b> : <?php echo number_format($rs->credit_bookbank,2);?> <b>ระยะเวลา</b> : <?php echo $rs->duration_bookbank;?> 
                          </small>
                       </td>
                        <td class="text-center">

                          
                         <?php if ($rs->status_credit=='1') { 
                          $status_credit="ยังไม่ครบคืน";
                   echo"<button type=\"button\" class=\"btn btn-secondary btn-sm\" data-toggle=\"modal\" data-target=\"#Modal_credit$rs->id\">ยังไม่ครบคืน</button>";


                    }else if ($rs->status_credit=='2') { 
                    echo"<button type=\"button\" class=\"btn btn-success btn-sm\" data-toggle=\"modal\" data-target=\"#Modal_credit$rs->id\">คืนหลักค้ำแล้ว</button>";
                     $status_credit="คืนหลักค้ำแล้ว";

                }else if ($rs->status_credit=='3') { 
                   echo"<button type=\"button\" class=\"btn btn-warning btn-sm\" data-toggle=\"modal\" data-target=\"#Modal_credit$rs->id\">แจ้งแล้ว/รอตอบกลับ</button>";
                   $status_credit="แจ้งแล้ว/รอตอบกลับ";
                   
                 }else{
                echo"<button type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" data-target=\"#Modal_credit$rs->id\">อยู่ระหว่างซ่อมแซม</button>";
                $status_credit="อยู่ระหว่างซ่อมแซม";
                 } 

                 ?>


                       </td>
                        <td class="text-center">
                                             <?php if ($rs->status_type=='หลักค้ำปกติ') { 
                          $status_type="หลักค้ำปกติ";
                   echo"<button type=\"button\" class=\"btn btn-primary btn-sm\" data-toggle=\"modal\" data-target=\"#Modal_c$rs->id\">หลักค้ำปกติ</button>";


                    }else if ($rs->status_type=='หลักค้ำ15%(เบิกล่วงหน้า)') { 
                    echo"<button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#Modal_c$rs->id\">หลักค้ำ15%(เบิกล่วงหน้า)</button>";
                     $status_type="หลักค้ำ15%(เบิกล่วงหน้า)";

                }else if ($rs->status_type=='หลักค้ำเงินสด') { 
                   echo"<button type=\"button\" class=\"btn btn-success btn-sm\" data-toggle=\"modal\" data-target=\"#Modal_c$rs->id\">หลักค้ำเงินสด</button>";
                   $status_type="หลักค้ำเงินสด";
                   
                 } 

                 ?>
                       </td>                        
                    <td class="text-center">
                     <?php

                     if (!empty($rs->year)) {
                     echo $year=$rs->year+543;
                     }
                      ?>
                    </td>
                      <td class="text-center">
                       
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $rs->id;?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                       </button>


                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $rs->id;?>">
                        <i class="nav-icon fas fa-edit"></i>
                       </button>


                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalDel<?php echo $rs->id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i>
                       </button>



                      </td>
                    </tr>

                                      <!-- Modal credit -->
                        <div class="modal fade" id="Modal_credit<?php  echo $rs->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('guarantee/update_data1');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนสถานะหลักค้ำ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" class="form-control" name="id" value="<?php echo $rs->id;?>" required>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>สถานะหลักค้ำ</label>
                                      <select class="form-control" name="status_credit" required>
                                        <option value="<?php echo $status_credit;?>"><?php echo $status_credit;?></option>

                                        <option value="">เลือก</option>
                                        <option value="1">ยังไม่ครบคืน</option>
                                        <option value="2">คืนหลักค้ำแล้ว</option>
                                         <option value="3">แจ้งแล้ว/รอตอบกลับ</option>
                                         <option value="4">อยู่ระหว่างซ่อมแซม</option>

                                      </select>
                                    </div>
                                  </div>

                              </div>
                            

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                         <button type="submit" class="btn btn-success" id="" >อัพเดท</button>

                                      </div>
                                       </form>
                                    </div>
                                  </div>
                                </div>


                     <!-- Modal credit -->
                        <div class="modal fade" id="Modal_c<?php  echo $rs->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('guarantee/update_data2');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เปลี่ยนสถานะหลักค้ำ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" class="form-control" name="id" value="<?php echo $rs->id;?>" required>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                       <label>ประเภทหลักค้ำประกัน</label>
                                      <select class="form-control" name="status_type" required>
                                        <option value="<?php echo $status_type;?>"><?php echo $status_type;?></option>
                                        <option value="">เลือก</option>
                                        <option value="หลักค้ำปกติ">หลักค้ำปกติ</option>
                                         <option value="หลักค้ำ15%(เบิกล่วงหน้า)">หลักค้ำ15%(เบิกล่วงหน้า)</option>
                                         <option value="หลักค้ำเงินสด">หลักค้ำเงินสด</option>

                                      </select>
                                    </div>
                                  </div>

                              </div>
                            

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                         <button type="submit" class="btn btn-success" id="" >อัพเดท</button>

                                      </div>
                                       </form>
                                    </div>
                                  </div>
                                </div>
                    
                  <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?php  echo $rs->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('guarantee/update_data');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                          <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" required>
                          <input type="hidden" class="form-control" name="id" value="<?php echo $rs->id;?>" required>
                             <input type="hidden" class="form-control" name="status_credit" value="<?php echo $rs->status_credit;?>" required>


                              <div class="modal-body">
                                <h5 class="text-danger">ข้อมูลสัญญาจ้าง</h5>
                             
                               <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>ชื่อโครงการ</label>
                                      <input type="text" class="form-control is-warning text-danger" name="project_name" value="<?php echo $rs->project_name;?>" autocomplete="off" placeholder="ชื่อโครงการ" required>
                                    </div>
                                  </div>
                                </div>

                               <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>เลขที่สัญญา</label>
                                      <input type="text" class="form-control is-warning text-danger" name="contract_no" value="<?php echo $rs->contract_no;?>" autocomplete="off" placeholder="เลขที่สัญญา" required>
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ลงวันที่สัญญา</label>
                                      <input type="date" class="form-control is-warning text-danger" name="contract_date" value="<?php echo $rs->contract_date;?>" autocomplete="off" placeholder="ลงวันที่สัญญา" required>
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>สัญญาวงเงิน</label>
                                      <input type="text" class="form-control is-warning text-danger" name="credit_limit" value="<?php echo $rs->credit_limit;?>" autocomplete="off" placeholder="สัญญาวงเงิน" required>
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ชื่อผู้รับจ้าง</label>
                                      <input type="text" class="form-control is-warning text-danger" name="contract_name" value="<?php echo $rs->contract_name;?>" autocomplete="off" placeholder="ชื่อผู้รับจ้าง" required>
                                      
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                 <h5 class="text-primary">ข้อมูลหนังสือหลักประกัน</h5>
                               <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ธนาคาร</label>
                                      <select class="form-control is-warning text-danger" name="main_bookbank">
  <?php if (!empty($rs->main_bookbank)) {?>
                                        <option value="<?php echo $rs->main_bookbank;?>"><?php echo $rs->main_bookbank;?></option>
                                           <?php }?>
                                        <option value="">==เลือก ธนาคาร==</option>

                                        <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                         <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                         <option value="ธนาคารกรุงศรี">ธนาคารกรุงศรี</option>
                                         <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                         <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                         <option value="ธนาคารไทยพานิชย์">ธนาคารไทยพาณิชย์</option>
                                         <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                                         <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>สาขา</label>
                                        <input type="text" class="form-control is-warning text-danger" name="sub_bookbank" value="<?php echo $rs->sub_bookbank;?>" autocomplete="off" placeholder="สาขา">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วงเงิน</label>
                                        <input type="text" class="form-control is-warning text-danger" name="credit_bookbank" value="<?php echo $rs->credit_bookbank;?>" autocomplete="off" placeholder="วงเงินค้ำประกัน" >
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ระยะเวลา</label>
                                        <input type="text" class="form-control is-warning text-danger" name="duration_bookbank" value="<?php echo $rs->duration_bookbank;?>" autocomplete="off" placeholder="ระยะเวลาค้ำประกัน">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>ประเภทหลักค้ำประกัน</label>
                                      <select class="form-control is-warning text-danger" name="status_type" >
  <?php if (!empty($rs->status_type)) {?>
                                         <option value="<?php echo $rs->status_type;?>"><?php echo $rs->status_type;?></option>
                                               <?php }?>
                                        <option value="">==เลือก==</option>

                                        <option value="หลักค้ำปกติ">หลักค้ำปกติ</option>
                                         <option value="หลักค้ำ15%(เบิกล่วงหน้า)">หลักค้ำ15%(เบิกล่วงหน้า)</option>
                                         <option value="หลักค้ำเงินสด">หลักค้ำเงินสด</option>

                                      </select>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>ปีงบประมาณ หลักค้ำ</label>
                                      <select class="form-control is-warning text-danger" name="year" >
                                        <?php if (!empty($rs->year)) {?>
                                        <option value="<?php echo $rs->year;?>">ปี <?php echo $rs->year;?> / <?php echo $Tsyear=date($rs->year+543);?></option>
                                      <?php }?>
                                        <option value="">==เลือก==</option>
                                        <?php
                                        $year=date("Y");
                                        //$Tyear=date("Y")+543;

                                        for ($y=2012; $y <=$year+1 ; $y++) { 
                                          

                                        ?>

                                         <option value="<?php echo $y;?>">ปี <?php echo $y;?> / <?php echo $Tyear=date($y+543);?></option>

                                       <?php } ?>

                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                               <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่มอบส่งงาน</label>
                                      <input type="date" class="form-control is-warning text-danger"  value="<?php echo $rs->checkin_date;?>" name="checkin_date" autocomplete="off" placeholder="">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่กำหนดคืนหลักค้ำ</label>
                                      <input type="date" class="form-control is-warning text-danger"  value="<?php echo $rs->enddate_bookbank;?>" name="enddate_bookbank" autocomplete="off" placeholder="">
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่แจ้งตรวจสภาพงาน</label>
                                      <input type="date" class="form-control is-warning text-danger"  value="<?php echo $rs->inspect_date;?>" name="inspect_date" autocomplete="off" placeholder="" >
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่คืนหลังค้ำ</label>
                                      <input type="date" class="form-control is-warning text-danger"  value="<?php echo $rs->checkout_date;?>" name="checkout_date" autocomplete="off" placeholder="" >
                                      
                                    </div>
                                  </div>
                                </div>

                               <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>หมายเหตุ</label>
                                       <textarea class="form-control is-warning text-danger" rows="3" name="remaek" autocomplete="off" placeholder="หมายเหตุ"><?php echo $rs->remaek;?></textarea>
                                    </div>
                                  </div>
                                </div>



                              </div>
                            

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                         <button type="submit" class="btn btn-success" id="" >อัพเดท</button>

                                      </div>
                                       </form>
                                    </div>
                                  </div>
                                </div>



                    <!-- Modal detail -->
                    <div class="modal fade" id="detailModal<?php echo $rs->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Information! <code><?php echo $rs->contract_no;?></code></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
      
                     
                                            <h5 class="text-primary">ข้อมูลสัญญาจ้าง</h5>
                                            <b>ลงวันที่สัญญา</b> : <code><?php echo $strDate_new;?></code>
                                            <br>
                                            <b>ชื่อโครงการ</b> : <code><?php echo $rs->project_name;?></code>
                                            <br>
                                            <b>ชื่อผู้รับจ้าง</b> : <code><?php echo $rs->contract_name;?></code>
                                            <br>
                                            <b>สัญญาวงเงิน</b> : <code><?php echo number_format($rs->credit_limit,2);?></code>
                                               <hr>
                                          <h5 class="text-primary">ข้อมูลหลักประกัน</h5>
                                            <b>ธนาคาร</b> : <code><?php echo $rs->main_bookbank;?> </code> <b>สาขา</b> : <code><?php echo $rs->sub_bookbank;?></code>
                                             <br>
                                            <b>วงเงินค้ำประกัน</b> :  <code><?php echo number_format($rs->credit_bookbank,2);?> </code>
                                              <br>
                                             <b>ระยะเวลา</b> : <code><?php echo $rs->duration_bookbank;?></code>
                                                   <hr>
                                             <h5 class="text-primary">รายละเอียด</h5>
                                            <b>วันที่มอบส่งงาน</b> : <code><?php 
                                            if (!empty($checkinDate)) {
                                              echo $checkinDate;
                                            }
                                           ?> </code> 
                                            <br>
                                            <b>วันที่กำหนดคืนหลักค้ำ</b> : <code><?php 
                                            if (!empty($endinDate)) {
                                            echo $endinDate;}?></code>
                                             <br>
                                            <b>วันที่แจ้งตรวจสภาพงาน</b> :  <code><?php  if (!empty($inspectDate)) {echo $inspectDate;}?> </code>
                                              <br>
                                             <b>วันคืนหลังค้ำ</b> : <code><?php if (!empty($checkoutDate)) {echo $checkoutDate;}?></code>
                                              <br>
                                            <b>งบปี</b> : <code><?php if (!empty($rs->year)) {echo $rs->year;}?> / <?php if (!empty($rs->year)) {echo $Tsyear=date($rs->year+543);}?></code>
                                              <br>
                                             <b>หมายเหตุ</b> : <code><?php echo $rs->remaek;?></code>
                               

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Del -->
                    <div class="modal fade" id="ModalDel<?php echo $rs->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> คุณต้องการลบ</h5>
                           <p>เลขที่สัญญา <b><?php echo $rs->contract_no;?></b> ใช่หรือไม่?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <a class="btn btn-danger" href="<?php  echo site_url('guarantee/delete_data/').$rs->id ;?>">ยืนยัน</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php }  ?>

                    </tbody>
                  </table>






                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

            
          </div>
        <!-- /.row -->
        
      
      </div>
    </section>

 
  </div>
  <!-- /.content-wrapper -->