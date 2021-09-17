
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รายงานการ <small class="text-muted">เบิก-จ่าย</small></h1>
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
                  <h3 class="card-title">เลือกช่วงวันที่</h3>
                </div>
                 <form role="form" action="<?php echo base_url('report/search');?>" method="post"  id="form" enctype="multipart/form-data">
                <div class="card-body">


         
                         

                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>วันที่เริ่มเต้น</label>
                                         <input type="date" class="form-control" name="dateStart" autocomplete="off" required>
                                  </div>
                                 </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>วันที่สิ้นสุด</label>
                                      <input type="date" class="form-control" name="dateEnd" autocomplete="off" required>
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