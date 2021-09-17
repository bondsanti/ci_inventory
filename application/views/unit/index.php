
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการ <small class="text-muted">หน่วยนับ</small></h1>
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
                      <a href="" role="button" class="btn btn-dark btn-create" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-square"></i> เพิ่มข้อมูล </a> 
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-striped projects table-bordered">
                    <thead>
                    <tr class="text-center">
                      <th>#</th>

                       <th>หน่วยนับ</th>

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

                        ?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="text-center"><?php echo $rs->u_name;?></td>

                      <td class="text-center">

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $rs->u_id;?>">
                        <i class="nav-icon fas fa-edit"></i>
                       </button>


                       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalDel<?php echo $rs->u_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i>
                       </button>



                      </td>
                    </tr>
                    
                  <!-- Modal Edit -->
                        <div class="modal fade" id="editModal<?php  echo $rs->u_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('unit/update_data');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               <input type="hidden"name="u_id" value="<?php echo $rs->u_id;?>">
                              
                                
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>ชื่อหน่วยนับ</label>
                                      <input type="text"  class="form-control text-danger" name="u_name" value="<?php  echo $rs->u_name;?>" placeholder="หน่วยนับ" autocomplete="off" required>
                                      
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
                    <div class="modal fade" id="ModalDel<?php echo $rs->u_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <a class="btn btn-danger" href="<?php  echo site_url('unit/delete_data/').$rs->u_id;?>">ยืนยัน</a>
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