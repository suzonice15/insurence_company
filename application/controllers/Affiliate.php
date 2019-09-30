<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('cart');
        $this->load->helper('form');
        date_default_timezone_set('Asia/Dhaka');


    }


    public function index()
    {

        $userRole = $this->session->userdata('user_id');
        if ($userRole) {
            $user_id = $userRole;
            $data['user_id'] = $userRole;
            $data['all_category'] = $this->MainModel->select_all_category();
            $data['my_create_link'] = $this->MainModel->select_my_all_link($user_id);
            $data['home'] = $this->load->view('affiliate/affiliate_account', $data, true);
            $this->load->view('affiliate/home', $data);
        } else {
            redirect('/');

        }

    }


    public function load_product_link_from($id)
    {
        $data['product_link'] = $this->MainModel->select_link_by_id($id);
        $data['product_id'] = $id;
        $this->load->view('affiliate/link_generate', $data);
    }

    public function load_product_single_link_from()
    {
        $this->load->view('affiliate/single_link_generate');
    }

    public function single_link_generate()
    {
        $userRole = $this->session->userdata('user_id');
        $link_name = $this->input->post('link_name');
        $traffic_source = $this->input->post('traffic_source');
        $new_url = substr($link_name, strpos($link_name, "product/") + 8);
        $folder = explode("/", $new_url);
        $folder_name = $folder[0];
        $result = $this->MainModel->select_product_id($folder_name);
        $id = $result->product_id;
        $user_id = $userRole;
        $product_key = "product/" . $folder_name;
        $check_controller = "home/affiliate_check_controller";
        $base_url = base_url();
        $get_link = $base_url . $check_controller . "/" . $product_key . "/" . $user_id;
        $data = array(
            'user_id' => $user_id,
            'product_id' => $id,
            'traffic_source' => $traffic_source,
            'product_link' => $get_link
        );
        $result = $this->MainModel->insertData('product_link_info', $data);
        if ($result) {
            echo $get_link;
        }
    }


    public function create_information()
    {
        $userRole = $this->session->userdata('user_id');
        $data = array(
            'user_id' => $userRole,
            'referral_website' => $this->input->post('referral_website'),
            'payment_type' => $this->input->post('payment_type'),
            'payment_information' => $this->input->post('payment_information')
        );
        $result = $this->MainModel->insertData('affiliate_information', $data);
        if ($result) {
            echo "First step completed successfully.";
        }
    }

    public function link_generate()
    {
        $userRole = $this->session->userdata('user_id');
        $id = $this->input->post('id');
        $link_name = $this->input->post('link_name');
        $traffic_source = $this->input->post('traffic_source');
        $user_id = $userRole;
        $product_key = "product/" . $link_name;
        $check_controller = "home/affiliate_check_controller";
        $base_url = base_url();
        $get_link = $base_url . $check_controller . "/" . $product_key . "/" . $user_id;
        $data = array(
            'user_id' => $user_id,
            'product_id' => $id,
            'traffic_source' => $traffic_source,
            'product_link' => $get_link
        );
        $result = $this->MainModel->insertData('product_link_info', $data);
        if ($result) {
            echo $get_link;
        }
    }

    public function load_product_link_view($id)
    {
        $data['product_link'] = $this->MainModel->select_all_product_by_id($id);
        $this->load->view('affiliate/product_link_view', $data);
    }

    public function email_check()
    {

        $email = $this->input->post('email');
        $result = $this->MainModel->getSingleData('user_email', $email, 'affiliate_users', '*');
        if ($result) {

            echo 'not';
        } else {

            echo 'unique';


        }
    }

    public function sign_up_user()
    {
        $data['user_f_name'] = $this->input->post('user_f_name');
        $data['user_l_name'] = $this->input->post('user_l_name');
        $data['user_email'] = $this->input->post('user_email');
        $data['user_password'] = md5($this->input->post('user_password'));
        $user_id = $this->MainModel->returnInsertId('affiliate_users', $data);
        if ($user_id) {

            echo 'Sign up Successfully';
        } else {
            echo 'Something wrong try again';

        }

    }

    public function login_check()
    {

        $email = $this->input->post('user_email');
        $password = md5($this->input->post('user_password'));
        $user = "select * from affiliate_users  
where affiliate_users.user_password='$password' and affiliate_users.user_email='$email'  ";
        $userResult = $this->MainModel->SingleQueryData($user);
        if ($userResult) {
            $data['user_f_name'] = $userResult->user_f_name;
            $data['user_id'] = $userResult->user_id;
            $data['user_l_name'] = $userResult->user_l_name;
            $data['user_email'] = $userResult->user_email;
            $data['user_status'] = 'active';
            $user_status = $userResult->user_status;
            if ($user_status == 0) {

                echo 'You are In Active user';
            } else {
                $this->session->set_userdata($data);
                echo 'Login Successfully';

            }


        } else {
            echo "Invalid Email   or password  !!!!";

        }


    }


    public function my_account()
    {


        $data['home'] = $this->load->view('affiliate/my_account', '', true);
        $this->load->view('affiliate/home', $data);

    }


    public function edit()
    {
        $user_id = $this->session->userdata('user_id');
        $user_data['user'] = $this->MainModel->getSingleData('user_id', $user_id, 'affiliate_users', '*');
        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');

            $data['user_f_name'] = $this->input->post('user_f_name');
            $data['user_l_name'] = $this->input->post('user_l_name');
            $data['user_email'] = $this->input->post('user_email');
            $data['user_address'] = $this->input->post('user_address');
            $data['user_mobile'] = $this->input->post('user_mobile');


            if ($this->input->post('user_password')) {

                $data['user_password'] = md5($this->input->post('user_password'));

            }


            $update = $this->MainModel->updateData('user_id', $user_id, 'affiliate_users', $data);
            if ($update) {
                $this->session->set_flashdata('message', 'Account updated successfully !!!');
                redirect('affiliate/edit', 'refresh');
            }

        } else {

            $data['home'] = $this->load->view('affiliate/account_edit', $user_data, true);
            $this->load->view('affiliate/home', $data);
        }

    }

    public function logOut()
    {
        $this->session->unset_userdata('user_status');

        redirect('/');


    }


    public function order_list()
    {
        $user_id = $this->session->userdata('user_id');
        $data['orders_list'] = $this->MainModel->getAllData("affiliate_user_id=$user_id", 'order_data', '*', 'order_id desc');


        $data['home'] = $this->load->view('affiliate/my_order_list', $data, true);
        $this->load->view('affiliate/home', $data);


    }

    public function order_edit($id)
    {
        $user_data['order'] = $this->MainModel->getSingleData('order_id', $id, 'order_data', '*');

        $data['home'] = $this->load->view('affiliate/my_order_edit', $user_data, true);
        $this->load->view('affiliate/home', $data);


    }

    public function affiliate_page()
    {


        $this->load->view('affiliate/affiliate_page');
        // $this->load->view('affiliate/home', $data);

    }

}

