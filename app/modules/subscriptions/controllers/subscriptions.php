<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class subscriptions extends MX_Controller {
	public $tb_users;
	public $tb_order;
	public $tb_categories;
	public $tb_services;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');

		//Config Module
		$this->tb_users               = USERS;
		$this->tb_order               = ORDER;
		$this->tb_categories          = CATEGORIES;
		$this->tb_services            = SERVICES;
		$this->module_name            = 'Order';
		$this->module_icon            = "fa ft-users";

		$this->columns = array(
			"order_id"                  => lang("order_id"),
			"order_basic_details"       => lang("order_basic_details"),
			"created"                   => lang("Created"),
			"updated"                   => lang("Updated"),
			"status"                    => lang("Status"),
		);

		if (get_role("admin")) {
			$this->columns = array(
				"order_id"                  => lang("order_id"),
				"api_order_id"              => lang("api_orderid"),
				"uid"                       => lang("User"),
				"order_basic_details"       => lang("order_basic_details"),
				"created"                   => lang("Created"),
				"updated"                   => lang("Updated"),
				"status"                    => lang("Status"),
				"action"                    => lang("Action"),
			);
		}
	}


	// LOGS
	public function index(){
		$page        = (int)get("p");
		$page        = ($page > 0) ? ($page - 1) : 0;
		$limit_per_page = get_option("default_limit_per_page", 10);
		$query = array();
		$query_string = "";
		if(!empty($query)){
			$query_string = "?".http_build_query($query);
		}
		$config = array(
			'base_url'           => cn(get_class($this).$query_string),
			'total_rows'         => $this->model->get_order_logs_list(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$order_logs = $this->model->get_order_logs_list(false, "all", $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"order_logs"   => $order_logs,
			"links"        => $links,
		);
		$this->template->build('logs', $data);
	}

	public function update($ids = ""){
		$order    = $this->model->get("*", $this->tb_order, "ids = '{$ids}'");
		$data = array(
			"module"   		=> get_class($this),
			"order" 	    => $order,
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		$sub_status  	     = post("sub_status");
		$sub_response_posts  = post("actived_posts");

		if($sub_status == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("please_fill_in_the_required_fields")
			));
		}

		$data = array(
			"sub_status" 	    	=> $sub_status,
			"sub_response_posts"    => $sub_response_posts,
			"changed" 				=> NOW,
		);

		$check_item = $this->model->get("ids, charge, uid", $this->tb_order, "ids = '{$ids}'");
		if(!empty($check_item)){
			/*----------  If status = refund  ----------*/

			// if ($sub_status == "Cancelled") {
			// 	$charge = $check_item->charge;
			// 	$user = $this->model->get("id, balance", $this->tb_users, ["id"=> $check_item->uid]);
			// 	if (!empty($user)) {
			// 		$balance = $user->balance;
			// 		$balance += $charge;
			// 		$this->db->update($this->tb_users, ["balance" => $balance], ["id"=> $check_item->uid]);
			// 	}
			// }

			$this->db->update($this->tb_order, $data, array("ids" => $check_item->ids));
			
			ms(array(
				"status"  => "success",
				"message" => lang("Update_successfully")
			));
		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}
	
	public function ajax_search(){
		$k = post("k");
		$order_logs = $this->model->get_orders_logs_by_search($k);

		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"order_logs" => $order_logs,
		);
		$this->load->view("ajax_search", $data);
	}	

	public function ajax_order_by($status = ""){
		if (!empty($status) && $status !="" ) {
			$order_logs = $this->model->get_order_logs_list(false, $status);
			$data = array(
				"module"     => get_class($this),
				"columns"    => $this->columns,
				"order_logs" => $order_logs,
			);
			$this->load->view("ajax_search", $data);
		}
	}

	public function ajax_change_status_item($ids = "", $status = ""){
		$status = post("status");
		$check_item = $this->model->get("ids, id, sub_status", $this->tb_order, ["ids" => $ids]);
		if (!empty($check_item)) {
			if ($status == "" || !in_array($status, array('Active', 'Cancelled', 'Paused'))) {
				ms(array(
					"status"  => "error",
					"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
				));
			}
			$this->db->update($this->tb_order, ["sub_status" => $status, "changed" => NOW], ["ids" => $ids]);
			if ($this->db->affected_rows() > 0) {
				ms(array(
					"status"  => "success",
					"message" => lang("Update_successfully")
				));
			}else{
				ms(array(
					"status"  => "error",
					"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
				));
			}

		}else{
			ms(array(
				"status"  => "error",
				"message" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}

	public function ajax_log_delete_item($ids = ""){
		$this->model->delete($this->tb_order, $ids, false);
	}

}