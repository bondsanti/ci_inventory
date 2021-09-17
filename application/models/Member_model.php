<?php
class Member_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
       
    }



    public function list_member()
    {
       
                $this->db->select('mem.*,lev.lev_name,lev.lev_ref');
                $this->db->from('tbl_member as mem');
                $this->db->join('tbl_level as lev','mem.lev_id=lev.lev_id','left');// ตารางสิทธิใช้งาน
                $this->db->where('lev.lev_id > 1 and lev.lev_id < 6');
                $this->db->order_by('mem.mem_id','ASC');
                 $Query=$this->db->get();
                return $Query->result();

    }

        public function se_list_member()
    {
       
                $this->db->select('mem.*,lev.lev_name,lev.lev_ref');
                $this->db->from('tbl_member as mem');
                $this->db->join('tbl_level as lev','mem.lev_id=lev.lev_id','left');// ตารางสิทธิใช้งาน
                $this->db->where('lev.lev_id > 1');
                $this->db->order_by('mem.mem_id','ASC');
                 $Query=$this->db->get();
                return $Query->result();

    }

    public function exportExcel_members()
    {
       
                $this->db->select('mem.*,lev.lev_name,lev.lev_ref');
                $this->db->from('tbl_member as mem');
                $this->db->join('tbl_level as lev','mem.lev_id=lev.lev_id','left');// ตารางสิทธิใช้งาน
                $this->db->where('lev.lev_id = 6');
                $this->db->order_by('mem.mem_id','ASC');
                 $Query=$this->db->get();
                return $Query->result_array();

    }

     public function list_members()
    {
       
                $this->db->select('mem.*,lev.lev_name,lev.lev_ref');
                $this->db->from('tbl_member as mem');
                $this->db->join('tbl_level as lev','mem.lev_id=lev.lev_id','left');// ตารางสิทธิใช้งาน
                $this->db->where('lev.lev_id = 6');
                $this->db->order_by('mem.mem_id','ASC');
                 $Query=$this->db->get();
                return $Query->result();

    }

    public function read($mem_id)
    {

                $this->db->select('mem.*,lev.lev_name,lev.lev_ref');
                $this->db->from('tbl_member as mem');
                $this->db->join('tbl_level as lev','mem.lev_id=lev.lev_id','left');// ตารางสิทธิใช้งาน
                $this->db->where('mem.mem_id',$mem_id);
                 $Query=$this->db->get('');
                 if ($Query->num_rows()>0) {
                        $data=$Query->row();
                        return $data;
                       
                 }
                 return FALSE;

    }

    public function insert_member()
    {
                        // $mem_username = $this->input->post('mem_username');
                        // $this->db->select('mem_username');
                        // $this->db->where('mem_username',$mem_username);
                        // $Query=$this->db->get('tbl_member');
                        // $num=$Query->num_rows();
                        // if ($num > 0) {
                        //   $this->session->set_flashdata('save_error',TRUE);
                        //   redirect('member/add','refresh');
                        // }else{

                            $config['upload_path']='./img/user/'; //ที่อยู่เก็บรูปภาพ
                            $config['allowed_types']='gif|jpg|png';//กำหนดชนิดไฟล์
                            $config['max_size']='2000';
                            $config['max_width']='3000';
                            $config['max_height']='3000';
                            $config['encrypt_name']= TRUE;

                            $this->load->library('upload',$config);
                                    if (! $this->upload->do_upload('mem_img')) { //ชื่อฟิลด์
                                           echo $this->upload->display_errors();
                                    }else {
                                            $data= $this->upload->data();
                                            //print_r($data);
                                            $filename=$data['file_name'];
                                    }
                           
                            $data = array(
                                    
                                    'lev_id'=>$this->input->post('lev_id'),
                                    'member_gov'=>$this->input->post('member_gov'),
                                    'member_dep'=>$this->input->post('member_dep'),
                                    'member_position'=>$this->input->post('member_position'),
                                    'mem_code'=>$this->input->post('mem_code'),
                                    'mem_sex'=>$this->input->post('mem_sex'),
                                    'mem_fname'=>$this->input->post('mem_fname'),
                                    'mem_lname'=>$this->input->post('mem_lname'),
                                    'mem_username'=>$this->input->post('mem_username'),
                                    'mem_password'=>sha1($this->input->post('mem_password')),
                                    'mem_tel'=>$this->input->post('mem_tel'),
                                    'mem_email'=>$this->input->post('mem_email'),
                                    'mem_img'=>$filename
                            );

                            $Query=$this->db->insert('tbl_member',$data);

                       //  }


    }

    public function insert_members()
    {


               
                $data = array(
                                    
                                    'lev_id'=>$this->input->post('lev_id'),
                                    'member_gov'=>$this->input->post('member_gov'),
                                    'member_dep'=>$this->input->post('member_dep'),
                                    'member_position'=>$this->input->post('member_position'),
                                    'mem_code'=>$this->input->post('mem_code'),
                                    'mem_sex'=>$this->input->post('mem_sex'),
                                    'mem_fname'=>$this->input->post('mem_fname'),
                                    'mem_lname'=>$this->input->post('mem_lname'),
                                    'mem_tel'=>$this->input->post('mem_tel'),
                                    'mem_email'=>$this->input->post('mem_email')
                );

                $Query=$this->db->insert('tbl_member',$data);
        


     }
                
    public function update_member()//แก้ไขข้อมูล
        {




                $config['upload_path']='./img/user/'; //ที่อยู่เก็บรูปภาพ
                $config['allowed_types']='gif|jpg|png';//กำหนดชนิดไฟล์
                $config['max_size']='2000';
                $config['max_width']='3000';
                $config['max_height']='3000';
                $config['encrypt_name']= TRUE;

                $this->load->library('upload',$config);



                        if (!$this->upload->do_upload('mem_img')) 
                        { 

                           $file_name=$this->input->post('mem_img_old');
                          
                           $data = array(

                   
                                        'lev_id'=>$this->input->post('lev_id'),
                                        'member_gov'=>$this->input->post('member_gov'),
                                        'member_dep'=>$this->input->post('member_dep'),
                                        'member_position'=>$this->input->post('member_position'),
                                        'mem_code'=>$this->input->post('mem_code'),
                                        'mem_sex'=>$this->input->post('mem_sex'),
                                        'mem_fname'=>$this->input->post('mem_fname'),
                                        'mem_lname'=>$this->input->post('mem_lname'),
                                        'mem_username'=>$this->input->post('mem_username'),
                                        //'mem_password'=>sha1($this->input->post('mem_password')),
                                        'mem_tel'=>$this->input->post('mem_tel'),
                                        'mem_email'=>$this->input->post('mem_email'),
                                        'mem_img'=>$file_name
                                );

                                

                                $this->db->where('mem_id',$this->input->post('mem_id'));  
                                $Query=$this->db->update('tbl_member',$data);    





                              //echo $this->upload->display_errors();
                              $error = array('error' => $this->upload->display_errors());
                              //$this->load->view('upload_form', $error);

                                           

                        }else {

                               
                                $data= $this->upload->data();
                                //print_r($data);
                                $file_name=$data['file_name'];



                $data = array(

   
                                       'lev_id'=>$this->input->post('lev_id'),
                                        'member_gov'=>$this->input->post('member_gov'),
                                        'member_dep'=>$this->input->post('member_dep'),
                                        'member_position'=>$this->input->post('member_position'),
                                        'mem_code'=>$this->input->post('mem_code'),
                                        'mem_sex'=>$this->input->post('mem_sex'),
                                        'mem_fname'=>$this->input->post('mem_fname'),
                                        'mem_lname'=>$this->input->post('mem_lname'),
                                        'mem_username'=>$this->input->post('mem_username'),
                                        //'mem_password'=>sha1($this->input->post('mem_password'),
                                        'mem_tel'=>$this->input->post('mem_tel'),
                                        'mem_email'=>$this->input->post('mem_email'),
                                        'mem_img'=>$file_name
                );

                

                $this->db->where('mem_id',$this->input->post('mem_id'));  
                $Query=$this->db->update('tbl_member',$data);    




    
                      }

      }

