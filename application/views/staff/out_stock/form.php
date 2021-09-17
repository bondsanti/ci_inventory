  

  <!-- Modal Add -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('material_stock/insert_data');?>" method="post" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" required>

                               <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>ค้นหา ทะเบียน วัสดุ</label>
                                        <select class="form-control select2bs4" name="mat_reg_id" style="width: 100%;">
                                        <option value="">เลือก</option>
                                        <?php foreach($Query_mat_reg as $rs){ 
                                          ?>
                                        <option value="<?php echo $rs->mat_reg_id;?>"><?php echo $rs->mat_reg_code.' ('.$rs->mat_reg_name.')';?></option>
                                        <?php }?>

                                      </select>
                                    </div>
                                  </div>

                                </div>

                               <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Invoice NO.</label>
                                      <input type="text" class="form-control" name="mat_ins_invoice" autocomplete="off" placeholder="กรอก หมายเลขสั่งซื้อ" required>
                                  </div>
                                  </div>
                                     <div class="col-sm-6">
                                      <div class="form-group">

                                        <label>จำนวน <font class="text-success">In stock</font></label>
                                          <input type="text" class="form-control" name="mat_ins_stock" autocomplete="off" placeholder="กรอก จำนวน" required>

                                        
                                      </div>
                                  </div>
                                </div>


                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>รายละเอียด</label>
                        <textarea class="form-control" rows="3" name="mat_ins_remark" autocomplete="off" placeholder="กรอกรายละเอียด"></textarea>
                                    </div>
                                  </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                          <label>รูปภาพ *Invoice</label>
                          
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" accept="image/*" name="mat_ins_img" value="">
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
                  