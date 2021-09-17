  

  <!-- Modal Add -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form role="form" action="<?php echo base_url('guarantee/insert_data');?>" method="post" enctype="multipart/form-data">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                          <input type="hidden" class="form-control" name="mem_id" value="<?php echo $mem_id;?>" required>
                          <input type="hidden" class="form-control" name="status_credit" value="1" required>

                              <div class="modal-body">
                                <h5 class="text-danger">ข้อมูลสัญญาจ้าง</h5>
                             
                               <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>ชื่อโครงการ</label>
                                      <input type="text" class="form-control" name="project_name" autocomplete="off" placeholder="ชื่อโครงการ" required>
                                    </div>
                                  </div>
                                </div>

                               <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>เลขที่สัญญา</label>
                                      <input type="text" class="form-control" name="contract_no" autocomplete="off" placeholder="เลขที่สัญญา" required>
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ลงวันที่สัญญา</label>
                                      <input type="date" class="form-control" name="contract_date" autocomplete="off" placeholder="ลงวันที่สัญญา" required>
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>สัญญาวงเงิน</label>
                                      <input type="text" class="form-control" name="credit_limit" autocomplete="off" placeholder="สัญญาวงเงิน" required>
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ชื่อผู้รับจ้าง</label>
                                      <input type="text" class="form-control" name="contract_name" autocomplete="off" placeholder="ชื่อผู้รับจ้าง" required>
                                      
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                 <h5 class="text-primary">ข้อมูลหนังสือหลักประกัน</h5>
                               <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ธนาคาร</label>
                                      <select class="form-control" name="main_bookbank">
                                        <option value="">เลือก ธนาคาร</option>

                                        <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                         <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                         <option value="ธนาคารกรุงศรี">ธนาคารกรุงศรี</option>
                                         <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                         <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                         <option value="ธนาคารไทยพานิชย์">ธนาคารไทยพาณิชย์</option>
                                         <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                                         <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                                      </select>

                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>สาขา</label>
                                        <input type="text" class="form-control" name="sub_bookbank" autocomplete="off" placeholder="สาขา">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วงเงิน</label>
                                        <input type="text" class="form-control" name="credit_bookbank" autocomplete="off" placeholder="วงเงินค้ำประกัน">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>ระยะเวลา</label>
                                        <input type="text" class="form-control" name="duration_bookbank" autocomplete="off" placeholder="ระยะเวลาค้ำประกัน">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>ประเภทหลักค้ำประกัน</label>
                                      <select class="form-control" name="status_type">
                                        <option value="">เลือก</option>

                                        <option value="หลักค้ำปกติ">หลักค้ำปกติ</option>
                                         <option value="หลักค้ำ15%(เบิกล่วงหน้า)">หลักค้ำ15%(เบิกล่วงหน้า)</option>
                                         <option value="หลักค้ำเงินสด">หลักค้ำเงินสด</option>

                                      </select>
                                    </div>
                                  </div>
                                     <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>ปีงบประมาณ หลักค้ำ</label>
                                      <select class="form-control" name="year">
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
                                </div>
                                <hr>
                               <div class="row">
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่มอบส่งงาน</label>
                                      <input type="date" class="form-control" name="checkin_date" autocomplete="off" placeholder="">
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่กำหนดคืนหลักค้ำ</label>
                                      <input type="date" class="form-control" name="enddate_bookbank" autocomplete="off" placeholder="">
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่แจ้งตรวจสภาพงาน</label>
                                      <input type="date" class="form-control" name="inspect_date" autocomplete="off" placeholder="">
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                    <div class="form-group">
                                      <label>วันที่คืนหลังค้ำ</label>
                                      <input type="date" class="form-control" name="checkout_date" autocomplete="off" placeholder="">
                                      
                                    </div>
                                  </div>
                                </div>

                               <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>หมายเหตุ</label>
                                       <textarea class="form-control" rows="3" name="remaek" autocomplete="off" placeholder="หมายเหตุ"></textarea>
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
                  