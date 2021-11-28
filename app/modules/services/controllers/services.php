<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class services extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $columns;
	public $module_name;
	public $module_icon;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->module_name   = 'Services';
		$this->module_icon   = "fa ft-users";

		$this->columns = array(
			"name"             => lang("Name"),
			"price"            => lang("rate_per_1000")."(".get_option("currency_symbol","").")",
			"min_max"          => lang("min__max_order"),
			"desc"             => lang("Description"),
		);

        if (get_role("admin")) {
			$this->columns = array(
				"name"             => lang("Name"),
				"add_type"         => lang("Type"),
				"api_service_id"   => lang("api_service_id"),
				"provider"         => lang("api_provider"),
				"price"            => lang("rate_per_1000")."(".get_option("currency_symbol","").")",
				"min_max"          => lang("min__max_order"),
				"desc"             => lang("Description"),
				"dripfeed"         => lang("dripfeed"),
				"status"           => lang("Status"),
			);
		}				
	}

	public function index(){

		if (!session('uid') && get_option("enable_service_list_no_login") != 1) {
			redirect(cn());
		}
		
		$categories = $this->model->get_services_list();
		$data = array(
			"module"       => get_class($this),
			"columns"      => $this->columns,
			"categories"   => $categories,
		);
		
		if (!session('uid')) {
			$this->template->set_layout('general_page');
			$this->template->build("index", $data);
		}
		$this->template->build("index", $data);
	}

	public function update($ids = ""){
		$service    = $this->model->get("*", $this->tb_services, "ids = '{$ids}' ");
		$categories  = $this->model->fetch("*", $this->tb_categories, "status = 1", 'sort','ASC');
		$data = array(
			"module"   		=> get_class($this),
			"service" 		=> $service,
			"categories" 	=> $categories,
		);
		$this->load->view('update', $data);
	}

	public function desc($ids = ""){
		$service    = $this->model->get("id, ids, name, desc", $this->tb_services, "ids = '{$ids}' ");
		$data = array(
			"module"   		=> get_class($this),
			"service" 		=> $service,
		);
		$this->load->view('descriptions', $data);
	}

	public function ajax_update($ids = ""){
		$name 		= post("name");
		$category	= post("category");
		$min	    = post("min");
		$max	    = post("max");
		$price	    = (float)post("price");
		$status 	= (int)post("status");
		$dripfeed 	= (int)post("dripfeed");
		$desc 		= post("desc");

		$desc = trim($desc);
		$desc = stripslashes($desc);
		$desc = utf8_encode($desc);
		$desc = htmlspecialchars($desc, ENT_QUOTES);
		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}

		if($category == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("category_is_required")
			));
		}

		if($min == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("min_order_is_required")
			));
		}

		if($max == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("max_order_is_required")
			));
		}

		if($min > $max){
			ms(array(
				"status"  => "error",
				"message" => lang("max_order_must_to_be_greater_than_min_order")
			));
		}

		if($price == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid")
			));
		}
		$decimal_places = get_option("auto_rounding_x_decimal_places", 2);
		if(strlen(substr(strrchr($price, "."), 1)) > $decimal_places || strlen(substr(strrchr($price, "."), 1)) < 0){
			ms(array(
				"status"  => "error",
				"message" => lang("price_invalid_format")
			));
		}

		$data = array(
			"uid"             => session('uid'),
			"cate_id"         => $category,
			"name"            => $name,
			"desc"            => $desc,
			"min"             => $min,
			"max"             => $max,
			"price"           => $price,
			"dripfeed"        => $dripfeed,
			"status"          => $status,
		);
		$check_item = $this->model->get("ids", $this->tb_services, "ids = '{$ids}' AND uid = '".session('uid')."'");
		
		if(empty($check_item)){

			$data["ids"]     = ids();
			$data["changed"] = NOW;
			$data["created"] = NOW;

			$this->db->insert($this->tb_services, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_services, $data, array("ids" => $check_item->ids));
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}
	
	public function ajax_search(){
		$k = post("k");
		$services = $this->model->get_services_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"services"   => $services,
		);
		$this->load->view("ajax_search", $data);
	}
	
	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_services, $ids, true);
	}
}