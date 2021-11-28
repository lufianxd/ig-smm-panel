<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class transactions extends MX_Controller {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_transaction_logs;
	public $columns;

	public function __construct(){
		parent::__construct();
		$this->load->model(get_class($this).'_model', 'model');
		//Config Module
		$this->tb_categories         = CATEGORIES;
		$this->tb_services           = SERVICES;
		$this->tb_transaction_logs   = TRANSACTION_LOGS;
		$this->columns = array(
			"uid"              => lang('User'),
			"transaction_id"   => lang('Transaction_ID'),
			"type"             => lang('Payment_method'),
			"amount"           => lang('Amount_includes_fee'),
			"created"          => lang('Created'),
		);

		if (!get_role("admin")) {
			$this->columns = array(
				"transaction_id"   => lang('Transaction_ID'),
				"type"             => lang('Payment_method'),
				"amount"           => lang('Amount_includes_fee'),
				"created"          => lang('Created'),
			);
		}
	}

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
			'total_rows'         => $this->model->get_transaction_list(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$transactions = $this->model->get_transaction_list(false, "all", $limit_per_page, $page * $limit_per_page);
		$data = array(
			"module"         => get_class($this),
			"columns"        => $this->columns,
			"transactions"   => $transactions,
			"links"          => $links,
		);

		$this->template->build('index', $data);
	}

	
	public function ajax_search(){
		$k = post("k");
		$transactions = $this->model->get_transactions_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"transactions"   => $transactions,
		);
		$this->load->view("ajax_search", $data);
	}

	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_transaction_logs, $ids, true);
	}
}