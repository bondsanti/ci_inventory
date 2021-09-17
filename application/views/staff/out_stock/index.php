
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รายการ <small class="text-muted">ใกล้หมด</small></h1>
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
                      <a href="<?php echo base_url('out_stock/export_data');?>" target="_blank" role="button" class="btn btn-dark btn-create"><i class="fas fa-file-excel"></i> Export Excel </a> 

                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-hover table-striped projects table-bordered">
                    <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>รหัสทะเบียน</th>
                      <th>รูป</th>
                      <th>ชื่อ</th>
                      <th>จำนวน</th>
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

                     if ($rs->mat_reg_qty_stock == 0) {
                        $Status_stock='<span class="badge badge-danger">Out Stock</span>';
        
                      }else if ($rs->mat_reg_qty_stock <= $rs->mat_reg_qty_limit) {

                        $Status_stock='<span class="badge badge-warning">Warning Stock</span>';
                      }else{

                        $Status_stock='<span class="badge badge-success">In Stock</span>';

                      } 

                        ?>

                      <tr>
                      <td class="text-center"><?php echo $i;?></td>
                      <td class="text-center">
                          <a>
                          <?php echo $rs->mat_reg_code;?>
                          </a>
                          <br/>
                          <small>
                             
                          </small>
                       </td>
                       <td class="text-center"> 
                        <ul class="list-inline">
                              
                              <li class="list-inline-item">
                                  <img alt="" class="table-avatar" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>">
                          
                              </li>
                          
                          </ul>
                      </td>
                        <td>
                          <a>
                          <?php echo $rs->mat_reg_name;?>
                          </a>
                          <br/>
                          <small>
                               <?php echo $rs->mat_name;?>
                          </small>
                       </td>
                        <td class="text-center">
                          <a>
                          <?php echo "<b>".$rs->mat_reg_qty_stock."</b> ".$rs->u_name;?>
                          </a>
                          <br/>
                          <small>
                            <?php echo "<b>สถานะ</b>: ".$Status_stock;?>
                          </small>
                       </td>

                      <td class="text-center">
                       
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $rs->mat_reg_id;?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                       </button>

                      </td>
                    </tr>
                    




                    <!-- Modal detail -->
                    <div class="modal fade" id="detailModal<?php echo $rs->mat_reg_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Information! <code><?php echo $rs->mat_reg_name;?></code></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <center><img class="" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" width="180px" alt="">
                              </center>
                                          <p><b>เลขทะเบียนวัสดุ</b> : <code><?php echo $rs->mat_reg_code;?></code>
                                            <br>
                                            <b>ประเภทวัสดุ</b> : <code><?php echo $rs->mat_name;?></code>
                                             <br>
                                           
                                             <br>
                                            <b>วันที่ลงทะเบียน</b> : <code><?php echo $rs->mat_reg_date;?></code>
                                               <br>
                                               <hr>
                                            <b class="text-success">จำนวน In stock</b> : <font size="5"><b><?php echo $rs->mat_reg_qty_stock;?></b></font> <?php echo $rs->u_name;?>
                                             <br>
                                            <b class="text-danger">จำนวนแจ้งเตือน ใกล้หมด</b> :<font size="5"><b><?php echo $rs->mat_reg_qty_limit;?></b></font> <?php echo $rs->u_name;?>

                                          </p>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
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