public function update_password()//reset password
        {



                $data = array(


                        'mem_password'=>sha1($this->input->post('mem_password'))
                );

                

                $this->db->where('mem_id',$this->input->post('mem_id'));  
                $Query=$this->db->update('tbl_member',$data);    


    

      }

      public function update_members()
        {



                $data = array(


                                         'member_gov'=>$this->input->post('member_gov'),
                                        'member_dep'=>$this->input->post('member_dep'),
                                        'member_position'=>$this->input->post('member_position'),
                                        'mem_code'=>$this->input->post('mem_code'),
                                        'mem_sex'=>$this->input->post('mem_sex'),
                                        'mem_fname'=>$this->input->post('mem_fname'),
                                        'mem_lname'=>$this->input->post('mem_lname'),
                                        'mem_username'=>$this->input->post('mem_username'),
                                        'mem_tel'=>$this->input->post('mem_tel'),
                                        'mem_email'=>$this->input->post('mem_email')
                );

                

                $this->db->where('mem_id',$this->input->post('mem_id'));  
                $Query=$this->db->update('tbl_member',$data);    


    

      }

 public function update_profile()// อัพเดทโปรไฟล์
        {


                $config['upload_path']='./img/user/'; //ที่อยู่เก็บรูปภาพ
                $config['allowed_types']='gif|jpg|png';//กำหนดชนิดไฟล์
                $config['max_size']='2000';
                $config['max_width']='3000';
                $config['max_height']='3000';
                $config['encrypt_name']= TRUE;

                $this->load->library('upload',$config);


                if ($this->input->post('mem_password')=="") {
                   $pass_old=$this->input->post('pass_old');
                   $password=$pass_old;
                }else{
                   $mem_password=$this->input->post('mem_password'); 
                   $password=sha1($mem_password); 
                }

                if (!$this->upload->do_upload('mem_img')) {
                  $file_name=$this->input->post('mem_img_old');
                }else{
                  $data= $this->upload->data();
                                //print_r($data);
                  $file_name=$data['file_name'];
                }


                           $data = array(

                   
                                        'member_gov'=>$this->input->post('member_gov'),
                                        'member_dep'=>$this->input->post('member_dep'),
                                        'member_position'=>$this->input->post('member_position'),
                                        'mem_code'=>$this->input->post('mem_code'),
                                        'mem_sex'=>$this->input->post('mem_sex'),
                                        'mem_fname'=>$this->input->post('mem_fname'),
                                        'mem_lname'=>$this->input->post('mem_lname'),
                                        'mem_username'=>$this->input->post('mem_username'),
                                        'mem_password'=>$password,
                                        'mem_tel'=>$this->input->post('mem_tel'),
                                        'mem_email'=>$this->input->post('mem_email'),
                                        'mem_img'=>$file_name
                                );

                                

                                $this->db->where('mem_id',$this->input->post('mem_id'));  
                                $Query=$this->db->update('tbl_member',$data);    


                              //echo $this->upload->display_errors();
                              $error = array('error' => $this->upload->display_errors());
                              //$this->load->view('upload_form', $error);



      }



    public function delete_member($mem_id)//ลบข้อมูล
        {
               
        $this->db->delete('tbl_member',array('mem_id'=>$mem_id));


        }










    public function fetch_user_login($mem_username,$mem_password)
    {




                $this->db->select('m.*,p.posi_id,p.posi_name,p.posi_level');
                $this->db->from('tbl_member as m');
                $this->db->join('tbl_position as p','m.posi_id=p.posi_id','left');
                $this->db->where('m.mem_username',$mem_username);
                $this->db->where('m.mem_password',$mem_password); 
                //$this->db->order_by('m.mem_id','ASC');
                 $Query=$this->db->get();
                  return $Query->row();


    }
 

}
?>