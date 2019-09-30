<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function try_view($order_id)
	{
		$this->db->select('*');
		$this->db->from('order_data');
		$this->db->join('tryorder', 'tryorder.order_id = order_data.order_id');
		$this->db->where('order_data.order_id', $order_id);
		$result = $this->db->get();
		return $result->result();
	}

	public function getAllData($condition = '', $tableName = '', $selectQuery = '', $order = '')
	{
		$this->db->select($selectQuery);
		if ($condition): $this->db->where($condition);
		endif;
		if ($order):$this->db->order_by($order);
		endif;
		return $this->db->get($tableName)->result();

	}

	public function getSingleData($field, $condition, $tableName, $selectQuery)
	{
		$this->db->select($selectQuery);
		$this->db->where($field, $condition);
		return $this->db->get($tableName)->row();

	}

	public function allDataById($field, $condition, $tableName, $selectQuery)
	{
		$this->db->select($selectQuery);
		$this->db->where($field, $condition);
		return $this->db->get($tableName)->result();

	}

	public function getSingleDataArrayType($field, $condition, $tableName, $selectQuery)
	{
		$this->db->select($selectQuery);
		$this->db->where($field, $condition);
		return $this->db->get($tableName)->row_array();

	}

	public function getDataRow($field, $condition, $tableName, $selectQuery)
	{
		$this->db->select($selectQuery);
		$this->db->where($field, $condition);
		return $this->db->get($tableName)->num_rows();

	}

	function insertData($tableName, $data)
	{
		return $this->db->insert($tableName, $data);
	}

	function deleteData($field, $condition, $tableName)
	{
		$this->db->where($field, $condition);
		return $this->db->delete($tableName);
	}

	function AllQueryDalta($query)
	{
		return $this->db->query($query)->result();
	}

	function SingleQueryData($query)
	{
		return $this->db->query($query)->row();
	}

	function QuerySingleData($query)
	{
		return $this->db->query($query)->row();
	}


	function QuerySingleDataDelete($query)
	{
		$this->db->query($query)->result();
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {

			return false;
		}
	}

	function updateData($field, $condition, $tableName, $data)
	{

		$this->db->where($field, $condition);
		$result = $this->db->update($tableName, $data);
		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	function loginCheck($email, $password)
	{
		$this->db->select('*');
		$this->db->where(array('user_email' => $email, 'user_password' => $password));
		return $this->db->get('users')->row();
	}

	function returnInsertId($tableName, $data)
	{
		$this->db->insert($tableName, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	function updateDataReturnInsertId($field, $condition, $tableName, $data)
	{

		$this->db->where($field, $condition);
		$this->db->update($tableName, $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;

	}

	function visitorCount($ip, $date)
	{
		$this->db->where('visitor_ip', $ip);
		$this->db->where('visitor_date', $date);
		$insert_id = $this->db->get('visitors')->row();
		return $insert_id;
	}

	function countByLikeCondition($field_name, $cond, $tableName)
	{
		$this->db->like($field_name, $cond, 'after');
		return $this->db->count_all_results($tableName);
	}

	function countAll($tableName)
	{
		return $this->db->count_all($tableName);
	}

	public function select_all_data_by_name($limit, $start, $fieldName, $field_title, $tableName, $orderBy)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->like($fieldName, $field_title, 'both');
		$this->db->order_by($orderBy);
		$query_result = $this->db->get($tableName);
		$result = $query_result->result();
		return $result;
	}

	public function select_all_data_by_limit($limit, $start, $tableName, $orderBy)
	{
		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->order_by($orderBy);
		$query_result = $this->db->get($tableName);
		$result = $query_result->result();
		return $result;
	}

	public function cageory_product_rows($category_id)
	{
		$this->db->select('product.product_id');
		$this->db->join('term_relation', 'product.product_id = term_relation.product_id');
		$this->db->where('term_relation.term_id', $category_id);
		$data = $this->db->get('product');
		return $data->num_rows();

	}

	public function fetch_data($per_page, $start, $category_id, $sorting)
	{

		$this->db->select('*');
		$this->db->join('term_relation', 'product.product_id = term_relation.product_id');
		$this->db->where('term_relation.term_id', $category_id);
		if ($sorting == 'name_asc') {
			$this->db->order_by("product.product_title", 'ASC');

		} elseif ($sorting == 'name_desc') {
			$this->db->order_by("product.product_title", 'DESC');

		} elseif ($sorting == 'price_asc') {
			$this->db->order_by("product.product_price", 'ASC');

		} elseif ($sorting == 'price_desc') {
			$this->db->order_by("product.product_price", 'DESC');

		} else {
			$this->db->order_by("product.product_price", 'ASC');

		}

		$this->db->limit($per_page, $start);
		$data = $this->db->get('product');
		$output = '';
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {

				$featured_image = get_product_meta($row->product_id, 'featured_image');
				$featured_image = get_media_path($featured_image, 'thumb');

				$discount = false;

				$product_price = $sell_price = $row->product_price;

				$product_discount = $row->discount_price;
				$discount_type = $row->discount_type;

				if ($product_discount != 0) {
					$discount = '';

					$product_discount = $save_money = floatval($product_discount);

					$product_discount_price =  floatval($product_discount);
					$sell_price=$product_discount_price;

				}
				$less_money = '';

				if ($product_price > $sell_price) {
					$less_money = formatted_price($product_price);

				}
				$product_title = $row->product_title;
				$link=base_url().'product/'.$row->product_name;
				$total_review_id = 0;
				$total_review_id = get_total_review($row->product_id);


				$output .= '<div class="col-md-3 col-lg-3 col-6">
					<div class="xs-product-wraper version-2">
						<div class="xs-product-header media">
                        <span class="star-rating d-flex">
                            <span class="value">('.$total_review_id.')</span>
                        </span>

						</div>
						<img src="' . $featured_image . '" alt="Mobile">
						<div class="xs-product-content text-center">
                        <span class="product-categories">
                          
                        </span>
							<h4 class="product-title"><a href="'.$link.'">' . $product_title . '</a></h4>
							<span class="price">
                            ' . formatted_price($sell_price) . '
                            <del>' . $less_money . '</del>
                        </span>
						</div><!-- .xs-product-content END -->
						<div class="xs-product-hover-area clearfix">
													<div class="float-left" >
														<a href="#" class="btn btn-primary btn-sm  add_to_cart"
														   data-product_id="' . $row->product_id . '" data-product_price="' . $sell_price . '"
														   data-product_title="' . $row->product_title . '" ><i class="icon icon-online-shopping-cart"></i>Add to Cart</a>
													</div>
													<div >
														<a href="#" class="btn btn-info btn-sm buy_now"
														   data-product_id="' . $row->product_id . '" data-product_price="' . $sell_price . '"
														   data-product_title="' . $row->product_title . '"><i class="icon icon-bag"></i>Buy Now</a>
													</div>
												</div>
					</div>
				</div> ';
			}
			$output .= '</div>';
		} else {
			$output = '<h3>No Data Found</h3>';
		}
		return $output;


	}

	public function select_all_data()
	{
		$this->db->select('*');
		$query_result = $this->db->get('product_link');
		$result = $query_result->result();
		return $result;
	}

	public function select_all_category()
	{
		$this->db->select('category_id,category_title');
		$query_result = $this->db->get('category');
		$result = $query_result->result();
		return $result;
	}

	public function select_link_by_id($id)
	{
		$this->db->select('product_name');
		$this->db->where('product_id', $id);
		$query_result = $this->db->get('product');
		$result = $query_result->result();
		return $result;
	}

	public function select_all_product_by_id($id)
	{
		$this->db->select('product.product_id,product_title,product_name,product_price');
		$this->db->where('term_id', $id);
		$this->db->join('term_relation', 'term_relation.product_id = product.product_id');
		$this->db->join('category', 'category.category_id = term_relation.term_id');
		$query_result = $this->db->get('product');
		$result = $query_result->result();
		return $result;
	}

	public function select_product_id($product_name)
	{
		$this->db->select('product_id');
		$this->db->where('product_name', $product_name);
		$query_result = $this->db->get('product');
		$result = $query_result->row();
		return $result;
	}

	public function select_my_all_link($user_id)
	{
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$query_result = $this->db->get('product_link_info');
		$result = $query_result->result();
		return $result;
	}

	public function count_hit_by_user_id($product_id, $user_id)
	{
		$this->db->select('count(id) total_count');
		$this->db->where('product_id', $product_id);
		$this->db->where('user_id', $user_id);
		$query_result = $this->db->get('product_hit_count');
		$result = $query_result->row();
		return $result;
	}

	public function check_cookies_data($get_cookies)
	{
		$this->db->select('user_id');
		$this->db->where('unique_number', $get_cookies);
		$query_result = $this->db->get('product_hit_count');
		$result = $query_result->row();
		return $result;
	}

	public function count_order($product_id, $user_id)
	{
		$this->db->select('count(order_id) total_order');
		$this->db->where('product_id', $product_id);
		$this->db->where('user_id', $user_id);
		$query_result = $this->db->get('user_order_count');
		$result = $query_result->row();
		return $result;
	}

	public function count_buy($product_id, $user_id)
	{
		$this->db->select('count(user_order_count.order_id) total_buy');
		$this->db->where('user_order_count.product_id', $product_id);
		$this->db->where('user_order_count.user_id', $user_id);
		$this->db->join('order_data', 'order_data.order_id = user_order_count.order_id');
		$this->db->where('order_data.order_status', "delivered");
		$query_result = $this->db->get('user_order_count');
		$result = $query_result->row();
		return $result;
	}


}
	

   
