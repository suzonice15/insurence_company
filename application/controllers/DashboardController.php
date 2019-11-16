<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MainModel');
		$userRole = $this->session->userdata('user_status');
		if ($userRole != "active") {
			redirect('admin');

		}

	}

	public function index()
	{
		date_default_timezone_set("Asia/Dhaka");
		$data['main'] = "Dashboard";
		$data['active'] = "view Dashboard";
		
$user_query="SELECT count(user_id)as user_id FROM `users` ";
		$user_data=$this->MainModel->AllQueryDalta($user_query);
		foreach ($user_data as $user);
		$data['user_count_list']=$user->user_id;
		
		
$insurence_data_id_query="SELECT count(insurence_data_id) as insurence_data_id FROM `insurence_data`  ";
		$insurence_data=$this->MainModel->AllQueryDalta($insurence_data_id_query);
		foreach ($insurence_data as $insurence);
		$data['insurence_data_id']=$insurence->insurence_data_id;
		
$uniquery_query="SELECT COUNT(insurence_data_id) as uniquery_customer FROM `insurence_data`  
GROUP by customer_mobile";
		$uniquery_data=$this->MainModel->AllQueryDalta($uniquery_query);
		$count=0;
		foreach ($uniquery_data as $uniquer){
				$count++;
		}
		$data['uniquery_customer']=$count;
		
		
		
		
		
		$data['pageContent'] = $this->load->view('dashboard', $data, true);
		$this->load->view('layouts/main', $data);
	}



}
