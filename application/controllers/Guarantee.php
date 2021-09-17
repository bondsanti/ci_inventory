<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guarantee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
    if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B'AND $this->session->userdata('lev_ref')!='C') {
      redirect('Login','refesh');// Admin
    }


		$this->load->model('guarantee_model');


	}

	public function index()
	{
		$data['Query']=$this->guarantee_model->list();


		$this->load->view('template/header',$_SESSION);
		$this->load->view('guarantee/index',$data);
		$this->load->view('guarantee/form',$data);
		$this->load->view('template/footer');
	}
	
	public function report()
	{
		$data['Query']=$this->guarantee_model->list();


		$this->load->view('template/header',$_SESSION);
		$this->load->view('guarantee/form_report',$data);
		$this->load->view('template/footer');
	}

	public function insert_data()
	{
		$data['Query']=$this->guarantee_model->list();


		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;
					    $contract_no = $this->input->post('contract_no');
                        $this->db->select('contract_no');
                        $this->db->where('contract_no',$contract_no);
                        $Query1=$this->db->get('tbl_zguarantee');
                        $num=$Query1->num_rows();
                        
                        if ($num > 0) {
                          
                           $this->session->set_flashdata('save_error',TRUE);
      		                 
							$this->load->view('template/header',$_SESSION);
							$this->load->view('guarantee/index',$data);
							$this->load->view('guarantee/form',$data);
							$this->load->view('template/footer');

                        }else{

		                   $this->guarantee_model->insert();
		                   $this->session->set_flashdata('save_success',TRUE);
		                   redirect('guarantee/index','refresh');
                       }

	}

	
	public function seach()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;

if (!empty($this->input->post('year'))) {



		//$year = $this->input->post('year');
		$data['Query']=$this->guarantee_model->get_seach();
		$data['years']=$this->input->post('year');


		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/header',$_SESSION);
		$this->load->view('guarantee/index',$data);
	    $this->load->view('guarantee/form',$data);
		$this->load->view('template/footer');

		}else{
		redirect('guarantee/index','refresh');
		}


	}



	public function update_data()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;
		
		$this->guarantee_model->update();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('guarantee','refresh');
	}


	public function update_data1()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;
		
		$this->guarantee_model->update_credit();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('guarantee','refresh');
	}
		public function update_data2()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;
		
		$this->guarantee_model->update_type();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('guarantee','refresh');
	}

	public function delete_data($id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->guarantee_model->delete($id);
		$this->session->set_flashdata('del_success',TRUE);
		redirect('guarantee','refresh');

	}

public function export_data()
	{

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

		// $year=$this->input->get('year');
		//         print_r($year);
  //       exit();

        $results = $this->guarantee_model->excel_list();

        // print_r($results);
        // exit();

        $columns = array('ลำดับ','สถานะหลักค้ำ' ,'ประเภทหลักค้ำ','สัญญาเลขที่', 'ลงวันที่สัญญา','ชื่อโครงการ', 'ชื่อผู้รับจ้าง', 'สัญญาวงเงิน', 'ธนาคาร', 'สาขา','วงเงินค้ำประกัน','ระยะเวลา','วันที่ตรวจรับงาน',
        	'วันที่กำหนดคืนหลักค้ำ','วันที่แจ้งตรวจสภาพงาน','วันคืนหลังค้ำ','งบปี','หมายเหตุ');
        $col = 'A';
        foreach ($columns as $column) {

            $sheet->setCellValue($col . '1', $column);
            //echo $column;
            $col++;
        }

        // print_r($sheet);
        // exit();

        $row = 2;
        $i = 1;
        foreach ($results as $item) {

			if ($item['status_credit']=='1') {$status_credit="ยังไม่ครบคืน";}elseif ($item['status_credit']=='2') {$status_credit="ยังไม่ครบคืน";
			}elseif ($item['status_credit']=='3') {$status_credit="แจ้งแล้ว/รอตอบกลับ";}else{$status_credit="อยู่ระหว่างซ่อมแซม";}

            $sheet->setCellValue('A' . $row, $i)
            	->setCellValue('B' . $row, $status_credit)
                ->setCellValue('C' . $row, $item['status_type'])
                ->setCellValue('D' . $row, $item['contract_no'])
                ->setCellValue('E' . $row, $item['contract_date'])
                ->setCellValue('F' . $row, $item['project_name'])
                ->setCellValue('G' . $row, $item['contract_name'])
                ->setCellValue('H' . $row, $item['credit_limit'])
                ->setCellValue('I' . $row, $item['main_bookbank'])
                ->setCellValue('J' . $row, $item['sub_bookbank'])
                ->setCellValue('K' . $row, $item['credit_bookbank'])
                ->setCellValue('L' . $row, $item['duration_bookbank'])
                ->setCellValue('M' . $row, $item['checkin_date'])
                ->setCellValue('N' . $row, $item['enddate_bookbank'])
                ->setCellValue('O' . $row, $item['inspect_date'])
                ->setCellValue('P' . $row, $item['checkout_date'])
                ->setCellValue('Q' . $row, $item['year'])
                ->setCellValue('R' . $row, $item['remaek']);
            //print_r($sheet);
            $row++;
            $i++;
          
        }
  
      //exit();


        $sheet->getStyle('A2:A' . $row)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_TEXT);

        $sheet->getStyle('D2:D' . $row)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_TEXT);

        $sheet->getStyle('H2:H' . $row)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);

        $sheet->getStyle('K2:K' . $row)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);


        $sheet->getStyle('A1:R1')->getFont()->setBold(true);
        foreach (range('A', 'R') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
          $filename = "ข้อมูลค้ำประกันสัญญา_". date("H i Y-m-d").".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $writer->save("php://output");

     
       //redirect('out_stock/index','refresh');
   }
	
}
