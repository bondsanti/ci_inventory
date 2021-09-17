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
              <li class="breadcrumb-item active">ตารางข้อมูล</li>
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
                      <a href="<?php echo site_url('member/main_form'); ?>" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#ajaxLargeModal"><i class="fas fa-plus-square"></i> เพิ่มบุคลากร </a> 
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
  

                       <a class="btn btn-sm btn-secondary" href="<?php  echo site_url('member/edit_pwd/').$rs->mem_id;?>"><i class="nav-icon fas fa-key"></i></a>

                        <a class="btn btn-sm btn-warning" href="<?php  echo site_url('member/edit_data/').$rs->mem_id;?>"><i class="nav-icon fas fa-edit"></i></a>

                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal<?php echo $rs->mem_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i>
                       </button>



                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="Modalpass<?php echo $rs->mem_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Information!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center">
                            <h5 class="text-danger"><i class="icon fas fa-exclamation-triangle"></i> โปรดเก็บข้อมูลเป็นความลับ!!</h5>
                            <center><img class="product-image-thumb" src="<?php echo base_url('img/user');?>/<?php echo $rs->mem_img;?>" width="120px" alt="">
                              </center>
                           <code><?php echo '<b>User :</b> '.$rs->mem_username.'<br><b>Pass</b> : '.$rs->mem_password;?></code>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal -->
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
                            <a class="btn btn-danger" href="<?php  echo site_url('member/delete_data/').$rs->mem_id;?>">ยืนยัน</a>
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