<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_history extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B' AND $this->session->userdata('lev_ref')!='C'AND $this->session->userdata('lev_ref')!='D') {
			redirect('Login','refesh');// Admin
		}


		$this->load->model('material_model');
		$this->load->library('Pdf');


	}

	public function index()
	{

		$mem_id=$_SESSION['mem_id'];
		$data['Query']=$this->material_model->list_berk($mem_id);
		//$data['Query']=$this->material_model->list_material_reqApp2();


		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;

		$this->load->view('template/header',$_SESSION);
		$this->load->view('material_history/index',$data);
		$this->load->view('template/footer');
	}
	public function list_berk($mem_id)
	{
		$data['Query']=$this->material_model->list_berk($mem_id);


		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;

		$this->load->view('template/header',$_SESSION);
		$this->load->view('material_history/list_berk',$data);
		$this->load->view('template/footer');
	}

	public function preprint($mat_req_id) {
 
        //$data['Query']=$this->material_model->list_material_reqApp();
		$data['Query']=$this->material_model->read_reqApp($mat_req_id);
		$data['Query_data']=$this->material_model->list_material_reqData($mat_req_id);

		// echo '<pre>';
		// print_r($data['Query_data']);
		// echo '</pre>';
	    

	   $this->load->view('template/header',$_SESSION);
       $this->load->view('material_history/showprint',$data);
       $this->load->view('template/footer');
      
      


    }

    	public function printpdf($mat_req_id) 
    {
 

		$data['Query']=$this->material_model->read_reqApp($mat_req_id);
		$data['Query_data']=$this->material_model->list_material_reqData($mat_req_id);

		// echo '<pre>';
		// print_r($data['Query_data']);
		// echo '</pre>';
	    

       $this->load->view('material_history/print',$data);

      
      


    }
	

	  public function genpdf($mat_req_id) 
    {
 	
		$data['Query']=$this->material_model->read_reqApp($mat_req_id);
		$data['Query_data']=$this->material_model->list_material_reqData($mat_req_id);


	//$results = $this->material_model->read_reqApp($mat_req_id);
  	//$data_lists = $this->setDataListFormat($results['list_data'], 0);

     $pdf = new TCPDF('L', 'mm', 'A5', true, 'UTF-8', false);
  	$font = 'thsarabun';
  	$pdf->font = $font;
    $pdf->SetCreator("");
  	$pdf->SetAuthor("");
  	$pdf->SetTitle("ใบเบิกจ่าย-".$mat_req_id);
  	$pdf->SetSubject("ใบเบิกจ่าย-".$mat_req_id);
    $pdf->setPrintHeader(false);
  	$pdf->setPrintFooter(false);
    $pdf->SetMargins(10, 10, 10);
  	$pdf->SetHeaderMargin(0);
  	$pdf->SetTopMargin(15);
  	$pdf->SetFooterMargin(0);
    $pdf->SetFont($font, '', 12);
  	$pdf->AddPage("L","A5");



    //$data['data_list'] = $data_lists;
   $html = $this->load->view('material_history/list_pdf',$data, true);
    //$html = $this->load->view('material_history/test', true);
   //$html = $this->parser->parse_repeat('material_history/list_pdf', $data, true);
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
    $pdf->lastPage();
    //$pdf->Output($mat_req_id.'.pdf', 'I');
     $pdf->Output($mat_req_id.'.pdf', 'I'); // (I - Inline แสดงทันที, D - Download, F - File บันทึก)
    //$pdf->Output($mat_req_id.date("dmYHi").'.pdf', 'I'); // (I - Inline แสดงทันที, D - Download, F - File บันทึก)






      // $this->load->view('material_history/pdf',$data);

      
      


    }


}
