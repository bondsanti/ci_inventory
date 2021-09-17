  
                    <?php

                   // $strDate_Start=date("d/m/Y",strtotime($dateStart));
                   //  $strDate_End=date("d/m/Y",strtotime($dateEnd));


$strDate_Start = $dateStart;
$Y = substr($strDate_Start,0,4);
$Y = $Y+543;
$m = substr($strDate_Start,5,2);
$d = substr($strDate_Start,8,2);
$strDate_Start = implode("/",array($d,$m,$Y)); //วันที่ลงสัญญา

$strDate_End = $dateEnd;
$Y = substr($strDate_End,0,4);
$Y = $Y+543;
$m = substr($strDate_End,5,2);
$d = substr($strDate_End,8,2);
$strDate_End = implode("/",array($d,$m,$Y)); //วันที่ตรวจรับงาน


                     if ($status_credit=='1') { 
                          $status="ยังไม่ครบคืน";
                    }else if ($status_credit=='2') { 
                     $status="คืนหลักค้ำแล้ว";
                    }else if ($status_credit=='3') { 
                     $status="แจ้งแล้ว/รอตอบกลับ";
                    }else{
                     $status="อยู่ระหว่างซ่อมแซม";
                    } 

function DateThai($dateStart)
  {
    $strYear = date("Y",strtotime($dateStart))+543;
    $strMonth= date("n",strtotime($dateStart));
    $strDay= date("j",strtotime($dateStart));
    $strHour= date("H",strtotime($dateStart));
    $strMinute= date("i",strtotime($dateStart));
    $strSeconds= date("s",strtotime($dateStart));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay"."/"."$strMonthThai"."/"."$strYear";
  }




                    ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1>รายงาน <u>หลักค้ำประกันสัญญา</u> <small class="text-success">วันที่ <?php echo $strDate_Start;?>  - <?php echo $strDate_End;?></small></h1>
            <h3>สถานะหลักค้ำ  <small class="text-danger">สถานะหลักค้ำ <?php echo $status;?></small></h3>
          </div>
          <div class="col-sm-5 text-right">


       <!-- <form action="<?php echo base_url('guarantee_report/export_listday');?>" method="post" target="_blank" id="form" enctype="multipart/form-data"> -->

           <a href="<?php  echo site_url('guarantee_report');?>" type="button" class="btn btn-warning"><i class="fas fa-search"></i> ค้นหาข้อมูลใหม่ </a>
           <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#ModalPrint"><i class="fas fa-print"></i> พิมพ์รายงาน </a>
                               <!--   <input type="hidden" name="dateStart" value="<?php echo $dateStart?>">
                                 <input type="hidden" name="dateEnd"  value="<?php echo $dateEnd?>">
                                 <input type="hidden" name="status_credit"  value="<?php echo $status_credit?>">
                                 <input type="hidden" name="year"  value="<?php echo $year?>">
           <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Export Excel </button>

            </form> -->



          <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#ModalExport"><i class="fas fa-file-excel"></i> Export Excel </a>



          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">



            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    รายงาน

                    <small class="float-right">วันที่ <?php echo $strDate_Start;?> - <?php echo $strDate_End;?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <hr>
              <!-- Table row -->
              <div class="row">
               
                <!-- /.col -->
                <div class="col-12 table-responsive">

                   <table class="table table-sm table-bordered" style='font-family:"Courier New", Courier, monospace; font-size:80%'>
                    <thead>
                      <tr class="text-center table-primary">
                      <th width="">ลำดับ</th>

                      <th width="">ประเภทหลักค้ำ</th>
                      <th width="">สัญญาเลขที่</th>
                      <th width="">ลงวันที่สัญญา</th>
                      <th width="">ชื่อโครงการ</th>
                      <th width="">ชื่อผู้รับจ้าง</th>


                       <th width="">วันที่ส่งมอบหมาย</th>
                        <th width="">วันที่กำหนดคืนหลักค้ำ</th>
                         <th width="">วันที่แจ้งตรวจสภาพงาน</th>
                          <th width="">วันคืนหลังค้ำ</th>
                           <th width="">งบปี</th>

                    </tr>
                    </thead>
                    <tbody>
                      <?php

                      $i=1;
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                      foreach ($Query as $rs) 
                      {
            


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

$subject=$rs->project_name;
if (strlen($subject)>130) {
$subject=substr($subject,0,130)."..";
}
                      ?>
                    <tr>
                      <td width=""><?php echo $i;?></td>
                       <td width=""><?php echo $rs->status_type;?></td>
                       <td width=""><?php echo $rs->contract_no;?></td>
                      <td width=""><?php echo $strDate_new;?></td>
                       <td width=""><?php echo $subject;?></td>
                        <td width=""><?php echo $rs->contract_name;?></td>
                       
                              <td width=""><?php echo $checkinDate;?></td>
                               <td width=""><?php echo $endinDate;?></td>
                                <td width=""><?php echo $inspectDate;?></td>
                                 <td width=""><?php echo $checkoutDate;?></td>
                                  <td width=""><?php if (!empty($rs->year)) {echo $Tsyear=date($rs->year+543);}?></td>

                    </tr>

                    <?php

                   // $Sumtotal1=$Sumtotal1+$row->instock;
                   // $Sumtotal2=$Sumtotal2+$row->total_instock;

                    $i++;

                  }
                    ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>

 





                    
 <!-- /.ModalPrint -->
            
                    <div class="modal fade" id="ModalPrint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                        <form action="<?php echo base_url('guarantee_report/genpdf');?>" method="post" target="_blank" id="form" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ใส่หัวข้อรายงาน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
      
                             <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <label>หัวข้อรายงาน</label>
                                         <input type="text" class="form-control" name="head_title" autocomplete="off" required>
                                  </div>
                                 </div>
                               </div>
                                 <input type="hidden" name="dateStart" value="<?php echo $dateStart?>">
                                 <input type="hidden" name="dateEnd"  value="<?php echo $dateEnd?>">
                                 <input type="hidden" name="status_credit"  value="<?php echo $status_credit?>">
                                 <input type="hidden" name="year"  value="<?php echo $year?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">ตกลง</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                   <div class="modal fade" id="ModalExport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-md">
                          <form action="<?php echo base_url('guarantee_report/export_listday');?>" method="post" target="_blank" id="form" enctype="multipart/form-data">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ใส่หัวข้อรายงาน</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
      
                             <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <label>หัวข้อรายงาน</label>
                                         <input type="text" class="form-control" name="head_title" autocomplete="off" required>
                                  </div>
                                 </div>
                               </div>
                                 
                                 <input type="hidden" name="dateStart" value="<?php echo $dateStart?>">
                                 <input type="hidden" name="dateEnd"  value="<?php echo $dateEnd?>">
                                 <input type="hidden" name="status_credit"  value="<?php echo $status_credit?>">
                                 <input type="hidden" name="year"  value="<?php echo $year?>">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-success">ตกลง</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>



            </div>
            <!-- /.invoice -->



</div>
</div>
   </div>

  </div>
  <!-- /.content-wrapper -->