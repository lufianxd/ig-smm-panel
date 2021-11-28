<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transactions_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_transaction_logs;

	public function __construct(){
		$this->tb_users 		     = USERS;
		$this->tb_categories 		 = CATEGORIES;
		$this->tb_services   		 = SERVICES;
		$this->tb_transaction_logs   = TRANSACTION_LOGS;
		parent::__construct();
	}

	function get_transaction_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if (!get_role("admin")) {
			$this->db->where("uid", session('uid'));
		}
		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}
		$this->db->select("*");
		$this->db->from($this->tb_transaction_logs);
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

	function get_transactions_by_search($k){
		$k = trim(htmlspecialchars($k));
		if (!get_role("admin")) {
			$this->db->select("tl.*, u.email");
			$this->db->from($this->tb_transaction_logs." tl");
			$this->db->join($this->tb_users." u", "u.id = tl.uid", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`tl`.`transaction_id` LIKE '%".$k."%' ESCAPE '!' OR `tl`.`type` LIKE '%".$k."%' ESCAPE '!')");
			}

			$this->db->where("u.id", session("uid"));

			$query = $this->db->get();
			$result = $query->result();
		}else{
			$this->db->select("tl.*, u.email");
			$this->db->from($this->tb_transaction_logs." tl");
			$this->db->join($this->tb_users." u", "u.id = tl.uid", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`tl`.`transaction_id` LIKE '%".$k."%' ESCAPE '!' OR `tl`.`type` LIKE '%".$k."%' ESCAPE '!' OR `u`.`email` LIKE '%".$k."%' ESCAPE '!')");
			}
			$query = $this->db->get();
			$result = $query->result();
		}

		return $result;
	}
}
