<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends MX_Controller
{

	public function __construct()
	{
		$this->load->model('MainModel');


	}

	public function index()
	{
		$user_id=$this->session->userdata('user_id');


		$data['main'] = "Customer lists";
		$data['active'] = "View Customer";
		$user_type=$this->session->userdata('user_type');
		if($user_type=='office-staff'){
			$data['users'] = $this->MainModel->getAllData("user_id=$user_id", 'insurence_data', '*', 'insurence_data_id DESC');

		} else {
			$data['users'] = $this->MainModel->getAllData('', 'insurence_data', '*', 'insurence_data_id DESC');

		}

		$data['pageContent'] = $this->load->view('customer/customer_index', $data, true);
		$this->load->view('layouts/main', $data);

	}
	public function  customer_information(){

		$data['main'] = "Customers ";
		$data['active'] = "View customers";

			$data['users'] = $this->MainModel->getAllData('', 'insurence_data', '*', 'insurence_data_id DESC');

		$data['pageContent'] = $this->load->view('customer/customer_list', $data, true);
		$this->load->view('layouts/main', $data);
	}

	public function create()
	{
		$data['title'] = " ";
		$data['main'] = "Customer";
		$data['active'] = "Add Customer";

		$data['pageContent'] = $this->load->view('customer/customer_information', $data, true);
		$this->load->view('layouts/main', $data);
	}


	public function store()
	{
		date_default_timezone_set('Asia/dhaka');
		$row_data['customer_information_name'] = $this->input->post('customer_information_name');
		$row_data['customer_information_email'] = $this->input->post('customer_information_email');
		$row_data['customer_information_mobile'] = $this->input->post('customer_information_mobile');
		$row_data['customer_information_reg_date'] = date('Y-m-d h :i:s');

$customer=$this->MainModel->returnInsertId('customer_information', $row_data);

			if ($customer) {

$this->registation($customer);

		}
	}


	public function registation($id)
	{

		$data['user'] = $this->MainModel->getSingleData('customer_information_id', $id, 'customer_information', '*');
			$data['title'] = "Insurence registaion form";
			$data['main'] = "Insurence";
			$data['active'] = "Insurence add";

			$data['pageContent'] = $this->load->view('customer/customer_information', $data, true);
			$this->load->view('layouts/main', $data);

	}

	public function email_check()
	{

		$certificate_id = $this->input->post('certificate_id');
		$result = $this->MainModel->getSingleData('insurence_data_id', $certificate_id, 'insurence_data', '*');
		if ($result) {

			echo 'not';
		} else {

			echo 'unique';


		}
	}

	public function update()
	{
		$user_id = $this->input->post('user_id');
		$row_data['user_name'] = $this->input->post('user_name');
		$row_data['user_phone'] = $this->input->post('user_phone');
		$row_data['user_email'] = $this->input->post('user_email');
		$row_data['user_type'] = $this->input->post('user_type');
		$row_data['user_status'] = $this->input->post('user_status');
		$row_data['district_name'] = $this->input->post('district_name');
		$row_data['registered_date'] = date('Y-m-d');
		if($this->input->post('user_pass')) {
			$row_data['user_pass'] = md5($this->input->post('user_pass'));

		}
		$this->form_validation->set_rules('user_name', 'Category Title', 'trim|required');
		$this->form_validation->set_rules('user_phone', 'Category Title', 'trim|required');
		$this->form_validation->set_rules('user_phone', 'Category Title', 'trim|required');


		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('error', 'Fill up all the  Required field  !!!!!');
			$this->edit($user_id);
		} else {
			if ((($_FILES["user_picture"]["type"] == "image/jpg") || ($_FILES["user_picture"]["type"] == "image/jpeg") || ($_FILES["user_picture"]["type"] == "image/png") || ($_FILES["user_picture"]["type"] == "image/gif"))) {
				if ($_FILES["user_picture"]["error"] > 0) {
					echo "Return Code: " . $_FILES["user_picture"]["error"] . "<br />";
				} else {
					$uploaded_image_path = "uploads/user/" . date('d-m-Y-') . $_FILES["user_picture"]["name"];
					$uploaded_file_path = "uploads/user/" . $_FILES["user_picture"]["name"];

					if (!file_exists($uploaded_file_path)) {
						move_uploaded_file($_FILES["user_picture"]["tmp_name"], $uploaded_image_path);


						$row_data['user_picture'] = $uploaded_image_path;
					}


				}
		}

			$result = $this->MainModel->updateData('user_id', $user_id, 'users', $row_data);
			if($result){
				$this->session->set_flashdata('message', 'user updated successfully !!!');
				redirect('users', 'refresh');
			}




	}
}
	public function customer_update(){

		$user_id = $this->input->post('insurence_data_id');

		$data['insurence_data_no'] = $this->input->post('insurence_data_no');
		$data['insurence_data_thaird_party'] = $this->input->post('insurence_data_thaird_party');
		$data['insurence_data_compensive'] = $this->input->post('insurence_data_compensive');
		$data['insurence_data_value_taka'] = $this->input->post('insurence_data_value_taka');
		$data['customer_name'] = $this->input->post('customer_name');
		$data['customer_address'] = $this->input->post('customer_address');
		$data['customer_mobile'] = $this->input->post('customer_mobile');
		$data['customer_refence'] = $this->input->post('customer_refence');
		$data['insurence_data_passenger_plus'] = $this->input->post('insurence_data_passenger_plus');
		$data['insurence_data_certificate'] = $this->input->post('insurence_data_certificate');
		$data['insurence_data_vehicle_mark_number'] = $this->input->post('insurence_data_vehicle_mark_number');
		$data['insurence_data_engine_number'] = $this->input->post('insurence_data_engine_number');
		$data['insurence_data_chasis_number'] = $this->input->post('insurence_data_chasis_number');
		$data['insurence_data_make_model_carrying_number'] = $this->input->post('insurence_data_make_model_carrying_number');
		$data['insurence_data_mr_number'] = $this->input->post('insurence_data_mr_number');
		$data['insurence_data_primiam_price'] = $this->input->post('insurence_data_primiam_price');
		$data['insurence_data_less_percent'] = $this->input->post('insurence_data_less_percent');
		$data['insurence_data_percent_money'] = $this->input->post('insurence_data_percent_money');
		$data['insurence_data_total_until_passenger'] = $this->input->post('insurence_data_total_until_passenger');
		$data['insurence_data_passenger_price'] = $this->input->post('insurence_data_passenger_price');
		$data['insurence_data_driver_price'] = $this->input->post('insurence_data_driver_price');
		$data['insurence_data_sub_total_price'] = $this->input->post('insurence_data_sub_total_price');
		$data['insurence_data_total_vat'] = $this->input->post('insurence_data_total_vat');
		$data['insurence_data_total_money'] = $this->input->post('insurence_data_total_money');
		$data['insurence_data_act_first_date'] =date('Y-m-d', strtotime($this->input->post('insurence_data_act_first_date')));
		$data['insurence_data_act_last_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_act_last_date')));
		$data['insurence_data_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_date')));
		$data['user_id'] = $this->session->userdata('user_id');
		$date_notice = date('Y-m-d', strtotime('+11 month'));
		$data['insurence_data_notice_date'] = $date_notice;


		$result = $this->MainModel->updateData('insurence_data_id', $user_id, 'insurence_data', $data);
		if($result){
			$this->session->set_flashdata('message', 'Customer Information updated successfully !!!');
			redirect('customer/CustomerController', 'refresh');
		}
	}


	public  function  customer_save(){

		$data['insurence_data_no'] = $this->input->post('insurence_data_no');
		$data['insurence_data_thaird_party'] = $this->input->post('insurence_data_thaird_party');
		$data['insurence_data_compensive'] = $this->input->post('insurence_data_compensive');
		$data['insurence_data_value_taka'] = $this->input->post('insurence_data_value_taka');
		$data['customer_name'] = $this->input->post('customer_name');
		$data['customer_address'] = $this->input->post('customer_address');
		$data['customer_mobile'] = $this->input->post('customer_mobile');
		$data['customer_refence'] = $this->input->post('customer_refence');
		$data['insurence_data_passenger_plus'] = trim($this->input->post('insurence_data_passenger_plus'));
		$data['insurence_data_certificate'] = $this->input->post('insurence_data_certificate');
		$data['insurence_data_vehicle_mark_number'] = $this->input->post('insurence_data_vehicle_mark_number');
		$data['insurence_data_engine_number'] = $this->input->post('insurence_data_engine_number');
		$data['insurence_data_chasis_number'] = $this->input->post('insurence_data_chasis_number');
		$data['insurence_data_make_model_carrying_number'] = $this->input->post('insurence_data_make_model_carrying_number');
		$data['insurence_data_mr_number'] = $this->input->post('insurence_data_mr_number');
		$data['insurence_data_primiam_price'] = $this->input->post('insurence_data_primiam_price');
		$data['insurence_data_less_percent'] = $this->input->post('insurence_data_less_percent');
		$data['insurence_data_percent_money'] = $this->input->post('insurence_data_percent_money');
		$data['insurence_data_total_until_passenger'] = $this->input->post('insurence_data_total_until_passenger');
		$data['insurence_data_passenger_price'] = $this->input->post('insurence_data_passenger_price');
		$data['insurence_data_driver_price'] = $this->input->post('insurence_data_driver_price');
		$data['insurence_data_sub_total_price'] = $this->input->post('insurence_data_sub_total_price');
		$data['insurence_data_total_vat'] = $this->input->post('insurence_data_total_vat');
		$data['insurence_data_total_money'] = $this->input->post('insurence_data_total_money');
		//$data['insurence_data_act_first_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_act_first_date')));
		$data['insurence_data_act_first_date'] =date('Y-m-d', strtotime($this->input->post('insurence_data_act_first_date')));
		$data['insurence_data_act_last_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_act_last_date')));
		$data['insurence_data_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_date')));
		$data['user_id'] = $this->session->userdata('user_id');
		$date_notice = date('Y-m-d', strtotime('+11 month'));


		$data['insurence_data_notice_date'] = $date_notice;
		$data['created_date'] = date('Y-m-d');

		$insuren_id=$this->MainModel->returnInsertId('insurence_data',$data);
		//print_r($insuren_id);exit();
		if($insuren_id){
			$data['user'] = $this->MainModel->getSingleData('insurence_data_id', $insuren_id, 'insurence_data', '*');


		$this->session->set_flashdata('message', 'Customer Information Inserted successfully !!!');
			$data['pageContent'] = $this->load->view('customer/customer_priview', $data, true);
			$this->load->view('layouts/main', $data);

		}

	}
	
	public function priview_update(){
	$user_id = $this->input->post('insurence_data_id');

		$data['insurence_data_no'] = $this->input->post('insurence_data_no');
		$data['insurence_data_thaird_party'] = $this->input->post('insurence_data_thaird_party');
		$data['insurence_data_compensive'] = $this->input->post('insurence_data_compensive');
		$data['insurence_data_value_taka'] = $this->input->post('insurence_data_value_taka');
		$data['customer_name'] = $this->input->post('customer_name');
		$data['customer_address'] = $this->input->post('customer_address');
		$data['customer_mobile'] = $this->input->post('customer_mobile');
		$data['customer_refence'] = $this->input->post('customer_refence');
		$data['insurence_data_passenger_plus'] = $this->input->post('insurence_data_passenger_plus');
		$data['insurence_data_certificate'] = $this->input->post('insurence_data_certificate');
		$data['insurence_data_vehicle_mark_number'] = $this->input->post('insurence_data_vehicle_mark_number');
		$data['insurence_data_engine_number'] = $this->input->post('insurence_data_engine_number');
		$data['insurence_data_chasis_number'] = $this->input->post('insurence_data_chasis_number');
		$data['insurence_data_make_model_carrying_number'] = $this->input->post('insurence_data_make_model_carrying_number');
		$data['insurence_data_mr_number'] = $this->input->post('insurence_data_mr_number');
		$data['insurence_data_primiam_price'] = $this->input->post('insurence_data_primiam_price');
		$data['insurence_data_less_percent'] = $this->input->post('insurence_data_less_percent');
		$data['insurence_data_percent_money'] = $this->input->post('insurence_data_percent_money');
		$data['insurence_data_total_until_passenger'] = $this->input->post('insurence_data_total_until_passenger');
		$data['insurence_data_passenger_price'] = $this->input->post('insurence_data_passenger_price');
		$data['insurence_data_driver_price'] = $this->input->post('insurence_data_driver_price');
		$data['insurence_data_sub_total_price'] = $this->input->post('insurence_data_sub_total_price');
		$data['insurence_data_total_vat'] = $this->input->post('insurence_data_total_vat');
		$data['insurence_data_total_money'] = $this->input->post('insurence_data_total_money');
		$data['insurence_data_act_first_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_act_first_date')));
		$data['insurence_data_act_last_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_act_last_date')));
		$data['insurence_data_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_date')));
		$data['user_id'] = $this->session->userdata('user_id');
		$data['created_date'] = date('Y-m-d');
		$result = $this->MainModel->updateData('insurence_data_id', $user_id, 'insurence_data', $data);
		if($result){
			$this->print_page($user_id);
		}
		
	}

	public function print_page($print_id){
		$this->session->set_flashdata('message', 'Customer Information updated successfully !!!');
		$data['user'] = $this->MainModel->getSingleData('insurence_data_id', $print_id, 'insurence_data', '*');
		$data['pageContent'] = $this->load->view('customer/customer_priview_print', $data, true);
		$this->load->view('layouts/main', $data);

	}
	public function print_result($id){
		$data['title'] = "Insurence registaion form";
		$data['main'] = "Insurence";
		$data['active'] = "Insurence add";
		$data['user'] = $this->MainModel->getSingleData('insurence_data_id', $id, 'insurence_data', '*');
		$data['pageContent'] = $this->load->view('customer/customer_priview_print', $data, true);
		$this->load->view('layouts/main', $data);
	}

	public function show($id)
	{
		$data['user'] = $this->MainModel->getSingleData('insurence_data_id', $id, 'insurence_data', '*');
		$category_id = $data['user']->insurence_data_id;
		if (isset($category_id)) {
			$data['title'] = "Customer Information Show page";
			$data['main'] = "Customer Information";
			$data['active'] = "Show Customer Information";
			$data['pageContent'] = $this->load->view('customer/customer_show', $data, true);
			$this->load->view('layouts/main', $data);
		} else {
			$this->session->set_flashdata('message', "The element you are trying to edit does not exist.");
			redirect('customer/CustomerController');
		}

	}

	public function edit($id)
	{
		$data['user'] = $this->MainModel->getSingleData('insurence_data_id', $id, 'insurence_data', '*');
		$category_id = $data['user']->insurence_data_id;
		if (isset($category_id)) {
			$data['title'] = "Customer Information update page ";
			$data['main'] = "Customer Information";
			$data['active'] = "Update Customer Information";
			$data['pageContent'] = $this->load->view('customer/customer_edit', $data, true);
			$this->load->view('layouts/main', $data);
		} else {
			$this->session->set_flashdata('message', "The element you are trying to edit does not exist.");
			redirect('customer/CustomerController');
		}

	}
	public function notification_edit($id)
	{

		$data['user'] = $this->MainModel->getSingleData('insurence_data_id', $id, 'insurence_data', '*');
		$category_id = $data['user']->insurence_data_id;
		if (isset($category_id)) {
			$data['title'] = "Customer Information update page ";
			$data['main'] = "Customer Information";
			$data['active'] = "Update Customer Information";
			$data['pageContent'] = $this->load->view('customer/customer_information_edit', $data, true);
			$this->load->view('layouts/main', $data);
		} else {
			$this->session->set_flashdata('message', "The element you are trying to edit does not exist.");
			redirect('customer/CustomerController');
		}

	}

