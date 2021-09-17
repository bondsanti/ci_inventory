<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();

    if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B') {
      redirect('Login','refesh');// Admin
    }
		
		$this->load->model('member_model');
		$this->load->model('position_model');

	
	}

	public function index()
	{
    
	$data['Query']=$this->member_model->list_member();
    $data['Query_posi']=$this->position_model->list_position();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/header',$_SESSION);
		$this->load->view('member/index',$data);
        $this->load->view('member/form',$data);
		$this->load->view('template/footer');

	}
	

	public function insert_data()
	{


		$data['Query_posi']=$this->position_model->list_position();
		$data['Query']=$this->member_model->list_member();

		$this->form_validation->set_rules('member_gov', 'หน่วยงาน', 'trim|required');
		$this->form_validation->set_rules('member_dep', 'แผนก', 'trim|required');
		$this->form_validation->set_rules('mem_code', 'รหัสพนักงาน', 'trim|required');
		$this->form_validation->set_rules('member_position', 'ตำแหน่ง', 'trim|required');
		$this->form_validation->set_rules('mem_fname', 'ชื่อ', 'trim|required');
		$this->form_validation->set_rules('mem_lname', 'นามสกุล', 'trim|required');
		$this->form_validation->set_rules('mem_tel', 'Tel', 'trim|required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('mem_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mem_username', 'Username', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('mem_password', 'Password', 'trim|required|min_length[8]');

		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;

		       if ($this->form_validation->run() == FALSE)
                {
                  $this->session->set_flashdata('question',TRUE);
                   $this->load->view('template/header',$_SESSION);
        				   $this->load->view('member/index',$data);
                   $this->load->view('member/form',$data);
        				   $this->load->view('template/footer');
                }
                else
                {
                	    $mem_username = $this->input->post('mem_username');
                        $this->db->select('mem_username');
                        $this->db->where('mem_username',$mem_username);
                        $Query1=$this->db->get('tbl_member');
                        $num=$Query1->num_rows();
                        
                        if ($num > 0) {
                          
                           $this->session->set_flashdata('save_error',TRUE);
      		                 
                            $this->load->view('template/header',$_SESSION);
                             $this->load->view('member/index',$data);
              						   $this->load->view('member/form',$data);
              						   $this->load->view('template/footer');

                        }else{

		                   $this->member_model->insert_member();
		                   $this->session->set_flashdata('save_success',TRUE);
		                   redirect('member/index','refresh');
                       }
                }

	}

	public function insert_data_to_db2()
	{
		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;

		$this->member_model->insert_member2();
		redirect('member','refresh');
	}




		public function edit_pwd($mem_id)//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$data['Query_edit']=$this->member_model->read($mem_id);
		$data['Query_posi']=$this->position_model->list_position();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;
		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/member_edit_pwd',$data);
		$this->load->view('template_backend/footer_view');
		
	}

	public function update_data()
	{
		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 	//exit;

		$this->member_model->update_member();
    $this->session->set_flashdata('edit_success',TRUE);
		redirect('member','refresh');
	}
		
  public function update_pass()
	{
		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;

		$this->member_model->update_password();
    $this->session->set_flashdata('edit_success',TRUE);
		redirect('member','refresh');
	}

	public function delete_data($mem_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->member_model->delete_member($mem_id);
    $this->session->set_flashdata('del_success',TRUE);
		redirect('member','refresh');

	}





	
}
