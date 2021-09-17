<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">ระบบหน่วยงาน</small></h1>
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
                <h3 class="card-title">ฟอร์มข้อมูล</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="<?php echo site_url('setting/update_data_to_db');?>" method="post" enctype="multipart/form-data">
                    <input type="hidden"name="set_id" value="<?php echo $Query->set_id;?>">
                  <div class="row">
                     <div class="col-sm-3">
                       <div class="form-group">
                        <label>ชื่อ ระบบ</label>
                        <input type="text" class="form-control text-danger" name="set_name" value="<?php echo $Query->set_name;?>" placeholder="ชื่อ ระบบ" required>
                      </div>
                     </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>ข้อความ Title</label>
                        <input type="text" class="form-control text-danger" name="set_title" value="<?php echo $Query->set_title;?>" placeholder="ข้อความ Title" required>
                      </div>
                    </div>
                      <div class="col-sm-5">
                        <div class="form-group">
                        <label>ข้อความ Footer</label>
                        <input type="text" class="form-control text-danger" name="set_footer" value="<?php echo $Query->set_footer;?>" placeholder="ข้อความ Footer" required>
                      </div>
                     </div>
                  </div>

                   <div class="row">
                     <div class="col-sm-3">
                       <div class="form-group">
                         <label>กำหนดสี Highlight ของเมนู</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="blue" value="blue" name="set_sidebar_color"
                          <?php if ($Query->set_sidebar_color=='blue'){ echo 'checked'; } ?>>

                          <label for="blue" class="custom-control-label text-blue">น้ำเงิน (Blue)</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="red" value="red" name="set_sidebar_color"
                          <?php if ($Query->set_sidebar_color=='red'){ echo 'checked'; } ?>>
                          <label for="red" class="custom-control-label text-red">แดง (Red)</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="green" value="green" name="set_sidebar_color"
                           <?php if ($Query->set_sidebar_color=='green'){ echo 'checked'; } ?>>
                          <label for="green" class="custom-control-label text-green">เขียว (Green)</label>
                        </div>
                         <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="yellow" value="yellow" name="set_sidebar_color"
                           <?php if ($Query->set_sidebar_color=='yellow'){ echo 'checked'; } ?>>
                          <label for="yellow" class="custom-control-label text-yellow">เหลือง (Yellow)</label>
                        </div>
                       <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="cyan" value="cyan" name="set_sidebar_color"
                          <?php if ($Query->set_sidebar_color=='cyan'){ echo 'checked'; } ?>>
                          <label for="cyan" class="custom-control-label text-cyan">ฟ้าอมเขียว (Cyan)</label>
                        </div>

                      </div>
                     </div>
                   <div class="col-sm-3">
                       <div class="form-group">
                         <label>กำหนดสี Navbar</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="dark_nav" value="dark" name="set_navbar_color"
                          <?php if ($Query->set_navbar_color=='dark'){ echo 'checked'; } ?>>
                          <label for="dark_nav" class="custom-control-label">ดำ (Black)</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="red_nav" value="red" name="set_navbar_color"
                          <?php if ($Query->set_navbar_color=='red'){ echo 'checked'; } ?>>
                          <label for="red_nav" class="custom-control-label text-red">แดง (Red)</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="green_nav" value="green" name="set_navbar_color"
                          <?php if ($Query->set_navbar_color=='green'){ echo 'checked'; } ?>>
                          <label for="green_nav" class="custom-control-label text-green">เขียว (Green)</label>
                        </div>
                         <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="yellow_nav" value="yellow" name="set_navbar_color"
                          <?php if ($Query->set_navbar_color=='yellow'){ echo 'checked'; } ?>>
                          <label for="yellow_nav" class="custom-control-label text-yellow">เหลือง (Yellow)</label>
                        </div>
                       <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="cyan_nav" value="cyan" name="set_navbar_color"
                          <?php if ($Query->set_navbar_color=='cyan'){ echo 'checked'; } ?>>
                          <label for="cyan_nav" class="custom-control-label text-cyan">ฟ้าอมเขียว (Cyan)</label>
                        </div>

                      </div>
                     </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                        <label>Logo</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" accept="image/*" name="set_title_logo" value="">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                           
                      </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                        <label cass="text-blue">Logo ที่ใช้งานอยู่</label>

                            <img class="product-image-thumb" src="<?php echo base_url('img/logo');?>/<?php echo $Query->set_title_logo;?>" width="90px" alt="">

                            <input type="hidden" class="form-control text-danger" name="logo_old" value="<?php echo $Query->set_title_logo;?>">
                      </div>
                     </div>
                  </div>

                 


                 
               
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                  <center><button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                 <button type="reset" class="btn btn-warning"><i class="fas fa-redo-alt"></i>  เคลียร์</button>
                     <a href="<?php  echo site_url('setting/edit_data/');?>1" type="button" class="btn btn-danger"><i class="fas fa-times"></i> ยกเลิก
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