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
    <td style="text-align:left;width: 50%;"><span class="header-title">รายงานการเบิกจ่าย</span></td>    
    <td style=" text-align: right;width: 50%;"><span class="header-title2">วันที่ <?php echo $strDate_Start;?>  - <?php echo $strDate_End;?></span></td>
        
    </tr>
</table>
<br>
<div class="line-top"></div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table class="customers" cellpadding="5">
      <tr>
        <td colspan="3" bgcolor="#DFF4FF"><strong>รายชื่อผู้เบิก</strong></td>
        </tr>
      <tr bgcolor="#F0F0F0">
        <td width="15%"><div align="center">ลำดับ</div></td>
        <td width="55%"><div align="center">ชื่อ-สกุล</div></td>
        <td width="30%"><div align="center">จำนวนรายการเบิก</div></td>
      </tr>
        <?php
                      $Sumtotal=0;
                      $i=1;
                      foreach ($Query1 as $row) 
                      {
            

                      ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row->mem_fname.'  '.$row->mem_lname;?></td>
                      <td><?php echo $row->total_berk;?></td>
                    </tr>
                             <?php

                   $Sumtotal=$Sumtotal+$row->total_berk;

                    $i++;

                  }
                    ?>

                   <tr>
                      <td colspan="2">รวม</td>
                      <td><?php echo $Sumtotal;?></td>
                    </tr>

    </table></td>
    <td><table class="customers" cellpadding="5">
      <tr>
        <td colspan="4" bgcolor="#DFF4FF"><strong>ประเภทวัสดุ</strong></td>
        </tr>
      <tr bgcolor="#F0F0F0">
        <td width="15%"><div align="center">ลำดับ</div></td>
        <td width="55%"><div align="center">ชื่อประเภท</div></td>
        <td width="30%"><div align="center">จำนวนรายการเบิก</div></td>
      </tr>
       <?php
                      $Sumtotal=0;
                      $i=1;
                      foreach ($Query3 as $row) 
                      {
            

                      ?>
                    <tr>
                      <td class="text-center"><?php echo $i;?></td>
                       <td><?php echo $row->mat_name;?></td>
                      <td class="text-center"><?php echo $row->total_type;?></td>
                    </tr>

                    <?php

                   $Sumtotal=$Sumtotal+$row->total_type;

                    $i++;

                  }
                    ?>
                   <tr>
                      <td colspan="2" class="text-center">รวม</td>
                      <td class="text-center"><?php echo $Sumtotal;?></td>
                    </tr>
    </table></td>
  </tr>
</table>

  <h5 class="header-title2">รายละเอียดวัสดุทีถูกเบิก</h5>
  <table class="customers" cellpadding="5">
                    <thead>
                   <tr>
                      <th width="10%">ลำดับ</th>
                       <th width="15%">เลขทะเบียน</th>
                      <th width="45%">ชื่อวัสดุ</th>
                      <th width="15%">จำนวนเบิก</th>
                       <th width="15%">คงเหลือStock</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $Sumtotal=0;
                       $Sumtotal_stock=0;
                      $i=1;
                      foreach ($Query2 as $row) 
                      {
            

                      ?>
                    <tr>
                      <td width="10%"><?php echo $i;?></td>
                       <td width="15%"><?php echo $row->mat_reg_code;?></td>
                       <td width="45%"><?php echo $row->mat_reg_name;?></td>
                      <td width="15%"><?php echo $row->total_qty;?></td>
                      <td width="15%"><?php echo $row->mat_reg_qty_stock;?></td>
                    </tr>

                    <?php

                   $Sumtotal=$Sumtotal+$row->total_qty;
                   $Sumtotal_stock=$Sumtotal_stock+$row->mat_reg_qty_stock;

                    $i++;

                  }
                    ?>
                   <tr>
                      <td colspan="3" class="text-center">รวม</td>
                      <td class="text-center"><?php echo $Sumtotal;?></td>
                      <td class="text-center"><?php echo $Sumtotal_stock;?></td>
                    </tr>
                    </tbody>
                  </table>


  <h5 class="header-title2">รายละเอียดการเบิกของสมาชิก</h5>
  <table class="customers" cellpadding="5">

                   <tr>
                      <th width="10%">ลำดับ</th>
                       <th width="20%">เลขทะเบียน</th>
                      <th width="50%">ชื่อวัสดุ</th>
                      <th width="20%">จำนวนเบิก</th>

                    </tr>


<?php
 
                 $_mem_name=null;
                 $i=1;
                 foreach ($Query as $row) {
 
                    $check_fullname = $row->mem_fname." ".$row->mem_lname;
                   
                       if (is_null($_mem_name) || $_mem_name != $check_fullname) {
                                
                               //  echo '<br>';
                               // echo '<td colspan="0"><b>';
                               //  echo $_mem_name = $check_fullname;
                               //  echo '</b></td>';
                               //  echo '<br>';

                                echo '<tr>';
                               echo '<td style="text-align: left"colspan="4">';
                                echo $_mem_name = $check_fullname;
                               echo '</td>';
                                 echo '</tr>';
 
                       }


                       ?>
                   <tr>
                      <td width="10%"><?php echo $i;?></td>
                       <td width="20%"><?php echo $row->mat_reg_code;?></td>
                       <td width="50%"><?php echo $row->mat_reg_name;?></td>
                      <td width="20%"><?php echo $row->qty;?></td>
                     
                    </tr>


                       <?php 

                        
                        $i++;
                 } 
 
 
                   ?>

                    </tbody>
                  </table>

