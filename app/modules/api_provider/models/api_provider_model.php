<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api_provider_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_api_providers;
	public $tb_orders;

	public function __construct(){
		$this->tb_categories 		= CATEGORIES;
		$this->tb_services   		= SERVICES;
		$this->tb_api_providers   	= API_PROVIDERS;
		$this->tb_orders     		= ORDER;
		parent::__construct();
	}

	function get_api_lists($status = false){
		$data  = array();
		if ($status) {
			$this->db->where("status", 1);
		}
		$this->db->select("*");
		$this->db->from($this->tb_api_providers);
		$this->db->order_by("id", 'ASC');

		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_all_orders(){
		$data  = array();
		$where = "(`status` = 'pending' or `status` = 'inprogress')";
		$this->db->select("*");
		$this->db->from($this->tb_orders);
		$this->db->where($where);
		$this->db->where("api_provider_id !=", 0);
		$this->db->where("api_order_id =", -1);
		$this->db->order_by("id", 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_all_orders_status(){
		$where = "(`status` = 'active' or `status` = 'processing' or `status` = 'inprogress'  or `status` = 'pending') AND `api_provider_id` != 0 AND `api_order_id` > 0 AND `changed` < '".NOW."' AND service_type != 'subscriptions'";
		$data  = array();
		$this->db->select("*");
		$this->db->from($this->tb_orders);
		$this->db->where($where);
		$this->db->order_by("id", 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	function get_all_subscriptions_status(){
		$where = "(`sub_status` = 'Active' or `sub_status` = 'Paused') AND `api_provider_id` != 0 AND `api_order_id` > 0 AND `changed` < '".NOW."' AND service_type = 'subscriptions'";
		$this->db->select("*");
		$this->db->from($this->tb_orders);
		$this->db->where($where);
		$this->db->order_by("id", 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
