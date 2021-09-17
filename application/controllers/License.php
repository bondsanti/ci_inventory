<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class License extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// if ($this->session->userdata('lev_ref')!='A') {
		// 	redirect('Login','refesh');// Admin
		// }
		
		$this->load->model('setting_model');
		$this->load->model('position_model');
	
	}


	public function index()//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$data['Query']=$this->setting_model->list_license();


		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';

		// exit;
		$this->load->view('template/header',$_SESSION);
		$this->load->view('license/index',$data);
		$this->load->view('license/form',$_SESSION);
		$this->load->view('template/footer');
		
	}

	public function insert_data()
	{


		$data['Query']=$this->setting_model->list_license();


                	    $license_start = $this->input->post('license_start');
                        $this->db->select('license_start');
                        $this->db->where('license_start');
                        $Query1=$this->db->get('tbl_license');
                        $num=$Query1->num_rows();
                        
                        if ($num > 0) {
                          
                           $this->session->set_flashdata('save_error',TRUE);
      		                 
								$this->load->view('template/header',$_SESSION);
								$this->load->view('license/index',$data);
								$this->load->view('license/form',$_SESSION);
								$this->load->view('template/footer');

                        }else{

		                   $this->setting_model->insert_license();
		                   $this->session->set_flashdata('save_success',TRUE);
		                   redirect('license/index','refresh');
                       }
                

	}

	public function update_data()
	{
		$this->setting_model->update_license();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('license/index','refresh');
	}

	
	public function delete_data($li_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->setting_model->delete_license($li_id);
        $this->session->set_flashdata('del_success',TRUE);
		 redirect('license/index','refresh');

	}


	
}
