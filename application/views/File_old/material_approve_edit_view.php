<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">อนุมัติ <small class="text-muted">การเบิก-จ่าย</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item"><a href="#">ตารางข้อมูล</a></li>
              <li class="breadcrumb-item active">อนุมัติ การเบิก-จ่าย</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

                        <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              สามารถแก้ไข ผู้เบิกและจำนวนหรือลบรายการเบิกได้เท่านั้น
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
                  <h4 class="text-danger">
                    <i class="fas fa-file-contract"></i> แก้ไขใบเบิก-จ่าย #<?php echo $mat_req_id;?>
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
                       <th class="text-center">แก้ไข / ลบ</th>

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
                       <td class="text-center py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit<?php echo $row->mat_det_id;?>"><i class="fas fa-edit"></i></button>



                         
                         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDel<?php echo $row->mat_det_id;?>"><i class="fas fa-trash"></i></button>






                      </div>
                    </td>

                    </tr>


                                        <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row->mat_det_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><font class="text-danger">แก้ไข</font> จำนวนที่ต้องการเบิก</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <center>
                              <img class="" src="<?php echo base_url('img/supplies');?>/<?php echo $row->mat_reg_img;?>" width="180px" alt="">
                              <code>*<?php echo $row->mat_reg_name;?></code>
                              </center>
                                       
                          <form role="form" action="<?php echo site_url('material_approve/update_data');?>" method="post" enctype="multipart/form-data" data-ajax="false">

                          <input type="hidden" class="form-control" name="mat_reg_id" value="<?php echo $row->mat_reg_id;?>" autocomplete="off">
                          <input type="hidden" class="form-control" name="mat_det_id" value="<?php echo $row->mat_det_id;?>" autocomplete="off">
                          <input type="hidden" class="form-control" name="mat_req_id" value="<?php echo $row->mat_req_id;?>" autocomplete="off">



                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">จำนวนเบิก</label>
                                   <input type="text" class="form-control" name="qty" id="qty" autocomplete="off" value="<?php echo $row->qty;?>" onKeyUp="if(this.value><?php echo $row->mat_reg_qty_stock;?>){alert('สินค้าใน Stock ไม่เพียงพอกรุณาป้อนจำนวนใหม่');this.value='';}
      if(this.value<1){alert('กรอกจำนวนไม่ถูกต้อง');this.value='';}if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" 
                                   placeholder="กรอก จำนวน" required autofocus>
                                  </div>   

                          </div>
                          <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> ออก</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> ตกลง</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>







                   <!-- Modal Del -->
                    <div class="modal fade" id="ModalDel<?php echo $row->mat_det_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="icon fas fa-ban"></i> คุณต้องการลบรายการเบิก</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                      <form role="form" action="<?php  echo site_url('material_approve/delete_data/').$row->mat_det_id;?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body text-center">
                         <center><img class="" src="<?php echo base_url('img/supplies');?>/<?php echo $row->mat_reg_img;?>" width="180px" alt="">
                              </center>
                           <p>เลขทะเบียน : <b><?php echo $row->mat_reg_code;?></b></p>
                           <p><b><?php echo $row->mat_reg_name.' <font color="green" size="5">'.$row->qty.'</font> '.$row->u_name;?></b></p>
                           <h5>ใช่หรือไม่?</h5>

                           <input type="hidden" class="form-control" name="mat_req_id" value="<?php echo $row->mat_req_id;?>" autocomplete="off">

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <button type="submit" class="btn btn-danger">ยืนยัน</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>






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
                    <!-- Modal -->
                    <div class="modal fade" id="ModalDelError" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Error!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <p class="text-danger"><i class="fas fa-exclamation-circle"></i> <b>ต้องมีอย่างน้อย 1 รายการ..</b></p>
                          </div>
                        </div>
                      </div>
                    </div>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-9">
                  <p class="lead"></p>

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