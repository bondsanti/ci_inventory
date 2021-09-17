<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">อนุมัติ <small class="text-muted">การเบิก-จ่าย</small></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

                        <div class="callout callout-danger text-danger">
              <h5><i class="fas fa-info"></i> Note:</h5>
              ถ้ามีรายใดรายการหนึ่ง เป็นสถานะ <span class="badge badge-danger">Out Stock</span> ท่านจะไม่สามารถ "อนุมัติ" ได้ ต้องกลับไปแก้ไขจำนวนหรือลบรายการที่ไม่สามารถเบิกได้ออก
            </div>

            <?php
              
            


                                $mat_req_id=$Query->mat_req_id;
                                $newDate = date("d-m-Y H:i", strtotime($Query->mat_req_date));
                                $name="$Query->mem_sex$Query->mem_fname $Query->mem_lname";
                                $code=$Query->mem_code;
                                $posi=$Query->posi;
                                $gov=$Query->member_gov;
                                $dep=$Query->member_dep;

                                $name1="$Query->sex1$Query->fname1 $Query->lname1";
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
                     <th style="background-color:#ffff77;" width="7%" class="text-center">จำนวนที่มี</th>
                      <th style="background-color:#ffff77;" width="5%" class="text-center">สถานะ</th>


                    </tr>
                    </thead>
                    <tbody>

                   <?php 
                          $totalQty=0;
                          $i=0;
                          foreach ($Query_data as $row) 
                          { 
                            $i++;

                              if ($row->mat_reg_qty_stock < $row->qty) {
                                  $status_stock='<span class="badge badge-danger">Out Stock</span>';
                                 $btDisable='0';
                                }else{

                                  $status_stock='<span class="badge badge-success">In Stock</span>';
                                  $btDisable='1';

                              }


                       

                        
                        ?>
                    <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td><?php echo $row->mat_name;?></td>
                      <td><?php echo $row->mat_reg_name;?></td>
                      <td class="text-center"><?php echo $row->qty;?></td>
                      <td class="text-center"><?php echo $row->u_name;?></td>
                      <td style="background-color:#ffff77;" class="text-center"><?php echo $row->mat_reg_qty_stock;?></td>
                      <td style="background-color:#ffff77;" class="text-center"><?php echo $status_stock;?></td>

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
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;ลงชื่อ.....................................
            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;ลงชื่อ.....................................
            <br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  (&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;)
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;( &nbsp; &nbsp;&nbsp; <?php echo $name1;?> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;)

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;( &nbsp; &nbsp;&nbsp; <?php echo $name;?> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;)
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;ผู้อนุมัติ
                    &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;ผู้บันทึกข้อมูล
                    &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   &nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้เบิก
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
                  <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#ModalNotApprove<?php echo $mat_req_id;?>" style="margin-right: 5px;"><i class="far fa-times-circle"></i> ไม่อนุมัติ
                  </button>
                  <?php if ($btDisable=="1") { ?>
                  <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#ModalApprove<?php echo $mat_req_id;?>" style="margin-right: 5px;">
                    <i class="fas fa-clipboard-check"></i> อนุมัติ (เบิก-จ่าย)
                  </button>
                    <?php }else{ ?>
                  <button type="button" class="btn btn-secondary float-right disabled" data-toggle="modal" data-target="#Modal" style="margin-right: 5px;">
                    <i class="fas fa-clipboard-check"></i> อนุมัติ (เบิก-จ่าย)
                  <?php } ?>
                  </button>
                 <a href="<?php  echo site_url('material_approve');?>" type="button" class="btn btn-primary"><i class="fas fa-redo-alt"></i> กลับ
                    </a>
                </div>

                                                 <!-- Modal -->
                    <div class="modal fade" id="ModalApprove<?php echo $mat_req_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                       <form role="form" action="<?php echo site_url('material_approve/update_approve_data');?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <h5 class=""><font class="text-success"><i class="icon fas fa-clipboard-check"></i> อนุมัติ</font> การเบิก-จ่าย เลขที่ <span class="badge badge-danger"><?php echo $mat_req_id;?></span> นี้ หรือไม่?</h5>
                          
                          <input type="hidden" name="mat_req_id" value="<?php echo $mat_req_id;?>">
                          <input type="hidden" name="mem_approve_id" value="<?php echo $mem_id;?>">
                          <input type="hidden" name="mat_req_statas" value="2">
                          <?php
                            $dateApp=date("Y-m-d H:i:s");
                          ?>
                           <input type="hidden" name="mat_req_approve_date" value="<?php echo $dateApp;?>">


                                    <label for="message-text" class="col-form-label">เหตุผล : </label>
                                     <textarea class="form-control" name="mat_req_remark"></textarea>
                      

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <button type="submit" class="btn btn-success">อนุมัติ</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>

                                                     <!-- Modal -->
                    <div class="modal fade" id="ModalNotApprove<?php echo $mat_req_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                       <form role="form" action="<?php echo site_url('material_approve/update_notapprove_data');?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <h5 class=""><font class="text-danger"><i class="icon fas fa-clipboard-check"></i> ไม่อนุมัติ</font> การเบิก-จ่าย เลขที่ <span class="badge badge-danger"><?php echo $mat_req_id;?></span> นี้ใช่หรือไม่?</h5>
                          
                          <input type="hidden" name="mat_req_id" value="<?php echo $mat_req_id;?>">
                          <input type="hidden" name="mem_approve_id" value="<?php echo $mem_id;?>">
                          <input type="hidden" name="mat_req_statas" value="3">
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">เหตุผล : </label>
                                    <textarea class="form-control" name="mat_req_remark"></textarea>
                                  </div> 

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                          </div>
                        </form>
                        </div>
                      </div>
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