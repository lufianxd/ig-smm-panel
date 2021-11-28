<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class news extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_news;
	public $api_key;
	public $uid;
	public $columns;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_users      = USERS;
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
		$this->tb_news       = NEWS;

		$this->columns = array(
			"desc"        	 => lang('Description'),
			"type"           => lang("Type"),
			"created"        => lang("Start"),
			"expiry"         => lang("Expiry"),
			"status"         => lang("Status"),
			"action"         => lang('Action'),
		);

	}

	public function index(){
		$news = $this->model->get_news();
		$data = array(
			"module"     => get_class($this),
			"news"       => $news,
			"columns"    => $this->columns
		);
		$this->template->build("index", $data);
	}
	
	public function update($ids = ""){
		$new = $this->model->get_news_by_ids($ids);
		$data = array(
			"module"   => get_class($this),
			"new"      => $new,
		);
		$this->load->view('update', $data);
	}	

	public function ajax_notification($ids = ""){
		set_cookie("news_annoucement", "clicked", 21600);
		$news = $this->model->get_news_by_ajax();
		$data = array(
			"module"     => get_class($this),
			"news"       => $news
		);
		$this->load->view("ajax_news", $data);
	}

	public function ajax_update($ids = ""){
		$type 	    	= post("type");
		$create 		= post("create");
		$expiry 		= post("expiry");
		$status 		= (int)post("status");
		$description    = post("description");

		if (!in_array($type, ['new_services','disabled_services','updated_services','announcement'])) {
			ms(array(
				"status"  => "error",
				"message" => lang("invalid_news_type")
			));
		}

		if($create == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("start_field_is_required")
			));
		}

		if($expiry == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("expiry_field_is_required")
			));
		}

		if($description == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("Description_field_is_required")
			));
		}

		$create = str_replace('/', '-', $create);
		$expiry = str_replace('/', '-', $expiry);

		$data = array(
			"uid"             => session('uid'),
			"expiry"          => date("Y-m-d H:i:s", strtotime($expiry)),
			"created"         => date("Y-m-d H:i:s", strtotime($create)),
			"type"            => $type,
			"status"          => $status,
			"description"     => htmlspecialchars(@$description, ENT_QUOTES),
			"changed"		  => NOW,
		);

		$check_item = $this->model->get("ids", $this->tb_news, "ids = '{$ids}'");
		
		if(empty($check_item)){
			$data["ids"]     = ids();
			$this->db->insert($this->tb_news, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_news, $data, array("ids" => $check_item->ids));
		}
		
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
		
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_news, $ids, false);
	}
}

