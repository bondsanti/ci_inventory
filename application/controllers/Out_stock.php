<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Out_stock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
        if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B' AND $this->session->userdata('lev_ref')!='C'AND $this->session->userdata('lev_ref')!='D') {
            redirect('Login','refesh');// Admin
        }


		$this->load->model('material_model');


   

	}

	public function index()
	{
	
		$data['Query']=$this->material_model->list_material_outstock();

		// echo '<pre>';
		// print_r($data1);
		// echo '</pre>';

		// exit;

		$this->load->view('template/header',$_SESSION);
		$this->load->view('out_stock/index',$data);
		$this->load->view('out_stock/form',$data);
		$this->load->view('template/footer');
	}



	public function export_data()
	{


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $results = $this->material_model->exportExcel_outstock();

        // print_r($results);
        // exit();


        $columns = array('รหัสทะเบียน', 'ประเภท', 'ชื่อสินค้า', 'จำนวนคงเหลือ', 'หน่วยนับ');
        $col = 'A';
        foreach ($columns as $column) {

            $sheet->setCellValue($col . '1', $column);
            //echo $column;
            $col++;
        }

        // print_r($sheet);
        //exit();

        $row = 2;
        foreach ($results as $item) {
            $sheet->setCellValue('A' . $row, $item['mat_reg_code'])
                ->setCellValue('B' . $row, $item['mat_name'])
                ->setCellValue('C' . $row, $item['mat_reg_name'])
                ->setCellValue('D' . $row, $item['mat_reg_qty_stock'])
                ->setCellValue('E' . $row, $item['u_name']);
            //print_r($sheet);
            $row++;
          
        }
  
      //exit();

        $sheet->getStyle('A2:A' . $row)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_TEXT);

        $sheet->getStyle('D2:D' . $row)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_TEXT);


        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        foreach (range('A', 'E') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
          $filename = "Out_stock_". date("H i Y-m-d").".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $writer->save("php://output");

     
       //redirect('out_stock/index','refresh');
   }




	
}
