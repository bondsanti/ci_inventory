  <!-- Modal Add -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('member/insert_data');?>" method="post"  id="form" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มบุคลากร</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                               
                 <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ชื่อ หน่วยงาน/บริษัท</label>
                        <input type="text" class="form-control" name="member_gov" value="<?php echo set_value('member_gov'); ?>"  placeholder="กรอก ชื่อหน่วยงาน/บริษัท" autocomplete="off" required>
                        
                      </div>
                      <span class="fr"><?php echo form_error('member_gov'); ?></span>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>แผนก</label>
                        <input type="text" class="form-control" name="member_dep" value="<?php echo set_value('member_dep'); ?>" placeholder="กรอก แผนก" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('member_dep'); ?></span>
                    </div>
                      <div class="col-sm-3">
                      <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <input type="text" class="form-control" name="member_position" value="<?php echo set_value('member_position'); ?>" placeholder="กรอก ตำแหน่ง" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('member_position'); ?></span>
                    </div>
                    
                    
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>คำนำหน้า</label>
                         <select class="form-control" name="mem_sex" required>
                          <option value="">เลือก</option>
                          <option value="นาย">นาย</option>
                          <option value="นาง">นาง</option>
                          <option value="นางสาว">นางสาว</option>
                        
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>รหัสประจำตัว พนักงาน</label>
                        <input type="text" class="form-control" name="mem_code" value="<?php echo set_value('mem_code'); ?>" placeholder="กรอก รหัสประจำตัว พนักงาน" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_code'); ?></span>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>ชื่อ</label>
                        <input type="text" class="form-control" name="mem_fname" value="<?php echo set_value('mem_fname'); ?>" placeholder="กรอก ชื่อ" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_fname'); ?></span>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label>นามสกุล</label>
                        <input type="text" class="form-control" name="mem_lname" value="<?php echo set_value('mem_lname'); ?>" placeholder="กรอก นามสกุล" autocomplete="off" required>
                         <span class="fr"><?php echo form_error('mem_lname'); ?></span>
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" class="form-control" name="mem_tel" value="<?php echo set_value('mem_tel'); ?>" placeholder="กรอก เบอร์โทรศัพท์" autocomplete="off" maxlength="10" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_tel'); ?></span>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="mem_email" value="<?php echo set_value('mem_email'); ?>" placeholder="กรอก Email" autocomplete="off" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_email'); ?></span>

                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Username</label>
                        <input type="text" class="form-control" name="mem_username" value="<?php echo set_value('mem_username'); ?>" placeholder="กรอก Username" autocomplete="off" minlength="8"  required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_username'); ?></span>
                    </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label class="text-danger">*Password</label>
                        <input type="password" class="form-control" name="mem_password" value="<?php echo set_value('mem_password'); ?>" placeholder="กรอก Password" autocomplete="off" minlength="8" required>
                      </div>
                      <span class="fr"><?php echo form_error('mem_password'); ?></span>
                    </div>
                  </div>


                 

                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>รูปภาพ</label>
                                      
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" accept="image/*" name="mem_img" value="" required>
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                       
                                  </div>
                                 </div>
                                <div class="col-sm-6">
                                  <!-- select -->
                                  <div class="form-group">
                                    <label>สิทธิใช้งานระบบ</label>
                                    <select class="form-control" name="lev_id" required>
                                      <option value="">เลือก</option>
                                      <?php foreach($Query_posi as $rsl){ 

                                        ?>
                                      <option value="<?php echo $rsl->lev_id;?>"><?php echo $rsl->lev_name;?></option>
                                      <?php }?>

                                    </select>
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
                  