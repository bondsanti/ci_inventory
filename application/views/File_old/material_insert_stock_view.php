<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รับเข้า <small class="text-muted">วัสดุ</small></h1>
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
                <h3 class="card-title">อัพเดท Stock</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?php echo site_url('material_stock/insert_data_to_db_stock');?>" method="post" enctype="multipart/form-data">

                  <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" required>


                <div class="row">
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label>ค้นหา ทะเบียน วัสดุ</label>
                          <select class="form-control select2bs4" name="mat_reg_id" style="width: 100%;">
                          <option value="">เลือก</option>
                          <?php foreach($Query_mat_reg as $rs){ 
                            ?>
                          <option value="<?php echo $rs->mat_reg_id;?>"><?php echo $rs->mat_reg_code.' ('.$rs->mat_reg_name.')';?></option>
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
                        <label>Invoice NO.</label>
                          <input type="text" class="form-control" name="mat_ins_invoice" autocomplete="off" placeholder="กรอก หมายเลขสั่งซื้อ" required>
                      </div>
                  </div>
                   <div class="col-sm-2">
                   <div class="form-group">
                        <label>จำนวน <font class="text-success">In stock</font></label>
                          <input type="text" class="form-control" name="mat_ins_stock" autocomplete="off" placeholder="กรอก จำนวน" required>
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
                        <textarea class="form-control" rows="3" name="mat_ins_remark" autocomplete="off" placeholder="กรอกรายละเอียดวัสดุ ..."></textarea>
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
                     <label>รูปภาพ *Invoice</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" accept="image/*" name="mat_ins_img" value="">
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
                     <a href="<?php  echo site_url('material_stock');?>" type="button" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก
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