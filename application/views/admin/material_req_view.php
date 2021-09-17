<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">จัดการข้อมูล <small class="text-muted">การเบิกวัสดุ</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">เบิกวัสดุ</li>
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


            <div class="col-md-8">
              <div class="card card-lightblue">
                <div class="card-header">
                  <h3 class="card-title"><i class="far fa-list-alt"></i> รายการ วัสดุ-อุปกรณ์</h3>



                  <div class="card-tools">
                   
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-striped projects">
                    <thead>
                    <tr class="text-center info">
                      <th>#</th>
                      <th>รูป</th>
                      <th>ประเภท</th>
                      <th>ชื่อวัสดุ</th>
                      <th>จำนวน</th>
    
                      <th>เบิก</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        
                         $ip=$_SERVER['REMOTE_ADDR'];
                        
                         $i=0;

                      foreach ($Query as $rs)
                      { 
                        $i++; 






                       // echo '<pre>';
                       // print_r($rs);   
                       // echo '</pre>';
                       // exit;       

                    
                      if ($rs->mat_reg_qty_stock <= $rs->mat_reg_qty_limit) {
                        $stock='<font color="red"><b>'.$rs->mat_reg_qty_stock.'</b></font> '.$rs->u_name;
         
                      }else{
               $stock='<font color="green"><b>'.$rs->mat_reg_qty_stock.'</b></font> '.$rs->u_name;
                      }
                     
                      if ($rs->mat_reg_qty_stock == 0) {
                        
                          $status_stock='<span class="badge badge-danger">Out Stock</span>';
                      }else if($rs->mat_reg_qty_stock <= $rs->mat_reg_qty_limit){
                           $status_stock='<span class="badge badge-warning">Warning Stock</span>';
                      }else{
                           $status_stock='<span class="badge badge-success">In Stock</span>';
                      }


                        ?>

                      <tr class="text-center">
                        <td width="1%"><?php echo $i;?></td>
                       <td width="15%">
                  
                        <center>
                        <img width="20%" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" class="table-avatar">
                      </center>
                       
                       </td>

                       <td>
                         
                          <a> <?php echo $rs->mat_name;?> </a>
                          <br/>

                          <small>
                            รหัสประเภท : <?php echo $rs->mat_code;?>
                          </small>
                       </td>
                      
                      <td>
                        <a> <?php echo $rs->mat_reg_name;?> </a>
                          <br/>

                          <small>
                            เลขทะเบียน : <?php echo $rs->mat_reg_code;?>
                          </small>

                        </td>

                      <td>
                        <a><?php echo $stock;?></a>
                          <br/>

                          <small>
                           สถานะ <?php echo $status_stock;?>
                          </small>

                        </td>



                      <td>
                        <?php 
                      if ($rs->mat_reg_qty_stock == 0) {
                       echo' <button type="button" class="btn btn-secondary btn-sm disabled">
                        <i class="fas fa-times"></i> เบิก
                       </button>';
                     }else{ ?>


                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Modalpass<?php echo $rs->mat_reg_id;?>">
                        <i class="fas fa-check"></i> เบิก
                       </button>

                   <?php  }

                       ?>



                      </td>


                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="Modalpass<?php echo $rs->mat_reg_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">กรอกจำนวนที่ต้องการเบิก</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <center>
                              <img class="" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" width="180px" alt="">
                              <code>*<?php echo $rs->mat_reg_name;?></code>
                              </center>
                                       
                          <form role="form" action="<?php echo site_url('material_req/insert_data_basket');?>" method="post" enctype="multipart/form-data" data-ajax="false">

                          <input type="hidden" class="form-control" name="mat_reg_id" value="<?php echo $rs->mat_reg_id;?>" autocomplete="off">
                          <input type="hidden" class="form-control" name="b_ip" value="<?php echo $ip;?>" autocomplete="off">
                          <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" autocomplete="off">


                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">จำนวนเบิก</label>
                                   <input type="text" class="form-control" name="b_qty" id="b_qty" autocomplete="off" value="" onKeyUp="if(this.value><?php echo $rs->mat_reg_qty_stock;?>){alert('สินค้าใน Stock ไม่เพียงพอกรุณาป้อนจำนวนใหม่');this.value='';}
      if(this.value<1){alert('กรอกจำนวนไม่ถูกต้อง');this.value='';}if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" 
                                   placeholder="กรอก จำนวน" required autofocus>
                                  </div>   

                          </div>
                          <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> ออก</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> ตกลง</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>

                    
                  <?php    } ?>

                    </tbody>
                  </table>






                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->











            <div class="col-md-4">
              <div class="card card-outline card-lightblue">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-shopping-basket"></i> ตะกร้า รายการเบิก</h3>



                  <div class="card-tools">
                         <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#BasketCF">
                        <i class="fa fa-cart-arrow-down"></i> ยืนยันรายการ
                       </button>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-striped projects">
                    <thead>
                    <tr class="text-center info">
                      <th>#</th>
                      <th>รูป</th>

                      <th>ชื่อวัสดุ</th>
                      <th>จำนวน</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 

                         $i=0;

                      foreach ($Query_basket as $rs)
                      
                      { 

                         $i++;  



                       // echo '<pre>';
                       // print_r($Query_basket);   
                       // echo '</pre>';
 



                        ?>

                      <tr class="text-center">
                        <td width="1%"><?php echo $i;?></td>
                       <td width="15%">
                  
                        <center>
                        <img width="20%" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" class="table-avatar">
                      </center>
                       
                       </td>

                      
                      <td>
                        <a> <?php echo $rs->mat_reg_name;?> </a>
                          <br/>

                          <small>
                            เลขทะเบียน : <?php echo $rs->mat_reg_code;?>
                          </small>

                        </td>

                      <td>
                        <a><?php echo $rs->b_qty;?></a>
  


                        </td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit<?php echo $rs->b_id;?>"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalDel<?php echo $rs->b_id;?>"><i class="fas fa-trash"></i></button>
                      </div>
                    </td>



                    </tr>
                

                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $rs->b_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><font class="text-danger">แก้ไข</font> จำนวนที่ต้องการเบิก</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <center>
                              <img class="" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" width="180px" alt="">
                              <code>*<?php echo $rs->mat_reg_name;?></code>
                              </center>
                                       
                          <form role="form" action="<?php echo site_url('material_req/update_data');?>" method="post" enctype="multipart/form-data" data-ajax="false">

                          <input type="hidden" class="form-control" name="mat_reg_id" value="<?php echo $rs->mat_reg_id;?>" autocomplete="off">
                          <input type="hidden" class="form-control" name="b_ip" value="<?php echo $ip;?>" autocomplete="off">
                          <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" autocomplete="off">
                            <input type="hidden" class="form-control" name="b_id" value="<?php echo $rs->b_id;?>" autocomplete="off">


                                  <div class="form-group">
                                    <label for="message-text" class="col-form-label">จำนวนเบิก</label>
                                   <input type="text" class="form-control" name="b_qty" id="b_qty" autocomplete="off" value="<?php echo $rs->b_qty;?>" onKeyUp="if(this.value><?php echo $rs->mat_reg_qty_stock;?>){alert('สินค้าใน Stock ไม่เพียงพอกรุณาป้อนจำนวนใหม่');this.value='';}
      if(this.value<1){alert('กรอกจำนวนไม่ถูกต้อง');this.value='';}if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" 
                                   placeholder="กรอก จำนวน" required autofocus>
                                  </div>   

                          </div>
                          <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> ออก</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> ตกลง</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>




                    <!-- Modal Del -->
                    <div class="modal fade" id="ModalDel<?php echo $rs->b_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="icon fas fa-ban"></i> คุณต้องการลบรายการเบิก</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                      <form role="form" action="<?php  echo site_url('material_req/delete_data/').$rs->b_id;?>" method="post" enctype="multipart/form-data">
                          <div class="modal-body text-center">
                         <center><img class="" src="<?php echo base_url('img/supplies');?>/<?php echo $rs->mat_reg_img;?>" width="180px" alt="">
                              </center>
                           <p>เลขทะเบียน : <b><?php echo $rs->mat_reg_code;?></b></p>
                           <p><b><?php echo $rs->mat_reg_name.' <font color="green" size="5">'.$rs->b_qty.'</font> '.$rs->u_name;?></b></p>
                           <h5>ใช่หรือไม่?</h5>



                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <button type="submit" class="btn btn-danger">ยืนยัน</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>
                    
                  <?php 


                } ?>

                    </tbody>
                  </table>






                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->

