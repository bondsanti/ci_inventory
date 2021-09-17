
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">วันหมดอายุ</small></h1>
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
                      <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-square"></i> ลงทะเบียนใช้งาน </a> 
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-striped projects">
                    <thead>
                    <tr class="text-center">
                      <th>#</th>

                       <th>วันเริ่มต้น</th>
                       <th>วันสิ้นสุด</th>
                       <th>วันใช้งาน</th>
                       <th>วันที่ทำรายการ</th>
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

   
                              $start_date = date("d-m-Y", strtotime($rs->license_start));
   $expire_date = date("d-m-Y", strtotime($rs->license_end));
    $save_date = date("d-m-Y H:i:s", strtotime($rs->license_save));
   $today_date = date("d-m-Y");

/* Start Date */
$start_explode = explode("-", $start_date);
$start_day = $start_explode[0];
$start_month = $start_explode[1];
$start_year = $start_explode[2];

/* Expire Date */
$expire_explode = explode("-", $expire_date);
$expire_day = $expire_explode[0];
$expire_month = $expire_explode[1];
$expire_year = $expire_explode[2];

/* Today Date */
$today_explode = explode("-", $today_date);
$today_day = $today_explode[0];
$today_month = $today_explode[1];
$today_year = $today_explode[2];

$start = gregoriantojd($start_month,$start_day,$start_year);
$expire = gregoriantojd($expire_month,$expire_day,$expire_year);
$today = gregoriantojd($today_month,$today_day,$today_year);

$date_current = $expire-$today; //หาวันที่ยังเหลืออยู่

// echo "เหลือเวลาอีก ";
// echo $date_current." วัน <br>";          
              



                        ?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="text-center"><?php echo $start_date;?></td>
                      <td class="text-center"><?php echo $expire_date;?></td>
                      <td class="text-center">เหลือเวลาอีก <?php echo $date_current;?> วัน</td>
          

                      <td class="text-center"><?php echo $save_date;?></td>

                      <td class="text-center">

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $rs->li_id;?>">
                        <i class="nav-icon fas fa-edit"></i>
                       </button>


                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalDel<?php echo $rs->li_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i>
                       </button>



                      </td>
                    </tr>
                    
                  <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?php  echo $rs->li_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('license/update_data');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               <input type="hidden"name="li_id" value="<?php echo $rs->li_id;?>">
                               <input type="hidden"  class="form-control" name="member_id" value="<?php echo $mem_id;?>" autocomplete="off" required>
                                
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>วันที่เริ่ม</label>
                                      <input type="date"  class="form-control text-danger" name="license_start" value="<?php  echo $rs->license_start;?>" placeholder="วันที่เริ่ม" autocomplete="off" required>
                                      
                                    </div>
                                   
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>วันที่สิ้นสุด</label>
                                      <input type="date" class="form-control text-danger" name="license_end" value="<?php  echo $rs->license_end;?>" placeholder="วันที่สิ้นสุด" autocomplete="off" required>
                                    </div>
                                   
                                  </div>

                                </div>


                  
                              </div>
                            
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                         <button type="submit" class="btn btn-success" id="" >อัพเดท</button>

                                      </div>
                                       </form>
                                    </div>
                                  </div>
                                </div>





                    <!-- Modal Del -->
                    <div class="modal fade" id="ModalDel<?php echo $rs->li_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> คุณต้องการลบข้อมุล..</h5>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <a class="btn btn-danger" href="<?php  echo site_url('license/delete_data/').$rs->li_id;?>">ยืนยัน</a>
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