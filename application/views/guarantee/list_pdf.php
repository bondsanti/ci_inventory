<style>


.customers {

border-collapse: collapse;
 width: 100%;

}

.customers td, #customers th {
  border: 0.5px solid #ddd;
  padding: 8px;


}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 15px;
  padding-bottom: 15px;
  text-align: center;
  background-color: #DFF4FF;
  border: 1px solid #ddd;

 
}
    .line-top{
        border-top: 2px solid #ccc;
    }

    .header-title {
        font-size: 24px;
        font-weight: bold;
    }
    .header-title2 {
        font-size: 16px;
        font-weight: bold;
    }      
</style>
  
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


 
?>




<table cellpadding="0" cellspacing="0">
    <tr>    
    <td style="text-align:left;width: 50%;"><span class="header-title"><?php echo $head_title;?> </span>
      </td>    
    <td style=" text-align:right;width: 50%;"><span class="header-title2">วันที่ <?php echo $strDate_Start;?>  - <?php echo $strDate_End;?></span></td>
        
    </tr>
      <tr>
         <td style="text-align:left;width: 50%;"><span class="header-title2">โครงการประจำปีงบประมาณ <?php echo $years=$year+543;?> </span></td>
      </tr>
</table>
<div class="line-top"></div>


  <table class="customers" cellpadding="5">
               <thead>
                      <tr class="">
                      <th width="7%">ลำดับ</th>
                      <th width="15%">สัญญาเลขที่</th>
                      <th width="55%">ชื่อโครงการ</th>
                      <th width="15%">วันที่กำหนดคืนหลักค้ำ</th>

                      <th width="7%">งบปี</th>
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
if (strlen($subject)>135) {
$subject=substr($subject,0,135)."..";
}


                     if ($rs->status_credit=='1') { 
                          $status="ยังไม่ครบคืน";
                    }else if ($rs->status_credit=='2') { 
                     $status="คืนหลักค้ำแล้ว";
                    }else if ($rs->status_credit=='3') { 
                     $status="แจ้งแล้ว/รอตอบกลับ";
                    }else{
                     $status="อยู่ระหว่างซ่อมแซม";
                    } 

                      ?>
                    <tr>
                      <td width="7%"><?php echo $i;?></td>
                       <td width="15%"><?php echo $rs->contract_no;?></td>
                       <td width="55%"><?php echo $rs->project_name;?></td>
  
                      <td width="15%"><?php
                          echo $endinDate;          
                      ?></td>
                 
                       <td width="7%"><?php if (!empty($rs->year)) {echo $Tsyear=date($rs->year+543);}?></td>

                    </tr>

                    <?php

                   // $Sumtotal1=$Sumtotal1+$row->instock;
                   // $Sumtotal2=$Sumtotal2+$row->total_instock;
 
                    $i++;

                  }

  
                    ?>
                  
                    </tbody>
                  </table>



