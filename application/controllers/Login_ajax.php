<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ajax extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	
	public function index()
	{
	
		$this->load->view('login_view2');

	}

	public function validlogin()
	{
	
		if($this->input->server('REQUEST_METHOD') == TRUE){
				if($this->Login_model->record_count($this->input->post('mem_username'), $this->input->post('mem_password')) == 1)
				{
					$result = $this->Login_model->fetch_user_login($this->input->post('mem_username'), $this->input->post('mem_password'));
					
					$this->session->set_userdata(array(

					'mem_id' => $result->mem_id,
					'mem_fname' => $result->mem_fname,
					'mem_lname' => $result->mem_lname,
					'member_position' => $result->member_position,
					'mem_img' => $result->mem_img,
					'lev_id' => $result->lev_id,
					'lev_name' => $result->lev_name,
					'lev_ref' => $result->lev_ref


					));
					 $lev_ref = $_SESSION['lev_ref'];
			     
				 // echo '<br>';
			    // echo 'level = '.$posi_level;

					if ($lev_ref=='A') {
						$this->session->set_flashdata('login_success',TRUE);
						redirect('home','refesh');// Admin FGS
					} else if ($lev_ref=='B'){
						redirect('home','refesh'); //Admin Gov
					} else if ($lev_ref=='C'){
						redirect('home','refesh'); //เจ้าหน้าที่คลังพัสดุ Staff
					} else if ($lev_ref=='D'){
						redirect('home','refesh'); //สมาชิก หรือ บุคลากร User
					}
					
					redirect('order');
				}
				else
				{
					$this->session->set_flashdata('login_error',TRUE);
					redirect('login', 'refresh');
				}
			}

	}

	public function logout()
	{
	
		$this->session->unset_userdata($sess);
		redirect('login','refesh');

	}

	
   

	
}
