<?php
class Report_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 


   public function type_mat()
    {
     
     $dateStart=$this->input->post('dateStart');
     $dateEnd=$this->input->post('dateEnd');

      $Query3= $this->db->query("SELECT tbl_material.mat_name,tbl_material.mat_code,COUNT(tbl_material_detail.mat_reg_id) as total_type 
        from tbl_material_detail
        left join tbl_material_reg on tbl_material_detail.mat_reg_id=tbl_material_reg.mat_reg_id
        left join tbl_material_req on tbl_material_detail.mat_req_id=tbl_material_req.mat_req_id
        left join tbl_material on tbl_material_reg.mat_id=tbl_material.mat_id
         WHERE tbl_material_req.mat_req_approve_date BETWEEN '$dateStart' AND '$dateEnd'
        GROUP BY tbl_material.mat_id
        ORDER BY total_type DESC
        ");
      
      return $Query3->result();
 
    }




       public function mat_berk()
    {
      
     $dateStart=$this->input->post('dateStart');
     $dateEnd=$this->input->post('dateEnd');

      $Query2= $this->db->query("SELECT tbl_material_reg.mat_reg_name,tbl_material_reg.mat_reg_code,tbl_material_reg.mat_reg_qty_stock,SUM(tbl_material_detail.qty) as total_qty
        from tbl_material_detail
        left join tbl_material_reg on tbl_material_detail.mat_reg_id=tbl_material_reg.mat_reg_id
        left join tbl_material_req on tbl_material_detail.mat_req_id=tbl_material_req.mat_req_id
        left join tbl_material on tbl_material_reg.mat_id=tbl_material.mat_id
        WHERE tbl_material_req.mat_req_approve_date BETWEEN '$dateStart' AND '$dateEnd'
        GROUP BY tbl_material_detail.mat_reg_id
        ORDER BY total_qty DESC
        ");
      
      return $Query2->result();
 
    }

     public function member_berk()
    {
      

     $dateStart=$this->input->post('dateStart');
     $dateEnd=$this->input->post('dateEnd');

      $Query1= $this->db->query("SELECT tbl_member.mem_fname,tbl_member.mem_lname,COUNT(tbl_material_detail.mat_det_id) as total_berk
        from tbl_material_detail
        left join tbl_material_reg on tbl_material_detail.mat_reg_id=tbl_material_reg.mat_reg_id
        left join tbl_material_req on tbl_material_detail.mat_req_id=tbl_material_req.mat_req_id
        left join tbl_member on tbl_material_req.mem_req_id=tbl_member.mem_id
        WHERE tbl_material_req.mat_req_approve_date BETWEEN '$dateStart' AND '$dateEnd'
        GROUP BY tbl_member.mem_id
        ORDER BY tbl_member.mem_id ASC ");
      
      return $Query1->result();

 
    }

     public function member_detail()
    {
      

     $dateStart=$this->input->post('dateStart');
     $dateEnd=$this->input->post('dateEnd');

      $Query= $this->db->query("SELECT tbl_member.mem_fname,tbl_member.mem_lname,tbl_material_reg.mat_reg_code,tbl_material_reg.mat_reg_name,tbl_material_detail.qty
from tbl_material_detail
left join tbl_material_reg on tbl_material_detail.mat_reg_id=tbl_material_reg.mat_reg_id 
left join tbl_material_req on tbl_material_detail.mat_req_id=tbl_material_req.mat_req_id 
left join tbl_member on tbl_material_req.mem_req_id=tbl_member.mem_id 
WHERE tbl_material_req.mat_req_approve_date BETWEEN '$dateStart' AND '$dateEnd' 
GROUP BY tbl_member.mem_id,tbl_material_detail.mat_reg_id
ORDER BY tbl_member.mem_id ASC ");


      
      return $Query->result();

 
    }

   public function instock_type()
    {
      

     $dateStart=$this->input->post('dateStart');
     $dateEnd=$this->input->post('dateEnd');

      $Query= $this->db->query("SELECT `ms`.*, `mr`.*, `m`.`mat_code`, `m`.`mat_name`, DATE_FORMAT(ms.mat_ins_date,'%Y-%m-%d') as sDate,
COUNT(`mat_ins_id`) as instock,SUM(`mat_ins_stock`) as total_instock
FROM `tbl_material_instock` as `ms` 
LEFT JOIN `tbl_material_reg` as `mr` ON `ms`.`mat_reg_id`=`mr`.`mat_reg_id`
LEFT JOIN `tbl_material` as `m` ON `mr`.`mat_id`=`m`.`mat_id`
WHERE DATE_FORMAT(mat_ins_date,'%Y-%m-%d') >= '$dateStart' AND DATE_FORMAT(mat_ins_date,'%Y-%m-%d') <= '$dateEnd' 
GROUP BY m.mat_code
ORDER BY `ms`.`mat_ins_id` ASC");


      
      return $Query->result();

 
    }



    public function instock()
    {
      

     $dateStart=$this->input->post('dateStart');
     $dateEnd=$this->input->post('dateEnd');

      $Query= $this->db->query("SELECT `ms`.*, `mr`.*, `m`.`mat_code`, `m`.`mat_name`, DATE_FORMAT(ms.mat_ins_date,'%Y-%m-%d') as sDate
FROM `tbl_material_instock` as `ms` 
LEFT JOIN `tbl_material_reg` as `mr` ON `ms`.`mat_reg_id`=`mr`.`mat_reg_id`
LEFT JOIN `tbl_material` as `m` ON `mr`.`mat_id`=`m`.`mat_id`
WHERE DATE_FORMAT(mat_ins_date,'%Y-%m-%d') >= '$dateStart' AND DATE_FORMAT(mat_ins_date,'%Y-%m-%d') <= '$dateEnd' 
ORDER BY `ms`.`mat_ins_id` ASC");


      
      return $Query->result();

 
    }



}
?>