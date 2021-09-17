<style>


.customers {

  border-collapse: collapse;
  width: 100%;
}

.customers td, #customers th {
  border: 0.5px solid #ddd;
  padding: 8px;
  text-align: center;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #DFF4FF;
  border: 1px solid #ddd;
 
}
    .line-top{
        border-top: 2px solid #ccc;
    }

    .header-title {
        font-size: 16px;
        font-weight: bold;
    }
    .header-title2 {
        font-size: 12px;
        font-weight: bold;
    }      
</style>
                    <?php

                   $strDate_Start=date("d/m/Y",strtotime($dateStart));
                    $strDate_End=date("d/m/Y",strtotime($dateEnd));

                    ?>

<table cellpadding="0" cellspacing="0">
    <tr>    
    <td style="text-align:left;width: 50%;"><span class="header-title">รายงานรับเข้าวัสดุ</span></td>    
    <td style=" text-align: right;width: 50%;"><span class="header-title2">วันที่ <?php echo $strDate_Start;?>  - <?php echo $strDate_End;?></span></td>
        
    </tr>
</table>
<br>
<div class="line-top"></div>



  <h5 class="header-title2">ประเภทวัสดุ</h5>
  <table class="customers" cellpadding="5">
                    <thead>
                   <tr>
                      <th width="10%">ลำดับ</th>
                       <th width="15%">รหัสประเภท</th>
                      <th width="35%">ชื่อประเภท</th>
                      <th width="20%">จำนวนรายการรับเข้า</th>
                       <th width="20%">จำนวนชิ้น</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $Sumtotal1=0;
                      $Sumtotal2=0;
                      $i=1;
                      foreach ($Query as $row) 
                      {
            


                      ?>
                    <tr>
                      <td width="10%"><?php echo $i;?></td>
                       <td width="15%"><?php echo $row->mat_code;?></td>
                       <td width="35%"><?php echo $row->mat_name;?></td>
                      <td width="20%"><?php echo $row->instock;?></td>
                       <td width="20%"><?php echo $row->total_instock;?></td>
                    </tr>

                    <?php


                   $Sumtotal1=$Sumtotal1+$row->instock;
                   $Sumtotal2=$Sumtotal2+$row->total_instock;

                    $i++;

                  }
                    ?>
                    <tr>
                      <td colspan="3" class="text-center">รวม</td>
                      <td class="text-center"><?php echo $Sumtotal1;?></td>
                      <td class="text-center"><?php echo $Sumtotal2;?></td>
                    </tr>
                    </tbody>
                  </table>

<div class=""></div>



  <h5 class="header-title2">รายละเอียดวัสดุทีรับเข้า</h5>
  <table class="customers" cellpadding="5">
                    <thead>
                   <tr>
                      <th width="10%">ลำดับ</th>
                      <th width="20%">วันเวลา</th>
                      <th width="15%">invoice</th>
     
                       <th width="15%">เลขทะเบียน</th>
                      <th width="30%">ชื่อวัสดุ</th>
                       <th width="10%">รับเข้า</th>
            
                    </tr>
                    </thead>
                    <tbody>
    <?php
                      $Sumtotal=0;
                       $Sumtotal_stock=0;
                      $i=1;
                      foreach ($Query2 as $row) 
                      {
                         $strDate=date("d/m/Y H:i",strtotime($row->mat_ins_date));


                      ?>
                    <tr>
                      <td width="10%"><?php echo $i;?></td>
                       <td width="20%"><?php echo $strDate;?></td>
                      <td width="15%"><?php echo $row->mat_ins_invoice;?></td>

                       <td width="15%"><?php echo $row->mat_reg_code;?></td>
                       <td width="30%"><?php echo $row->mat_reg_name;?></td>
                      <td width="10%"><?php echo $row->mat_ins_stock;?></td>
                  
                    </tr>

                    <?php

                   $Sumtotal=$Sumtotal+$row->mat_ins_stock;
                   $Sumtotal_stock=$Sumtotal_stock+$row->mat_reg_qty_stock;

                    $i++;

                  }
                    ?>
                   <tr>
                      <td colspan="5" class="text-center">รวม</td>
                      <td class="text-center"><?php echo $Sumtotal;?></td>
        
                    </tr>
                    </tbody>
                  </table>
  

