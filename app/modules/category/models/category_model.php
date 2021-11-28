<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;

	public function __construct(){
		$this->tb_categories = CATEGORIES;
		parent::__construct();
	}



	function get_category_lists($total_rows = false, $status = "", $limit = "", $start = ""){
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select('*');
		$this->db->from($this->tb_categories);
		$this->db->order_by('sort', 'ASC');

		$query = $this->db->get();
		if ($total_rows) {
			$result = $query->num_rows();
			return $result;
		}else{
			$result = $query->result();
			return $result;
		}
		return false;
	}

	function get_category_lists_by_search($k = ""){
		$k = trim(htmlspecialchars($k));
		if (!get_role("admin")) {
			$this->db->where("status", "1");
		}
		$this->db->select('*');
		$this->db->from($this->tb_categories);

		if ($k != "" && strlen($k) >= 2) {
			$this->db->like("name", $k, 'both');
			$this->db->or_like("desc", $k, 'both');
		}
		$this->db->order_by('sort', 'ASC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
