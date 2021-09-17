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
              <div class="card card-lightblue">
                <div class="card-header">
                  <h3 class="card-title">ตารางข้อมูล </h3>



                  <div class="card-tools">
                    <a href="<?php  echo site_url('material_reg/insert_data_reg/');?>" type="button" class="btn btn-sm btn-tool btn-warning"><i class="fas fa-plus-square"></i> เพิ่มข้อมูล
                    </a>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr class="text-center info">
                      <th>เลขทะเบียนวัสดุ</th>
                      <th>ประเภทวัสดุ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>จำนวน</th>
    
                      <th>รายละเอียด</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 


                      foreach ($Query as $rs) 

                      { 
                       // echo '<pre>';
                       // print_r($rs);   
                       // echo '</pre>';
                       // exit;       

                    
                      if ($rs->mat_reg_qty_stock <= $rs->mat_reg_qty_limit) {
                        $stock='<h5><span class="badge badge-danger">Out Stock :</span> <font color="red"><b>'.$rs->mat_reg_qty_stock.'</b></font> '.$rs->u_name.'</h5>';
         
                      }else{
               $stock='<h5><span class="badge badge-success">In Stock :</span> <font color="green"><b>'.$rs->mat_reg_qty_stock.'</b></font> '.$rs->u_name.'</h5>';
                      }


                        ?>

                      <tr class="text-center">
                      <td><?php echo $rs->mat_reg_code;?></td>

                      <td><?php echo $rs->mat_name;?></td>
                      
                      <td><?php echo $rs->mat_reg_name;?></td>

                      <td><?php echo $stock;?></td>

                      <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Modalpass<?php echo $rs->mat_reg_id;?>">
                        <i class="nav-icon fas fa-search-plus"></i> ดูข้อมูล
                       </button>
                        </td>
                      <td>
                       


                        <a class="btn btn-sm btn-warning" href="<?php  echo site_url('material_reg/edit_data/').$rs->mat_reg_id;?>"><i class="nav-icon fas fa-edit"></i> Edit</a>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal<?php echo $rs->mat_reg_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i> Del
                       </button>



                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="Modalpass<?php echo $rs->mat_reg_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <!-- Modal -->
                    <div class="modal fade" id="Modal<?php echo $rs->mat_reg_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> คุณต้องการลบ วัสดุ</h5>
                           <p>หมายเลข <b><?php echo $rs->mat_reg_code.' ('.$rs->mat_reg_name.') ';?></b> ใช่หรือไม่?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <a class="btn btn-danger" href="<?php  echo site_url('material_reg/delete_data/').$rs->mat_reg_id;?>">ยืนยัน</a>
                          </div>
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