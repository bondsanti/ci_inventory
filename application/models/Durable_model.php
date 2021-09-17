<?php
class durable_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 
    public function insert_durable()//ส่งข้อมูล
        {

                       $dur_code = $this->input->post('dur_code');
                        $this->db->select('dur_code');
                        $this->db->where('dur_code',$dur_code);
                        $Query=$this->db->get('tbl_durable');
                        $num=$Query->num_rows();
                        if ($num > 0) {
                            echo "<script>";
                            echo "alert('รหัสประเภท ซ้ำ !!');";
                            echo "window.history.back();";
                            echo "</script>";
                        }else{
               
                            $data = array(

                                    'dur_code'=>$this->input->post('dur_code'),
                                    'dur_name'=>$this->input->post('dur_name')
                            );

                            $Query=$this->db->insert('tbl_durable',$data);

                           if($Query){

                                      echo "<script>";
                                      echo "alert('Insert Success !!');";
                                      echo "</script>";
                            }else{
                                  
                                      echo "<script>";
                                      echo "alert('Fail..');";
                                      echo "</script>";
                             }
                     }
        }


    public function update_durable()//แก้ไขข้อมูล
        {


                            $data = array(

                                    'dur_code'=>$this->input->post('dur_code'),
                                    'dur_name'=>$this->input->post('dur_name')
                            );

                            

                            $this->db->where('dur_id',$this->input->post('dur_id'));  
                            $Query=$this->db->update('tbl_durable',$data);    

                            if($Query){

                                      echo "<script>";
                                      echo "alert('Update Success !!');";
                                      echo "</script>";
                            }else{
                                  
                                      echo "<script>";
                                      echo "alert('Fail..');";
                                      echo "</script>";
                            }
                    
        }

    public function delete_durable($dur_id)//ลบข้อมูล
        {
               
        $this->db->delete('tbl_durable',array('dur_id'=>$dur_id));

        }


   public function list_durable()
    {
      
                $this->db->select('*');
                $this->db->from('tbl_durable');
                $this->db->order_by('tbl_durable.dur_id','DESC');
                $Query=$this->db->get();
                return $Query->result();
 
    }

    public function list_durable_reg()
    {
      
                $this->db->select('*');
                $this->db->from('tbl_durable');
                $this->db->order_by('tbl_durable.dur_id','DESC');
                $Query=$this->db->get();
                return $Query->result();
 
    }



   public function read($dur_id)
        {
               
                $this->db->select('*');
                $this->db->from('tbl_durable');
                $this->db->where('tbl_durable.dur_id',$dur_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }


}
?>