<?php



$Y=date("Y")+543;
$cutYear=substr($Y,2,2);

// echo $cutYear;
// echo '<br>';

$Query= $this->db->query("SELECT mat_req_id from tbl_material_req");
$nrow=$Query->num_rows();

//print_r($nrow);

 if($nrow==0){
     $code=$cutYear."0001";
  }else{
    $Query2= $this->db->query("SELECT right(mat_req_id,4)+1 as newcode from tbl_material_req where substr(mat_req_id,1,2)='$cutYear' order by mat_req_id DESC Limit 1");


    foreach ($Query2->result_array() as $rs){
      //$code=$rs['mat_req_id'];
      $code=$cutYear.sprintf("%04d",$rs['newcode']);
    }



  }




?>


    <!-- Modal -->
                    <div class="modal fade" id="BasketCF" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ยืนยันรายการเบิก!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                               <div class="modal-body">

                                <form role="form" action="<?php echo site_url('material_req/insert_data_req');?>" method="post" enctype="multipart/form-data">
                                  
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">เลขที่ใบเบิก</label>
                                    <input type="text" class="form-control text-danger" name="mat_req_id" value="<?php echo $code;?>" autocomplete="off" readonly>
                                  </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">ค้นหา บุคลากร:</label>
                                    <select class="form-control select2bs4" name="mem_req_id" style="width: 100%;" required>
                                      <option value="">เลือก</option>
                                      <?php foreach($Query_mem as $rs){ 
                                        ?>
                                      <option value="<?php echo $rs->mem_id;?>"><?php echo $rs->mem_code.' '.$rs->mem_sex.$rs->mem_fname.' '.$rs->mem_lname;?></option>
                                      <?php }?>

                                    </select>
                                  </div>
  

                          <input type="hidden" class="form-control" name="b_ip" value="<?php echo $ip;?>" autocomplete="off">
                          <input type="hidden" class="form-control" name="mem_save_id" value="<?php echo $mem_id;?>" autocomplete="off">
                            <input type="hidden" class="form-control" name="mat_req_statas" value="1" autocomplete="off">

                                
                              </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>

                            </form>
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