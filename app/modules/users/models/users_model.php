<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;

	public function __construct(){
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_users      = USERS;
		parent::__construct();
	}

	function get_users_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select("*");
		$this->db->from($this->tb_users);
		$this->db->order_by("id", 'DESC');
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

	function get_users_by_search($k){
		$k = trim(htmlspecialchars($k));
		$this->db->select('*');
		$this->db->from($this->tb_users);
		if ($k != "" && strlen($k) >= 2) {
			$this->db->where("(`first_name` LIKE '%".$k."%' ESCAPE '!' OR `last_name` LIKE '%".$k."%' ESCAPE '!' OR `email` LIKE '%".$k."%' ESCAPE '!' OR `desc` LIKE '%".$k."%' ESCAPE '!')");
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
