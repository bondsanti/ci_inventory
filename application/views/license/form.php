  

  <!-- Modal Add -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('license/insert_data');?>" method="post" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ลงทะเบียนใช้งาน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden"  class="form-control" name="member_id" value="<?php echo $mem_id;?>" autocomplete="off" required>

                               <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>วันที่เริ่ม</label>
                                      <input type="date"  class="form-control" name="license_start" value="" placeholder="วันที่เริ่ม" autocomplete="off" required>
                                      
                                    </div>
                                   
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>วันที่สิ้นสุด</label>
                                      <input type="date" class="form-control" name="license_end" value="" placeholder="วันที่สิ้นสุด" autocomplete="off" required>
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
                  