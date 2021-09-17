<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">สมาชิก</small></h1>
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
                      <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-square"></i> เพิ่มสมาชิก</a> 
                     <a href="<?php echo base_url('members/export_data');?>" target="_blank" role="button" class="btn btn-primary btn-create"><i class="fas fa-file-excel"></i> Export Excel </a> 
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-striped projects">
                    <thead>
                    <tr class="text-center">
                      <th>#</th>
                       <th>รหัสพนักงาน</th>


                   
                      <th>ชื่อ-สกุล</th>
                      <th>หน่วยงาน</th>
                       <th>สิทธิใช้งานระบบ</th>
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

                        if ($rs->lev_ref=='A') {
                          $level='<span class="badge badge-primary">'.$rs->lev_name.'</span>';
                        } else if ($rs->lev_ref=='B'){
                          $level='<span class="badge badge-danger">'.$rs->lev_name.'</span>';
                        } else if ($rs->lev_ref=='C'){
                          $level='<span class="badge badge-info">'.$rs->lev_name.'</span>';
                        } else if ($rs->lev_ref=='D'){
                          $level='<span class="badge badge-warning">'.$rs->lev_name.'</span>';
                        } else{
                           $level='<span class="badge badge-secondary">'.$rs->lev_name.'</span>';
                        }
                                      
              



                        ?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="text-center"><?php echo $rs->mem_code;?></td>


                      <td>

                          <a>
                          <?php echo $rs->mem_sex.$rs->mem_fname.' '.$rs->mem_lname;?>
                          </a>
                          <br/>
                          <small>
                             <b>ตำแหน่ง</b> : <?php echo $rs->member_position;?>
                          </small>

                        </td>
              <td>
                        
                        <a>
                          <?php echo $rs->member_gov;?>
                              
                          </a>
                          <br/>
                          <small>
                             <b>แผนก</b> :<?php echo $rs->member_dep;?>
                          </small>

                      </td>

                      <td class="text-center"><?php echo $level;?></td>

                      <td class="text-center">

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $rs->mem_id;?>">
                        <i class="nav-icon fas fa-edit"></i>
                       </button>


                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal<?php echo $rs->mem_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i>
                       </button>



                      </td>
                    </tr>
                    
                  <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?php  echo $rs->mem_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('members/update_data');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               <input type="hidden"name="mem_id" value="<?php echo $rs->mem_id;?>">
               

               <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ชื่อ หน่วยงาน/บริษัท</label>
                        <input type="text" class="form-control text-danger" name="member_gov" autocomplete="off" value="<?php echo $rs->member_gov;?>" placeholder="กรอก ชื่อหน่วยงาน/บริษัท" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>แผนก</label>
                        <input type="text" class="form-control text-danger" name="member_dep" autocomplete="off" value="<?php echo $rs->member_dep;?>" placeholder="กรอก ชื่อแผนกในหน่วยงาน/บริษัท" required>
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <input type="text" class="form-control text-danger" name="member_position" value="<?php echo $rs->member_position;?>" placeholder="กรอก ตำแหน่ง" autocomplete="off" required>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>คำนำหน้า</label>
                         <select class="form-control text-danger" name="mem_sex" required>
                          <option value="<?php echo $rs->mem_sex;?>"><?php echo $rs->mem_sex;?></option>
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>รหัสประจำตัว พนักงาน</label>
                        <input type="text" class="form-control text-danger" name="mem_code" autocomplete="off" value="<?php echo $rs->mem_code;?>" placeholder="กรอก รหัสประจำตัว พนักงาน" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" class="form-control text-danger" name="mem_tel" autocomplete="off" maxlength="10" value="<?php echo $rs->mem_tel;?>" placeholder="กรอก เบอร์โทรศัพท์" required>
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control text-danger" name="mem_email" autocomplete="off" value="<?php echo $rs->mem_email;?>" placeholder="กรอก Email" required>
                      </div>

                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm-6">
                       <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" class="form-control text-danger" name="mem_fname" autocomplete="off" value="<?php echo $rs->mem_fname;?>" placeholder="กรอก ชื่อ" required>
                      </div>


                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control text-danger" name="mem_lname" autocomplete="off" value="<?php echo $rs->mem_lname;?>"  placeholder="กรอก นามสกุล" required>
                      </div>
                    </div>

                  </div>


                 

              </div>


                              <div class="modal-footer">
                             
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                <button type="submit" class="btn btn-success" id="add" >บันทึก</button>

                              </div>
                            </form>
                            </div>
                          </div>
                        </div> 






                    <!-- Modal Del -->
                    <div class="modal fade" id="Modal<?php echo $rs->mem_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> คุณต้องการลบ บุคลากร</h5>
                           <p>ชื่อ <b><?php echo $rs->mem_sex.$rs->mem_fname.' '.$rs->mem_lname;?></b> หรือไม่?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <a class="btn btn-danger" href="<?php  echo site_url('members/update_data_to_db/').$rs->mem_id;?>">อัพเดท</a>
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