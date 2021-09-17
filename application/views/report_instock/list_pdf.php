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

                   $strDate_Start=date("d/m/Y",strtotime($dateStart));
                    $strDate_End=date("d/m/Y",strtotime($dateEnd));

                    ?>

<table cellpadding="0" cellspacing="0">
    <tr>    
    <td style="text-align:left;width: 50%;"><span class="header-title">รายงานรับเข้าวัสดุ</span></td>    
    <td style=" text-align: right;width: 50%;"><span class="header-title2">วันที่ <?php echo $strDate_Start;?>  - <?php echo $strDate_End;?></span></td>
        
    </tr>
</table>

<div class="line-top"></div>

  <table class="customers" cellpadding="5">
                    <thead>
                      <tr>
                        <th colspan="5" class="header-title2" style="text-align: left; border:none;background-color:none;">ประเภทวัสดุ</th>
                      </tr>
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
                      <td width="10%" style="text-align: center;"><?php echo $i;?></td>
                       <td width="15%" style="text-align: center;"><?php echo $row->mat_code;?></td>
                       <td width="35%" style="text-align: left;"><?php echo $row->mat_name;?></td>
                      <td width="20%" style="text-align: center;"><?php echo $row->instock;?></td>
                       <td width="20%" style="text-align: center;"><?php echo $row->total_instock;?></td>
                    </tr>

                    <?php


                   $Sumtotal1=$Sumtotal1+$row->instock;
                   $Sumtotal2=$Sumtotal2+$row->total_instock;

                    $i++;

                  }
                    ?>
                    <tr>
                      <td colspan="3" style="text-align: right; border:none;background-color:none;">รวม</td>
                      <td style="text-align: center;"><?php echo $Sumtotal1;?></td>
                      <td style="text-align: center;"><?php echo $Sumtotal2;?></td>
                    </tr>
                    </tbody>
                  </table>

<div class=""></div>

  <table class="customers" cellpadding="5">
                    <thead>
                       <tr>
                        <th colspan="6" class="header-title2" style="text-align: left; border:none;background-color:none;">รายละเอียดวัสดุทีรับเข้า</th>
                      </tr>
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
                      <td width="10%" style="text-align: center;"><?php echo $i;?></td>
                       <td width="20%" style="text-align: center;"><?php echo $strDate;?></td>
                      <td width="15%" style="text-align: center;"><?php echo $row->mat_ins_invoice;?></td>

                       <td width="15%" style="text-align: center;"><?php echo $row->mat_reg_code;?></td>
                       <td width="30%" style="text-align: left;"><?php echo $row->mat_reg_name;?></td>
                      <td width="10%" style="text-align: center;"><?php echo $row->mat_ins_stock;?></td>
                  
                    </tr>

                    <?php

                   $Sumtotal=$Sumtotal+$row->mat_ins_stock;
                   $Sumtotal_stock=$Sumtotal_stock+$row->mat_reg_qty_stock;

                    $i++;

                  }
                    ?>
                   <tr>
                      <td colspan="5" style="text-align: right; border:none;background-color:none;">รวม</td>
                      <td style="text-align: center;"><?php echo $Sumtotal;?></td>
        
                    </tr>
                    </tbody>
                  </table>
  

