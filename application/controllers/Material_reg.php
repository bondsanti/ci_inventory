<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Material_reg extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B'AND $this->session->userdata('lev_ref')!='C') {
			redirect('Login','refesh');// Admin
		}


		$this->load->model('material_model');
		$this->load->model('unit_model');

	}

	public function index()
	{
		$data['Query']=$this->material_model->list_material_reg();
		$data['Query_mat']=$this->material_model->list_material();
		$data['Query_unit']=$this->unit_model->list_unit();

		$this->load->view('template/header',$_SESSION);
		$this->load->view('material_reg/index',$data);
		$this->load->view('material_reg/form',$data);
		$this->load->view('template/footer');
	}


	public function insert_data()
	{

		$data['Query']=$this->material_model->list_material_reg();
		$data['Query_mat']=$this->material_model->list_material();
		$data['Query_unit']=$this->unit_model->list_unit();
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		// exit;
					    $mat_reg_code = $this->input->post('mat_reg_code');
                        $this->db->select('mat_reg_code');
                        $this->db->where('mat_reg_code',$mat_reg_code);
                        $Query1=$this->db->get('tbl_material_reg');
                        $num=$Query1->num_rows();
                        
                        if ($num > 0) {
                          
                           $this->session->set_flashdata('save_error',TRUE);
      		                 
                            $this->load->view('template/header',$_SESSION);
							$this->load->view('material_reg/index',$data);
							$this->load->view('material_reg/form',$data);
              				$this->load->view('template/footer');

                        }else{

		                   $this->material_model->insert_material_reg();
		                   $this->session->set_flashdata('save_success',TRUE);
		                   redirect('material_reg/index','refresh');
                       }

	}



	public function update_data()
	{

		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';

		// exit;
		
		$this->material_model->update_material_reg();
		$this->session->set_flashdata('edit_success',TRUE);
		redirect('material_reg','refresh');
	}

	public function delete_data($mat_reg_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->material_model->delete_material_reg($mat_reg_id);
		  $this->session->set_flashdata('del_success',TRUE);
		redirect('material_reg','refresh');

	}

public function export_data()
	{


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $results = $this->material_model->excel_material_reg();

        // print_r($results);
        // exit();


        $columns = array('ลำดับ', 'รหัสประเภท', 'ชื่อประเภท','เลขทะเบียน', 'ชื่อ', 'รายละเอียด', 'จำนวนคงเหลือ', 'วันที่ลงทะเบียน');
        $col = 'A';
        foreach ($columns as $column) {

            $sheet->setCellValue($col . '1', $column);
            //echo $column;
            $col++;
        }

        // print_r($sheet);
        //exit();

        $row = 2;
        $i = 0;
        foreach ($results as $item) {
            $sheet->setCellValue('A' . $row, $i)
                ->setCellValue('B' . $row, $item['mat_code'])
                ->setCellValue('C' . $row, $item['mat_name'])
                ->setCellValue('D' . $row, $item['mat_reg_code'])
                ->setCellValue('E' . $row, $item['mat_reg_name'])
                ->setCellValue('F' . $row, $item['mat_reg_detail'])
                ->setCellValue('G' . $row, $item['mat_reg_qty_stock'])
                ->setCellValue('H' . $row, $item['mat_reg_date']);
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


        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        foreach (range('A', 'H') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
          $filename = "ทะเบียนวัสดุ_". date("H i Y-m-d").".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $writer->save("php://output");

     
       //redirect('out_stock/index','refresh');
   }
	
}
