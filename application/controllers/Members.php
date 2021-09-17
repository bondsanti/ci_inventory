<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Members extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();

    if ($this->session->userdata('lev_ref')!='A' AND $this->session->userdata('lev_ref')!='B' AND $this->session->userdata('lev_ref')!='C') {
      redirect('Login','refesh');// Admin
    }

		$this->load->model('member_model');
		$this->load->model('position_model');

	
	}

	public function index()
	{
    
	$data['Query']=$this->member_model->list_members();
    $data['Query_posi']=$this->position_model->list_position();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template/header',$_SESSION);
		$this->load->view('members/index',$data);
        $this->load->view('members/form',$data);
		$this->load->view('template/footer');

	}
	

	public function insert_data()
	{


		$data['Query_posi']=$this->position_model->list_position();
		$data['Query']=$this->member_model->list_members();

		$this->form_validation->set_rules('member_gov', 'หน่วยงาน', 'trim|required');
		$this->form_validation->set_rules('member_dep', 'แผนก', 'trim|required');
		$this->form_validation->set_rules('mem_code', 'รหัสพนักงาน', 'trim|required');
		$this->form_validation->set_rules('member_position', 'ตำแหน่ง', 'trim|required');
		$this->form_validation->set_rules('mem_fname', 'ชื่อ', 'trim|required');
		$this->form_validation->set_rules('mem_lname', 'นามสกุล', 'trim|required');
		$this->form_validation->set_rules('mem_tel', 'Tel', 'trim|required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('mem_email', 'Email', 'trim|required|valid_email');


		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;

		       if ($this->form_validation->run() == FALSE)
                {
                  $this->session->set_flashdata('question',TRUE);
                   $this->load->view('template/header',$_SESSION);
        		   $this->load->view('members/index',$data);
                   $this->load->view('members/form',$data);
        			$this->load->view('template/footer');
                }
                else
                {
                	    $mem_code = $this->input->post('mem_code');
                        $this->db->select('mem_code');
                        $this->db->where('mem_code',$mem_code);
                        $Query1=$this->db->get('tbl_member');
                        $num=$Query1->num_rows();
                        
                        if ($num > 0) {
                          
                           $this->session->set_flashdata('save_error',TRUE);
      		                 
                            $this->load->view('template/header',$_SESSION);
                             $this->load->view('members/index',$data);
              					$this->load->view('members/form',$data);
              					$this->load->view('template/footer');

                        }else{

		                   $this->member_model->insert_members();
		                   $this->session->set_flashdata('save_success',TRUE);
		                   redirect('members/index','refresh');
                       }
                }

	}




	public function update_data()
	{
		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;

		$this->member_model->update_members();
    $this->session->set_flashdata('edit_success',TRUE);
		redirect('members','refresh');
	}
		
  

	public function delete_data($mem_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->member_model->delete_members($mem_id);
    $this->session->set_flashdata('del_success',TRUE);
		redirect('members','refresh');

	}


public function export_data()
	{


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $results = $this->member_model->exportExcel_members();

        // print_r($results);
        // exit();


        $columns = array('รหัสพนักงาน', 'ชื่อหน่วยงาน', 'แผนก', 'ตำแหน่ง', 'ชื่อ-นามสกุล', 'เบอร์โทร', 'อีเมล์');
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
            $sheet->setCellValue('A' . $row, $item['mem_code'])
                ->setCellValue('B' . $row, $item['member_gov'])
                ->setCellValue('C' . $row, $item['member_dep'])
                ->setCellValue('D' . $row, $item['member_position'])
                ->setCellValue('E' . $row, $item['mem_fname'].' '.$item['mem_lname'])
                ->setCellValue('F' . $row, $item['mem_tel'])
                ->setCellValue('G' . $row, $item['mem_email']);
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


        $sheet->getStyle('A1:G1')->getFont()->setBold(true);
        foreach (range('A', 'G') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
          $filename = "Member_". date("H i Y-m-d").".xlsx";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        $writer->save("php://output");

     
       //redirect('out_stock/index','refresh');
   }


	
}
