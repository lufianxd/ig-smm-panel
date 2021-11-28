<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class faqs extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;
	public $tb_faqs;
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
		$this->tb_faqs       = FAQS;

	}

	public function index(){
		$faqs = $this->model->get_faqs();
		$data = array(
			"module"     => get_class($this),
			"faqs"       => $faqs,
		);

		if (!session('uid')) {
			$this->template->set_layout('general_page');
			$this->template->build("index", $data);
		}
		$this->template->build("index", $data);
	}
	
	public function update($ids = ""){
		$faq = $this->model->get_faq_by_ids($ids);
		$data = array(
			"module"   => get_class($this),
			"faq" => $faq,
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		$question 		= post("question");
		$sort 		    = (int)post("sort");
		$status 	    = (int)post("status");
		$answer 		= post("answer");

		if($question == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("question_is_required")
			));
		}

		if($answer == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("answer_is_required")
			));
		}

		if($sort == "" || $sort <= 0){
			ms(array(
				"status"  => "error",
				"message" => lang("sort_number_must_to_be_greater_than_zero")
			));
		}

		//
		$data = array(
			"uid"             => session('uid'),
			"question"        => $question,
			"answer"          => $answer,
			"status"          => $status,
			"sort"            => $sort,
		);

		$check_item = $this->model->get("ids", $this->tb_faqs, "ids = '{$ids}'");
		
		if(empty($check_item)){
			$data["ids"]     = ids();
			$data["changed"] = NOW;
			$data["created"] = NOW;
			$this->db->insert($this->tb_faqs, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_faqs, $data, array("ids" => $check_item->ids));
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
	
	public function ajax_search(){
		$k = post("k");
		$faqs = $this->model->get_search_faqs($k);
		$data = array(
			"module"     => get_class($this),
			"faqs" => $faqs,
		);
		$this->load->view("ajax_search", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_faqs, $ids, false);
	}
}

