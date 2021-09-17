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
            <!-- general form elements disabled -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">เพิ่มข้อมูล</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?php echo site_url('material_reg/insert_data_to_db_reg');?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" required>


                <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label>ประเภทวัสดุ</label>
                         <select class="form-control" name="mat_id" required>
                          <option value="">เลือก</option>
                          <?php foreach($Query_mat as $rs){ 
                            ?>
                          <option value="<?php echo $rs->mat_id;?>"><?php echo $rs->mat_code.' ('.$rs->mat_name.')';?></option>
                          <?php }?>

                        </select>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                          <label>เลขทะเบียนวัสดุ</label>
                        <input type="text" class="form-control" name="mat_reg_code" autocomplete="off" placeholder="กรอก เลขทะเบียนวัสดุ" required>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>
                 <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                          <label>ชื่อวัสดุ</label>
                        <input type="text" class="form-control" name="mat_reg_name" autocomplete="off" placeholder="กรอก ชื่อวัสดุ" required>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                          <label>หน่วยนับ</label>
                         <select class="form-control" name="u_id" required>
                          <option value="">เลือก</option>
                          <?php foreach($Query_unit as $rs){ 

                            ?>
                          <option value="<?php echo $rs->u_id;?>"><?php echo $rs->u_name;?></option>
                          <?php }?>

                        </select>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label>จำนวน <font class="text-success">In stock</font></label>
                          <input type="text" class="form-control" name="mat_reg_qty_stock" autocomplete="off" placeholder="กรอก จำนวน" required>
                      </div>
                  </div>
                   <div class="col-sm-2">
                     <div class="form-group">
                        <label>จำนวน <font class="text-danger">Out stock</font><sup>(จำนวนที่ให้ระบบเตือน)</sup></label>
                          <input type="text" class="form-control" name="mat_reg_qty_limit" autocomplete="off" placeholder="กรอก จำนวน" required>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>
                 <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                 <label>รายละเอียด</label>
                        <textarea class="form-control" rows="3" name="mat_reg_detail" autocomplete="off" placeholder="กรอกรายละเอียดวัสดุ ..."></textarea>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>

                 <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                     <label>รูปภาพ</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" accept="image/*" name="mat_reg_img" value="">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                  </div>
                </div>




                 
               
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                  <center><button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                 <button type="reset" class="btn btn-warning"><i class="fas fa-redo-alt"></i>  เคลียร์</button>
                     <a href="<?php  echo site_url('material_reg');?>" type="button" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก
                    </a></center>
                     </form>
                </div>
            </div>
            <!-- /.card -->


            </div>
           

           
          </div>
        <!-- /.row -->
        
      
      </div>
    </section>

 
  </div>
  <!-- /.content-wrapper -->