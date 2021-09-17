
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

                   <a href="<?php echo base_url('material_reg/export_data');?>" target="_blank" role="button" class="btn btn-primary btn-create"><i class="fas fa-file-excel"></i> Export Excel </a> 
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-striped projects table-bordered">
                    <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>รหัสทะเบียน</th>
                      <th>รูป</th>
                      <th>ชื่อ</th>
                      <th>จำนวน</th>
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

                     if ($rs->mat_reg_qty_stock == 0) {
                        $Status_stock='<span class="badge badge-danger">Out Stock</span>';
        
                      }else if ($rs->mat_reg_qty_stock <= $rs->mat_reg_qty_limit) {

                        $Status_stock='<span class="badge badge-warning">Warning Stock</span>';
                      }else{

                        $Status_stock='<span class="badge badge-success">In Stock</span>';

                      } 

                        ?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="text-center">
                          <a>
                          <?php echo $rs->mat_reg_code;?>
                          </a>
                          <br/>
                          <small>
                             
                          </small>
                       </td>
                       <td class="text-center"> 
                        <ul class="list-inline">
                              
                              <li class="list-inline-item">
                                  <img alt="" class="table-avatar" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>">
                          
                              </li>
                          
                          </ul>
                      </td>
                        <td>
                          <a>
                          <?php echo $rs->mat_reg_name;?>
                          </a>
                          <br/>
                          <small>
                               <?php echo $rs->mat_name;?>
                          </small>
                       </td>
                        <td class="text-center">
                          <a>
                          <?php echo "<b>".$rs->mat_reg_qty_stock."</b> ".$rs->u_name;?>
                          </a>
                          <br/>
                          <small>
                            <?php echo "<b>สถานะ</b>: ".$Status_stock;?>
                          </small>
                       </td>

                      <td class="text-center">
                       
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $rs->mat_reg_id;?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                       </button>


                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $rs->mat_reg_id;?>">
                        <i class="nav-icon fas fa-edit"></i>
                       </button>


                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalDel<?php echo $rs->mat_reg_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i>
                       </button>



                      </td>
                    </tr>
                    
                  <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?php  echo $rs->mat_reg_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('material_reg/update_data');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" required>
                              <input type="hidden" class="form-control" name="mat_reg_id" value="<?php  echo $rs->mat_reg_id;?>" required>

                               <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>ประเภทวัสดุ</label>
                                       <select class="form-control is-warning text-danger" name="mat_id" required>
                                        <option value="<?php echo $rs->mat_id;?>"><?php echo $rs->mat_code.' ('.$rs->mat_name.')';?></option>
                                        <option value="">เลือก</option>
                                        <?php foreach($Query_mat as $rsl){ 
                                          ?>
                                        <option value="<?php echo $rsl->mat_id;?>"><?php echo $rsl->mat_code.' ('.$rsl->mat_name.')';?></option>
                                        <?php }?>

                                      </select>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>*เลขทะเบียนวัสดุ</label>
                                      <input type="text" class="form-control is-warning text-danger" name="mat_reg_code" value="<?php  echo $rs->mat_reg_code;?>" autocomplete="off" placeholder="กรอก เลขทะเบียนวัสดุ" required>
                                      
                                    </div>
                                  </div>
                                </div>

                               <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>ชื่อวัสดุ</label>
                                       <input type="text" class="form-control is-warning text-danger" name="mat_reg_name" value="<?php  echo $rs->mat_reg_name;?>" autocomplete="off" placeholder="กรอก ชื่อวัสดุ" required>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>หน่วยนับ</label>
                                       <select class="form-control is-warning text-danger" name="u_id" required>
                                         <option value="<?php echo $rs->u_id;?>"><?php echo $rs->u_name;?></option>
                                        <option value="">เลือก</option>
                                        <?php foreach($Query_unit as $rsl2){ 

                                          ?>
                                        <option value="<?php echo $rsl2->u_id;?>"><?php echo $rsl2->u_name;?></option>
                                        <?php }?>

                                      </select>
                                      
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>จำนวน <font class="text-success">In stock</font></label>
                          <input type="text" class="form-control is-warning text-danger" name="mat_reg_qty_stock" value="<?php  echo $rs->mat_reg_qty_stock;?>" autocomplete="off" placeholder="กรอก จำนวน" required>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>จำนวน <font class="text-danger">Out stock</font><sup>(จำนวนที่ให้ระบบเตือน)</sup></label>
                          <input type="text" class="form-control is-warning text-danger" name="mat_reg_qty_limit" value="<?php  echo $rs->mat_reg_qty_limit;?>" autocomplete="off" placeholder="กรอก จำนวน" required>
                                    </div>
                                  </div>
                                </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>รายละเอียด</label>
                        <textarea class="form-control is-warning text-danger" rows="5" name="mat_reg_detail" autocomplete="off" placeholder="กรอกรายละเอียดวัสดุ ..."><?php  echo $rs->mat_reg_detail;?></textarea>
                                    </div>
                                  </div>
                               <div class="col-sm-3">
                                    <div class="form-group">
                                          <label>รูปภาพ</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input is-warning text-danger" accept="image/*" name="mat_reg_img" value="">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                              <input type="hidden" name="mat_reg_img_old" value="<?php echo $rs->mat_reg_img;?>">

                            </div>

                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                          <label>รูปภาพ เดิม</label>
                          
                                     <img class="product-image-thumb" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" width="150px" alt="">

                                    </div>
                                  </div>

                                </div>

                              </div>
                            

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                         <button type="submit" class="btn btn-success" id="" >อัพเดท</button>

                                      </div>
                                       </form>
                                    </div>
                                  </div>
                                </div>



                    <!-- Modal detail -->
                    <div class="modal fade" id="detailModal<?php echo $rs->mat_reg_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="modal fade" id="ModalDel<?php echo $rs->mat_reg_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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