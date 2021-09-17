<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ประวัติ <small class="text-muted">การเบิก</small></h1>
          </div><!-- /.col -->
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
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
              <div class="card card-lightblue">
                <div class="card-header">
                  <h3 class="card-title">รายการ ขอเบิกวัสดุ</h3>



                  <div class="card-tools">
                   

                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-hover table-striped projects">
                    <thead>
                    <tr class="text-center info">
                      <th style="width: 1%">#</th>
                      <th style="width: 20%">ใบเบิก</th>
                      <th>ผู้ขอเบิก</th>
                      <th>ผู้บันทึกข้อมูล</th>
                      <th>สถานะ</th>

                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 


                      $i=0;
                     foreach ($Query as $rs) 
                      { 
                       // echo '<pre>';
                       // print_r($rs);   
                       // echo '</pre>';
                       // exit;   

                              $i++;    
                      $newDate = date("d-m-Y H:i", strtotime($rs->mat_req_date));

                                            if ($rs->mat_req_statas == 1) {
                        
                          $status='<span class="badge badge-warning"><i class="nav-icon fas fa-sync-alt"></i> รออนุมัติ</span>';
                      }else if($rs->mat_req_statas==2){
                           $status='<span class="badge badge-success"><i class="nav-icon fas fa-user-check"></i> อนุมัติแล้ว</span>';
                      }else{
                           $status='<span class="badge badge-danger"><i class="nav-icon fas fa-user-times"></i> ไม่อนุมัติ</span>';
                      }



                        ?>

                      <tr class="text-center">
                       <td><?php echo $i;?></td>
                      <td>
                        <a>
                         เลขที่ <b><?php echo $rs->mat_req_id;?></b>
                          </a>
                          <br/>
                          <small>
                              <?php echo $newDate;?>
                          </small>
                        </td>


                      <td>
                        <a>
                         <?php echo $rs->mem_sex.' '.$rs->mem_fname.' '.$rs->mem_lname;?>
                          </a>
                          <br/>
                          <small>
                              แผนก <?php echo $rs->member_dep;?>
                          </small>






                        </td>

                      <td><?php echo $rs->sex1.' '.$rs->fname1.' '.$rs->lname1;?></td>
                       
                       <td><?php echo $status;?></td>


                      <td>
                  

                 <a href="<?php  echo site_url('material_history/genpdf/').$rs->mat_req_id;?>" target="_blank" type="button" class="btn btn-success btn-sm">
                  <i class="fas fa-print"></i> พิมพ์เอกสาร</a>
                    






                      </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalDel<?php echo $rs->mat_req_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                           <p>ชื่อหน่วยรับ <b><?php echo $rs->mat_req_id;?></b> หรือไม่?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <a class="btn btn-danger" href="<?php  echo site_url('material_approve/delete_data_list/').$rs->mat_req_id;?>">ยืนยัน</a>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php }  ?>




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