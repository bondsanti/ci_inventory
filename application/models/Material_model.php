<?php
class Material_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 
      //*********************************************//
      //               Query ประเภทวัสดุ               //


    public function insert_material()//ประเภทวัสดุ
        {

                            $data = array(

                                    'mat_code'=>$this->input->post('mat_code'),
                                    'mat_name'=>$this->input->post('mat_name')
                            );

                            $Query=$this->db->insert('tbl_material',$data);

        }


    public function update_material()//แก้ไขประเภท
        {

                            $data = array(

                                    'mat_code'=>$this->input->post('mat_code'),
                                    'mat_name'=>$this->input->post('mat_name')
                            );

                            

                            $this->db->where('mat_id',$this->input->post('mat_id'));  
                            $Query=$this->db->update('tbl_material',$data);    
          
        }

    public function delete_material($mat_id)//ลบรายการประเภทวัสดุ
        {
               
        $this->db->delete('tbl_material',array('mat_id'=>$mat_id));

        }


   public function list_material()//ตาราง ประเภท
    {
      
                $this->db->select('*');
                $this->db->from('tbl_material');
                $this->db->order_by('tbl_material.mat_id','DESC');
                $Query=$this->db->get();
                return $Query->result();
 
    }






      //              eEnd                            //
      //*********************************************//


      //*********************************************//
      //               Query ทะเบียนวัสดุ               //

    public function insert_material_reg()
        {


                          $config['upload_path']='./img/supplies/'; //ที่อยู่เก็บรูปภาพ
                          $config['allowed_types']='gif|jpg|png';//กำหนดชนิดไฟล์
                          $config['max_size']='2000';
                          $config['max_width']='3000';
                          $config['max_height']='3000';
                          $config['encrypt_name']= TRUE;

                          $this->load->library('upload',$config);
                                  if (! $this->upload->do_upload('mat_reg_img')) { //ชื่อฟิลด์
                                         echo $this->upload->display_errors();
                                  }else {
                                          $data= $this->upload->data();
                                          //print_r($data);
                                          $filename=$data['file_name'];
                                                  

                                              $data = array(

                                                      'mat_reg_code'=>$this->input->post('mat_reg_code'),
                                                      'mat_reg_name'=>$this->input->post('mat_reg_name'),
                                                      'mat_reg_detail'=>$this->input->post('mat_reg_detail'),
                                                      'mat_reg_img'=>$filename,
                                                      'mat_reg_qty_stock'=>$this->input->post('mat_reg_qty_stock'),
                                                      'mat_reg_qty_limit'=>$this->input->post('mat_reg_qty_limit'),
                                                      'u_id'=>$this->input->post('u_id'),
                                                      'mat_id'=>$this->input->post('mat_id'),
                                                      'mat_reg_date'=>$this->input->post('mat_reg_date'),
                                                      'mem_id'=>$this->input->post('mem_id')

                                              );

                                              $Query=$this->db->insert('tbl_material_reg',$data);


                                  }
                 
                   
        }

 public function update_material_reg()//แก้ไขข้อมูล
        {

              


                $config['upload_path']='./img/supplies/'; //ที่อยู่เก็บรูปภาพ
                $config['allowed_types']='gif|jpg|png';//กำหนดชนิดไฟล์
                $config['max_size']='2000';
                $config['max_width']='3000';
                $config['max_height']='3000';
                $config['encrypt_name']= TRUE;

                $this->load->library('upload',$config);



                        if (!$this->upload->do_upload('mat_reg_img')) 
                        { 

                           $file_name1=$this->input->post('mat_reg_img_old');
                          
                           $data = array(

                   
                                    'mat_reg_code'=>$this->input->post('mat_reg_code'),
                                    'mat_reg_name'=>$this->input->post('mat_reg_name'),
                                    'mat_reg_detail'=>$this->input->post('mat_reg_detail'),
                                    'mat_reg_img'=>$file_name1,
                                    'mat_reg_qty_stock'=>$this->input->post('mat_reg_qty_stock'),
                                    'mat_reg_qty_limit'=>$this->input->post('mat_reg_qty_limit'),
                                    'u_id'=>$this->input->post('u_id'),
                                    'mat_id'=>$this->input->post('mat_id'),
                                    'mat_reg_date'=>$this->input->post('mat_reg_date'),
                                    'mem_id'=>$this->input->post('mem_id')
                                );

                                

                                $this->db->where('mat_reg_id',$this->input->post('mat_reg_id'));  
                                $Query=$this->db->update('tbl_material_reg',$data);    





                              //echo $this->upload->display_errors();
                              $error = array('error' => $this->upload->display_errors());
                              //$this->load->view('upload_form', $error);



                        }else {

                               
                                $data= $this->upload->data();
                                //print_r($data);
                                $file_name2=$data['file_name'];



                $data = array(

   
                                    'mat_reg_code'=>$this->input->post('mat_reg_code'),
                                    'mat_reg_name'=>$this->input->post('mat_reg_name'),
                                    'mat_reg_detail'=>$this->input->post('mat_reg_detail'),
                                    'mat_reg_img'=>$file_name2,
                                    'mat_reg_qty_stock'=>$this->input->post('mat_reg_qty_stock'),
                                    'mat_reg_qty_limit'=>$this->input->post('mat_reg_qty_limit'),
                                    'u_id'=>$this->input->post('u_id'),
                                    'mat_id'=>$this->input->post('mat_id'),
                                    'mat_reg_date'=>$this->input->post('mat_reg_date'),
                                    'mem_id'=>$this->input->post('mem_id')
                );

                

                $this->db->where('mat_reg_id',$this->input->post('mat_reg_id'));  
                $Query=$this->db->update('tbl_material_reg',$data);    


    
                      }
                    
        }


      public function delete_material_reg($mat_reg_id)//ลบรายการทะเบียนวัสดุ
        {
               
        $this->db->delete('tbl_material_reg',array('mat_reg_id'=>$mat_reg_id));

        }


   public function list_material_reg()//ตาราง ทะเบียน
    {

                $this->db->select('mr.*,m.mat_code,m.mat_name,u.u_name');
                $this->db->from('tbl_material_reg as mr');
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');
                $this->db->order_by('mr.mem_id','ASC');
                 $Query=$this->db->get();
                return $Query->result();

    }
       public function excel_material_reg()//ตาราง ทะเบียน
    {

                $this->db->select('mr.*,m.mat_code,m.mat_name,u.u_name');
                $this->db->from('tbl_material_reg as mr');
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');
                $this->db->order_by('mr.mem_id','ASC');
                 $Query=$this->db->get();
                return $Query->result_array();

    }



      //              eEnd                            //
      //*********************************************//




      //*********************************************//
      //               Query อัพเดท Stock              //


        public function insert_material_stock()
        {
                  

                 $mat_ins_stock=$this->input->post('mat_ins_stock');
                 $mat_reg_id=$this->input->post('mat_reg_id');



                $this->db->select('mat_reg_qty_stock');
                $this->db->where('tbl_material_reg.mat_reg_id',$mat_reg_id);
                 $Query=$this->db->get('tbl_material_reg');
                      $rs=$Query->row()->mat_reg_qty_stock;

                      $updateStock=($rs+$mat_ins_stock);
                   
                    // print_r($updateStock);

                    // exit;

                            $dataS = array(

                                    'mat_reg_qty_stock'=>$updateStock
                            );

                            

                            $this->db->where('mat_reg_id',$this->input->post('mat_reg_id'));  
                            $Query=$this->db->update('tbl_material_reg',$dataS);    


                          $config['upload_path']='./img/invoice/'; //ที่อยู่เก็บรูปภาพ
                          $config['allowed_types']='gif|jpg|png';//กำหนดชนิดไฟล์
                          $config['max_size']='2000';
                          $config['max_width']='3000';
                          $config['max_height']='3000';
                          $config['encrypt_name']= TRUE;

                          $this->load->library('upload',$config);
                                  if (! $this->upload->do_upload('mat_ins_img')) { //ชื่อฟิลด์
                                         echo $this->upload->display_errors();
                                  }else {
                                          $data= $this->upload->data();
                                          //print_r($data);
                                          $filename=$data['file_name'];
                                                  

                                              $data = array(

                                                      'mat_ins_invoice'=>$this->input->post('mat_ins_invoice'),
                                                      'mat_ins_img'=>$filename,
                                                      'mat_ins_stock'=>$this->input->post('mat_ins_stock'),
                                                      'mat_reg_id'=>$this->input->post('mat_reg_id'),
                                                      'mem_id'=>$this->input->post('mem_id'),
                                                      'mat_ins_date'=>$this->input->post('mat_ins_date'),
                                                      'mat_ins_remark'=>$this->input->post('mat_ins_remark')

                                              );

                                              $Query=$this->db->insert('tbl_material_instock',$data);


                                  }
                    
        }
















    public function update_material_approve()//อนุมัติ และ ตัดสต๊อก
        {


                            $data = array(

                                    'mem_approve_id'=>$this->input->post('mem_approve_id'),
                                    'mat_req_statas'=>$this->input->post('mat_req_statas'),
                                    'mat_req_remark'=>$this->input->post('mat_req_remark'),
                                    'mat_req_approve_date'=>$this->input->post('mat_req_approve_date')
                            );

                            

                            $this->db->where('mat_req_id',$this->input->post('mat_req_id'));  
                            $Query=$this->db->update('tbl_material_req',$data);    







                   $mat_req_id=$this->input->post('mat_req_id');


                 $Query2= $this->db->query("SELECT * from tbl_material_detail where tbl_material_detail.mat_req_id='$mat_req_id' order by tbl_material_detail.mat_det_id DESC");

                  // print_r($Query2->result_array());

                  // exit;

                    foreach ($Query2->result_array() as $rs)
                    {

                         $mat_reg_idDB = $rs['mat_reg_id'];
                         $qtyDB = $rs['qty'];


                            $this->db->select('mat_reg_qty_stock');
                            $this->db->where('tbl_material_reg.mat_reg_id',$mat_reg_idDB);
                            $Query3=$this->db->get('tbl_material_reg');
                                  $rs_Stock=$Query3->row()->mat_reg_qty_stock;

                                  $updateStock=($rs_Stock-$qtyDB);
                               
                                // print_r($updateStock);

                                // exit;

                                        $dataS = array(

                                                'mat_reg_qty_stock'=>$updateStock
                                        );

                                        

                                        $this->db->where('mat_reg_id',$mat_reg_idDB); 
                                        $Query3=$this->db->update('tbl_material_reg',$dataS);    


                    }//foreach


               $this->db->select('a.*,b.*,e.mat_code,e.mat_name,d.mem_sex,d.mem_code,d.member_dep,d.mem_fname,d.mem_lname,dd.mem_sex as sex1,dd.mem_code as code1,dd.mem_fname as fname1,dd.mem_lname as lname1,g.lev_name as posi,d.member_gov');
                $this->db->from('tbl_material_req as a'); //ตารางขอเบิก
                $this->db->join('tbl_material_detail as b','a.mat_req_id=b.mat_req_id','left');//ตาราง รายละเอียดขอเบิก
                $this->db->join('tbl_material_reg as c','b.mat_reg_id=b.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as d','a.mem_req_id=d.mem_id','left');//ตาราง สมาชิก อ้างอิงผู้ขอเบิก
                $this->db->join('tbl_member as dd','a.mem_save_id=dd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_material as e','c.mat_id=c.mat_id','left');//ตาราง ประเภท
                //$this->db->join('tbl_unit as f','c.u_id=f.u_id','left');//ตาราง หน่วยนับ
                $this->db->join('tbl_level as g','d.lev_id=g.lev_id','left');//ตาราง หน่วยนับ
                $this->db->where('a.mat_req_id',$mat_req_id);
                $this->db->group_by('a.mat_req_id');
                $this->db->order_by('a.mat_req_id','DESC');
                 $Query4=$this->db->get('');

               return $Query4->result();



                    
        }

   
       public function update_material_notapprove()//แก้ไขข้อมูล
        {

                $mat_req_id=$this->input->post('mat_req_id');

                            $data = array(

                                    'mat_req_statas'=>$this->input->post('mat_req_statas'),
                                    'mat_req_remark'=>$this->input->post('mat_req_remark')
                            );

                            

                            $this->db->where('mat_req_id',$this->input->post('mat_req_id'));  
                            $Query=$this->db->update('tbl_material_req',$data);    


                $this->db->select('a.*,b.*,e.mat_code,e.mat_name,d.mem_sex,d.mem_code,d.member_dep,d.mem_fname,d.mem_lname,dd.mem_sex as sex1,dd.mem_code as code1,dd.mem_fname as fname1,dd.mem_lname as lname1,g.lev_name as posi,d.member_gov');
                $this->db->from('tbl_material_req as a'); //ตารางขอเบิก
                $this->db->join('tbl_material_detail as b','a.mat_req_id=b.mat_req_id','left');//ตาราง รายละเอียดขอเบิก
                $this->db->join('tbl_material_reg as c','b.mat_reg_id=b.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as d','a.mem_req_id=d.mem_id','left');//ตาราง สมาชิก อ้างอิงผู้ขอเบิก
                $this->db->join('tbl_member as dd','a.mem_save_id=dd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_material as e','c.mat_id=c.mat_id','left');//ตาราง ประเภท
                //$this->db->join('tbl_unit as f','c.u_id=f.u_id','left');//ตาราง หน่วยนับ
                $this->db->join('tbl_level as g','d.lev_id=g.lev_id','left');//ตาราง หน่วยนับ
                $this->db->where('a.mat_req_id',$mat_req_id);
                $this->db->group_by('a.mat_req_id');
                $this->db->order_by('a.mat_req_id','DESC');
                 $Query4=$this->db->get('');

               return $Query4->result(); 
                    
        }
 




           public function update_material_approve_req()//แก้ไขข้อมูล
        {



                            $data = array(

                                    'qty'=>$this->input->post('qty')
                            );

                            

                            $this->db->where('mat_det_id',$this->input->post('mat_det_id'));  
                            $Query=$this->db->update('tbl_material_detail',$data);    


                            
                    
        }
 
          













    public function delete_material_stock($mat_ins_id)//ลบรายการรับเข้า
        {
            
                 $mat_ins_stock=$this->input->post('mat_ins_stock');
                 $mat_reg_id=$this->input->post('mat_reg_id');




                $this->db->select('mat_reg_qty_stock');
                $this->db->where('tbl_material_reg.mat_reg_id',$mat_reg_id);
                 $Query=$this->db->get('tbl_material_reg');
                      $rs=$Query->row()->mat_reg_qty_stock;

                      $updateStock=($rs-$mat_ins_stock);
                   
                    // print_r($updateStock);

                    // exit;

                            $dataS = array(

                                    'mat_reg_qty_stock'=>$updateStock
                            );

                            

                            $this->db->where('mat_reg_id',$this->input->post('mat_reg_id'));  
                            $Query=$this->db->update('tbl_material_reg',$dataS);    



        $this->db->delete('tbl_material_instock',array('mat_ins_id'=>$mat_ins_id));

        }


    public function delete_material_data($mat_det_id) //ลบรายการในใบเบิก
        {
               
        $this->db->delete('tbl_material_detail',array('mat_det_id'=>$mat_det_id));

        }

   
    public function delete_material_datalist($mat_req_id) //ลบรายการในใบเบิก
        {
               
        $this->db->delete('tbl_material_detail',array('mat_req_id'=>$mat_req_id));
        $this->db->delete('tbl_material_req',array('mat_req_id'=>$mat_req_id));

        }




  

   
   public function list_material_stock()//ตาราง Stock
    {
                // $this->db->select('*');
                // $this->db->from('tbl_material_instock');
                // $this->db->order_by('tbl_material_instock.mat_ins_id','ASC');

                $this->db->select('ms.*,mr.*,m.mat_code,m.mat_name,u.u_name,mem.mem_fname,mem.mem_lname');
                $this->db->from('tbl_material_instock as ms'); //ตาราง Stock
                $this->db->join('tbl_material_reg as mr','ms.mat_reg_id=mr.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as mem','ms.mem_id=mem.mem_id','left');//ตาราง สมาชิก
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');//ตาราง ประเภท
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');//ตาราง หน่วยนับ
                $this->db->order_by('ms.mat_ins_id ','DESC');
                 $Query=$this->db->get();


                return $Query->result();

    }

       public function list_material_outstock()//ตารางสินค้าใกล้หมด
    {


                $this->db->select('mr.*,m.mat_code,m.mat_name,u.u_name');
                $this->db->from('tbl_material_reg as mr');
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');
                $this->db->where('mr.mat_reg_qty_stock <= mat_reg_qty_limit');
                $this->db->order_by('mr.mem_id','ASC');

                 $Query=$this->db->get();


                return $Query->result();
                    // return $query->result_array();

    }

           public function exportExcel_outstock()//ตารางสินค้าใกล้หมด
    {


                $this->db->select('mr.*,m.mat_code,m.mat_name,u.u_name');
                $this->db->from('tbl_material_reg as mr');
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');
                $this->db->where('mr.mat_reg_qty_stock <= mat_reg_qty_limit');
                $this->db->order_by('mr.mem_id','ASC');

                 $Query=$this->db->get();


                return $Query->result_array();
                    // return $query->result_array();

    }
    
   public function list_material_reqApp()//ตาราง ขอเบิก
    {

                $this->db->select('a.*,b.*,e.mat_code,e.mat_name,d.mem_sex,d.mem_code,d.member_dep,d.mem_fname,d.mem_lname,dd.mem_sex as sex1,dd.mem_code as code1,dd.mem_fname as fname1,dd.mem_lname as lname1,g.lev_name as posi,d.member_gov');
                $this->db->from('tbl_material_req as a'); //ตารางขอเบิก
                $this->db->join('tbl_material_detail as b','a.mat_req_id=b.mat_req_id','left');//ตาราง รายละเอียดขอเบิก
                $this->db->join('tbl_material_reg as c','b.mat_reg_id=b.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as d','a.mem_req_id=d.mem_id','left');//ตาราง สมาชิก อ้างอิงผู้ขอเบิก
                $this->db->join('tbl_member as dd','a.mem_save_id=dd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_material as e','c.mat_id=c.mat_id','left');//ตาราง ประเภท
                //$this->db->join('tbl_unit as f','c.u_id=f.u_id','left');//ตาราง หน่วยนับ
                $this->db->join('tbl_level as g','d.lev_id=g.lev_id','left');//ตาราง หน่วยนับ
                $this->db->where_in('a.mat_req_statas',array('1','3'));
                $this->db->group_by('a.mat_req_id');
                $this->db->order_by('a.mat_req_id','ASC');
                 $Query=$this->db->get();


                return $Query->result();

    }
       public function list_material_reqApp2()//ตาราง ขอเบิก
    {

                $this->db->select('a.*,b.*,e.mat_code,e.mat_name,d.mem_sex,d.mem_code,d.member_dep,d.mem_fname,d.mem_lname,dd.mem_sex as sex1,dd.mem_code as code1,dd.mem_fname as fname1,dd.mem_lname as lname1,g.lev_name as posi,d.member_gov');
                $this->db->from('tbl_material_req as a'); //ตารางขอเบิก
                $this->db->join('tbl_material_detail as b','a.mat_req_id=b.mat_req_id','left');//ตาราง รายละเอียดขอเบิก
                $this->db->join('tbl_material_reg as c','b.mat_reg_id=b.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as d','a.mem_req_id=d.mem_id','left');//ตาราง สมาชิก อ้างอิงผู้ขอเบิก
                $this->db->join('tbl_member as dd','a.mem_save_id=dd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_material as e','c.mat_id=c.mat_id','left');//ตาราง ประเภท
                //$this->db->join('tbl_unit as f','c.u_id=f.u_id','left');//ตาราง หน่วยนับ
                $this->db->join('tbl_level as g','d.lev_id=g.lev_id','left');//ตาราง หน่วยนับ
                $this->db->where('a.mat_req_statas','2');
                $this->db->group_by('a.mat_req_id');
                $this->db->order_by('a.mat_req_id','ASC');
                 $Query=$this->db->get();


                return $Query->result();

    }
           public function list_approve_history($mem_id)//ตาราง ขอเบิก
    {

                $this->db->select('a.*,b.*,e.mat_code,e.mat_name,d.mem_sex,d.mem_code,d.member_dep,d.mem_fname,d.mem_lname,dd.mem_sex as sex1,dd.mem_code as code1,dd.mem_fname as fname1,dd.mem_lname as lname1,g.lev_name as posi,d.member_gov,ddd.mem_sex as sex2,ddd.mem_fname as fname2,ddd.mem_lname as lname2');
                $this->db->from('tbl_material_req as a'); //ตารางขอเบิก
                $this->db->join('tbl_material_detail as b','a.mat_req_id=b.mat_req_id','left');//ตาราง รายละเอียดขอเบิก
                $this->db->join('tbl_material_reg as c','b.mat_reg_id=b.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as d','a.mem_req_id=d.mem_id','left');//ตาราง สมาชิก อ้างอิงผู้ขอเบิก
                $this->db->join('tbl_member as dd','a.mem_save_id=dd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_member as ddd','a.mem_approve_id=ddd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_material as e','c.mat_id=c.mat_id','left');//ตาราง ประเภท
                //$this->db->join('tbl_unit as f','c.u_id=f.u_id','left');//ตาราง หน่วยนับ
                $this->db->join('tbl_level as g','d.lev_id=g.lev_id','left');//ตาราง หน่วยนับ
                $this->db->where('a.mat_req_statas','2');
                 $this->db->where('a.mem_approve_id',$mem_id);
                $this->db->group_by('a.mat_req_id');
                $this->db->order_by('a.mat_req_id','ASC');
                 $Query=$this->db->get();


                return $Query->result();


    }

     public function list_berk($mem_id)//ตาราง ขอเบิก
    {

                $this->db->select('a.*,b.*,e.mat_code,e.mat_name,d.mem_sex,d.mem_code,d.member_dep,d.mem_fname,d.mem_lname,dd.mem_sex as sex1,dd.mem_code as code1,dd.mem_fname as fname1,dd.mem_lname as lname1,g.lev_name as posi,d.member_gov,ddd.mem_sex as sex2,ddd.mem_fname as fname2,ddd.mem_lname as lname2');
                $this->db->from('tbl_material_req as a'); //ตารางขอเบิก
                $this->db->join('tbl_material_detail as b','a.mat_req_id=b.mat_req_id','left');//ตาราง รายละเอียดขอเบิก
                $this->db->join('tbl_material_reg as c','b.mat_reg_id=b.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as d','a.mem_req_id=d.mem_id','left');//ตาราง สมาชิก อ้างอิงผู้ขอเบิก
                $this->db->join('tbl_member as dd','a.mem_save_id=dd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_member as ddd','a.mem_approve_id=ddd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_material as e','c.mat_id=c.mat_id','left');//ตาราง ประเภท
                //$this->db->join('tbl_unit as f','c.u_id=f.u_id','left');//ตาราง หน่วยนับ
                $this->db->join('tbl_level as g','d.lev_id=g.lev_id','left');//ตาราง หน่วยนับ
    
                 $this->db->where('a.mem_req_id',$mem_id);
                $this->db->group_by('a.mat_req_id');
                $this->db->order_by('a.mat_req_id','DESC');
                 $Query=$this->db->get();


                return $Query->result();


    }

   public function list_material_reqData($mat_req_id)
    {

                $this->db->select('a.*,b.*,c.*,d.*,e.*');
                $this->db->from('tbl_material_detail as a');
                $this->db->join('tbl_material_req as b','a.mat_req_id=b.mat_req_id','left'); 
                $this->db->join('tbl_material_reg as c','a.mat_reg_id=c.mat_reg_id','left');
                $this->db->join('tbl_material as d','c.mat_id=d.mat_id','left');
                $this->db->join('tbl_unit as e','c.u_id=e.u_id','left');
                $this->db->where('a.mat_req_id',$mat_req_id);
                $this->db->order_by('a.mat_det_id','DESC');
                 $Query=$this->db->get();


                return $Query->result();

    }









   public function read($mat_id)
        {
               
                $this->db->select('*');
                $this->db->from('tbl_material');
                $this->db->where('tbl_material.mat_id',$mat_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }

   public function read_reg($mat_reg_id)
        {
               
                $this->db->select('mr.*,m.mat_code,m.mat_name,u.u_name');
                $this->db->from('tbl_material_reg as mr');
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');
                $this->db->where('mr.mat_reg_id',$mat_reg_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }
   public function read_stock($mat_ins_id)
        {
               
                $this->db->select('ms.*,mr.*,m.mat_code,m.mat_name,u.u_name,mem.mem_fname,mem.mem_lname');
                $this->db->from('tbl_material_instock as ms'); //ตาราง Stock
                $this->db->join('tbl_material_reg as mr','mr.mat_reg_id=ms.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as mem','mem.mem_id=ms.mem_id','left');//ตาราง สมาชิก
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');//ตาราง ประเภท
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');//ตาราง หน่วยนับ
                $this->db->where('ms.mat_ins_id',$mat_ins_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }

    public function read_reqApp($mat_req_id)
        {
               
                $this->db->select('a.*,b.*,e.mat_code,e.mat_name,d.mem_sex,d.mem_code,d.member_dep,d.mem_fname,d.mem_lname,dd.mem_sex as sex1,dd.mem_code as code1,dd.mem_fname as fname1,dd.mem_lname as lname1,g.lev_name as posi,d.member_gov,ddd.mem_sex as sex2,ddd.mem_fname as fname2,ddd.mem_lname as lname2');
                $this->db->from('tbl_material_req as a'); //ตารางขอเบิก
                $this->db->join('tbl_material_detail as b','a.mat_req_id=b.mat_req_id','left');//ตาราง รายละเอียดขอเบิก
                $this->db->join('tbl_material_reg as c','b.mat_reg_id=b.mat_reg_id','left');//ตาราง ทะเบียน
                $this->db->join('tbl_member as d','a.mem_req_id=d.mem_id','left');//ตาราง สมาชิก อ้างอิงผู้ขอเบิก
                $this->db->join('tbl_member as dd','a.mem_save_id=dd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                 $this->db->join('tbl_member as ddd','a.mem_approve_id=ddd.mem_id','left');//ตาราง สมาชิก อ้างอิงผู็ทำรายการบันทึก
                $this->db->join('tbl_material as e','c.mat_id=c.mat_id','left');//ตาราง ประเภท
                //$this->db->join('tbl_unit as f','c.u_id=f.u_id','left');//ตาราง หน่วยนับ
                $this->db->join('tbl_level as g','d.lev_id=g.lev_id','left');//ตาราง หน่วยนับ
                //$this->db->group_by('a.mat_req_id');
                $this->db->where('a.mat_req_id',$mat_req_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }


}
?>