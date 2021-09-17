<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">ตำแหน่งและสิทธิการใช้งาน</small></h1>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">แก้ไขข้อมูล</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?php echo site_url('position/update_data_to_db');?>" method="post">
                    <input type="hidden"name="posi_id" value="<?php echo $Query->posi_id;?>">


                  <div class="row">
                   <div class="col-sm-3">
                     </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>ตำแหน่ง ในหน่วยงาน/แผนก</label>
                        <input type="text" class="form-control text-danger" name="posi_name" value="<?php echo $Query->posi_name;?>" placeholder="กรอก ชื่อ ตำแหน่ง ในหน่วยงาน/แผนก" required>
                      </div>
                    </div>
                      <div class="col-sm-4">
                     </div>
                  </div>

                 

                  <div class="row">
                    <div class="col-sm-3">
                     </div>
                    <div class="col-sm-5">
                      <!-- select -->
                      <div class="form-group">
                        <label>สิทธิใช้งานระบบ</label>
                        <select class="form-control" name="posi_level" required>
                        <?php
                           if ($Query->posi_level=='A') {
                          $posi_level='<h5><span class="badge badge-dark">Admin FGS.</span></h5>';
                        } else if ($Query->posi_level=='B'){
                          $posi_level='<h5><span class="badge badge-dark">Administartor</span></h5>';
                        } else if ($Query->posi_level=='C'){
                          $posi_level='<h5><span class="badge badge-info">Staff</span></h5>';
                        } else if ($Query->posi_level=='D'){
                          $posi_level='<h5><span class="badge badge-secondary">User</span></h5>';
                        }
                        ?>

                          <option value="<?php echo $Query->posi_level;?>"><?php echo $posi_level;?></option>
                          <option value="">เลือก</option>
                          <option value="B">Administartor</option>
                          <option value="C">Staff</option>
                          <option value="D">User</option>
                        </select>
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
                     <a href="<?php  echo site_url('position');?>" type="button" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก
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
                    $list1=array('จัดการระบบหน่วยงาน,จัดการผู้ใช้งานระบบพร้อมกำหนดสิทธิ์ใช้งานและบุคลากรได้',
                      'จัดการ เพิ่ม-ลบ-แก้ไข หน่วยนับ,ประเภทวัสดุและครุภัณฑ์ได้',
                      'จัดการ เพิ่ม-ลบ-แก้ไข ข้อมูลทะเบียนวัสดุและครุภัณฑ์ได้',
                      'อนุมัติ-เพิ่ม-ลบ-แก้ไข รายการ เบิก-ยืม-คืน ได้',
                      'บันทึกข้อมูล เบิก-ยืม-คืน ได้',
                      'ดูข้อมูล พัสดุและประวัติการ เบิก-ยืม-คืน พร้อมออกรายงานได้ ',
                      'แจ้งข่าวสารผ่านหน้าระบบ'
                    );

                      echo ul($list1);

                    ?>
                </div>
                 <div class="callout callout-info">
                  <h5>Staff!</h5>
                  <?php 
                    $list2=array(
                      'จัดการ เพิ่ม-ลบ-แก้ไข ข้อมูลทะเบียนวัสดุและครุภัณฑ์ได้',
                      'อนุมัติ-เพิ่ม-ลบ-แก้ไข รายการ เบิก-ยืม-คืน ได้',
                      'บันทึกข้อมูล เบิก-ยืม-คืน ได้',
                      'ดูข้อมูล พัสดุและประวัติการ เบิก-ยืม-คืน พร้อมออกรายงานได้ '

                    );

                      echo ul($list2);

                    ?>
                </div>
                 <div class="callout callout-warning">
                  <h5>User!</h5>
                  <?php 
                    $list3=array(
                      'บันทึกข้อมูล เบิก-ยืม-คืน ได้',
                      'ดูข้อมูล พัสดุและประวัติการ เบิก-ยืม-คืนได้'

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