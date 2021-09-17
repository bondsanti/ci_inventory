<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// if ($this->session->userdata('lev_ref')!='A') {
		// 	redirect('Login','refesh');// Admin
		// }

		$this->load->model('position_model');
	
	}

	public function index()
	{
		$data['Query']=$this->position_model->list_position();


		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/position_view',$data);
		$this->load->view('template_backend/footer_view');
	}

	public function insert_data()
	{
		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/position_insert_view');
		$this->load->view('template_backend/footer_view');

		
	}
	
	public function insert_data_to_db()
	{
		$this->position_model->insert_position();
		redirect('position','refresh');
	}

	public function edit_data($posi_id)//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$data['Query']=$this->position_model->read($posi_id);

		//echo '<pre>';
		//print_r($data);
		//echo '</pre>';

		//exit;
		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/position_edit_view',$data);
		$this->load->view('template_backend/footer_view');
		
	}

	public function update_data_to_db()
	{
		$this->position_model->update_position();
		redirect('position','refresh');
	}

	public function delete_data($posi_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->position_model->delete_position($posi_id);
		redirect('position','refresh');

	}


	
}
