
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">ข้อมุลทะเบียนวัสดุ</small></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

         <div class="row">

            <div class="col-md-12">
            


              <div class="card card-green">
                <div class="card-header">
                  <h3 class="card-title"><i class="far fa-list-alt"></i> ตารางข้อมูล </h3>



                  <div class="card-tools">
                      <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-square"></i> เพิ่มข้อมูล </a> 
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-striped projects table-bordered">
                    <thead>
                    <tr class="text-center">
                      <th>#</th>
                     <th>วัน/เวลารับเข้า</th>
                      <th>Invoice</th>
                      <th>เลขทะเบียนวัสดุ</th>
                      <th>ประเภทวัสดุ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>จำนวน <sup class="text-success">รับเข้า</sup></th>
                      <th>จำนวน <sup class="">ทั้งหมด</sup></th>
                      <th>ผู้บันทึกข้อมูล</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php 

                      $i=0;
                      foreach ($Query as $rs) 

                      { 
                      $i++;
                       // echo '<pre>';
                       // print_r($rs);   
                       // echo '</pre>';
                       // exit;    

                        $stock_in='<h5> <font color="green"><b>+'.$rs->mat_ins_stock.'</b></font> '.$rs->u_name.'</h5>';
                        $stock_all='<h5> <font color="green"><b>'.$rs->mat_reg_qty_stock.'</b></font> '.$rs->u_name.'</h5>';
         
                        $newDate = date("d-m-Y H:i", strtotime($rs->mat_reg_date));

                        ?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                       <td class="text-center"><?php echo $newDate;?></td>
                      <td class="text-center"><a href="<?php echo base_url('img/invoice');?>/<?php echo $rs->mat_ins_img;?>" target="_blank"><?php echo $rs->mat_ins_invoice;?></a></td>
                      <td class="text-center"><?php echo $rs->mat_reg_code;?></td>

                      <td class="text-center"><?php echo $rs->mat_name;?></td>
                      
                      <td class="text-center"><?php echo $rs->mat_reg_name;?></td>

                      <td class="text-center"><?php echo $stock_in;?></td>
                       <td class="text-center"><?php echo $stock_all;?></td>

                      <td class="text-center"><?php echo $rs->mem_fname.' '.$rs->mem_lname;?></td>

                      <td class="text-center">
                       
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $rs->mat_ins_id;?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                       </button>


                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalDel<?php echo $rs->mat_ins_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i>
                       </button>



                      </td>
                    </tr>
                    
                

                    <!-- Modal detail -->
                    <div class="modal fade" id="detailModal<?php echo $rs->mat_ins_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Information! <code><?php echo $rs->mat_reg_name;?></code></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <center><img class="" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" width="180px" alt="">
                              </center>
                                          <p><b>เลขทะเบียนวัสดุ</b> : <code><?php echo $rs->mat_reg_code;?></code>
                                            <br>
                                            <b>ประเภทวัสดุ</b> : <code><?php echo $rs->mat_name;?></code>
                                             <br>
                                           
                                             <br>
                                            <b>วันที่ลงทะเบียน</b> : <code><?php echo $rs->mat_reg_date;?></code>
                                               <br>
                                               <hr>
                                            <b class="text-success">จำนวน In stock</b> : <font size="5"><b><?php echo $rs->mat_reg_qty_stock;?></b></font> <?php echo $rs->u_name;?>
                                             <br>
                                            <b class="text-danger">จำนวนแจ้งเตือน ใกล้หมด</b> :<font size="5"><b><?php echo $rs->mat_reg_qty_limit;?></b></font> <?php echo $rs->u_name;?>

                                          </p>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Del -->
                    <div class="modal fade" id="ModalDel<?php echo $rs->mat_ins_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                       <form role="form" action="<?php  echo site_url('material_stock/delete_data/').$rs->mat_ins_id;?>" method="post" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> คุณต้องการลบข้อมูล</h5>
                            <h5>Invoice <b class="text-info"><?php echo $rs->mat_ins_invoice;?></b></h5>
                           <p>เลขทะเบียน : <b><?php echo $rs->mat_reg_code.' ('.$rs->mat_reg_name.') ';?></b></p>
                           <p>จำนวนรับเข้า : <b><?php echo $rs->mat_ins_stock.' '.$rs->u_name;?></b></p>
                           <h5>ใช่หรือไม่?</h5>


                           <input type="hidden" name="mat_ins_stock" value="<?php echo $rs->mat_ins_stock;?>">

                           <input type="hidden" name="mat_reg_id" value="<?php echo $rs->mat_reg_id;?>">
                          <input type="hidden" name="mat_ins_id" value="<?php echo $rs->mat_ins_id;?>">

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                           <button type="submit" class="btn btn-danger">ยืนยัน</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                  <?php } ?>

                    </tbody>
                  </table>






                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

            
          </div>
        <!-- /.row -->
        
      
      </div>
    </section>

 
  </div>
  <!-- /.content-wrapper -->