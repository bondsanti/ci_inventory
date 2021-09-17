  

  <!-- Modal Add -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('material_reg/insert_data');?>" method="post" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" required>

                               <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>ประเภทวัสดุ</label>
                                       <select class="form-control" name="mat_id" required>
                                        <option value="">เลือก</option>
                                        <?php foreach($Query_mat as $rs){ 
                                          ?>
                                        <option value="<?php echo $rs->mat_id;?>"><?php echo $rs->mat_code.' ('.$rs->mat_name.')';?></option>
                                        <?php }?>

                                      </select>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>*เลขทะเบียนวัสดุ</label>
                                      <input type="text" class="form-control" name="mat_reg_code" autocomplete="off" placeholder="กรอก เลขทะเบียนวัสดุ" required>
                                      
                                    </div>
                                  </div>
                                </div>

                               <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>ชื่อวัสดุ</label>
                                       <input type="text" class="form-control" name="mat_reg_name" autocomplete="off" placeholder="กรอก ชื่อวัสดุ" required>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>หน่วยนับ</label>
                                       <select class="form-control" name="u_id" required>
                                        <option value="">เลือก</option>
                                        <?php foreach($Query_unit as $rs){ 

                                          ?>
                                        <option value="<?php echo $rs->u_id;?>"><?php echo $rs->u_name;?></option>
                                        <?php }?>

                                      </select>
                                      
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>จำนวน <font class="text-success">In stock</font></label>
                          <input type="text" class="form-control" name="mat_reg_qty_stock" autocomplete="off" placeholder="กรอก จำนวน" required>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>จำนวน <font class="text-danger">Out stock</font><sup>(จำนวนที่ให้ระบบเตือน)</sup></label>
                          <input type="text" class="form-control" name="mat_reg_qty_limit" autocomplete="off" placeholder="กรอก จำนวน" required>
                                    </div>
                                  </div>
                                </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>รายละเอียด</label>
                        <textarea class="form-control" rows="3" name="mat_reg_detail" autocomplete="off" placeholder="กรอกรายละเอียดวัสดุ ..."></textarea>
                                    </div>
                                  </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                          <label>รูปภาพ</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" accept="image/*" name="mat_reg_img" value="">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                                    </div>
                                  </div>

                                </div>

                              </div>
                              <div class="modal-footer">
                             
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ออก</button>
                                <button type="submit" class="btn btn-success" id="add" >บันทึก</button>

                              </div>
                            </form>
                            </div>
                          </div>
                        </div> 
                  