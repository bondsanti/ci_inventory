  
                    <?php

                   $strDate_Start=date("d/m/Y",strtotime($dateStart));
                    $strDate_End=date("d/m/Y",strtotime($dateEnd));

                    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>รายงานการเบิกจ่าย <small class="text-success">วันที่ <?php echo $strDate_Start;?>  - <?php echo $strDate_End;?></small></h1>
          </div>
          <div class="col-sm-6 text-right">


            <form action="<?php echo base_url('report/genpdf');?>" method="post" target="_blank" id="form" enctype="multipart/form-data">
           <a href="<?php  echo site_url('report');?>" type="button" class="btn btn-warning"><i class="fas fa-search"></i> ค้นหาข้อมูลใหม่ </a>


           <input type="hidden" name="dateStart" value="<?php echo $dateStart?>">
           <input type="hidden" name="dateEnd"  value="<?php echo $dateEnd?>">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> พิมพ์รายงาน</button>

            </form>

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
                    รายงานการเบิกจ่าย

                    <small class="float-right">วันที่ <?php echo $strDate_Start;?> - <?php echo $strDate_End;?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>

              <hr>
              <!-- Table row -->
              <div class="row">
                <div class="col-5 table-responsive">
                  <h5>รายชื่อผู้เบิก</h5>
                  <table class="table table-sm table-bordered">
                    <thead>
                    <tr class="text-center table-primary">
                      <th width="10%">ลำดับ</th>
                      <th>ชื่อ-สกุล</th>
                      <th width="30%">จำนวนรายเบิก</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php
                      $Sumtotal=0;
                      $i=1;
                      foreach ($Query1 as $row) 
                      {
            

                      ?>
                    <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td><?php echo $row->mem_fname.'  '.$row->mem_lname;?></td>
                      <td class="text-center"><?php echo $row->total_berk;?></td>
                    </tr>

                    <?php

                   $Sumtotal=$Sumtotal+$row->total_berk;

                    $i++;

                  }
                    ?>
                   <tr>
                      <td colspan="2" class="text-center">รวม</td>
                      <td class="text-center"><?php echo $Sumtotal;?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
                <div class="col-7 table-responsive">
                  <h5>ประเภทวัสดุ</h5>
                   <table class="table table-sm table-bordered">
                    <thead>
                      <tr class="text-center table-primary">
                      <th width="10%">ลำดับ</th>
                       <th width="20%">รหัสประเภท</th>
                      <th >ชื่อประเภท</th>
                      <th width="20%">จำนวนรายการเบิก</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $Sumtotal=0;
                      $i=1;
                      foreach ($Query3 as $row) 
                      {
            

                      ?>
                    <tr>
                      <td class="text-center"><?php echo $i;?></td>
                       <td class="text-center"><?php echo $row->mat_code;?></td>
                       <td><?php echo $row->mat_name;?></td>
                      <td class="text-center"><?php echo $row->total_type;?></td>
                    </tr>

                    <?php

                   $Sumtotal=$Sumtotal+$row->total_type;

                    $i++;

                  }
                    ?>
                   <tr>
                      <td colspan="3" class="text-center">รวม</td>
                      <td class="text-center"><?php echo $Sumtotal;?></td>
                    </tr>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <h5>รายละเอียดวัสดุทีถูกเบิก</h5>
                   <table class="table table-sm table-bordered">
                    <thead>
                   <tr class="text-center table-primary">
                      <th width="10%">ลำดับ</th>
                       <th width="20%">เลขทะเบียน</th>
                      <th >ชื่อวัสดุ</th>
                      <th width="20%">จำนวนเบิก</th>
                       <th width="20%">คงเหลือStock</th>
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
                      <td class="text-center"><?php echo $i;?></td>
                       <td class="text-center"><?php echo $row->mat_reg_code;?></td>
                       <td><?php echo $row->mat_reg_name;?></td>
                      <td class="text-center"><?php echo $row->total_qty;?></td>
                      <td class="text-center"><?php echo $row->mat_reg_qty_stock;?></td>
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
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <h5>รายละเอียดการเบิกของสมาชิก</h5>
                    <table class="table table-sm table-bordered">
                    <thead>
                   <tr class="text-center table-primary">
                      <th width="10%">ลำดับ</th>
                       <th width="20%">เลขทะเบียน</th>
                      <th >ชื่อวัสดุ</th>
                      <th width="20%">จำนวนเบิก</th>
   
                    </tr>
                    </thead>
                    <tbody>
<?php
 
                 $_mem_name=null;
                 $i=1;
                 foreach ($Query as $row) {
 
                    $check_fullname = $row->mem_fname." ".$row->mem_lname;
                   
                       if (is_null($_mem_name) || $_mem_name != $check_fullname) {
                                
                      
                                echo '<td colspan="4" class="table-info"><b>';
                                echo $_mem_name = $check_fullname;
                                echo '</b></td>';
 
                       }


                       ?>
                   <tr>
                      <td class="text-center"><?php echo $i;?></td>
                       <td class="text-center"><?php echo $row->mat_reg_code;?></td>
                       <td><?php echo $row->mat_reg_name;?></td>
                      <td class="text-center"><?php echo $row->qty;?></td>
                     
                    </tr>


                       <?php 

                        
                        $i++;
                 } 
 
 
                   ?>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row -->

            </div>
            <!-- /.invoice -->



</div>
</div>
   </div>

  </div>
  <!-- /.content-wrapper -->