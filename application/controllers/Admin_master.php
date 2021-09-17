<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A') {
			redirect('Login','refesh'); 
		}


        $this->load->model('Login_model');
        $this->load->model('Home_model');
        $this->load->model('member_model');
		$this->load->model('position_model');
	


	}

	public function index()
	{
		$data['Query']=$this->Home_model->chart_mat_group();
		$data['Query_mem']=$this->Home_model->chart_member_group();
		$data['Query_matdetail']=$this->Home_model->chart_matdetail_group();
		$data['Query_mems']=$this->Home_model->box_members_group();
		$data['Query_member']=$this->Home_model->box_member_group();
		$data['Query_outstock']=$this->Home_model->box_stock_group();
		$data['Query_mat']=$this->Home_model->box_mat_group();
		$data['QueryMonth']=$this->Home_model->chart_berk_month();
	
		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
		// exit();

				$this->load->view('template/header',$_SESSION);
				$this->load->view('home/index',$data);
				$this->load->view('template/footer');

	}
    

	


	
}
