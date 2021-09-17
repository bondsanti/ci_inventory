<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_stock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B' AND $this->session->userdata('lev_ref')!='C') {
			redirect('Login','refesh');// Admin
		}


		$this->load->model('material_model');
		$this->load->model('unit_model');

	}

	public function index()
	{
		$data['Query']=$this->material_model->list_material_stock();
		$data['Query_mat_reg']=$this->material_model->list_material_reg();

		// echo '<pre>';
		// print_r($data1);
		// echo '</pre>';

		// exit;

		$this->load->view('template/header',$_SESSION);
		$this->load->view('material_stock/index',$data);
		$this->load->view('material_stock/form',$data);
		$this->load->view('template/footer');
	}



	public function insert_data()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;

		$this->material_model->insert_material_stock();
		$this->session->set_flashdata('save_success',TRUE);
		redirect('material_stock/index','refresh');
	}




	public function delete_data($mat_ins_id)// ลบข้อมุล
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$this->material_model->delete_material_stock($mat_ins_id);
		$this->session->set_flashdata('del_success',TRUE);
		redirect('material_stock/index','refresh');

	}


	
}
