<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">บุคลากร</small></h1>
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
            
              <div class="card card-warning collapsed-card">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-bullhorn"></i> รายละเอียด ขอบเขตสิทธิ</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                 

                <div class="callout callout-danger">
                  <h5>Administartor!</h5>
                  <?php 
                    $list1=array('จัดการ เพิ่ม-ลบ-แก้ไข บุคลากรได้',
                      'จัดการ เพิ่ม-ลบ-แก้ไข หน่วยนับ,ประเภทวัสดุและครุภัณฑ์ได้',
                      'จัดการ เพิ่ม-ลบ-แก้ไข ข้อมูลทะเบียนวัสดุและครุภัณฑ์ได้',
                      'จัดการ รับเข้า Stock วัสดุและครุภัณฑ์ได้',
                      'จัดการ ทำรายการเบิก วัสดุและครุภัณฑ์ได้',
                      'อนุมัติ รายการเบิกวัสดุและครุภัณฑ์ได้',
                      'ดูข้อมูล พัสดุและประวัติการ เบิก-ยืม-คืน พร้อมดูรายงานต่างๆได้'
                    );

                      echo ul($list1);

                    ?>
                </div>
                 <div class="callout callout-info">
                  <h5>Staff!</h5>
                  <?php 
                    $list2=array(
                     'จัดการ รับเข้า Stock วัสดุและครุภัณฑ์ได้',
                      'จัดการ ทำรายการเบิก วัสดุและครุภัณฑ์ได้',
                      'อนุมัติ รายการเบิกวัสดุและครุภัณฑ์ได้',
                      'ดูข้อมูล พัสดุและประวัติการ เบิก-ยืม-คืน พร้อมดูรายงานต่างๆได้'

                    );

                      echo ul($list2);

                    ?>
                </div>
                 <div class="callout callout-warning">
                  <h5>User!</h5>
                  <?php 
                    $list3=array(
                      'จัดการ ทำรายการเบิก วัสดุและครุภัณฑ์ได้',
                      'อนุมัติ รายการเบิกวัสดุและครุภัณฑ์ได้',
                      'ดูข้อมูล พัสดุและประวัติการ เบิก-ยืม-คืน พร้อมดูรายงานต่างๆได้'

                    );

                      echo ul($list3);

                    ?>
                </div>



                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <div class="card card-green">
                <div class="card-header">
                  <h3 class="card-title"><i class="far fa-list-alt"></i> ตารางข้อมูล </h3>



                  <div class="card-tools">
                      <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-square"></i> เพิ่มบุคลากร </a> 
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
                      <th>รูป</th>

                   
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
                        }
                                      
              



                        ?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="text-center"><?php echo $rs->mem_code;?></td>

                      <td> 
                        <ul class="list-inline">
                              
                              <li class="list-inline-item">
                                  <img alt="" class="table-avatar" src="<?php echo base_url('img/user');?>/<?php echo $rs->mem_img;?>">
                          
                              </li>
                          
                          </ul>
                      </td>

                   
                      
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

                         <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#updateModal<?php echo $rs->mem_id;?>">
                        <i class="nav-icon fas fa-key"></i>
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
                              <form role="form" action="<?php echo base_url('member/update_data');?>" method="post"  id="form" enctype="multipart/form-data">
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
                         <select class="form-control" name="mem_sex" required>
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
                        <label>ชื่อ</label>
                        <input type="text" class="form-control text-danger" name="mem_fname" autocomplete="off" value="<?php echo $rs->mem_fname;?>" placeholder="กรอก ชื่อ" required>
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control text-danger" name="mem_lname" autocomplete="off" value="<?php echo $rs->mem_lname;?>"  placeholder="กรอก นามสกุล" required>
                      </div>
                    </div>
                  </div>

                   <div class="row">
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
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Username</label>
                        <input type="text" class="form-control text-danger" name="mem_username" autocomplete="off" value="<?php echo $rs->mem_username;?>" placeholder="กรอก Username" required>
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Password</label>
                        <input type="password" class="form-control text-danger" name="mem_password" autocomplete="off" value="<?php echo $rs->mem_password;?>" placeholder="กรอก Password" disabled>
                      </div>
                    </div>
                  </div>


                 

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>รูปภาพ</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" accept="image/*" name="mem_img" value="">
                              <label class="custom-file-label" for="">Choose file</label>
                            </div>
                           <input type="hidden" class="form-control text-danger" name="mem_img_old" value="<?php echo $rs->mem_img;?>">
                      </div>
                     </div>
                                 <div class="col-sm-6">
                                  <!-- select -->
                                  <div class="form-group">
                                    <label>สิทธิใช้งานระบบ</label>
                                    <select class="form-control"  name="lev_id" required>
                                      <option value="<?php echo $rs->lev_id;?>"><?php echo $rs->lev_name;?></option>
                                      <option value="">เลือก</option>
                                      <?php foreach($Query_posi as $rsl){ 

                                        ?>
                                      <option value="<?php echo $rsl->lev_id;?>"><?php echo $rsl->lev_name;?></option>
                                      <?php }?>

                                    </select>
                                  </div>
                                </div>
                  </div>

                  <div class="row">
                       <div class="col-sm-2">
                       </div>
                   <div class="col-sm-3">
                        <div class="form-group">
                        <label class="text-blue">รูป ที่ใช้งานอยู่</label>

                            <img class="product-image-thumb" src="<?php echo base_url('img/user');?>/<?php echo $rs->mem_img;?>" width="150px" alt="">
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

                    <!-- Modal update password -->
                    <div class="modal fade" id="updateModal<?php echo $rs->mem_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                       <form role="form" action="<?php echo base_url('member/update_pass');?>" method="post"  id="form" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Reset password !</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                 
                 <div class="row">
                   
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>รหัสประจำตัว พนักงาน</label>
                        <input type="text" class="form-control text-danger" name="mem_code" autocomplete="off" value="<?php echo $rs->mem_code;?>" placeholder="กรอก รหัสประจำตัว พนักงาน" disabled>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>ชื่อ-สกุล</label>
                        <input type="text" class="form-control text-danger" name="" autocomplete="off" value="<?php echo $rs->mem_sex;?> <?php echo $rs->mem_fname;?> <?php echo $rs->mem_lname;?>" placeholder="กรอก ชื่อ" disabled>
                      </div>
                    </div>
                     <div class="col-sm-4">
                      <div class="form-group">
                        <label class="text-green">*Password ใหม่</label>
                        <input type="password" class="form-control text-danger" name="mem_password" autocomplete="off" value="" placeholder="กรอก Password ใหม่"  minlength="8" mixlength="8" required>
                      </div>
                    </div>
                  </div>
                  <input type="hidden"name="mem_id" value="<?php echo $rs->mem_id;?>">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                             <button type="submit" class="btn btn-success" id="" >อัพเดท</button>

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
                            <a class="btn btn-danger" href="<?php  echo site_url('member/update_data_to_db/').$rs->mem_id;?>">อัพเดท</a>
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