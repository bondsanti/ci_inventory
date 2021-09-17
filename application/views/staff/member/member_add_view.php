<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">บุคลากร</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('member');?>">ตารางข้อมูล</a></li>
              <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
            </ol>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">เพิ่มข้อมูล</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?php echo site_url('member/insert_data');?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ชื่อ หน่วยงาน/บริษัท</label>
                        <input type="text" class="form-control" name="member_gov" value="<?php echo set_value('member_gov'); ?>"  placeholder="กรอก ชื่อหน่วยงาน/บริษัท" autocomplete="off" required>
                        
                      </div>
                      <span class="fr"><?php echo form_error('member_gov'); ?></span>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>แผนก</label>
                        <input type="text" class="form-control" name="member_dep" value="<?php echo set_value('member_dep'); ?>" placeholder="กรอก แผนก" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('member_dep'); ?></span>
                    </div>
                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <input type="text" class="form-control" name="member_position" value="<?php echo set_value('member_position'); ?>" placeholder="กรอก ตำแหน่ง" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('member_position'); ?></span>
                    </div>
                    
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>คำนำหน้า</label>
                         <select class="form-control" name="mem_sex" required>
                          <option value="">เลือก</option>
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>รหัสประจำตัว พนักงาน</label>
                        <input type="text" class="form-control" name="mem_code" value="<?php echo set_value('mem_code'); ?>" placeholder="กรอก รหัสประจำตัว พนักงาน" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_code'); ?></span>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" class="form-control" name="mem_fname" value="<?php echo set_value('mem_fname'); ?>" placeholder="กรอก ชื่อ" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_fname'); ?></span>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control" name="mem_lname" value="<?php echo set_value('mem_lname'); ?>" placeholder="กรอก นามสกุล" autocomplete="off" required>
                         <span class="fr"><?php echo form_error('mem_lname'); ?></span>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" class="form-control" name="mem_tel" value="<?php echo set_value('mem_tel'); ?>" placeholder="กรอก เบอร์โทรศัพท์" autocomplete="off" maxlength="10" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_tel'); ?></span>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="mem_email" value="<?php echo set_value('mem_email'); ?>" placeholder="กรอก Email" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_email'); ?></span>

                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Username</label>
                        <input type="text" class="form-control" name="mem_username" value="<?php echo set_value('mem_username'); ?>" placeholder="กรอก Username" autocomplete="off" minlength="8" mixlength="8" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_username'); ?></span>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Password</label>
                        <input type="password" class="form-control" name="mem_password" value="<?php echo set_value('mem_password'); ?>" placeholder="กรอก Password" autocomplete="off" minlength="8" mixlength="8" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_password'); ?></span>
                    </div>
                  </div>


                 

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>รูปภาพ</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" accept="image/*" name="mem_img" value="" required>
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                           
                      </div>
                     </div>
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>ตำแหน่ง & สิทธิใช้งานระบบ</label>
                        <select class="form-control" name="posi_id" required>
                          <option value="">เลือก</option>
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

                 
               
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                  <center><button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                 <button type="reset" class="btn btn-warning"><i class="fas fa-redo-alt"></i>  เคลียร์</button>
                     <a href="<?php  echo site_url('member');?>" type="button" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก
                    </a></center>
                     </form>
                </div>
            </div>
            <!-- /.card -->


            </div>
           
            <div class="col-md-5">
       
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">รายละเอียด ขอบเขตสิทธิ</h3>
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
               </div>
             </div>
           
          </div>
        <!-- /.row -->
        
      
      </div>
    </section>

 
  </div>
  <!-- /.content-wrapper -->