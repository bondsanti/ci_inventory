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
              <div class="card card-green">
                <div class="card-header">
                  <h3 class="card-title"><i class="far fa-list-alt"></i> ตารางข้อมูล </h3>



                  <div class="card-tools">
                    <a href="<?php  echo site_url('member/add/');?>" type="button" class="btn btn-sm btn-tool btn-warning"><i class="fas fa-plus-square"></i> เพิ่มข้อมูล
                    </a>
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

                        if ($rs->posi_level=='A') {
                          $posi_level='<span class="badge badge-primary">'.$rs->posi_name.'</span>';
                        } else if ($rs->posi_level=='B'){
                          $posi_level='<span class="badge badge-danger">'.$rs->posi_name.'</span>';
                        } else if ($rs->posi_level=='C'){
                          $posi_level='<span class="badge badge-info">'.$rs->posi_name.'</span>';
                        } else if ($rs->posi_level=='D'){
                          $posi_level='<span class="badge badge-warning">'.$rs->posi_name.'</span>';
                        }
                                      
              



                        ?>

                      <tr class="text-center">
                      <td><?php echo $i;?></td>
                      <td><?php echo $rs->mem_code;?></td>
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
                             <b>สิทธิ์การใช้งาน</b> : <?php echo $posi_level;?>
                          </small>

                        </td>
              <td>
                        
                        <a>
                          <?php echo $rs->member_gov;?>
                              
                          </a>
                          <br/>
                          <small>
                             <b>หน่วยงาน</b> :<?php echo $rs->member_dep;?>
                          </small>

                      </td>


                      <td>
                       <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Modalpass<?php echo $rs->mem_id;?>">
                        <i class="nav-icon fas fa-info-circle"></i> ดูข้อมูล
                       </button>

                       <a class="btn btn-sm btn-secondary" href="<?php  echo site_url('member/edit_pwd/').$rs->mem_id;?>"><i class="nav-icon fas fa-key"></i> Reset PWD.</a>

                        <a class="btn btn-sm btn-warning" href="<?php  echo site_url('member/edit_data/').$rs->mem_id;?>"><i class="nav-icon fas fa-edit"></i> Edit</a>

                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal<?php echo $rs->mem_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i> Del
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