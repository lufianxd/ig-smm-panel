<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class subscriptions_model extends MY_Model {
	public $tb_users;
	public $tb_order;
	public $tb_categories;
	public $tb_services;

	public function __construct(){
		$this->tb_categories          = CATEGORIES;
		$this->tb_order               = ORDER;
		$this->tb_users               = USERS;
		$this->tb_services            = SERVICES;
		parent::__construct();
	}

	function get_order_logs_list($total_rows = false, $status = "", $limit = "", $start = ""){
		$data  = array();
		if (!get_role("admin")) {
			$this->db->where("uid", session("uid"));
		}

		if ($limit != "" && $start >= 0) {
			$this->db->limit($limit, $start);
		}

		$this->db->select("*");
		$this->db->from($this->tb_order);
		if($status != "all" && !empty($status)){
			$this->db->where("sub_status", $status);
		}
		$this->db->where("service_type", "subscriptions");
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

	function get_orders_logs_by_search($k){
		$k = trim(htmlspecialchars($k));
		if (!get_role("admin")) {
			$this->db->select('o.*, u.email as user_email, s.name as service_name');
			$this->db->from($this->tb_order." o");
			$this->db->join($this->tb_users." u", "u.id = o.uid", 'left');
			$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`o`.`id` LIKE '%".$k."%' ESCAPE '!' OR `o`.`username` LIKE '%".$k."%' ESCAPE '!' OR `o`.`sub_status` LIKE '%".$k."%' ESCAPE '!' OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}
			$this->db->where("o.service_type ", "subscriptions");
			$this->db->where("u.id", session("uid"));
			$query = $this->db->get();
			$result = $query->result();

		}else{
			$this->db->select('o.*, u.email as user_email, s.name as service_name');
			$this->db->from($this->tb_order." o");
			$this->db->join($this->tb_users." u", "u.id = o.uid", 'left');
			$this->db->join($this->tb_services." s", "s.id = o.service_id", 'left');

			if ($k != "" && strlen($k) >= 2) {
				$this->db->where("(`o`.`api_order_id` LIKE '%".$k."%' ESCAPE '!' OR `o`.`username` LIKE '%".$k."%' ESCAPE '!' OR `o`.`id` LIKE '%".$k."%' ESCAPE '!' OR `o`.`sub_status` LIKE '%".$k."%' ESCAPE '!' OR  `u`.`email` LIKE '%".$k."%' ESCAPE '!'OR  `s`.`name` LIKE '%".$k."%' ESCAPE '!')");
			}
			$this->db->where("o.service_type ", "subscriptions");
			$query = $this->db->get();
			$result = $query->result();
		}
		return $result;
	}

}

