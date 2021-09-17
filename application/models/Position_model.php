<?php
class Position_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 
    public function insert_position()//ส่งข้อมูล
        {

               
               
                $data = array(

                        'lev_name'=>$this->input->post('lev_name'),
                        'lev_ref'=>$this->input->post('lev_ref')
                );

                $Query=$this->db->insert('tbl_level',$data);


        }


    public function update_position()//แก้ไขข้อมูล
        {
               
                $data = array(

                        'lev_name'=>$this->input->post('lev_name'),
                        'lev_ref'=>$this->input->post('lev_ref')
                );

                

                $this->db->where('lev_id',$this->input->post('lev_id'));  
                $Query=$this->db->update('tbl_level',$data);    


                /*if($DBquery){
                        echo'Update Ok';
                        echo"<META HTTP-EQUIV=\"REFRESH\"CONTENT=\"2; URL=http://localhost/ci/\">";
                }else{
                        echo'Update Fail';
                        echo"<META HTTP-EQUIV=\"REFRESH\"CONTENT=\"2; URL=http://localhost/ci/\">";
                }*/
        }

    public function delete_position($lev_id)//ลบข้อมูล
        {
               
        $this->db->delete('tbl_level',array('lev_id'=>$lev_id));

        }


   public function list_position()
    {
      
                $this->db->select('*');
                $this->db->from('tbl_level');
                $this->db->where('tbl_level.lev_id >= 2');
                $this->db->order_by('tbl_level.lev_id','DESC');
                $Query=$this->db->get();
                return $Query->result();
 
    }
   public function read($lev_id)
        {
               
                $this->db->select('*');
                $this->db->from('tbl_level');
                $this->db->where('tbl_level.lev_id',$lev_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }


}
?>