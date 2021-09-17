<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B'AND $this->session->userdata('lev_ref')!='C') {
			redirect('Login','refesh');// Admin
		}



		$this->load->model('unit_model');


	
	}

		public function index()//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$data['Query']=$this->unit_model->list_unit();


		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';

		// exit;
		$this->load->view('template/header',$_SESSION);
		$this->load->view('unit/index',$data);
		$this->load->view('unit/form');
		$this->load->view('template/footer');
		
	}

	public function insert_data()
	{


		$data['Query']=$this->unit_model->list_unit();


                	    $u_name = $this->input->post('u_name');
                        $this->db->select('u_name');
                        $this->db->where('u_name',$u_name);
                        $Query1=$this->db->get('tbl_unit');
                        $num=$Query1->num_rows();
                        
                        if ($num > 0) {
                          
                           $this->session->set_flashdata('save_error',TRUE);
      		                 
								$this->load->view('template/header',$_SESSION);
								$this->load->view('unit/index',$data);
								$this->load->view('unit/form');
								$this->load->view('template/footer');

                        }else{

		                   $this->unit_model->insert_unit();
		                   $this->session->set_flashdata('save_success',TRUE);
		                   redirect('unit/index','refresh');
                       }
                

	}

	public function update_data()
	{





		$this->unit_model->update_unit();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('unit/index','refresh');





	}

	
	public function delete_data($li_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->unit_model->delete_unit($li_id);
        $this->session->set_flashdata('del_success',TRUE);
		 redirect('unit/index','refresh');

	}


	
}
