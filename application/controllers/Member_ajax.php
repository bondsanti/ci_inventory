<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    private $table = "tbl_member as m"; // กำหนดชื่อตารางข้อมูล
    // กำหนดฟิลด์ข้อมูลในตารางที่ต้องการดึงมาใช้งาน
    private $column_select = array('*','p.posi_name,p.posi_level');
    // กำหนดตารางที่ต้องการเชื่อม และเงื่อนไขการเชื่อมตาราง
    private $table_join = array(
        array('tbl_position as p','m.posi_id=p.posi_id','left')
    );
    // กำหนดฟิลด์ข้อมูลที่สามารถให้ค้นหาข้อมูลได้
    private $column_search = array(
        'm.mem_code','m.mem_fname','m.mem_lname','m.mem_tel'
    );
    // กำหนดฟิลด์ข้อมูลที่สามารถให้เรียงข้อมูลได้
    private $group = array(""); 
    // กำหนดฟิลด์ข้อมูลที่่ต้องการเรียงข้อมูลเริ่มต้น และรูปแบบการเรียงข้อมูล
    private $order = array("m.mem_id"=>"asc");
	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('lev_ref')!='A') {
			redirect('Login','refesh');// Admin
		}
		
		$this->load->model('member_model');
		$this->load->model('position_model');

	
	}

	public function index()
	{
		$data1['Query']=$this->member_model->list_member();

  
    


		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;
		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/member_view',$data1);
		$this->load->view('template_backend/footer_view');
	}
	
	public function get_list()
	{
		
				$data = array();
        $_draw = $this->input->post('draw'); // ครั้งที่การดึงข้อมูล ค่าของ dataTable ส่งมาอัตโนมัติ
        $_p = $this->input->post('search'); // ตัวแปรคำค้นหาถ้ามี
        $_earchValue = $_p['value']; // ค่าคำค้นหา
        $_order = $this->input->post('order'); // ตัวแปรคอลัมน์ที่ต้องการเรียงข้อมูล
        $_length = $this->input->post('length'); // ตัวแปรจำนวนรายการที่จะแสดงแต่ละหน้า
        $_start = $this->input->post('start'); // เริ่มต้นที่รายการ
        $this->db->select(implode(",",$this->column_select)); // สร้างคำสั่ง select ฟิลด์ข้อมูลที่กำหนด
        $query = $this->db->from($this->table);  // ดึงข้อมูลจากตารางที่กำหนด
        // วนลูปเงื่อนไขการเชื่อมตารางเพื่อสร้างคำสั่ง sql การเชื่อมตาราง
        foreach ($this->table_join as $item_join){
            call_user_func_array(array($this->db,'join'),$item_join);
        }
        $total_rows_all = $this->db->count_all_results(null,FALSE); // เก็บค่าจำนวนรายการทั้งหมด      
        $i = 0;    
        // วนลูปฟิลด์ที่ต้องการค้นหา กรณีมีการส่งคำค้น เข้ามา
        foreach ($this->column_search as $item){
            if($_earchValue){ // ถ้ามีค่าคำค้น
                // จัดรูปแแบคำสั่ง sql การใช้งาน OR กับ LIKE
                if($i===0){ // ถ้าเป็นค่าเริ่มเต้นให้เปิดวงเล็บ (
                    $this->db->group_start(); 
                    $this->db->like($item, $_earchValue);                 
                }else{
                    $this->db->or_like($item, $_earchValue);
                }
                if(count($this->column_search) - 1 == $i){ // ถ้าเป็นต้วสุดท้ายให้ปิดวงเล็บ )
                    $this->db->group_end();
                }
            }
            $i++;
            // ส่วนของการวนลูปนี้จะได้รูปแบบ เช่น ( fileld1 LIKE 'a' OR field2 LIKE 'a' )  เป็นต้น
        }  
        // ถ้ามีการกำหนดการจัดกลุ่มข้อมูล
        if(isset($this->group) && count($this->group)>0){
            $this->db->group_by($this->group);
        }
        // ถ้ามีการส่งฟิลด์ที่ต้องการเรียงข้อมูลเข้ามา เช่น กรณีกดที่หัวข้อในตาราง dataTable
        if(isset($_order) && $_order!=NULL){
            // จัดรูปแบบการจัดเรียงข้อมูลจากค่าที่ส่งมา
            $_orderColumn = $_order['0']['column'];
            $_orderSort = $_order['0']['dir'];
            $this->db->order_by($this->column_order[$_orderColumn], $_orderSort);
        }else{ // กรณีไม่ได้ส่งค่าในตอนต้น ให้ใช้ค่าตามที่กำหนด
            // จัดรูปแบบการจัดเรียง  ตามที่กำหนดด้ายตัวแปร $order ด้านบน
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);            
        }
        $total_rows_filter = $this->db->count_all_results(null,FALSE); // กำหนดค่าจำนวนข้อมูลหลังมีเงื่อนไขต่างๆ          
        if($_length != -1){ // กรณีมีการกำหนดว่าต้องการแสดงข้อมูลหน้าละกี่รายการ
            $this->db->limit($_length, $_start); // จัดรูปแบบการแสดง ผลที่ได้เช่น LIMIT 10,10
        }   
        $query = $this->db->get(); // คิวรี่ข้อมูลตาเงื่อนไข
        $_page = $this->input->post('page'); // ค่าตัวแปร page ที่เรากำหนดเองส่งหน้าปัจจุบันเข้ามา
        // วนลูปนำฟิลด์รายการที่ต้องการและสอดคล้องกันมาไว้ในตัวแปร array ที่ชื่อ $data
        $_i = 0; // ตัวแปรเลขลำดับข้อมูล
        foreach ($query->result_array() as $row){
            $_i++;
            $data[] = array(
                ($_page*$_length)+$_i,
                $row['mem_code'],
                $img='<img src="'.base_url('img/user/'.$row['mem_img']).'" class="table-avatar" width="20%" />',
                $row['mem_sex'].' '.$row['mem_fname'].' '.$row['mem_lname'],
                $row['member_gov'],
                $btnDelete = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$row['mem_id']."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$row['mem_id']."'".')"><i class="glyphicon glyphicon-trash"></i> Del</a>'
            );
        }
        // กำหนดรูปแบบ array ของข้อมูลที่ต้องการสร้าง JSON data ตามรูปแบบที่ DataTable กำหนด
        $output = array(
            "draw" => $_draw, // ครั้งที่เข้ามาดึงข้อมูล
            "recordsTotal" => $total_rows_all, // ข้อมูลทั้งหมดที่มี
            "recordsFiltered" => $total_rows_filter, // ข้อมูลเฉพาะที่เข้าเงื่อนไข เช่น ค้นหา แล้ว       
             "data" => $data // รายการ array ข้อมูลที่จะใช้งาน
        );
        echo json_encode($output);
        exit();       
		
	}

	public function add()
	{
		
		$data['Query_posi']=$this->position_model->list_position();
		
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

        $this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/member_add_view',$data);
		$this->load->view('template_backend/footer_view');
		
	}
	
	public function insert_data()
	{


		$data['Query_posi']=$this->position_model->list_position();

		$this->form_validation->set_rules('member_gov', 'หน่วยงาน', 'trim|required');
		$this->form_validation->set_rules('member_dep', 'แผนก', 'trim|required');
		$this->form_validation->set_rules('mem_code', 'รหัสพนักงาน', 'trim|required');
		$this->form_validation->set_rules('member_position', 'ตำแหน่ง', 'trim|required');
		$this->form_validation->set_rules('mem_fname', 'ชื่อ', 'trim|required');
		$this->form_validation->set_rules('mem_lname', 'นามสกุล', 'trim|required');
		$this->form_validation->set_rules('mem_tel', 'Tel', 'trim|required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('mem_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mem_username', 'Username', 'trim|required|min_length[8]|max_length[8]');
		$this->form_validation->set_rules('mem_password', 'Password', 'trim|required|min_length[8]|max_length[8]');

		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;

		       if ($this->form_validation->run() == FALSE)
                {

                   $this->load->view('template_backend/header_view',$_SESSION);
				   $this->load->view('admin/member_add_view',$data);
				   $this->load->view('template_backend/footer_view');
                }
                else
                {
                	    $mem_username = $this->input->post('mem_username');
                        $this->db->select('mem_username');
                        $this->db->where('mem_username',$mem_username);
                        $Query=$this->db->get('tbl_member');
                        $num=$Query->num_rows();
                        if ($num > 0) {
                          $this->session->set_flashdata('save_error',TRUE);
                          $this->load->view('template_backend/header_view',$_SESSION);
						  $this->load->view('admin/member_add_view',$data);
						  $this->load->view('template_backend/footer_view');
                        }else{
		                   $this->member_model->insert_member();
		                   $this->session->set_flashdata('save_success',TRUE);
		                   redirect('member','refresh');
                       }
                }

	}

	public function insert_data_to_db2()
	{
		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 // 	exit;

		$this->member_model->insert_member2();
		redirect('member','refresh');
	}


	public function edit_data($mem_id)//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$data['Query_edit']=$this->member_model->read($mem_id);
		$data['Query_posi']=$this->position_model->list_position();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;
		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/member_edit_view',$data);
		$this->load->view('template_backend/footer_view');
		
	}

		public function edit_pwd($mem_id)//เรียกข้อมูล เพื่อทำการแก้ไข
	{
		$data['Query_edit']=$this->member_model->read($mem_id);
		$data['Query_posi']=$this->position_model->list_position();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';

		// exit;
		$this->load->view('template_backend/header_view',$_SESSION);
		$this->load->view('admin/member_edit_pwd',$data);
		$this->load->view('template_backend/footer_view');
		
	}

	public function update_data_to_db()
	{
		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 	//exit;

		$this->member_model->update_member();
		redirect('member','refresh');
	}
		public function update_data_to_db2()
	{
		// echo '<pre>';
		// print_r($_POST);
	 // 	echo '</pre>';	
	 	//exit;

		$this->member_model->update_member2();
		redirect('member','refresh');
	}

	public function delete_data($posi_id)// ลบข้อมุล
	{
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';

		$this->member_model->delete_member($posi_id);
		redirect('member','refresh');

	}





	
}
