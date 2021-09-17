<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B'AND $this->session->userdata('lev_ref')!='C') {
			redirect('Login','refesh');// Admin
		}


		$this->load->model('material_model');
		$this->load->model('setting_model');

	
	}

	public function index()
	{
		$data['Query']=$this->material_model->list_material();

		$this->load->view('template/header',$_SESSION);
		$this->load->view('material/index',$data);
		$this->load->view('material/form');
		$this->load->view('template/footer');
	}

	public function insert_data()
	{
		$data['Query']=$this->material_model->list_material();

		                $mat_code = $this->input->post('mat_code');
		                $mat_name = $this->input->post('mat_name');
                        $this->db->select('mat_code,mat_name');
                        $this->db->where('mat_code',$mat_code);
                        $this->db->or_where('mat_name',$mat_name);
                        $Query1=$this->db->get('tbl_material');
                        $num=$Query1->num_rows();
                        
                        if ($num > 0) {
  						
  						$this->session->set_flashdata('save_error',TRUE);
      		                 
						$this->load->view('template/header',$_SESSION);
						$this->load->view('material/index',$data);
						$this->load->view('material/form');
						$this->load->view('template/footer');

                        }else{
						$this->material_model->insert_material();
						$this->session->set_flashdata('save_success',TRUE);
						redirect('material','refresh');

						}
	}


	public function update_data()
	{
		$this->material_model->update_material();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('material','refresh');
	}

	public function delete_data($mat_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->material_model->delete_material($mat_id);
		$this->session->set_flashdata('del_success',TRUE);
		redirect('material','refresh');

	}


	
}
