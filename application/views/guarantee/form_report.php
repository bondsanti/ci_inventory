
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รายงาน <small class="text-muted">หลักค้ำประกันสัญญา</small></h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

         <div class="row">

            <div class="col-md-3">
            </div>

            <div class="col-md-6">


              <div class="card card-primary">
                
                <div class="card-header">
                              
                        <a href="<?php echo base_url('guarantee_report');?>" type="button" class="btn btn-success">รายงานเลือก <u><b>ช่วงวันที่</b></u></a>
                      <!--   <a href="<?php echo base_url('guarantee_report/month');?>" type="button" class="btn btn-secondary">รายงานเลือก <u><b>เดือน</b></u></a>
                        <a href="<?php echo base_url('guarantee_report/year');?>" type="button" class="btn btn-secondary">รายงานเลือก <u><b>ปี</b></u></a> -->
        
                </div>
                 <form role="form" action="<?php echo base_url('guarantee_report/getday');?>" method="post"  id="form" enctype="multipart/form-data">
                <div class="card-body">


         
                         

                              <div class="row">
                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>วันที่เริ่มต้น</label>
                                         <input type="date" class="form-control is-warning" name="dateStart" autocomplete="off" required>
                                  </div>
                                 </div>
                                <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>วันที่สิ้นสุด</label>
                                      <input type="date" class="form-control is-warning" name="dateEnd" autocomplete="off" required>
                                  </div>
                                </div>
                                 <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>งบประมาณปี</label>
                                       <select class="form-control is-warning" name="year" required>
                                       
                                        <option value="">เลือก</option>
                                        <?php
                                        $year=date("Y");
                                        //$Tyear=date("Y")+543;

                                        for ($y=2012; $y <=$year+1 ; $y++) { 
                                          

                                        ?>

                                         <option value="<?php echo $y;?>">ปี <?php echo $y;?> / <?php echo $Tyear=date($y+543);?></option>

                                       <?php } ?>

                                      </select>
                                  </div>
                                </div>
                              <div class="col-sm-3">
                                  <div class="form-group">
                                    <label>สถานะหลักค้ำ</label>
                                      <select class="form-control is-warning" name="status_credit" required>
                                        <option value="">เลือก</option>
                                        <option value="1">ยังไม่ครบคืน</option>
                                        <option value="2">คืนหลักค้ำแล้ว</option>
                                         <option value="3">แจ้งแล้ว/รอตอบกลับ</option>
                                         <option value="4">อยู่ระหว่างซ่อมแซม</option>

                                      </select>
                                  </div>
                                </div>
                              </div>


                  </div>

                           <div class="card-footer"><center>
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                            
                            </center>
                          </div>
                             </form>
                          
                </div>
           
              </div>
            </div>

          </div>
        <!-- /.row -->
        
      
      </div>
    </section>

 
  </div>
  <!-- /.content-wrapper -->