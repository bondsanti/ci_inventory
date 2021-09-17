<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Report_instock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B' AND $this->session->userdata('lev_ref')!='C') {
			redirect('Login','refesh');// Admin
		}


			$this->load->model('report_model');
			$this->load->library('Pdf');


	}

	public function index()
	{

		$this->load->view('template/header',$_SESSION);
		$this->load->view('report_instock/index');
		$this->load->view('template/footer');

	}

	public function search()
	{
		
		 $data['Query']=$this->report_model->instock_type();
		 $data['Query2']=$this->report_model->instock();


	     $data['dateStart']=$this->input->post('dateStart');
	     $data['dateEnd']=$this->input->post('dateEnd');

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;


		$this->load->view('template/header',$_SESSION);
		$this->load->view('report_instock/list',$data);
		$this->load->view('template/footer');

	}
	public function genpdf()
	{
		



		 $data['Query']=$this->report_model->instock_type();
		 $data['Query2']=$this->report_model->instock();


	     $data['dateStart']=$this->input->post('dateStart');
	     $data['dateEnd']=$this->input->post('dateEnd');


		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;




 $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
  	$font = 'thsarabun';
  	$pdf->font = $font;
    $pdf->SetCreator("");
  	$pdf->SetAuthor("");
  	$pdf->SetTitle("รายงานรับเข้าวัสดุ");
  	$pdf->SetSubject("รายงานรับเข้าวัสดุ");
    $pdf->setPrintHeader(false);
  	$pdf->setPrintFooter(false);
    $pdf->SetMargins(10, 10, 10);
  	$pdf->SetHeaderMargin(0);
  	$pdf->SetTopMargin(15);
  	$pdf->SetFooterMargin(0);
    $pdf->SetFont($font, '', 12);
    // กำหนดแบ่่งหน้าอัตโนมัติ
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // กำหนดสัดส่วนของรูปภาพ  กำหนดเพิ่มเติมในไฟล์  tcpdf_config.php
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

  	$pdf->AddPage("P","A4");


  	ob_start();
    //$data['data_list'] = $data_lists;
   $html = $this->load->view('report_instock/list_pdf',$data, true);
    //$html = $this->load->view('material_history/test', true);
   //$html = $this->parser->parse_repeat('material_history/list_pdf', $data, true);

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
     ob_end_clean(); //add this line here 
    $pdf->lastPage("P","A4");

    //$pdf->Output($mat_req_id.'.pdf', 'I');
     //$pdf->Output($mat_req_id.'.pdf', 'I'); // (I - Inline แสดงทันที, D - Download, F - File บันทึก)
    $pdf->Output("รายงานรับเข้าวัสดุ".date("H i Y-m-d").'.pdf', 'I'); // (I - Inline แสดงทันที, D - Download, F - File บันทึก)



	}

	
}
