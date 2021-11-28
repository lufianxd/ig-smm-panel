<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class api extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $api_key;
	public $uid;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_users      = USERS;
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
	}

	public function index(){
		redirect(cn('api/docs'));
	}

	public function docs(){
		$api_key = null;
		$api_key = get_field(USERS, ['id' => session('uid')], "api_key");
		
		$new_order = array(
			"key"        	 => lang("your_api_key"),
			"action"         => "add",
			"service"        => lang("service_id"),
			"link"           => lang("link_to_page"),
			"quantity"       => lang("needed_quantity"),
		);	
			
		$status_order = array(
			"key"            => lang("your_api_key"),
			"action"         => "status",
			"order_id"       => lang("order_id"),
		);	

		$status_orders = array(
			"key"            => lang("your_api_key"),
			"action"         => "status",
			"order_ids"      => lang("order_ids_separated_by_comma_array_data"),
		);	

		$services = array(
			"key"            => lang("your_api_key"),
			"action"         => "services",
		);

		$balance = array(
			"key"            => lang("your_api_key"),
			"action"         => "balance",
		);

		$data = array(
			"module"        => get_class($this),
			"api_key"       => $api_key,
			"api_url"       => BASE."api/v1",
			"new_order"     => $new_order,
			"status_order"  => $status_order,
			"status_orders" => $status_orders,
			"services"      => $services,
			"balance"       => $balance,
		);

		if (!session('uid')) {
			$this->template->set_layout('general_page');
			$this->template->build("index", $data);
		}
		
		$this->template->build("index", $data);
	}

	public function v1(){

		if (isset($_REQUEST["key"])) {
			$this->api_key = urldecode($_REQUEST["key"]);
		}
		
		if (isset($_REQUEST["action"])) {
			$action = urldecode($_REQUEST["action"]);
		}

		if (isset($_REQUEST["order"])) {
			$order_id = urldecode($_REQUEST["order"]);
		}

		if (isset($_REQUEST["link"])) {
			$link = urldecode($_REQUEST["link"]);
		}

		if (isset($_REQUEST["quantity"])) {
			$quantity = urldecode($_REQUEST["quantity"]);
		}

		if (isset($_REQUEST["service"])) {
			$service_id = urldecode($_REQUEST["service"]);
		}

		if (isset($_REQUEST["orders"])) {
			$order_ids = $_REQUEST["orders"];
		}

		$uid_exists = get_field($this->tb_users, ["api_key" => $this->api_key, "status" => 1], "id");
		if ($this->api_key == "" || empty($uid_exists)) {
			echo_json_string(array(
				'error' => lang("api_is_disable_for_this_user_or_user_not_found_contact_the_support"),
			));
		}
		$this->uid = $uid_exists;

		$action_allowed = array('add', 'status', 'services', 'balance');
		if ($action == "" || !in_array($action, $action_allowed)) {
			echo_json_string(array(
				'error' => lang("this_action_is_invalid"),
			));
		}

		switch ($action) {
			case 'services':
				$services = $this->model->get_services_list();
				if (!empty($services)) {
					echo_json_string($services);
				}else{
					echo_json_string(array(
						'status' => "success",
						'data'   => "Empty Data",
					));
				}
				break;

			case 'add':
				$this->add($service_id, $link, $quantity);
				break;

			case 'status':
					
					if (isset($order_id)) {
						$this->single_status($order_id);
					}	
							
					if (isset($order_ids)) {
						$this->multi_status($order_ids);
					}
					break;
			
			case 'balance':
					$this->balance();
					break;	

			default:
				echo_json_string(array(
					'error' => lang("this_action_is_invalid"),
				));
				break;
		}
	}

	private function add($service_id, $link, $quantity){
		if ($service_id == "" || $link == "" || $quantity == "") {
			echo_json_string(array(
				'error' => lang("there_are_missing_required_parameters_please_check_your_api_manual"),
			));
		}

		if (!filter_var($link, FILTER_VALIDATE_URL)) {
		    echo_json_string(array(
				"error" => lang("invalid_link")
			));
		}

		$check_service  = $this->model->check_record("*", $this->tb_services, $service_id, false, true);
		if (empty($check_service)) {
			echo_json_string(array(
				"error" => lang("service_id_does_not_exists")
			));
		}

		// check balance
		$current_balance = $this->model->check_record("balance", $this->tb_users, $this->uid, false, true);
		// check quantity
		if (!empty($check_service)) {
			$min   = $check_service->min;
			$max   = $check_service->max;
			$price = $check_service->price;
			$total_charge = $price*($quantity/1000);
			
			if ($quantity <= 0 || $quantity < $min) {
				echo_json_string(array(
					"error" => lang("quantity_must_to_be_greater_than_or_equal_to_minimum_amount")
				));
			}	
					
			if ($quantity > $max) {
				echo_json_string(array(
					"error" => lang("quantity_must_to_be_less_than_or_equal_to_maximum_amount")
				));
			}
		}
		if ((!empty($current_balance->balance) && $current_balance->balance < $total_charge) || empty($current_balance->balance)) {
			echo_json_string(array(
				"error" => lang("not_enough_funds_on_balance")
			));
		}

		$data = array(
			"ids" 	            => ids(),
			"uid" 	            => $this->uid,
			"type" 	            => 'api',
			"cate_id" 	        => $check_service->cate_id,
			"service_id" 	    => $check_service->id,
			"link" 	            => $link,
			"quantity" 	        => $quantity,
			"charge" 	        => $total_charge,
			"api_provider_id"  	=> $check_service->api_provider_id,
			"api_service_id"  	=> $check_service->api_service_id,
			"api_order_id"  	=> (!empty($check_service->api_provider_id) && !empty($check_service->api_service_id)) ? -1 : 0,
			"status"			=> 'pending',
			"changed" 	        => NOW,
			"created" 	        => NOW,
		);

		$this->db->insert($this->tb_orders, $data);
		if ($this->db->affected_rows() > 0) {
			$insert_id = $this->db->insert_id();
			$new_balance = $current_balance->balance - $total_charge;
			$this->db->update($this->tb_users, ["balance" => $new_balance], ["id" => $this->uid]);
			echo_json_string(array(
				'status' => "success",
				"order"  => $insert_id,
			));
		}else{
			echo_json_string(array(
				"error" => lang("There_was_an_error_processing_your_request_Please_try_again_later")
			));
		}
	}

	private function balance(){
		$get_balance = $this->model->check_record("balance", $this->tb_users, $this->uid, false, true);
		if (!empty($get_balance)) {
			echo_json_string(array(
				"status"   => "success",
				"balance"  => $get_balance->balance,
				"currency" => "USD"
			));
		}else{
			echo_json_string(array(
				"error"  => lang("the_account_does_not_exists"),
			));
		}
	}

	private function single_status($order_id){
		if ($order_id == "") {
			echo_json_string(array(
				'error' => lang("order_id_is_required_parameter_please_check_your_api_manual")
			));
		}

		if (!is_numeric($order_id)) {
			echo_json_string(array(
				'error' => lang("incorrect_order_id"),
			));
		}

		$check_order_id = $this->model->get_order_id($order_id, $this->uid);
		if (empty($check_order_id)) {
			echo_json_string(array(
				'error' => lang("incorrect_order_id"),
			));
		}else{
			echo_json_string($check_order_id);
		}
	}

	private function multi_status($order_ids){
		if ($order_ids == "") {
			echo_json_string(array(
				'error' => lang("order_id_is_required_parameter_please_check_your_api_manual"),
			));
		}
		$order_ids = json_decode($order_ids);

		if (is_array($order_ids)) {
			$data = [];
			foreach ($order_ids as $order_id) {
				$check_order_id = $this->model->get_order_id($order_id, $this->uid);
				if (empty($check_order_id)) {
					$data[$order_id] = "Incorrect order ID";
				}else{
					$data[$order_id] = $check_order_id;
				}
			}
			echo_json_string($data);
		}

		echo_json_string(array(
			'error' => lang("incorrect_order_id"),
		));
	}
}

