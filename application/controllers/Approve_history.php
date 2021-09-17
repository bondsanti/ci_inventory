<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve_history extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B'AND $this->session->userdata('lev_ref')!='C') {
			redirect('Login','refesh'); 
		}


		$this->load->model('material_model');
		$this->load->library('Pdf');


	}

	public function list()
	{
		$mem_id=$_SESSION['mem_id'];
		$data['Query']=$this->material_model->list_approve_history($mem_id);


		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;

		$this->load->view('template/header',$_SESSION);
		$this->load->view('approve_history/index',$data);
		$this->load->view('template/footer');
	}


	


}
