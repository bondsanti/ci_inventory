<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_req extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// if ($this->session->userdata('lev_ref')!='A') {
		// 	redirect('Login','refesh');// Admin
		// }


		$this->load->model('material_model');
		$this->load->model('unit_model');
		$this->load->model('member_model');
		$this->load->model('basket_model');

	}

	public function index()
	{

		$data['Query']=$this->material_model->list_material_reg();
		$data['Query_mem']=$this->member_model->se_list_member();
		$data['Query_basket']=$this->basket_model->list_basket_mat();
		

		// echo '<pre>';
		// print_r($data['Query_basket']);
		// echo '</pre>';

		// exit;

		$this->load->view('template/header',$_SESSION);
		$this->load->view('material_req/index',$data);
		$this->load->view('template/footer');
	}


	public function insert_data_basket()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
        $mat_reg_id = $this->input->post('mat_reg_id');
        $this->db->select('mat_reg_id');
        $this->db->where('mat_reg_id',$mat_reg_id);
        $Query=$this->db->get('tbl_basket');
        $num=$Query->num_rows();
        if ($num > 0) 
        {
        	$this->session->set_flashdata('save_error',TRUE);
			redirect('material_req/index','refresh');

         }else{
		
			$this->basket_model->insert_basket_mat();
			$this->session->set_flashdata('save_success',TRUE);
			redirect('material_req/index','refresh');

	     }
	}

	public function insert_data_req()
	{





		
		$data2['Query3']=$this->basket_model->insert_req_mat();

		

		// echo '<pre>';
		// print_r($data2);
		// echo '</pre>';

		// exit;
		
		$this->load->view('line',$data2);
		$this->session->set_flashdata('save_success',TRUE);
		redirect('material_req','refresh');
	}


	public function update_data()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;
		
		$this->basket_model->update_basket_mat();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('material_req/index','refresh');
	}

	public function delete_data($b_id)// ลบข้อมุล
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$this->basket_model->delete_basket_mat($b_id);
		$this->session->set_flashdata('del_success',TRUE);
		redirect('material_req/index','refresh');

	}




}
