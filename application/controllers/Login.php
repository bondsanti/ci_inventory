<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	
	public function index()
	{
	
		$this->load->view('login_view2');

	}

	public function check_login()
	{
	
		if ($this->input->post('mem_username')=='') {
			 $this->load->view('login');
		
		} else {

 			//  echo '<pre>';
		  //    print_r($this->input->post());
		  //    echo '</pre>';
			 // exit;

			$result=$this->Login_model->fetch_user_login($this->input->post('mem_username'),sha1($this->input->post('mem_password')));
			
			// echo '<pre>';
			// print_r($result);
			// echo '</pre>';
			// exit;

			if (!empty($result)) {
				$sess=array(
					'mem_id' => $result->mem_id,
					'mem_fname' => $result->mem_fname,
					'mem_lname' => $result->mem_lname,
					'member_position' => $result->member_position,
					'mem_img' => $result->mem_img,
					'lev_id' => $result->lev_id,
					'lev_name' => $result->lev_name,
					'lev_ref' => $result->lev_ref,
				);
		     
			 //     echo '<br>';
			 //     echo '<pre>';
			 //     print_r($sess);
			 //     echo '</pre>';
				// exit;

				$this->session->set_userdata($sess);

				  // echo '<br>';
				  // print_r($_SESSION);

			      $lev_ref = $_SESSION['lev_ref'];
			     

				
				 // echo '<br>';
			  //     echo 'level = '.$posi_level;

					if ($lev_ref=='A') {
						$this->session->set_flashdata('login_success',TRUE);
						redirect('home','refesh');// Admin FGS
					} else if ($lev_ref=='B'){
						$this->session->set_flashdata('login_success',TRUE);
						redirect('home','refesh'); //Admin Gov
					} else if ($lev_ref=='C'){
							$this->session->set_flashdata('login_success',TRUE);
						redirect('home','refesh'); //เจ้าหน้าที่คลังพัสดุ Staff
					} else if ($lev_ref=='D'){
							$this->session->set_flashdata('login_success',TRUE);
						redirect('material_history','refesh'); //สมาชิก หรือ บุคลากร User
					}

				

				} else {
					$this->session->unset_userdata($sess);
					$this->session->set_flashdata('login_error',TRUE);
					//$this->session->unset_userdata(array('mem_id','mem_fname','posi_level','posi_name'));
					redirect('login');
			}
			

		}

	}

	public function logout()
	{
	
		$this->session->unset_userdata($sess);
		redirect('login','refesh');

	}

	
   

	
}
