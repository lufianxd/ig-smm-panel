<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class category extends MX_Controller {
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
		$this->module_name   = 'Category';
		$this->module_icon   = "fa ft-users";
		$this->columns = array(
			"name"             => lang("Name"),
			"desc"             => lang("Description"),
			"sort"             => lang("Sorting"),
			"status"           => lang("Status"),
		);
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
			'total_rows'         => $this->model->get_category_lists(true),
			'per_page'           => $limit_per_page,
			'use_page_numbers'   => true,
			'prev_link'          => '<i class="fe fe-chevron-left"></i>',
			'first_link'         => '<i class="fe fe-chevrons-left"></i>',
			'next_link'          => '<i class="fe fe-chevron-right"></i>',
			'last_link'          => '<i class="fe fe-chevrons-right"></i>',
		);
		$this->pagination->initialize($config);
		$links = $this->pagination->create_links();

		$categories = $this->model->get_category_lists(false, "all", $limit_per_page, $page * $limit_per_page);

		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"categories" => $categories,
			"from"       => $page * $limit_per_page,
			"links"      => $links,
		);

		$this->template->build('index', $data);
	}

	public function update($ids = ""){

		$category = $this->model->get("*", $this->tb_categories, "ids = '{$ids}' AND uid = '".session('uid')."'");

		$data = array(
			"module"   => get_class($this),
			"category" => $category,
		);
		$this->load->view('update', $data);
	}

	public function ajax_update($ids = ""){
		$name 		= post("name");
		$image	    = post("image");
		$sort 		= (int)post("sort");
		$status 	= (int)post("status");
		$desc 		= post("desc");

		if($name == ""){
			ms(array(
				"status"  => "error",
				"message" => lang("name_is_required")
			));
		}

		// if($image == ""){
		// 	ms(array(
		// 		"status"  => "error",
		// 		"message" => "Imgage logo is required"
		// 	));
		// }

		if($sort == "" || $sort <= 0){
			ms(array(
				"status"  => "error",
				"message" => lang("sort_number_must_to_be_greater_than_zero")
			));
		}

		//
		$data = array(
			"uid"             => session('uid'),
			"name"            => $name,
			"desc"            => $desc,
			"image"           => $image,
			"status"          => $status,
			"sort"            => $sort,
		);

		$check_item = $this->model->get("id, ids", $this->tb_categories, "ids = '{$ids}' AND uid = '".session('uid')."'");
		
		if(empty($check_item)){

			$data["ids"]     = ids();
			$data["changed"] = NOW;
			$data["created"] = NOW;

			$this->db->insert($this->tb_categories, $data);
		}else{
			$data["changed"] = NOW;
			$this->db->update($this->tb_categories, $data, array("ids" => $check_item->ids));
			if ($status != 1 ) {
				$this->db->update($this->tb_services, ["status" => 0], ["cate_id" => $check_item->id]);
			}
		}
		
		ms(array(
			"status"  => "success",
			"message" => lang("Update_successfully")
		));
	}
	
	public function ajax_search(){
		$k = post("k");
		$categories = $this->model->get_category_lists_by_search($k);
		$data = array(
			"module"     => get_class($this),
			"columns"    => $this->columns,
			"categories" => $categories,
		);
		$this->load->view("ajax_search", $data);
	}
	public function ajax_delete_item($ids = ""){
		$this->model->delete($this->tb_categories, $ids, true);
	}
}