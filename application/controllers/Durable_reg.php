<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Durable_reg extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// if ($this->session->userdata('lev_ref')!='A') {
		// 	redirect('Login','refesh');// Admin
		// }

		$this->load->model('durable_model');

	}

	public function index()
	{
		$data['Query']=$this->durable_model->list_durable_reg();


		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/durable_reg_view',$data);
		$this->load->view('template_backend/footer_view');
	}

	public function insert_data_to_db()
	{
		$this->durable_model->insert_durable();
		redirect('durable','refresh');
	}

	public function edit_data($dur_id)//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$data['Query_edit']=$this->durable_model->read_reg($dur_id);
		$data['Query']=$this->durable_model->list_durable_reg();

		//echo '<pre>';
		//print_r($data);
		//echo '</pre>';

		//exit;
		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/durable_edit_view',$data);
		$this->load->view('template_backend/footer_view');
		
	}

	public function update_data_to_db()
	{
		$this->durable_model->update_durable_reg();
		redirect('durable','refresh');
	}

	public function delete_data($dur_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->durable_model->delete_durable_reg($dur_id);
		redirect('durable','refresh');

	}


	
}
