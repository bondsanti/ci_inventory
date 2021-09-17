<style>
    table.wrap-box {
        width: 100%;
        text-align: left;
        line-height: 97%;
    }

    table.wrap-top {
        width: 100%;        
        text-align: left;
        line-height: 97%;
    }

    table.wrap-content, table.wrap-total {
        width: 100%;        
        text-align: left;
        line-height: 97%;
    }
    table.wrap-content tr th{
        font-weight: bold;
        text-align: left;
        background-color: #eee;

    }

    table.wrap-content tr td{
        border-bottom-color: #ddd;
        border-bottom-style: solid;
        border-bottom-width: 0.5px;

    }

    table.wrap-total tr td{
        text-align: right;
    }

    .line-top{
        border-top: 2px solid #ccc;
    }
    .line-bottom{
        border-bottom: 1px solid #ccc;
    }
    .line-left{
        border-left: 1px solid #ccc;
    }
    .line-right{
        border-right: 1px solid #ccc;
    }

    .header-title {
        font-size: 16px;
        font-weight: bold;
    }
    .header-title2 {
        font-size: 10px;
        font-weight: bold;
    }      
</style>

            <?php
              
                                 $mat_req_id=$Query->mat_req_id;
                                $newDate = date("d/m/Y H:i", strtotime($Query->mat_req_date));
                                $name="$Query->mem_sex$Query->mem_fname $Query->mem_lname";
                                $code=$Query->mem_code;
                                $posi=$Query->posi;
                                $gov=$Query->member_gov;
                                $dep=$Query->member_dep;

                                $name1="$Query->sex1$Query->fname1 $Query->lname1";
                                $name2="$Query->sex2$Query->fname2 $Query->lname2";
                                //$posi1=$Query->posi1;
                                $code1=$Query->code1;
                      
           ?>
<table class="wrap-box" cellpadding="0" cellspacing="0">
    <tr>    
    <td style="text-align:left;width: 50%;"><span class="header-title">ใบเบิกจ่าย : #<?php echo $mat_req_id;?></span></td>    
    <td style=" text-align: right;width: 50%;"><span class="header-title2">วันที่ : <?php echo $newDate;?></span></td>
        
    </tr>
</table>
<div class="line"></div>
<table class="wrap-box line-top" cellpadding="0" cellspacing="0">
    <tr>  
        <td><table class="wrap-top" cellpadding="3" cellspacing="0">
                <tr>
                    <td style="width:35%;"><b>ข้อมูลผู้เบิก</b></td>
                    <td style="width:40%;"><b>ข้อมูลหน่วยงาน</b></td>
                    <td style="width:40%;"><b>ผู้ทำรายการเบิก</b></td>
                </tr>
                <tr>
                    <td style="width:35%;"><b><font size="9">รหัสพนักงาน:</b> <?php echo $code;?></font></td>
                    <td style="width:40%;"><b><font size="9">ชื่อหน่วยงาน:</b> <?php echo $gov;?></font></td>
                    <td style="width:35%;"><b><font size="9">รหัสพนักงาน:</b> <?php echo $code1;?></font></td>
                </tr>
                <tr>
                    <td style="width:35%;"><b><font size="9">ชื่อ-สกุล:</b> <?php echo $name;?></font></td>
                    <td style="width:40%;"><b><font size="9">แผนก:</b> <?php echo $dep;?></font></td>
                    <td style="width:35%;"><b><font size="9">ชื่อ-สกุล:</b> <?php echo $name1;?></font></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="line"></div>
<table class="wrap-box" cellpadding="0" cellspacing="0">
    <tr>
        <td><table class="wrap-content" cellpadding="3" cellspacing="0">
            <tr>
                <th style="width:10%;" class="header-title2">ลำดับ</th>
                <th style="width:25%;" class="header-title2">ประเภท</th>
                <th style="width:45%;" class="header-title2">รายการ</th>
                <th style="width:10%;" class="header-title2">จำนวน</th>
                <th style="width:10%;" class="header-title2">หน่วยนับ</th>
            </tr>
            <?php 
                          $totalQty=0;
                          $i=0;
              foreach ($Query_data as $row)
              { 
                            $i++;


              ?>
                <tr>
                    <td style="text-align:center;"><?php echo $i; ?></td>
                      <td><?php echo $row->mat_name;?></td>
                      <td><?php echo $row->mat_reg_name;?></td>
                      <td style="text-align:center;"><?php echo $row->qty;?></td>
                      <td style="text-align:center;"><?php echo $row->u_name;?></td>
                </tr>
            <?php 
                    $qty=$row->qty;
                    
                      $totalQty=$totalQty+$qty;

                    }

           ?>
        </table></td>
    </tr>
</table>
<div class="line"></div>
<table class="wrap-box" cellpadding="0" cellspacing="0">
  <?php
                      if ($Query->mat_req_statas == 1) {
                          $status='<span class="badge bg-warning">รออนุมัติ</span>';
                      }else if($Query->mat_req_statas==2){
                          $status='<span class="badge badge-success">อนุมัติแล้ว</span>';
                      }else{
                          $status='<span class="badge badge-danger">ไม่อนุมัติ</span>';
                      }
  ?>
    <tr>    
    <td style="text-align:left;width: 50%;"><span class="header-title2">สถานะ : #<?php echo $status;?></span></td>    
    <td style="text-align:right;width: 50%;"><span class="header-title2">รวม  <?php echo $totalQty;?> ชิ้น</span><br></td> 
    </tr>
<br>
            <br>
            <br>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;ลงชื่อ.....................................
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;ลงชื่อ.....................................
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;ลงชื่อ.....................................
            <br><br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (&nbsp; &nbsp; <?php echo $name2;?> &nbsp; &nbsp;&nbsp;)
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;( &nbsp; &nbsp; <?php echo $name1;?>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;)

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;( &nbsp; &nbsp; <?php echo $name;?> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;)
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;ผู้อนุมัติ
                    &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;ผู้บันทึกข้อมูล
                    &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้เบิก
                  </p>
</table>