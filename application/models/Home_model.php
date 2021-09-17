<?php
class Home_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 


   public function chart_mat_group()
    {
      

      $Query= $this->db->query("SELECT tbl_material.mat_name,COUNT(tbl_material_detail.mat_reg_id) as total_ber 
        from tbl_material_detail
        left join tbl_material_reg on tbl_material_detail.mat_reg_id=tbl_material_reg.mat_reg_id
        left join tbl_material on tbl_material_reg.mat_id=tbl_material.mat_id
        group by tbl_material.mat_id
        ORDER BY total_ber DESC
        limit 5");
      
      return $Query->result();
 
    }

    public function chart_berk_month()
    {
      

      $QueryMonth= $this->db->query("SELECT COUNT(tbl_material_req.mat_req_id) as total_berk_month ,DATE_FORMAT(mat_req_date,'%Y-%m-%d') as datesave 
        from tbl_material_req 
        where tbl_material_req.mat_req_statas='2' 
        AND year(curdate()) group by DATE_FORMAT(datesave,'%Y-%m') 

        ");
      
      return $QueryMonth->result();
 
    }


       public function chart_matdetail_group()
    {
      

      $Query_matdetail= $this->db->query("SELECT tbl_material_reg.mat_reg_name,SUM(tbl_material_detail.qty) as total_qty
        from tbl_material_detail
        left join tbl_material_reg on tbl_material_detail.mat_reg_id=tbl_material_reg.mat_reg_id
        left join tbl_material on tbl_material_reg.mat_id=tbl_material.mat_id
        group by tbl_material_detail.mat_reg_id
        ORDER BY total_qty DESC
        limit 5
        ");
      
      return $Query_matdetail->result();
 
    }

     public function chart_member_group()
    {
      

      $Query_mem= $this->db->query("SELECT tbl_member.mem_fname,tbl_member.mem_lname,COUNT(tbl_material_detail.mat_det_id) as total_member
        from tbl_material_detail
        left join tbl_material_reg on tbl_material_detail.mat_reg_id=tbl_material_reg.mat_reg_id
        left join tbl_material_req on tbl_material_detail.mat_req_id=tbl_material_req.mat_req_id
        left join tbl_member on tbl_material_req.mem_req_id=tbl_member.mem_id
        group by tbl_member.mem_id
         ORDER BY total_member DESC
        limit 5");
      
      return $Query_mem->result();
 
    }



     public function box_members_group()
    {

      $Query_mems= $this->db->query("SELECT COUNT(tbl_member.mem_id) as total_members
        from tbl_member
        where tbl_member.lev_id=6");
      
      return $Query_mems->result();
 
    }

     public function box_member_group()
    {

      $Query_member= $this->db->query("SELECT COUNT(tbl_member.mem_id) as total_mem
        from tbl_member
        where tbl_member.lev_id >1 and tbl_member.lev_id < 6");
      
      return $Query_member->result();
 
    }

     public function box_stock_group()
    {

      $Query_outstock= $this->db->query("SELECT COUNT(mat_reg_id) as total_outstock 
        from tbl_material_reg 
        WHERE mat_reg_qty_stock <= mat_reg_qty_limit");
      
      return $Query_outstock->result();
 
    }
         public function box_mat_group()
    {

      $Query_mat= $this->db->query("SELECT COUNT(mat_reg_id) as total_stock 
        from tbl_material_reg 
        WHERE mat_reg_qty_stock >= mat_reg_qty_limit");
      
      return $Query_mat->result();
 
    }

}
?>