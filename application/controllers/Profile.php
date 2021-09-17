<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();


		if(empty($this->session->userdata('mem_id'))){ // check Login SESSION 
		redirect('Login','refesh'); 
		exit(); 
		}

		$this->load->model('member_model');
		$this->load->model('position_model');


	}


public function edit_profile()//เรียกข้อมูล เพื่อทำการแก้ไข
	{

		$mem_id=$_SESSION['mem_id'];
		$data['Query_edit']=$this->member_model->read($mem_id);
		$data['Query_posi']=$this->position_model->list_position();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		//exit;
		$this->load->view('template/header',$_SESSION);
		$this->load->view('profile/index',$data);
		$this->load->view('template/footer');
		
	}

	public function update_data()
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';	
	 // 	exit;

		$this->member_model->update_profile();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('profile/edit_profile/'.$_POST['mem_id'],'refresh');
	}
	
}
