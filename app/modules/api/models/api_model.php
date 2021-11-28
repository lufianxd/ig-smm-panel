<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class api_model extends MY_Model {
	public $tb_users;
	public $tb_categories;
	public $tb_services;
	public $tb_orders;

	public function __construct(){
		$this->tb_categories = CATEGORIES;
		$this->tb_services   = SERVICES;
		$this->tb_orders     = ORDER;
		parent::__construct();
	}

	function get_services_list(){
		$data  = array();
		$this->db->select("s.id as service, s.name, c.name as category, s.price as rate, s.min, s.max");
		$this->db->from($this->tb_services ." s");
		$this->db->join($this->tb_categories." c", "s.cate_id = c.id", 'left');
		$this->db->where("s.status", "1");
		$this->db->where("c.status", "1");

		$query = $this->db->get();
		if($query->result()){
			return $data = $query->result();
		}else{
			false;
		}

	}

	function get_order_id($id, $uid){
		$this->db->select("id as order, status, charge, start_counter as start_count, remains");
		$this->db->from($this->tb_orders);
		$this->db->where("id", $id);
		$this->db->where("uid", $uid);
		$query = $this->db->get();

		$result = $query->row();
		if(!empty($result)){
			switch ($result->status) {
				case 'completed':
					$result->status = 'Completed';
					break;
				case 'completed':
					$result->status = 'Completed';
					break;
				case 'processing':
					$result->status = 'Processing';
					break;
				case 'pending':
					$result->status = 'Pending';
					break;
				case 'inprogress':
					$result->status = 'In progress';
					break;
				case 'partial':
					$result->status = 'Partial';
					break;
				case 'cancelled':
					$result->status = 'Cancelled';
					break;
				case 'refunded':
					$result->status = 'Refunded';
					break;

			}
			return $result;
		}
		return false;
	}

}
