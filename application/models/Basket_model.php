<?php
class Basket_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 
    public function insert_basket_mat()//ส่งข้อมูล
        {
 
//$_SERVER['SERVER_ADDR'];

               

             /*    $b_qty=$this->input->post('b_qty');
                 $mat_reg_id=$this->input->post('mat_reg_id');

                $this->db->select('mat_reg_qty_stock');
                $this->db->where('tbl_material_reg.mat_reg_id',$mat_reg_id);
                 $Query=$this->db->get('tbl_material_reg');
                      $rs=$Query->row()->mat_reg_qty_stock;

                      $updateStock=($rs-$b_qty);
                   
                    // print_r($updateStock);

                    // exit;

                            $dataS = array(

                                    'mat_reg_qty_stock'=>$updateStock
                            );

                            

                            $this->db->where('mat_reg_id',$this->input->post('mat_reg_id'));  
                            $Query=$this->db->update('tbl_material_reg',$dataS);    */


                            $data = array(

                                    'mat_reg_id'=>$this->input->post('mat_reg_id'),
                                    'b_qty'=>$this->input->post('b_qty'),
                                    'b_ip'=>$this->input->post('b_ip'),
                                    'mem_id'=>$this->input->post('mem_id')
                            );

                            $Query=$this->db->insert('tbl_basket',$data);

                 
        }





   public function list_basket_mat()
    {

$ip=$_SERVER['REMOTE_ADDR'];
$memid=$_SESSION['mem_id'];

                $this->db->select('b.*,mr.*,m.mat_code,m.mat_name,u.u_name,mem.mem_id');
                $this->db->from('tbl_basket as b');
                $this->db->join('tbl_material_reg as mr','b.mat_reg_id=mr.mat_reg_id','left');
                $this->db->join('tbl_material as m','mr.mat_id=m.mat_id','left');
                $this->db->join('tbl_unit as u','mr.u_id=u.u_id','left');
                $this->db->join('tbl_member as mem','b.mem_id=mem.mem_id','left');
                $this->db->where('b.mem_id',$memid);
                $this->db->order_by('b.b_id','DESC');

                 $Query=$this->db->get();
                return $Query->result();

    }




    public function update_basket_mat()//แก้ไขข้อมูล
        {





                            $data = array(

                                    'b_qty'=>$this->input->post('b_qty')
                            );

                            

                            $this->db->where('b_id',$this->input->post('b_id'));  
                            $Query=$this->db->update('tbl_basket',$data);    


        }



    public function delete_basket_mat($b_id)//ลบข้อมูล
        {

       
        $this->db->delete('tbl_basket',array('b_id'=>$b_id));



        }


public function insert_req_mat()//ส่งข้อมูล
        {
 

                            $data = array(

                                    'mat_req_id'=>$this->input->post('mat_req_id'),
                                    'mem_req_id'=>$this->input->post('mem_req_id'),
                                    'mem_save_id'=>$this->input->post('mem_save_id'),
                                    'mat_req_statas'=>$this->input->post('mat_req_statas')
                            );

                            $Query=$this->db->insert('tbl_material_req',$data);



                           $b_ip=$this->input->post('b_ip');




                 $Query2= $this->db->query("SELECT * from tbl_basket where tbl_basket.b_ip='$b_ip' order by b_id DESC ");

                  // print_r($Query2->result_array());
                  // exit;

                    foreach ($Query2->result_array() as $rs)
                    {

                         $mat_reg_idDB = $rs['mat_reg_id'];
                         $b_qtyDB = $rs['b_qty'];

                            //บันทึกลง Mat datail
                                $data = array(

                                        'mat_req_id'=>$this->input->post('mat_req_id'),
                                        'mat_reg_id'=>$mat_reg_idDB,
                                        'qty'=>$b_qtyDB
                                );
                                
                                $Query2=$this->db->insert('tbl_material_detail',$data);
                    }
                           
                            //ลบข้อมูลในตะกร้า
                           $this->db->delete('tbl_basket',array('b_ip'=>$b_ip));






              $mat_req_id = $this->input->post('mat_req_id');
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
                 $Query3=$this->db->get();
                return $Query3->result();






                    
        }








         


}



/*
                  $b_ip=$this->input->post('b_ip');

                  




                            $this->db->select('mat_reg_qty_stock');
                            $this->db->where('tbl_material_reg.mat_reg_id',$mat_reg_idDB);
                             $Query3=$this->db->get('tbl_material_reg');
                                  $rs_Stock=$Query3->row()->mat_reg_qty_stock;

                                  $updateStock=($rs_Stock-$b_qtyDB);
                               
                                // print_r($updateStock);

                                // exit;

                                        $dataS = array(

                                                'mat_reg_qty_stock'=>$updateStock
                                        );

                                        

                                        $this->db->where('mat_reg_id',$mat_reg_idDB);  
                                        $Query3=$this->db->update('tbl_material_reg',$dataS);   


                        } //foreach
*/

?>