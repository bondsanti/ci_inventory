
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

    <?php echo link_tag('bootstrap/plugins/fontawesome-free/css/all.min.css');?>
  

  <!-- Theme style -->
  <?php echo link_tag('bootstrap/dist/css/adminlte.min.css');?>
  


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <?php
              
            


                                $mat_req_id=$Query->mat_req_id;
                                $newDate = date("d-m-Y H:i", strtotime($Query->mat_req_date));
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

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-file-contract"></i> ใบเบิก-จ่าย #<?php echo $mat_req_id;?>
                    <small class="float-right">วันที่: <?php echo $newDate;?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
               <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
           
                  <address>
                    <strong>ข้อมูลผู้เบิก</strong><br>
                  <b>รหัสพนักงาน:</b> <?php echo $code;?><br>
                  <b>ชื่อ-สกุล:</b> <?php echo $name;?><br>
                  


                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>ข้อมูลหน่วยงาน</strong><br>
                  <b>หน่วยงาน:</b> <?php echo $gov;?><br>
                  <b>แผนก:</b> <?php echo $dep;?><br>
                  <b>ตำแหน่ง:</b> <?php echo $posi;?><br>

                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>ข้อมูลผู้บันทึก</strong><br>
                  <b>รหัสพนักงาน:</b> <?php echo $code1;?><br>
                  <b>ชื่อ-สกุล:</b> <?php echo $name1;?><br>

                  </address>
                </div>
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th class="text-center" width="10%">ลำดับที่</th>
                      <th>ประเภท</th>
                      <th>รายการ</th>
                      <th class="text-center">จำนวน</th>
                      <th class="text-center">หน่วยนับ</th>

                    </tr>
                    </thead>
                    <tbody>

                   <?php 
                          $totalQty=0;
                          $i=0;
                          foreach ($Query_data as $row) 
                          { 
                            $i++;
                        
                        ?>
                    <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td><?php echo $row->mat_name;?></td>
                      <td><?php echo $row->mat_reg_name;?></td>
                      <td class="text-center"><?php echo $row->qty;?></td>
                      <td class="text-center"><?php echo $row->u_name;?></td>

                    </tr>
                 <?php   

                    $qty=$row->qty;
                    
                      $totalQty=$totalQty+$qty;

                    } 



                    ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-9">
                  <p class="lead"></p>
<?php
                                                              if ($Query->mat_req_statas == 1) {
                        
                          $status='<span class="badge bg-warning">รออนุมัติ</span>';
                      }else if($Query->mat_req_statas==2){
                           $status='<span class="badge badge-success">อนุมัติแล้ว</span>';
                      }else{
                           $status='<span class="badge badge-danger">ไม่อนุมัติ</span>';
                      }
                      ?>
<h4>สถานะ <?php echo $status;?></h4>
            <br>
            <br>
            <br>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;ลงชื่อ.....................................
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; ลงชื่อ.....................................
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;ลงชื่อ.....................................
            <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (&nbsp; &nbsp; &nbsp; <?php echo $name2;?> &nbsp;&nbsp; &nbsp;&nbsp;)
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;( &nbsp; &nbsp;&nbsp; <?php echo $name1;?> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;)

             &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;( &nbsp; &nbsp;&nbsp; <?php echo $name;?> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;)
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;ผู้อนุมัติ
                    &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; ผู้บันทึกข้อมูล
                    &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;ผู้เบิก
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-3">
                  <p class="lead">รวมจำนวนเบิก</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">รวม:</th>
                        <td><?php echo $totalQty;?> ชิ้น</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>-->
             <a href="<?php  echo site_url('material_approve/printpdf/').$mat_req_id;?>" target="_blank"  type="button" class="btn btn-success"><i class="fas fa-print"></i> พิมพ์
                    </a>

                 <a href="<?php  echo site_url('material_approve');?>" type="button" class="btn btn-primary"><i class="fas fa-redo-alt"></i> กลับ
                    </a>
                </div>



              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
