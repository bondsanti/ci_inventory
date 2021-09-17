  

  <!-- Modal Add -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('material/insert_data');?>" method="post" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              

                               <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>รหัสประเภท</label>
                                      <input type="text"  class="form-control" name="mat_code" value="" placeholder="รหัสประเภท" autocomplete="off" required>
                                      
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>ชื่อประเภท</label>
                                      <input type="text"  class="form-control" name="mat_name" value="" placeholder="ชื่อประเภท" autocomplete="off" required>
                                      
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
                  