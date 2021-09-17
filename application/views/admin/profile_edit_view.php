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

             <div class="col-md-7">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">แก้ไขข้อมูล</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?php echo site_url('profile/update_data_to_db2');?>" method="post" enctype="multipart/form-data">
                  
                    <input type="hidden"name="mem_id" value="<?php echo $Query_edit->mem_id;?>">

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ชื่อ หน่วยงาน/บริษัท</label>
                        <input type="text" class="form-control text-danger" name="member_gov" value="<?php echo $Query_edit->member_gov;?>" placeholder="กรอก ชื่อหน่วยงาน/บริษัท" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ชื่อ แผนกในหน่วยงาน/บริษัท</label>
                        <input type="text" class="form-control text-danger" name="member_dep" value="<?php echo $Query_edit->member_dep;?>" placeholder="กรอก ชื่อแผนกในหน่วยงาน/บริษัท" required>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>คำนำหน้า</label>
                         <select class="form-control" name="mem_sex" required>
                          <option value="<?php echo $Query_edit->mem_sex;?>"><?php echo $Query_edit->mem_sex;?></option>
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>รหัสประจำตัว พนักงาน</label>
                        <input type="text" class="form-control text-danger" name="mem_code" value="<?php echo $Query_edit->mem_code;?>" placeholder="กรอก รหัสประจำตัว พนักงาน" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" class="form-control text-danger" name="mem_fname" value="<?php echo $Query_edit->mem_fname;?>" placeholder="กรอก ชื่อ" required>
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control text-danger" name="mem_lname" value="<?php echo $Query_edit->mem_lname;?>"  placeholder="กรอก นามสกุล" required>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" class="form-control text-danger" name="mem_tel" value="<?php echo $Query_edit->mem_tel;?>" placeholder="กรอก เบอร์โทรศัพท์" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control text-danger" name="mem_email" value="<?php echo $Query_edit->mem_email;?>" placeholder="กรอก Email" required>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Username</label>
                        <input type="text" class="form-control text-danger" name="mem_username" value="<?php echo $Query_edit->mem_username;?>" placeholder="กรอก Username" required>
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Password</label>
                        <input type="password" class="form-control text-danger" name="mem_password" value="" placeholder="กรอก Password">
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
                           <input type="hidden" class="form-control text-danger" name="mem_img_old" value="<?php echo $Query_edit->mem_img;?>" disabled>
                      </div>
                     </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>ตำแหน่ง & สิทธิใช้งานระบบ</label>
                        <select class="form-control" name="posi_id" disabled>
   
                  <?php

                        if ($Query_edit->posi_level=='A') {
                          $posi_level='Admin FGS.';
                        } else if ($Query_edit->posi_level=='B'){
                          $posi_level='Administartor';
                        } else if ($Query_edit->posi_level=='C'){
                          $posi_level='Staff';
                        } else if ($Query_edit->posi_level=='D'){
                          $posi_level='User';
                        }

                        ?>
<option value="<?php echo $Query_edit->posi_id;?>"><?php echo $Query_edit->posi_name.' ('.$posi_level.')';?></option>




                         

                          <?php foreach($Query_posi as $rs){ 
                       


                        if ($rs->posi_level=='A') {
                          $posi_level='Admin FGS.';
                        } else if ($rs->posi_level=='B'){
                          $posi_level='Administartor';
                        } else if ($rs->posi_level=='C'){
                          $posi_level='Staff';
                        } else if ($rs->posi_level=='D'){
                          $posi_level='User';
                        }
                           


                            ?>
                          <option value="<?php echo $rs->posi_id;?>"><?php echo $rs->posi_name.' ('.$posi_level.')';?></option>
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

                            <img class="product-image-thumb" src="<?php echo base_url('img/user');?>/<?php echo $Query_edit->mem_img;?>" width="150px" alt="">
                      </div>
                     </div>
                  </div>

                 
               
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                  <center><button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                 <button type="reset" class="btn btn-warning"><i class="fas fa-redo-alt"></i>  เคลียร์</button>
                     <a href="<?php  echo site_url('home');?>" type="button" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก
                    </a></center>
                     </form>
                </div>
            </div>
            <!-- /.card -->


            </div>
           
            <div class="col-md-5">
       
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">รายละเอียด</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Password!</h5>
                    รหัสผ่านของคุณถูกเข้ารหัสเพื่อความปลอดภัยของระบบ หากจำไม่ได้กรุณากำหนดรหัสผ่านใหม่ได้ทันที..
                  </div>

                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> ตำแหน่ง & สิทธิใช้งานระบบ!</h5>
                  คุณไม่สารถเปลี่ยนตำแหน่ง และ สิทธิการใช้งานระบบได้ โปรดติดต่อผู้ดูแลระบบ
                </div>

                </div>
               </div>
             </div>
           
          </div>
        <!-- /.row -->
        
      
      </div>
    </section>

 
  </div>
  <!-- /.content-wrapper -->