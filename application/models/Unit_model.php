<?php
class Unit_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 
    public function insert_unit()//ส่งข้อมูล
        {


               
                            $data = array(

                                    'u_name'=>$this->input->post('u_name')
                            );

                            $Query=$this->db->insert('tbl_unit',$data);

                        
                   
        }


    public function update_unit()//แก้ไขข้อมูล
        {


                            $data = array(

                                    'u_name'=>$this->input->post('u_name')
                            );

                            

                            $this->db->where('u_id',$this->input->post('u_id'));  
                            $Query=$this->db->update('tbl_unit',$data);    


                    
        }

    public function delete_unit($u_id)//ลบข้อมูล
        {
               
        $this->db->delete('tbl_unit',array('u_id'=>$u_id));

        }


   public function list_unit()
    {
      
                $this->db->select('*');
                $this->db->from('tbl_unit');
                $this->db->order_by('tbl_unit.u_id','DESC');
                $Query=$this->db->get();
                return $Query->result();
 
    }
   public function read($u_id)
        {
               
                $this->db->select('*');
                $this->db->from('tbl_unit');
                $this->db->where('tbl_unit.u_id',$u_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }


}
?>