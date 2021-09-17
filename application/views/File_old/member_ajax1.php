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
                    <button class="btn btn-primary btn-sm" onclick="addMember()"><i class="glyphicon glyphicon-plus"></i> เพิ่ม สมาชิก</button>
                    </a>
                  </div>
                  <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table" class="table table-hover table-striped projects">
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
                     
                      </tbody>
                  </table>


<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              Add member
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                      <div class="form-group">
                          <div class="col-md-12">
                              <input name="estu_id" class="form-control" type="text">
                              <span class="help-block"></span>
                          </div>
                      </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input name="estu_nombre" placeholder="Student name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Lastname</label>
                            <div class="col-md-9">
                                <input name="estu_apellido" placeholder="Student lastname" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">DNI</label>
                            <div class="col-md-9">
                                <input name="estu_cedula" placeholder="DNI" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Course</label>
                            <div class="col-md-9">
                                <select name="carr_nombre" class="form-control">
                                    <option value="">--Select course--</option>
                                    <?php
                                    foreach($list as $value){
                                      echo '<option value="'.$value->carr_id.'">'.$value->carr_nombre.'</option>';
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


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
