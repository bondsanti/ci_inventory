<?php
class Login_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

    public function fetch_user_login($mem_username,$mem_password)
    {


                $this->db->select('mem.*,lev.lev_name,lev.lev_ref');
                $this->db->from('tbl_member as mem');
                $this->db->join('tbl_level as lev','mem.lev_id=lev.lev_id','left');// ตารางสิทธิใช้งาน
                $this->db->where('mem.mem_username',$mem_username);
                $this->db->where('mem.mem_password',$mem_password); 
                //$this->db->order_by('m.mem_id','ASC');
                 $Query=$this->db->get();
                  return $Query->row();

    }

    public function read_user($mem_id)
    {
        $this->db->where('mem_id',$mem_id);
        $query = $this->db->get('tbl_member');
        if($query->num_rows() > 0){
            $data = $query->row();
            return $data;
        }
        return FALSE;
    }
 

}
?>