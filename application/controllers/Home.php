<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
        /*
            $visitor['visitor_ip']=$_SERVER['REMOTE_ADDR'];
            $visitor['visitor_date'] =date('Y-m-d');
            $result=$this->MainModel->visitorCount($visitor['visitor_ip'],$visitor['visitor_date']);
            if(empty($result)){
                $result = $this->MainModel->insertData('visitors', $visitor);

            }
        */


    }

    public function index()
    {
        $data['page_name'] = 'home';
        $data['seo_title'] = get_option('home_seo_title');
        $data['seo_keywords'] = get_option('home_seo_keywords');
        $data['seo_content'] = get_option('home_seo_content');
        $query25 = "SELECT * FROM `product` WHERE `discount_type`='percent' and product_percent_tag BETWEEN 1 and 25
order by modified_time desc limit 6";
        $data['product25'] = $this->MainModel->AllQueryDalta($query25);
        $query50 = "SELECT * FROM `product` WHERE `discount_type`='percent' and product_percent_tag BETWEEN 26 and 50
order by modified_time desc limit 6";
        $data['product50'] = $this->MainModel->AllQueryDalta($query50);
        $query75 = "SELECT * FROM `product` WHERE `discount_type`='percent' and product_percent_tag BETWEEN 51 and 75
order by modified_time desc limit 6";
        $data['product75'] = $this->MainModel->AllQueryDalta($query75);
        $queryhotsell = "SELECT * FROM `product` WHERE `product_type`='hotsell' ORDER BY `product`.`modified_time` DESC limit 2 ";
        $data['hotsellproducts'] = $this->MainModel->AllQueryDalta($queryhotsell);


        $data['home_cat_section'] = explode(",", get_option('home_cat_section'));
        $data['home'] = $this->load->view('website/home_content', $data, true);
        $this->load->view('website/home', $data);
    }

    public function ajax_search_items()
    {
        $search_query = strtolower($this->input->post('search_query'));

        $result = get_result("SELECT * FROM product WHERE product_title LIKE '%$search_query%' OR sku LIKE '$search_query%' limit 0, 6");
        $html = '';


        //	echo $result->num_rows();

        if ($result) {
            $i = 1;
            foreach ($result as $prod) {
                $product_link = base_url() . 'product/' . $prod->product_name;

                // product price


                $product_price = $sell_price = $prod->product_price;

                $product_discount = $prod->discount_price;

                if ($product_discount != 0) {
                    $discount = '';

                    $discount = $product_discount = $save_money = floatval($product_discount);


                    $sell_price = ($product_price - $product_discount);

                }
                $image = get_product_thumb($prod->product_id);


                if ($i <= 6) {
                    $html .= '<tr><td width = "15%" ><a href="' . $product_link . '" class="text-decoration-none">
							<img width = "40" height = "40" src ="' . $image . '" ></a></td>
							<td width = "85%" ><a href="' . $product_link . '" class="text-decoration-none">' . $prod->product_title . ' <br/><del>' . formatted_price($discount) . '</del>' . formatted_price($sell_price) . ' </td>	
						</a></tr>';
                }

                $i++;
            }


            $resultx = get_result("SELECT * FROM product WHERE product_title LIKE '%$search_query%' OR sku LIKE '$search_query%' ");

            if (sizeof($resultx) > 6) {
                $html .= '<tr><td colspan="2"><a class="btn btn-info" href="' . base_url() . 'search?q=' . $search_query . '">' . (sizeof($resultx) - 6) . ' more results</a></td></tr>';
            }
        } else {
            $html .= '<tr style="padding:10px;"><td>No results found!</td></tr>';
        }

        echo json_encode(array("status" => "success", "return_value" => $html));
        die();
    }

    public function checkout()
    {

        if ($this->input->post()) {
            $get_cookies = $this->input->cookie('unique_code', true);
            if ($get_cookies) {
                $result = $this->MainModel->check_cookies_data($get_cookies);
                $set_user_id = $result->user_id;
            } else {
                $set_user_id = "";
            }
            $row_data['order_total'] = $this->input->post('order_total');
            $row_data['created_by'] = 'customer';
            $row_data['products'] = serialize($this->input->post('products'));
            $row_data['payment_type'] = $this->input->post('payment_type');
            $row_data['shipping_charge'] = $this->input->post('shipping_charge');
            $row_data['customer_name'] = $this->input->post('customer_name');
            $row_data['customer_phone'] = $this->input->post('customer_phone');
            $row_data['customer_email'] = $this->input->post('customer_email');
            $row_data['customer_address'] = $this->input->post('customer_address');
            $row_data['delevery_address'] = $this->input->post('delevery_address');
            $row_data['bkash_payment'] = $this->input->post('bkash_payment');
            $row_data['city'] = $this->input->post('city');
            $row_data['affiliate_user_id'] = $this->session->userdata('user_id');
            $row_data['shipment_time'] = date("Y-m-d H:i:s");
            $row_data['created_time'] = date("Y-m-d H:i:s");
            $row_data['modified_time'] = date("Y-m-d H:i:s");
            $order_id = $this->MainModel->returnInsertId('order_data', $row_data);
            if ($order_id) {

                $product_all = $this->input->post('product_id');
                foreach ($product_all as $key => $prod) {
                    $data['order_id'] = $order_id;
                    $data['product_id'] = $prod;
                    $data['user_id'] = $set_user_id;
                    $this->MainModel->insertData('user_order_count', $data);
                }
                $this->cart->destroy();


                redirect('checkout/thank-you/?order_id=' . $order_id, 'refresh');
            }


        } else {

            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->MainModel->getSingleData('user_id', $user_id, 'affiliate_users', '*');

            $data['page_name'] = 'home';
            $districts_query = "SELECT name FROM `districts` order by id ASC ";
            $data['districts'] = $this->MainModel->AllQueryDalta($districts_query);

            $data['home'] = $this->load->view('website/checkout', $data, true);
            $this->load->view('website/home', $data);
        }

    }


    public function thank_you()
    {
        $data['page_name'] = 'home';
        $order_id = $_GET['order_id'];
        $data['page_name'] = 'home';
        $order = $this->MainModel->getSingleData('order_id', $order_id, 'order_data', '*');	$checkout_type 		= $order->payment_type;
        $products 			= unserialize($order->products);
        $order_total 		= $order->order_total;

        $billing_name		= $order->customer_name;
        $billing_email		= $order->customer_email;
        $billing_address	= $order->customer_address;
        $delivery_address	= $order->delevery_address;
        $shipping_charge	= $order->shipping_charge;

        //send order confirmation email to customer
        $customer_email 	= $billing_email;
        $site_title 		= get_option('site_title');
        $site_email 		= get_option('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);

        $this->email->from($site_email, $site_title);
        $this->email->to($customer_email,'ok');
        $this->email->subject('Order Confirmation');

        $order_status 		= 'new';
        $product_items 		= $products;
        $payment_method 	= ucwords(str_replace('_', ' ', $checkout_type));
        $order_number 		= $order_id;
        $customer_name 		= $billing_name;
        $customer_address 	= $billing_address;
        $delivery_address 	= $delivery_address;

        ob_start();
        include('application/views/emails/email-header.php');
        include('application/views/emails/new-order.php');
        include('application/views/emails/email-footer.php');
        $email_body = ob_get_clean();

      //  echo $email_body;
        $this->email->message($email_body);
        $this->email->send();
        if($this->email->send()){

            echo 'ok';
            exit();
        } else {
            echo 'false';
           // exit();
        }

        $data['order'] = $order;

        $data['home'] = $this->load->view('website/thank_you', $data, true);
        $this->load->view('website/home', $data);

    }


    public function category()
    {


        $uri_string = explode("/", uri_string());
        $category_name = end($uri_string);
        $category_data = $this->MainModel->getSingleData('category_name', $category_name, 'category', 'category_id,category_title,category_name,seo_title,seo_meta_title,seo_keywords,seo_content,seo_meta_content');


        $data['breadcumb_category'] = $category_data->category_title;
        $data['breadcumb_category_link'] = $category_data->category_name;
        $data['category_id'] = $category_data->category_id;
        $category_name = $category_data->category_name;


        $data['seo_title'] = $category_data->seo_title;
        $data['seo_keywords'] = $category_data->seo_keywords;
        $data['seo_content'] = $category_data->seo_content;
        $data['page_title'] = ucwords(str_replace("-", " ", $category_name));

        $this->load->view('website/header', $data);
        $this->load->view('website/category_products', $data);
        $this->load->view('website/footer', $data);


    }

    public function product()
    {

        $uri_string = explode("/", uri_string());
        $product_name = end($uri_string);
        $post = $this->MainModel->getSingleData('product_name', $product_name, 'product', 'product_name,product_id,product_title,product_price,discount_price,product_description,sku,product_stock,product_of_size,product_color,discount_type,product_video,seo_title,seo_keywords,seo_content,product_terms,product_summary');

        $data['prod_row'] = $post;
        $data['page_title'] = $post->product_title;
        $product_id = $post->product_id;
        $data['seo_title'] = $post->seo_title;
        $data['seo_keywords'] = $post->seo_keywords;
        $data['seo_content'] = $post->seo_content;
        $sql = "SELECT category_title,category_name FROM `term_relation` join category on category.category_id=term_relation.term_id
WHERE product_id=$post->product_id limit 1";
        $category = get_result($sql);
        $data['specifications'] = $this->MainModel->allDataById("product_id", $product_id, 'product_specification', '*');

        $data['breadcumb_category'] = $category[0]->category_title;
        $data['breadcumb_category_link'] = 'category/' . $category[0]->category_name;

        $this->load->view('website/header', $data);
        $this->load->view('website/product_font_view', $data);
        $this->load->view('website/footer', $data);


    }

    public function pages()
    {
        $uri_string = explode("/", uri_string());
        $product_name = end($uri_string);

        $post = get_uri_not_found_data(end($uri_string));


        $data['page_title'] = $post->page_name;
        $data['page_name'] = $post->page_link;
        $data['page_content'] = $post->page_content;

        $template = $post->page_template;
        $template = $template == 'default' ? 'page' : $template;

        $this->load->view('website/header', $data);
        $this->load->view($template, $data);
        $this->load->view('website/footer', $data);


    }

    public function search()
    {
        //WHERE interests LIKE '%sports%' OR interests LIKE '%pub%'
        $search = $this->input->get_post('q');
        $sql = "SELECT * FROM `product` WHERE `product_title` LIKE '%$search%'  OR sku LIKE '$search%'  ORDER BY product_id DESC";
        $data['products'] = get_result($sql);

        $this->load->view('website/header', $data);
        $this->load->view('website/search', $data);
        $this->load->view('website/footer', $data);
    }

    public function all_products()
    {

        $sql = "SELECT * FROM `product` ORDER BY `product`.`modified_time` DESC ";
        $data['products'] = get_result($sql);
        $this->load->view('website/header');
        $this->load->view('website/all_products', $data);
        $this->load->view('website/footer');
    }

    public function affiliate_check_controller($route_name = null, $product_key = null, $user_id = null)
    {
        $unique_number = (mt_rand(10000, 999999));
        $cookie = array(
            'name' => 'unique_code',
            'value' => $unique_number,
            'expire' => time() + (86400 * 7),
            'secure' => false
        );
        $this->input->set_cookie($cookie);
        $result = $this->MainModel->select_product_id($product_key);
        $data = array(
            'user_id' => $user_id,
            'product_id' => $result->product_id,
            'unique_number' => $unique_number
        );
        $this->MainModel->insertData('product_hit_count', $data);
        $base_url = base_url();
        $get_link = $base_url . $route_name . "/" . $product_key;
        redirect($get_link);
    }
}
