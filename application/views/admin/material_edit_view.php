<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">ประเภทวัสดุ</small></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

          <div class="row">

             <div class="col-md-8">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                  <div class="card-header">
                    <h3 class="card-title">ฟอร์ม แก้ไขข้อมูล</h3>
                  </div>
                  <!-- /.card-header -->
                   <form role="form" action="<?php echo site_url('material/update_data_to_db');?>" method="post">

                  <input type="hidden" class="form-control text-danger" name="mat_id" value="<?php echo $Query_edit->mat_id;?>">
                  
                  <div class="card-body">
                   
                        <div class="row">
                           <div class="col-sm-3">
                             </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>รหัส ประเภท</label>
                                <input type="text" class="form-control text-danger" name="mat_code" placeholder="กรอก รหัสประเภท"  value="<?php echo $Query_edit->mat_code;?>" required>
                              </div>
                            </div>
                              <div class="col-sm-4">
                             </div>
                          </div>
                         <div class="row">
                           <div class="col-sm-3">
                             </div>
                            <div class="col-sm-5">
                              <div class="form-group">
                                <label>ชื่อ ประเภท</label>
                                <input type="text" class="form-control text-danger" name="mat_name" placeholder="กรอก ชื่อประเภท"  value="<?php echo $Query_edit->mat_name;?>" required>
                              </div>
                            </div>
                              <div class="col-sm-4">
                             </div>
                          </div>



                        </div>

                          
                          <div class="card-footer">
                            <center><button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                                   <button type="reset" class="btn btn-warning"><i class="fas fa-redo-alt"></i>  เคลียร์</button>
                                   <a href="<?php  echo site_url('material');?>" type="button" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก
                    </a>
                               </center>
                          </div>
                  </form>

               </div>
             </div>
                 <div class="col-md-4">
                     
                            <div class="card card-info">
                              <div class="card-header">
                                <h3 class="card-title">รายละเอียด</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                               <h4>วัสดุ</h4>
                                - สินทรัพย์มีมูลค่าไม่สูง มีลักษณะไม่คงทนถาวร มีความเสี่ยงต่อการสูญหายง่าย ยากต่อการควบคุม
                                <div class="alert alert-warning alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-info"></i> ประเภทวัสดุ!</h5>
                                  หากคุณกรอกรหัสประเภทซ้ำ!! ระบบจะแจ้งเตื่อนเพื่อให้คุณกรอกรหัสหน่วยนับใหม่
                                </div>
                              </div>
                             </div>
                           </div>

           </div>


         <div class="row">


            <div class="col-md-12">
              <div class="card card-lightblue">
                <div class="card-header">
                  <h3 class="card-title">ตารางข้อมูล </h3>


                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr class="text-center info">
                      <th>รหัสประเภท</th>
                      <th>ชื่อประเภท</th>
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



                        ?>

                      <tr class="text-center">
                      <td><?php echo $rs->mat_code;?></td>
                      <td><?php echo $rs->mat_name;?></td>
                      <td>

                        <a class="btn btn-sm btn-warning" href="<?php  echo site_url('material/edit_data/').$rs->mat_id;?>"><i class="nav-icon fas fa-edit"></i> Edit</a>

                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal<?php echo $rs->mat_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i> Del
                       </button>



                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal<?php echo $rs->mat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> คุณต้องการลบ</h5>
                           <p>ชื่อหน่วยรับ <b><?php echo $rs->u_name;?></b> หรือไม่?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <a class="btn btn-danger" href="<?php  echo site_url('material/delete_data/').$rs->mat_id;?>">ยืนยัน</a>
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