<?php
class Setting_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
 
    


    public function update_setting()//แก้ไขข้อมูล
        {
                $config['upload_path']='./img/logo/'; //ที่อยู่เก็บรูปภาพ
                $config['allowed_types']='gif|jpg|png';//กำหนดชนิดไฟล์
                $config['max_size']='2000';
                $config['max_width']='3000';
                $config['max_height']='3000';
                $config['encrypt_name']= TRUE;

                $this->load->library('upload',$config);



                        if (! $this->upload->do_upload('set_title_logo')) { //ชื่อฟิลด์
                           
                        
                   

                        $data = array(

                        'set_name'=>$this->input->post('set_name'),
                        'set_title'=>$this->input->post('set_title'),
             
                        'set_navbar_color'=>$this->input->post('set_navbar_color'),
                        'set_sidebar_color'=>$this->input->post('set_sidebar_color'),
                        'set_footer'=>$this->input->post('set_footer')
                );

                

                $this->db->where('set_id',$this->input->post('set_id'));  
                $Query=$this->db->update('tbl_setting',$data);   

                              //echo $this->upload->display_errors();
                              $error = array('error' => $this->upload->display_errors());
                              //$this->load->view('upload_form', $error);


                        }else {
                                $data= $this->upload->data();
                                //print_r($data);
                                $filename=$data['file_name'];
                    

                $data = array(

                        'set_name'=>$this->input->post('set_name'),
                        'set_title'=>$this->input->post('set_title'),
                        'set_title_logo'=>$filename,
                        'set_navbar_color'=>$this->input->post('set_navbar_color'),
                        'set_sidebar_color'=>$this->input->post('set_sidebar_color'),
                        'set_footer'=>$this->input->post('set_footer')
                );

                

                $this->db->where('set_id',$this->input->post('set_id'));  
                $Query=$this->db->update('tbl_setting',$data);    


                /*if($DBquery){
                        echo'Update Ok';
                        echo"<META HTTP-EQUIV=\"REFRESH\"CONTENT=\"2; URL=http://localhost/ci/\">";
                }else{
                        echo'Update Fail';
                        echo"<META HTTP-EQUIV=\"REFRESH\"CONTENT=\"2; URL=http://localhost/ci/\">";
                }*/
            }
        }

    


   public function list_setting()
    {
      
                $this->db->select('*');
                $this->db->from('tbl_setting');
                $this->db->where('tbl_setting.set_id ','1');
                $Query=$this->db->get();
                return $Query->result();
 
    }


   public function read($set_id)
        {
               
                $this->db->select('*');
                $this->db->from('tbl_setting');
                $this->db->where('tbl_setting.set_id',$set_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

        }




    public function list_license()
    {
      
                $this->db->select('*');
                $this->db->from('tbl_license');
                $this->db->order_by('tbl_license.li_id','DESC');
                //$this->db->limit('1');
                $Query=$this->db->get();
                return $Query->result();
 
    }
   


    public function insert_license()
    {


                           
                            $data = array(
                                    
                                    'license_start'=>$this->input->post('license_start'),
                                    'license_end'=>$this->input->post('license_end'),
                                    'member_id'=>$this->input->post('member_id')
                                 
                            );

                            $Query=$this->db->insert('tbl_license',$data);


    }

    public function delete_license($li_id)//ลบข้อมูล
    {
               
        $this->db->delete('tbl_license',array('li_id'=>$li_id));


    }

     public function update_license()//แก้ไขข้อมูล
        {
               
                    

                $data = array(
                                    'license_start'=>$this->input->post('license_start'),
                                    'license_end'=>$this->input->post('license_end'),
                                    'member_id'=>$this->input->post('member_id')
                );

                

                $this->db->where('li_id',$this->input->post('li_id'));  
                $Query=$this->db->update('tbl_license',$data);    


        }


}
?>