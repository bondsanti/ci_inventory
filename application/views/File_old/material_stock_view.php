<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รับเข้า <small class="text-muted">วัสดุ</small></h1>
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
                  <h3 class="card-title">ตารางข้อมูล</h3>



                  <div class="card-tools">
                    <a href="<?php  echo site_url('material_stock/insert_data/');?>" type="button" class="btn btn-sm btn-tool btn-warning">
                      <i class="fas fa-plus-square"></i> เพิ่มข้อมูล
                    </a>

                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr class="text-center info">
                      <th>ลำดับ</th>
                      <th>วัน/เวลารับเข้า</th>
                      <th>Invoice</th>
                      <th>เลขทะเบียนวัสดุ</th>
                      <th>ประเภทวัสดุ</th>
                      <th>ชื่อวัสดุ</th>
                      <th>จำนวน <sup class="text-success">รับเข้า</sup></th>
                      <th>จำนวน <sup class="">ทั้งหมด</sup></th>
                      <th>ผู้บันทึกข้อมูล</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 


                      $i=0;
                     foreach ($Query_stock as $rs) 
                      { 
                       // echo '<pre>';
                       // print_r($rs);   
                       // echo '</pre>';
                       // exit;   

                              $i++;    

                        $stock_in='<h5> <font color="green"><b>+'.$rs->mat_ins_stock.'</b></font> '.$rs->u_name.'</h5>';
                        $stock_all='<h5> <font color="green"><b>'.$rs->mat_reg_qty_stock.'</b></font> '.$rs->u_name.'</h5>';
         
                        $newDate = date("d-m-Y H:i", strtotime($rs->mat_reg_date));

                        ?>

                      <tr class="text-center">
                      
                      <td><?php echo $i;?></td>
                      <td><?php echo $newDate;?></td>
                      <td><a href="<?php echo base_url('img/invoice');?>/<?php echo $rs->mat_ins_img;?>"><?php echo $rs->mat_ins_invoice;?></a></td>
                      <td><?php echo $rs->mat_reg_code;?></td>

                      <td><?php echo $rs->mat_name;?></td>
                      
                      <td><?php echo $rs->mat_reg_name;?></td>

                      <td><?php echo $stock_in;?></td>
                       <td><?php echo $stock_all;?></td>

                      <td><?php echo $rs->mem_fname.' '.$rs->mem_lname;?></td>
                      <td>
                       


                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Modal<?php echo $rs->mat_ins_id;?>">
                        <i class="nav-icon fas fa-trash-alt"></i> Del
                       </button>



                      </td>
                    </tr>


                    <!-- Modal -->
                    <div class="modal fade" id="Modal<?php echo $rs->mat_ins_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ALERTS!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                       <form role="form" action="<?php  echo site_url('material_stock/delete_data/').$rs->mat_ins_id;?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body text-center">
                            <h5 class="text-danger"><i class="icon fas fa-ban"></i> คุณต้องการลบข้อมูล</h5>
                            <h5>Invoice <b class="text-info"><?php echo $rs->mat_ins_invoice;?></b></h5>
                           <p>เลขทะเบียน : <b><?php echo $rs->mat_reg_code.' ('.$rs->mat_reg_name.') ';?></b></p>
                           <p>จำนวนรับเข้า : <b><?php echo $rs->mat_ins_stock.' '.$rs->u_name;?></b></p>
                           <h5>ใช่หรือไม่?</h5>


                           <input type="hidden" name="mat_ins_stock" value="<?php echo $rs->mat_ins_stock;?>">

                           <input type="hidden" name="mat_reg_id" value="<?php echo $rs->mat_reg_id;?>">
                          <input type="hidden" name="mat_ins_id" value="<?php echo $rs->mat_ins_id;?>">

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <button type="submit" class="btn btn-danger">ยืนยัน</button>
                          </div>
                        </form>
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