public function  notification_update(){

	$data['insurence_data_no'] = $this->input->post('insurence_data_no');
	$data['insurence_data_thaird_party'] = $this->input->post('insurence_data_thaird_party');
	$data['insurence_data_compensive'] = $this->input->post('insurence_data_compensive');
	$data['insurence_data_value_taka'] = $this->input->post('insurence_data_value_taka');
	$data['customer_name'] = $this->input->post('customer_name');
	$data['customer_address'] = $this->input->post('customer_address');
	$data['customer_mobile'] = $this->input->post('customer_mobile');
	$data['customer_refence'] = $this->input->post('customer_refence');
	$data['insurence_data_passenger_plus'] = trim($this->input->post('insurence_data_passenger_plus'));
	$data['insurence_data_certificate'] = $this->input->post('insurence_data_certificate');
	$data['insurence_data_vehicle_mark_number'] = $this->input->post('insurence_data_vehicle_mark_number');
	$data['insurence_data_engine_number'] = $this->input->post('insurence_data_engine_number');
	$data['insurence_data_chasis_number'] = $this->input->post('insurence_data_chasis_number');
	$data['insurence_data_make_model_carrying_number'] = $this->input->post('insurence_data_make_model_carrying_number');
	$data['insurence_data_mr_number'] = $this->input->post('insurence_data_mr_number');
	$data['insurence_data_primiam_price'] = $this->input->post('insurence_data_primiam_price');
	$data['insurence_data_less_percent'] = $this->input->post('insurence_data_less_percent');
	$data['insurence_data_percent_money'] = $this->input->post('insurence_data_percent_money');
	$data['insurence_data_total_until_passenger'] = $this->input->post('insurence_data_total_until_passenger');
	$data['insurence_data_passenger_price'] = $this->input->post('insurence_data_passenger_price');
	$data['insurence_data_driver_price'] = $this->input->post('insurence_data_driver_price');
	$data['insurence_data_sub_total_price'] = $this->input->post('insurence_data_sub_total_price');
	$data['insurence_data_total_vat'] = $this->input->post('insurence_data_total_vat');
	$data['insurence_data_total_money'] = $this->input->post('insurence_data_total_money');
	//$data['insurence_data_act_first_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_act_first_date')));
	$data['insurence_data_act_first_date'] =date('Y-m-d', strtotime($this->input->post('insurence_data_act_first_date')));
	$data['insurence_data_act_last_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_act_last_date')));
	$data['insurence_data_date'] = date('Y-m-d',strtotime($this->input->post('insurence_data_date')));
	$data['user_id'] = $this->session->userdata('user_id');
	$date_notice = date('Y-m-d', strtotime('+11 month'));


	$data['insurence_data_notice_date'] = $date_notice;
	$data['created_date'] = date('Y-m-d');

	$insuren_id=$this->MainModel->insertData('insurence_data',$data);
	//print_r($insuren_id);exit();
	if($insuren_id){

		$insurence_data_id=$this->input->post('insurence_data_id');
		$value['insurence_data_notification_active']=0;
		$result = $this->MainModel->updateData('insurence_data_id', $insurence_data_id, 'insurence_data', $value);

		$this->session->set_flashdata('message', 'Customer Notification Inserted successfully !!!');
		$this->notification();

	}
}

