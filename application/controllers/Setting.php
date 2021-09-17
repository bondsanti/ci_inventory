<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B') {
			redirect('Login','refesh'); 
		}

		$this->load->model('setting_model');
	
	}


	public function edit_data()//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$set_id='1';
		$data['Query']=$this->setting_model->read($set_id);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;
		$this->load->view('template/header',$_SESSION);
		$this->load->view('setting/index',$data);
		$this->load->view('template/footer');
		
	}

	public function update_data_to_db()
	{
		$this->setting_model->update_setting();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('setting/edit_data','refresh');
	}

	


	
}
