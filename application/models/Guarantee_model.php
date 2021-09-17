<?php
class Guarantee_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 
    public function insert()//ส่งข้อมูล
        {


               
                            $data = array(

                                    'contract_no'=>$this->input->post('contract_no'),
                                    'contract_date'=>$this->input->post('contract_date'),
                                    'project_name'=>$this->input->post('project_name'),
                                    'contract_name'=>$this->input->post('contract_name'),
                                    'credit_limit'=>$this->input->post('credit_limit'),
                                    'main_bookbank'=>$this->input->post('main_bookbank'),
                                    'sub_bookbank'=>$this->input->post('sub_bookbank'),
                                    'credit_bookbank'=>$this->input->post('credit_bookbank'),
                                    'duration_bookbank'=>$this->input->post('duration_bookbank'),
                                    'checkin_date'=>$this->input->post('checkin_date'),
                                    'enddate_bookbank'=>$this->input->post('enddate_bookbank'),
                                    'inspect_date'=>$this->input->post('inspect_date'),
                                    'checkout_date'=>$this->input->post('checkout_date'),
                                    'remaek'=>$this->input->post('remaek'),
                                    'status_credit'=>$this->input->post('status_credit'),
                                    'status_type'=>$this->input->post('status_type'),
                                    'year'=>$this->input->post('year'),
                                    'mem_id'=>$this->input->post('mem_id')



                            );

                            $Query=$this->db->insert('tbl_zguarantee',$data);

                        
                   
        }


    public function update()//แก้ไขข้อมูล
        {


                            $data = array(

                                    'contract_no'=>$this->input->post('contract_no'),
                                    'contract_date'=>$this->input->post('contract_date'),
                                    'project_name'=>$this->input->post('project_name'),
                                    'contract_name'=>$this->input->post('contract_name'),
                                    'credit_limit'=>$this->input->post('credit_limit'),
                                    'main_bookbank'=>$this->input->post('main_bookbank'),
                                    'sub_bookbank'=>$this->input->post('sub_bookbank'),
                                    'credit_bookbank'=>$this->input->post('credit_bookbank'),
                                    'duration_bookbank'=>$this->input->post('duration_bookbank'),
                                    'checkin_date'=>$this->input->post('checkin_date'),
                                    'enddate_bookbank'=>$this->input->post('enddate_bookbank'),
                                    'inspect_date'=>$this->input->post('inspect_date'),
                                    'checkout_date'=>$this->input->post('checkout_date'),
                                    'remaek'=>$this->input->post('remaek'),
                                    'status_credit'=>$this->input->post('status_credit'),
                                    'status_type'=>$this->input->post('status_type'),
                                    'year'=>$this->input->post('year'),
                                    'mem_id'=>$this->input->post('mem_id')
                            );

                            

                            $this->db->where('id',$this->input->post('id'));  
                            $Query=$this->db->update('tbl_zguarantee',$data);    


                    
        }

    public function update_credit()//แก้ไขข้อมูล
        {


                            $data = array(

                                    'status_credit'=>$this->input->post('status_credit')
                            );

                            

                            $this->db->where('id',$this->input->post('id'));  
                            $Query=$this->db->update('tbl_zguarantee',$data);    


                    
        }
            public function update_type()//แก้ไขข้อมูล
        {


                            $data = array(

                                    'status_type'=>$this->input->post('status_type')
                            );

                            

                            $this->db->where('id',$this->input->post('id'));  
                            $Query=$this->db->update('tbl_zguarantee',$data);    


                    
        }


    public function delete($id)//ลบข้อมูล
        {
               
        $this->db->delete('tbl_zguarantee',array('id'=>$id));

        }


   public function excel_list()
    {
                          // search 


                $this->db->select('*');
                $this->db->from('tbl_zguarantee');
                $this->db->order_by('tbl_zguarantee.id','DESC');
                 $Query=$this->db->get();
                return $Query->result_array();
    


               
 
    }

       public function execel_listday()
    {
                          // search 


                   $dateStart=$this->input->post('dateStart');
                   $dateEnd=$this->input->post('dateEnd');
                   $status_credit=$this->input->post('status_credit');
                   $year=$this->input->post('year');

                $this->db->select('*');
                $this->db->from('tbl_zguarantee');
                $this->db->where('tbl_zguarantee.enddate_bookbank >=',$dateStart);
                $this->db->where('tbl_zguarantee.enddate_bookbank <=',$dateEnd);
                $this->db->where('tbl_zguarantee.status_credit',$status_credit);
                $this->db->where('tbl_zguarantee.year',$year);
                $this->db->order_by('tbl_zguarantee.id','DESC');
                $Query=$this->db->get();
               return $Query->result_array();


               
 
    }
       public function list()
    {
      
                $this->db->select('*');
                $this->db->from('tbl_zguarantee');
                $this->db->order_by('tbl_zguarantee.id','DESC');
                $Query=$this->db->get();
                return $Query->result();
 
    }
   
   public function getlist_day()
    {
                   $dateStart=$this->input->post('dateStart');
                   $dateEnd=$this->input->post('dateEnd');
                   $status_credit=$this->input->post('status_credit');
                   $year=$this->input->post('year');

                $this->db->select('*');
                $this->db->from('tbl_zguarantee');
                $this->db->where('tbl_zguarantee.enddate_bookbank >=',$dateStart);
                $this->db->where('tbl_zguarantee.enddate_bookbank <=',$dateEnd);
                $this->db->where('tbl_zguarantee.status_credit',$status_credit);
                $this->db->where('tbl_zguarantee.year',$year);
                $this->db->order_by('tbl_zguarantee.id','DESC');
                $Query=$this->db->get();
                return $Query->result();
 
    }

   public function get_seach()
        {


               $year=$this->input->post('year');

                $this->db->select('*');
                $this->db->from('tbl_zguarantee');
                $this->db->where('tbl_zguarantee.year',$year);
                 $this->db->order_by('tbl_zguarantee.id','DESC');
                $Query=$this->db->get();
                return $Query->result();

        }


}
?>