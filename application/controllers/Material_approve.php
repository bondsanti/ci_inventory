<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_approve extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// if ($this->session->userdata('lev_ref')!='A') {
		// 	redirect('Login','refesh');// Admin
		// }


		$this->load->model('material_model');
		$this->load->library('Pdf');


	}

	public function index()
	{
		$data['Query']=$this->material_model->list_material_reqApp();


		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;

		$this->load->view('template/header',$_SESSION);
		$this->load->view('material_approve/index',$data);
		$this->load->view('template/footer');
	}
	



	public function approve_data($mat_req_id)//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		//$data['Query']=$this->material_model->list_material_reqApp();
		$data['Query']=$this->material_model->read_reqApp($mat_req_id);
		$data['Query_data']=$this->material_model->list_material_reqData($mat_req_id);

		// echo '<pre>';
		// print_r($data['Query_data']);
		// echo '</pre>';
		// exit;

		$this->load->view('template/header',$_SESSION);
		//$this->load->view('admin/material_approve_confirm_view',$data);
		$this->load->view('material_approve/aprove_confirm',$data);
		$this->load->view('template/footer');
		
	}

	public function edit_data($mat_req_id)//แก้ไขการเบิก
	{
		$data['Query']=$this->material_model->read_reqApp($mat_req_id);
		$data['Query_data']=$this->material_model->list_material_reqData($mat_req_id);

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;



		$this->load->view('template/header',$_SESSION);
		//$this->load->view('admin/material_approve_edit_view',$data);
		$this->load->view('material_approve/approve_edit',$data);
		$this->load->view('template/footer');
		
	}




	public function update_data()
	{


		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;
		
		$this->material_model->update_material_approve_req();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('material_approve/edit_data/'.$_POST['mat_req_id'],'refresh');
		
		
	}


	public function update_approve_data()
	{


		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;
		
		$data4['Query4']=$this->material_model->update_material_approve();
		$this->session->set_flashdata('save_success',TRUE);
		$this->load->view('line_approve',$data4);
		redirect('material_approve','refresh');



	}
	
	public function update_notapprove_data()
	{


		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;

		$data4['Query4']=$this->material_model->update_material_notapprove();
		$this->session->set_flashdata('save_success',TRUE);
		$this->load->view('line_approve',$data4);
		redirect('material_approve','refresh');



	}


	public function delete_data($mat_det_id)// ลบข้อมุล
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;

		$this->material_model->delete_material_data($mat_det_id);
		$this->session->set_flashdata('del_success',TRUE);
		redirect('material_approve/edit_data/'.$_POST['mat_req_id'],'refresh');

	}

	public function delete_data_list($mat_req_id)// ลบข้อมุล
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';


		$this->material_model->delete_material_datalist($mat_req_id);
		$this->session->set_flashdata('del_success',TRUE);
		$this->load->view('line_del',$_POST);
		redirect('material_approve','refresh');

	}

	public function approve_show($mat_req_id) {
 
        //$data['Query']=$this->material_model->list_material_reqApp();
		$data['Query']=$this->material_model->read_reqApp($mat_req_id);
		$data['Query_data']=$this->material_model->list_material_reqData($mat_req_id);

		// echo '<pre>';
		// print_r($data['Query_data']);
		// echo '</pre>';
	    

	   $this->load->view('template_backend/header_view',$_SESSION);
       $this->load->view('admin/material_approve_print',$data);
       $this->load->view('template_backend/footer_view');
      
      


    }

    	public function printpdf($mat_req_id) {
 

		$data['Query']=$this->material_model->read_reqApp($mat_req_id);
		$data['Query_data']=$this->material_model->list_material_reqData($mat_req_id);

		// echo '<pre>';
		// print_r($data['Query_data']);
		// echo '</pre>';
	    

       $this->load->view('admin/material_print',$data);

      
      


    }
	


}
