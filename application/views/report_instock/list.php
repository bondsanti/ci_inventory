  
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
            <h1>รายงานรับเข้าวัสดุ <small class="text-success">วันที่ <?php echo $strDate_Start;?>  - <?php echo $strDate_End;?></small></h1>
          </div>
          <div class="col-sm-6 text-right">


            <form action="<?php echo base_url('report_instock/genpdf');?>" method="post" target="_blank" id="form" enctype="multipart/form-data">
           <a href="<?php  echo site_url('report_instock');?>" type="button" class="btn btn-warning"><i class="fas fa-search"></i> ค้นหาข้อมูลใหม่ </a>


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
                    รายงานรับเข้าวัสดุ

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
                  <h5>ประเภทวัสดุ</h5>
                   <table class="table table-sm table-bordered">
                    <thead>
                      <tr class="text-center table-primary">
                      <th width="10%">ลำดับ</th>
                       <th width="20%">รหัสประเภท</th>
                      <th width="30%">ชื่อประเภท</th>
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
                       <td width="20%"><?php echo $row->mat_code;?></td>
                       <td width="30%"><?php echo $row->mat_name;?></td>
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
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <h5>รายละเอียดวัสดุทีรับเข้า</h5>
                   <table class="table table-sm table-bordered">
                    <thead>
                   <tr class="text-center table-primary">
                      <th width="10%">ลำดับ</th>
                      <th width="15%">วันเวลา</th>
                      <th width="10%">invoice</th>
                      <th width="10%">ประเภท</th>
                       <th width="20%">เลขทะเบียน</th>
                      <th width="20%">ชื่อวัสดุ</th>
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
                      <td class="text-center"><?php echo $i;?></td>
                       <td class="text-center"><?php echo $strDate;?></td>
                      <td class="text-center"><?php echo $row->mat_ins_invoice;?></td>
                      <td class="text-center"><?php echo $row->mat_name;?></td>
                       <td class="text-center"><?php echo $row->mat_reg_code;?></td>
                       <td><?php echo $row->mat_reg_name;?></td>
                      <td class="text-center"><?php echo $row->mat_ins_stock;?></td>
                  
                    </tr>

                    <?php

                   $Sumtotal=$Sumtotal+$row->mat_ins_stock;
                   $Sumtotal_stock=$Sumtotal_stock+$row->mat_reg_qty_stock;

                    $i++;

                  }
                    ?>
                   <tr>
                      <td colspan="6" class="text-center">รวม</td>
                      <td class="text-center"><?php echo $Sumtotal;?></td>
        
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->

              </div>


            </div>
            <!-- /.invoice -->



</div>
</div>
   </div>

  </div>
  <!-- /.content-wrapper -->