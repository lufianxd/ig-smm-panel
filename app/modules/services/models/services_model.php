<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class services_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;

	public function __construct(){
		$this->tb_categories     = CATEGORIES;
		$this->tb_services       = SERVICES;
		$this->tb_api_providers  = API_PROVIDERS;
		parent::__construct();
	}

	function getList($table, $columns, $limit=-1, $page=-1){
		$c = (int)get_secure('c'); //Column key
		$t = get_secure('t'); //Sort type
		$k = get_secure('k'); //Search keywork

		if($limit == -1){
			$this->db->select('count(*) as sum');
			$this->db->from($table." as users");
		}else{
			$this->db->select(implode(", users.", array_keys($columns)).", users.ids, package.name as package");
			$this->db->from($table." as users");
			$this->db->join(PACKAGES." as package", 'package.id = users.package', 'left');
		}
		
		if($limit != -1) {
			$this->db->limit($limit, $page);
		}

		if($k){
			$i = 0;
			foreach ($columns as $column_name => $column_title) {
				if($i == 0){
					$this->db->like("users.".$column_name, $k);
				}else{
					$this->db->or_like("users.".$column_name, $k);
				}
				$i++;
			}
		}

		if($c){
			$i = 0;
			$s = ($t && ($t == "asc" || $t == "desc"))?$t:"desc";
			foreach ($columns as $column_name => $column_title) {
				if($i == $c){
					$this->db->order_by("users.".$column_name , $s);
				}
				$i++;
			}
		}else{
			$this->db->order_by('users.created', 'desc');
		}
				
		$query = $this->db->get();
		if($query->result()){
			if($limit == -1){
				return $query->row()->sum;
			}else{
				$result =  $query->result();
				return $result;
			}

		}else{
			return false;
		}
	}

	function get_services_list(){
		$data  = array();
		// get categories
		if (!get_role("admin")) {
			$this->db->where("status", "1");
		}

		$this->db->select("*");
		$this->db->from($this->tb_categories);
		$this->db->order_by("sort", 'ASC');

		$query = $this->db->get();
		$categories = $query->result();

		if(!empty($categories)){
			foreach ($categories as $key => $row) {
				// get services
				if (!get_role("admin")) {
					$this->db->select('s.*, api.name as api_name');
					$this->db->from($this->tb_services." s");
					$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');
					$this->db->where("s.status", "1");
					$this->db->where("s.cate_id", $row->id);
					$this->db->order_by("id", 'ASC');

					$query = $this->db->get();
					$category_by_type = $query->result();
				}else{
					$this->db->select('s.*, api.name as api_name');
					$this->db->from($this->tb_services." s");
					$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');
					$this->db->where("s.cate_id", $row->id);
					$this->db->order_by("id", 'ASC');

					$query = $this->db->get();
					$category_by_type = $query->result();
				}

				if(!empty($category_by_type)){
					$data[$row->name] = $category_by_type;
				}
			}
		}

		return $data;
	}

	function get_services_by_search($k){
		$k = trim(htmlspecialchars($k));

		if (!get_role("admin")) {
			$this->db->select('s.*, api.name as api_name');
			$this->db->from($this->tb_services." s");
			$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`s`.`id` LIKE '%".$k."%' ESCAPE '!' OR `s`.`api_service_id` LIKE '%".$k."%' ESCAPE '!' OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}

			$this->db->where("s.status", 1);
			$this->db->order_by("s.id", 'DESC');
			$query = $this->db->get();
			$result = $query->result();

		}else{
			$this->db->select('s.*, api.name as api_name');
			$this->db->from($this->tb_services." s");
			$this->db->join($this->tb_api_providers." api", "s.api_provider_id = api.id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`s`.`id` LIKE '%".$k."%' ESCAPE '!' OR `s`.`api_service_id` LIKE '%".$k."%' ESCAPE '!' OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!' OR  `api`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}
			
			$this->db->order_by("s.id", 'DESC');
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}
}
