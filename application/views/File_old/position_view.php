<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">ตำแหน่งและสิทธิการใช้งาน</small></h1>
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
                  <h3 class="card-title">ตารางข้อมูล </h3>



                  <div class="card-tools">
                    <a href="<?php  echo site_url('position/insert_data/');?>" type="button" class="btn btn-sm btn-tool btn-warning"><i class="fas fa-plus-square"></i> เพิ่มข้อมูล
                    </a>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table id="example1" class="table table-hover table-striped projects">
                    <thead>
                    <tr class="text-center info">
                      <th>#ID</th>
                      <th>ตำแหน่ง</th>
                      <th>สิทธิการใช้งานระบบ</th>
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

                        if ($rs->posi_level=='A') {
                          $posi_level='<h5><span class="badge badge-dark">Admin FGS.</span></h5>';
                        } else if ($rs->posi_level=='B'){
                          $posi_level='<h5><span class="badge badge-dark">Administartor</span></h5>';
                        } else if ($rs->posi_level=='C'){
                          $posi_level='<h5><span class="badge badge-info">Staff</span></h5>';
                        } else if ($rs->posi_level=='D'){
                          $posi_level='<h5><span class="badge badge-secondary">User</span></h5>';
                        }
                                      
              



                        ?>

                      <tr class="text-center">
                      <td><?php echo $rs->posi_id;?></td>
                      <td><?php echo $rs->posi_name;?></td>
                      <td><?php echo $posi_level;?></td>
                      <td>
                      
                        <a class="btn btn-sm btn-warning" href="<?php  echo site_url('position/edit_data/').$rs->posi_id;?>"><i class="nav-icon fas fa-edit"></i> Edit</a>

                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal<?php echo $rs->posi_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i> Del
                       </button>



                      </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal<?php echo $rs->posi_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                           <p>ตำแหน่ง <b><?php echo $rs->posi_gov_name;?></b> หรือไม่?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <a class="btn btn-danger" href="<?php  echo site_url('position/delete_data/').$rs->posi_id;?>">ยืนยัน</a>
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