public function notification_status_change($insurence_data_id)
{
		$value['insurence_data_notification_active']=0;
		$result = $this->MainModel->updateData('insurence_data_id', $insurence_data_id, 'insurence_data', $value);

		$this->session->set_flashdata('message', 'Customer Notification Inserted successfully !!!');
		$this->notification();

	
}
	public function notification(){

		$data['title'] = "Insurence registaion form";
		$data['main'] = "Notification list";
		$data['active'] = "notification list";
				date_default_timezone_set('Asia/dhaka');

		$date = date('Y-m-d', strtotime('+11 month'));
		$today_date = date('Y-m-d');

		$query="SELECT * FROM `insurence_data` WHERE insurence_data_notice_date > CURDATE() and  insurence_data_act_last_date > '$today_date' and insurence_data_notification_active=1";
		$data['users']=$this->MainModel->AllQueryDalta($query);
		$data['pageContent'] = $this->load->view('customer/customer_information_list', $data, true);
		$this->load->view('layouts/main', $data);

	}

	public function destroy($id)
	{
		$data['category'] = $this->MainModel->getSingleData('insurence_data_id', $id, 'insurence_data', '*');
		$category_id = $data['category']->insurence_data_id;
		if (isset($category_id)) {
			$result = $this->MainModel->deleteData('insurence_data_id', $id, 'insurence_data');
			if ($result) {
				$this->session->set_flashdata('message', "Customer information deleted successfully !!!!");
				redirect('customer/CustomerController');
			}
		} else {
			$this->session->set_flashdata('message', "The element you are trying to delete does not exist.");
			redirect('customer/CustomerController');
		}
	}

}
